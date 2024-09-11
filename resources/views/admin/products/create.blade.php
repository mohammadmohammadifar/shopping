@extends('layouts.admin')


@section('content')
    <div class="container mt-5">
        <div class="row">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    {{-- name --}}
                    <div class="mb-3 col-md-4">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="" aria-describedby="helpId"
                            placeholder="" />
                    </div>

                    {{-- brand_id --}}
                    <div class="mb-3 col-md-4">
                        <label for="" class="form-label">brand_id</label>
                        <select class="form-select form-select-lg" name="brand_id" id="">
                            <option value="0"> بدون والد </option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- is_active --}}
                    <div class="mb-3 col-md-4">
                        <label for="" class="form-label">is_active</label>
                        <select class="form-select form-select-lg" name="is_active" id="">
                            <option selected>Select one</option>
                            <option value="1">is_active</option>
                            <option value="0">dis_active</option>
                        </select>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="mb-3">
                        <label for="" class="form-label">category</label>
                        <select class="form-select form-select-lg" name="category_id" id="">
                            <option selected>Select one</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"> {{ $category->name }} -
                                    {{ $category->parent ? $category->parent->name : '' }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="row">

                    {{-- attribute --}}
                    <div>
                        <div class="mb-3 col-md-4">
                            <label for="" class="form-label">attribute</label>
                            <select class="form-select form-select-lg" name="attribute_ids[]" id="" multiple>
                                @foreach ($attributes as $attribute)
                                    <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- variations --}}
                    <div class="mb-3 col-md-4">
                        <label for="" class="form-label">variations</label>
                        <select class="form-select form-select-lg" name="variation_ids[]" id="" multiple>
                            @foreach ($attributes as $attribute)
                                <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- is_filter --}}
                    <div class="mb-3 col-md-4">
                        <label for="" class="form-label">filter</label>
                        <select class="form-select form-select-lg" name="is_filter" id="">
                            @foreach ($attributes as $attribute)
                                <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <hr>

                    {{-- variation - value --}}
                    <div class="row">
                        <div class="mb-3 col-md-3">
                            <label for="" class="form-label">value</label>
                            <input type="text" class="form-control" name="variation_values[]" id="" aria-describedby="helpId"
                                placeholder="" />
                        </div>

                        <div class="mb-3 col-md-3">
                            <label for="" class="form-label">price</label>
                            <input type="text" class="form-control" name="variation_values[]" id="" aria-describedby="helpId"
                                placeholder="" />
                        </div>


                        <div class="mb-3 col-md-3">
                            <label for="" class="form-label">quantity</label>
                            <input type="text" class="form-control" name="variation_values[]" id="" aria-describedby="helpId"
                                placeholder="" />
                        </div>


                        <div class="mb-3 col-md-3">
                            <label for="" class="form-label">sku</label>
                            <input type="text" class="form-control" name="variation_values[]" id="" aria-describedby="helpId"
                                placeholder="" />
                        </div>
                    </div>



                    <hr>

                    {{-- image --}}
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label for="" class="form-label">primary_image</label>
                            <input type="file" class="form-control" name="primary_image" id=""
                                aria-describedby="helpId" placeholder="" />
                        </div>

                        <div class="mb-3 col-md-4">
                            <label for="" class="form-label">images</label>
                            <input type="file" class="form-control" name="images[]" id=""
                                aria-describedby="helpId" placeholder="" multiple/>
                        </div>
                    </div>



                </div>

                <button class="btn btn-outline-success" type="submit">create</button>

            </form>
        </div>
    </div>
@endsection
