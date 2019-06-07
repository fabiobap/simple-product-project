@extends('layout')

@section('title')
Products - Simple Product Project
@endsection

@section('header')
Products
@endsection

@section('content')
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif
@if(!empty($message))
<div class="alert alert-success">
{{ $message }}
</div>
@endif

<form method="POST">
    @csrf
    <div class="row">
        <div class="col col-12">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" autofocus>
        </div>
        <div class="col col-6">
            <label for="category_id">Categories</label>
            <select name="category_id" id="category_id" class="form-control">
                @foreach($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="col col-6">
            <label for="price">Price</label>
            <input type="number" class="form-control" name="price" id="price" step="0.01">
        </div>
        <div class="col col-12">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description"></textarea>
        </div>
  <button class="btn btn-primary mt-2">Add</button>
    </div>
</form>

@endsection