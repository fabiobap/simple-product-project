@extends('layout')

@section('title')
Categories - Simple Product Project
@endsection

@section('header')
Categories
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
        <div class="col col-8">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" autofocus>
        </div>
  <button class="btn btn-primary btn-sm mt-2">Add</button>
    </div>
</form>

@endsection