<?php

namespace Tests\Feature;

use App\Item;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class getItemTest extends TestCase
{
   use DatabaseTransactions;

   private $item;

   protected function setup(){
       parent::setup();
       $this->item = Item::create([
           'name'=>'テスト名前',
           'detail' =>'テスト詳細',
           'price'=>100,
           'stock'=>5
        ]);
   }

   /**
    * 一覧画面アクセステスト
    */
   public function testIndexPath()
   {
       $response = $this->get(route('item.list'));
       $response->assertStatus(200)->assertSee($this->item->name);
   }

   /**
    * 詳細画面アクセステスト
    */
   public function testDetailPath()
   {
       $response = $this->get(route('item.detail',['item'=>$this->item]));
       $response->assertStatus(200)->assertSee($this->item->name);

       //存在しない場合404確認
       $response_notfound =  $this->get('/detail/0');
       $response_notfound->assertStatus(404);
   }
}
