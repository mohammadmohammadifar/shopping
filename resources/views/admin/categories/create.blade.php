@extends('layouts.admin')


@section('content')
    <div class="container mt-5">
        <div class="row">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="row">

                    {{-- name --}}
                    <div class="mb-3 col-md-4">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="" aria-describedby="helpId"
                            placeholder="" />
                    </div>

                    {{-- parent_id --}}
                    <div class="mb-3 col-md-4">
                        <label for="" class="form-label">parent_id</label>
                        <select class="form-select form-select-lg" name="parent_id" id="">
                            <option value="0"> بدون والد </option>
                            @foreach ($parentCategory as $parent)
                                <option value="{{ $parent->id }}">{{ $parent->name }}</option>
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
                        <select class="form-select form-select-lg" name="is_filter" id="" >
                            @foreach ($attributes as $attribute)
                                <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                            @endforeach
                        </select>
                    </div>


                </div>

                <button class="btn btn-outline-success" type="submit">create</button>

            </form>
        </div>
    </div>
@endsection
