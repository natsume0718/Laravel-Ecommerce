<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
	use SoftDeletes;

	//主キーをガード
	protected $guarded = array('id');
	//日時を自動更新
	public $timestamps = true;
	//更新可能なカラム
	protected $fillable = ['name','detail','price','stock'];
}
