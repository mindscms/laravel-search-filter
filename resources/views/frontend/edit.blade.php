@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-12">
            <form action="{{ route('ecommerce.update', $product->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}">
                    @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
                    @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" name="price" class="form-control" value="{{ old('price', $product->price) }}">
                    @error('price')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="category_id">Categories</label>
                    @foreach($categories as $category)
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" name="category_id" class="form-check-input" value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'checked' : '' }}> {{ $category->name }}
                            </label>
                        </div>
                    @endforeach
                    @error('category_id')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                {{-- var_dump($product->tags) --}}
                {{--@foreach($product->tags as $tag)
                    {{ $tag->id }}
                @endforeach--}}

                {{-- var_dump($product->tags->pluck('id')->toArray()) --}}

                <div class="form-group">
                    <label for="tags">Tags</label>
                    @foreach($tags as $tag)
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="tags[]" class="form-check-input" value="{{ $tag->id }}" {{ is_array(old('tags', $product->tags->pluck('id')->toArray())) && in_array($tag->id, old('tags', $product->tags->pluck('id')->toArray())) ? 'checked' : '' }}> {{ $tag->name }}
                            </label>
                        </div>
                    @endforeach
                    @error('tags')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="image">Image URL</label>
                    <input type="text" name="image" class="form-control" value="{{ old('image', $product->image) }}">
                    @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="form-group pb-3">
                    <button type="submit" name="save" class="btn btn-primary btn-block">Update</button>
                </div>
            </form>
        </div>
    </div>

@endsection
