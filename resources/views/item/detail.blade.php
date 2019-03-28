@extends('layouts.app')
@section('content')
<div class="card">
  <div class="card-body">
	<ul class="list-group">
	<li class="list-group-item">
		<h4 class="card-title">{{ $item->name }}</h4>
	</li>
	<li class="list-group-item">
		<h5 class="card-text">{{ $item->price }}円</h5>
	</li>
	<li class="list-group-item">
		<p class="card-text">{{ $item->detail }}</p>
	</li>
	<li class="list-group-item">
		<p class="card-text">在庫:
@if($item->stock)
有
@else
無
@endif
</p>
	</li>
	<a href="{{ route('item-list') }}" class="btn btn-primary">トップへ戻る</a>
  </div>
</div>
@endsection
