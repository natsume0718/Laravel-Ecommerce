<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Http\Requests\ItemRequest;

class AdminItemController extends Controller
{
	public function index()
	{
		$items = Item::all();
		return view('admin.item.index',compact('items'));
	}

	public function detail(Item $item)
	{
		return view('admin.item.detail',compact('item'));
	}

	public function show()
	{
		return view('admin.item.add');
	}

	public function add(ItemRequest $request)
	{
		Item::create($request->all());
		return redirect()->route('admin.item.list');
	}

	public function edit(Item $item)
	{
		return view('admin.item.edit',compact('item'));
	}

	public function update(ItemRequest $request, Item $item)
	{
		$item->fill($request->all())->save();
		return redirect()->route('admin.item.detail',$item);
	}
}
