@extends('layout')

@section('title')
Categories - Simple Product Project
@endsection

@section('header')
Categories
@endsection

@section('content')

@if(!empty($message))
<div class="alert alert-success">
{{ $message }}
</div>
@endif

Click <a href="{{ route('categories_form') }}" class="btn btn-dark mb-2">here</a> to add categories

<ul class="list-group">
    @foreach($categories as $category)
    <li class="list-group-item d-flex justify-content-between align-items-center">
     <span id="category-name-{{ $category->id }}">{{ $category->name }}</span>
        <div class="input-group w-50" hidden id="input-category-name-{{ $category->id }}">
            <input type="text" class="form-control" value="{{ $category->name }}">
            <div class="input-group-append">
                <button class="btn btn-primary" onclick="categoryEdit({{ $category->id }})">
                    <i class="fas fa-check"></i>
                </button>
                @csrf
            </div>
        </div>
        <span class="d-flex">
            <button class="btn btn-warning btn-sm mr-1" onclick="toggleInput({{ $category->id }})">
                <i class="fas fa-edit"></i>
            </button>        
            <form method="POST" action='/categories/{{ $category->id }}' onsubmit="return confirm('Are you sure?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
            </form>
        </span>
    </li>
    @endforeach
{{ $categories->links() }}
</ul>

<script>
        function toggleInput(categoryId){
            const categoryNameE1 = document.getElementById(`category-name-${categoryId}`);
            const categoryInputE1 = document.getElementById(`input-category-name-${categoryId}`);

            if (categoryNameE1.hasAttribute('hidden')){

                categoryNameE1.removeAttribute('hidden');
                categoryInputE1.hidden = true;

            }else{

                categoryInputE1.removeAttribute('hidden');
                categoryNameE1.hidden = true;
            }
        }
        function categoryEdit(categoryId){
            let formData = new FormData();
            const token = document.querySelector('input[name="_token"]').value;

            const name = document
                .querySelector(`#input-category-name-${categoryId} > input`)
                .value;
            formData.append('name', name);
            formData.append('_token', token);

            const url = `/categories/${categoryId}/edit`;
            fetch(url, {
                body: formData,
                method: 'POST'
            }).then(()=>{
                toggleInput(categoryId);
                document.getElementById(`category-name-${categoryId}`).textContent = name;
            });
        }
    </script>
@endsection