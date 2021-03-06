@extends('layouts.app')
@section('content')
@include('layouts.message')
<h1>編集管理画面</h1>
{!! Form::model($item, ['method' => 'PATCH','route' =>['admin.item.edit',$item]]) !!}
<div class="form-group">
{!! Form::label('name', '※商品名：') !!}
{!! Form::text('name', old('name'), ['class' => 'form-control ']) !!}
@if ($errors->has('name'))
<p>
<span style="color:red;">
{{ $errors->first('name') }}
</span>
</p>
@endif
</div>
<div class="form-group">
{!! Form::label('detail', '※商品詳細：') !!}
{!! Form::textarea('detail', old('detail'), ['class' => 'form-control','rows'=>3]) !!}
@if ($errors->has('detail'))
<p>
<span style="color:red;">
{{ $errors->first('detail') }}
</span>
</p>
@endif
</div>
<div class="form-group">
{!! Form::label('price', '※商品価格：') !!}
{!! Form::number('price', old('price'), ['class' => 'form-control','min'=>0,"style"=>"width:40%"]) !!}
@if ($errors->has('price'))
<p>
<span style="color:red;">
{{ $errors->first('price') }}
</span>
</p>
@endif
</div><div class="form-group">
{!! Form::label('stock', '※商品在庫：') !!}
{!! Form::number('stock', old('stock'), ['class' => 'form-control','min'=>0,"style"=>"width:20%"]) !!}
@if ($errors->has('stock'))
<p>
<span style="color:red;">
{{ $errors->first('stock') }}
</span>
</p>
@endif
</div>
<p>{!! Form::submit('編集する', ['class' => 'btn btn-primary']) !!}</p>
{!! Form::close() !!}

@endsection
