@extends('app')

@section('title', 'Product Management')

@section('custom-css')
<style>
    .carousel-item img {
        max-height: 500px;
        width: auto;
        margin: 0 auto;
    }
</style>
@endsection

@section('content')
<!-- Page Content -->
<div class="d-flex justify-content-center">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" data-interval="2200">
        <div class="carousel-inner mx-auto" style="max-width: 600px;">
            @foreach($products as $product)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img class="d-block w-100" src="{{ $product->image }}" alt="{{ $product->title }}">
                    <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-2 rounded">
                        <h5>{{ $product->title }}</h5>
                        <p>{{ $product->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="d-flex justify-content-center mt-5 mb-4">
        <h1>Featured Products</h1>
    </div>
    <div class="d-flex justify-content-center font-size">
        <p>
            All of Featured Products we have in this summer, you can buy it now with special price.
        </p>
    </div>
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img class="card-img-top" src="{{ $product->image }}" alt="{{ $product->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->title }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text"><strong>Price:</strong> ${{ $product->price }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Buy</button>
                            </div>
                            <small class="text-muted">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                ({{ $product->rating_count }})
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection