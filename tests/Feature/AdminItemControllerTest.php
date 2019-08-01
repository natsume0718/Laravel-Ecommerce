<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Admin;
use App\Item;
use Faker\Factory as Faker;

class AdminItemControllerTest extends TestCase
{
    use DatabaseTransactions;

    private $admin;
    private $item;
    
    protected function setUp()
    {
        parent::setUp();
        $this->admin = factory(Admin::class)->create();
        $this->item = factory(Item::class)->create();
    }

    /**
     * @test
     */
    public function 一覧画面未ログインアクセス()
    {
        //未ログインアクセスはリダイレクト
        $response = $this->get(route('admin.item.list'));
        $response->assertStatus(302)->assertRedirect(route('admin.login'));
    }

    /**
     * @test
     */
    public function 一覧画面ログイン済アクセス()
    {
        $response = $this->actingAs($this->admin,'admin')->get(route('admin.item.list'));
        $response->assertStatus(200)->assertSeeText($this->item->name);
    }

    /**
     * @test
     */
    public function 詳細画面アクセス()
    {
        //存在する商品にアクセス
        $response = $this->actingAs($this->admin,'admin')->get(route('admin.item.detail',$this->item));
        $response->assertStatus(200)->assertSee($this->item->name);
        //存在しない商品にアクセス
        $response_notfound = $this->actingAs($this->admin,'admin')->get(route('admin.item.detail',99999));
        $response_notfound->assertStatus(404);
    }

    /**
     * @test
     */
    public function 追加()
    {
        $this->actingAs($this->admin,'admin');
        $response = $this->get(route('admin.item.add'));
        $response->assertStatus(200);

        //追加できる
        $faker = Faker::create();
        $data = [
            'name'=>$faker->realText($maxNbChars=10,$indexSize=1),
            'detail'=>$faker->realText($maxNbChars=200,$indexSize=1),
		    'price'=>$faker->numberBetween($min=100,$max=5000),
		    'stock'=>$faker->numberBetween($min=1,$max=100),
        ];
        $response_post = $this->from(route('admin.item.add'))->post(route('admin.item.add'),$data);

    }
}
