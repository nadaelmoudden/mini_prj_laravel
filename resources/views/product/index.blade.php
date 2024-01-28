@extends('base')
@section('title', 'Products')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Product List</h1>

        <a href="{{ route('products.create') }}" class="btn btn-primary">Create</a>
    </div>

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Image</th>

                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td align="center">

                            @if ($product->category)
                            <span class="badge bg-primary">
                                {{ $product->category->name }}
                            </span>
                            @endif
                        </td>
                        <td>{{ $product->quantity }}</td>
                        <td><img src="storage/{{ $product->image }}" alt="" width="100px"></td>
                        <td>{{ $product->price }} MAD</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('products.edit',$product ) }}" class="btn btn-primary">Update</a>
                                <form method="post" action="{{ route('products.destroy', $product) }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" align="center">
                            <h5>No Products !!</h5>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $products->links() }}
@endsection
