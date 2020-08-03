@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-3">
            <form action="{{ route('ecommerce.index') }}" method="post">
                @csrf
                <h3>Search</h3>
                <div class="form-group pb-3">
                    <input type="text" name="keyword" class="form-control" value="{{ old('keyword', $keyword) }}" placeholder="Search word here">
                </div>

                <div class="pb-3">
                    <h3>Price</h3>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="price" value="price_0_500" {{ isset($selected_price) && $selected_price == 'price_0_500' ? 'checked' : '' }}> 0 - 500
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="price" value="price_501_1500" {{ isset($selected_price) && $selected_price == 'price_501_1500' ? 'checked' : '' }}> 501 - 1500
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="price" value="price_1501_3000" {{ isset($selected_price) && $selected_price == 'price_1501_3000' ? 'checked' : '' }}> 1501 - 3000
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="price" value="price_3001_5000" {{ isset($selected_price) && $selected_price == 'price_3001_5000' ? 'checked' : '' }}> 3001 - 5000
                        </label>
                    </div>
                </div>

                <div class="pb-3">
                    <h3>Category</h3>
                    @foreach($categories as $category)
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="category" value="{{ $category->id }}" {{ isset($selected_category) && $selected_category == $category->id ? 'checked' : '' }}> {{ $category->name }}
                            </label>
                        </div>
                    @endforeach
                </div>

                <div class="pb-3">
                    <h3>Tags</h3>
                    @foreach($tags as $tag)
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="tags[]" value="{{ $tag->id }}" {{ isset($selected_tags) && in_array($tag->id, $selected_tags) ? 'checked' : '' }}> {{ $tag->name }}
                            </label>
                        </div>
                    @endforeach
                </div>

                <div class="form-group pb-3">
                    <button type="submit" class="btn btn-primary btn-block">Search</button>

                    <a href="{{ route('ecommerce.index') }}" class="btn btn-danger btn-block">Reset</a>
                </div>
            </form>

        </div>
        <div class="col-9">
            <div class="row">
                @foreach($products as $product)
                    <div class="col-4 mb-4">
                        <div class="card h-100">
                            <a href="#">
                                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <h4 class="card-title">{{ $product->name }}</h4>
                                <h5>$ {{ $product->price }}</h5>
                                <p class="card-text">{{ $product->description }}</p>
                                @foreach($product->tags as $tag)
                                    <label class="badge bg-success">{{ $tag->name }}</label>
                                @endforeach
                                <hr>
                                <label class="badge bg-info">{{ $product->category->name }}</label>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center">
                {{ $products->appends(request()->input())->links() }}
            </div>

        </div>
    </div>

@endsection
