<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Admin;

class AdminUserTest extends TestCase
{
    use DatabaseTransactions;

    private $admin;

    protected function setUp()
    {
        parent::setUp();
        $this->admin = factory(Admin::class)->create();
    }

    /**
     * ミドルウェア動作テスト
     */
    public function testBeforeLogin()
    {
        //ログインせずにアクセスするとリダイレクト
        $this->assertGuest('admin');
        $response = $this->get(route('admin.home'));
        $response->assertStatus(302)->assertRedirect(route('admin.login'));
    }

    /**
     * ログインテスト
     */
    public function testLogin()
    {
        //ログインできるか
        $response = $this->from(route('admin.login'))->actingAs($this->admin,'admin');
        $response->assertAuthenticated('admin');

        //ログイン後再度ログイン画面にいけないこと
        $response_logedin = $this->get(route('admin.login'));
        $response_logedin->assertStatus(302);
        $this->get(route('admin.home'))->assertSee('管理者ログイン中');
    }

}
