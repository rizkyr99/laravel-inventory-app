@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Product Detail</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Title: {{ $product->title }}</h5>
            <p class="card-text">Description: {{ $product->description }}</p>
            <p class="card-text">Stock: {{ $product->stock }}</p>
            <p class="card-text">Category: {{ $product->category }}</p>
        </div>
    </div>
    <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection