@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Product</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="form-group mb-4">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
            @error('title')
            <div>{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ old('description') }}</textarea>
            @error('description')
            <div>{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock" class="form-control" value="{{ old('stock') }}" required>
            @error('stock')
            <div>{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label for="category">Category</label>
            <input type="text" name="category" id="category" class="form-control" value="{{ old('category') }}" required>
            @error('category')
            <div>{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Save</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Cancel</a>
    </form>
</div>
@endsection