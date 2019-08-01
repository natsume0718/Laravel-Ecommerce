<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    private $user;

    protected function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
    }

    /**
     * ミドルウェア動作テスト
     */
    public function testBeforeLogin()
    {
        //ログインせずにアクセスするとリダイレクト
        $this->assertGuest('user');
        $response = $this->get(route('home'));
        $response->assertStatus(302)->assertRedirect(route('login'));
    }

    /**
     * ログインテスト
     */
    public function testLogin()
    {
        //ログインできるか
        $response = $this->from(route('login'))->actingAs($this->user,'user');
        $response->assertAuthenticated('user');

        //ログイン後再度ログイン画面にいけないこと
        $response_logedin = $this->get(route('login'));
        $response_logedin->assertStatus(302);
        $this->get(route('home'))->assertDontSee('Login');
    }

}
