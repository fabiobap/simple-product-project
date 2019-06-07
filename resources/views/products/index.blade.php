@extends('layout')

@section('title')
Products - Simple Product Project
@endsection

@section('header')
Products
@endsection

@section('content')

@if(!empty($message))
<div class="alert alert-success">
{{ $message }}
</div>
@endif

Click <a href="{{ route('products_form') }}" class="btn btn-dark mb-2">here</a> to add products

<ul class="list-group">
    @foreach($products as $product)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <span>{{ $product->name }}</span>
        <span>{{ $product->Category->name }}</span>
        <span>${{ $product->price }}</span>
        <form method="POST" action='/products/{{ $product->id }}' onsubmit="return confirm('Are you sure?')">
        <a href="/products/{{ $product->id }}/editForm" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
        </form>
    </li>
    @endforeach
{{ $products->links() }}
</ul>
@endsection