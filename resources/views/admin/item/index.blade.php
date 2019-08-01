@extends('layouts.app')
@section('content')
@include('layouts.message')
<h1>商品管理画面</h1>
<p><b>商品追加： <a href="{{ route('admin.item.add') }}" class="btn btn-primary">＋</a></p>

<div class="table-responsive">
<table class="table">
<tr><th>商品名</th><th>価格</th><th>在庫状況</th></tr>
@foreach($items as $item)
<tr>
<td><a href="{{ route('admin.item.detail',['id'=>$item->id]) }}">{{ $item->name }}</a></td>
<td>{{ $item->price }}円</td>
<td>
@if($item->stock)
有
@else
無
@endif
</td>
</tr>
@endforeach
</table>
</div>

@endsection
