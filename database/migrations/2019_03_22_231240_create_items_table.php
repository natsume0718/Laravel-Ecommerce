<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');//商品名
			$table->text('detail');//詳細
			$table->integer('price')->unsigned();//価格
			$table->integer('stock')->unsigned();//在庫
			$table->timestamps();//更新日時、作成日時
			$table->softDeletes();//論理削除
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
