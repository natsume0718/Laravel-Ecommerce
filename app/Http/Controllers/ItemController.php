<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
	public function index()
	{
		$var = 'むらっしゅ';
		return view('item.index',compact('var'));
	}
}
