@extends('base')
@section('title', ($isUpdate?'Update':'Create').' product')

@php
    $route = route('products.store');
    if($isUpdate) {
        $route = route('products.update', $product);
    }
@endphp


@section('content')
    <div class="container">
        <h1>@yield('title')</h1>
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <strong>Errors</strong>
                <ul class="list-group">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if ($isUpdate)
                @method('PUT')
            @endif
            <div class="form-group my-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name',$product->name) }}">
            </div>

            <div class="form-group my-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control">{{ old('description',$product->description) }}</textarea>
            </div>

            <div class="form-group my-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity',$product->quantity) }}">
            </div>

            <div class="form-group my-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" id="image" class="form-control">
                @if ($product->image)
                    <img width="100px" src="{{ asset('storage/' . $product->image) }}" alt="">
                @endif
            </div>

            {{-- <h3>Categories</h3>
                @php
                    $categoriesIds=Request::input('categories')?? [];
                @endphp
                @foreach($categories as $category)
                    <div class="form-check">
                        <input @checked(in_array($category->id, $categoriesIds)) type="checkbox" name="categories[]"
                            value="{{$category->id}}" class="form-check-input">
                        <label class="form-check-label">{{$category->name}}</label>
                    </div>
                @endforeach --}}

            <div class="form-group my-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" name="price" id="price" class="form-control" value="{{ old('price',$product->price) }}">
            </div>

            <div class="form-group">
                <label for="category" class="form-label">Category</label>
                <select name="category" id="category" class="form-select">
                    <option value="">Please choose your category</option>
                    @foreach ($categories as $category)
                        <option @selected(old('category_id', $product->category_id))></option>)) value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group my-3">
                <input type="submit" class="btn btn-primary w-100" value="{{ $isUpdate?'Edit':'Create'}}">
            </div>
        </form>
    </div>
@endsection
