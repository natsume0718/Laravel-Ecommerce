@extends('layouts.app')
@section('content')
<div class="table-responsive">
<table class="table">
<tr><th>商品名</th><th>価格</th><th>在庫状況</th></tr>
@foreach($items as $item)
<tr>
<td><a href="{{ route('item.detail',['id'=>$item->id]) }}">{{ $item->name }}</a></td>
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
