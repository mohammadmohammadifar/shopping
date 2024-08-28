@extends('layouts.admin')


@section('content')
    <div class="container mt-5">
        <div class="row">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf

                <div class="mb-3 col-md-4">
                    <label for="" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="" aria-describedby="helpId"
                        placeholder="" />
                </div>

                <div class="mb-3 col-md-4">
                    <label for="" class="form-label">parent_id</label>
                    <select class="form-select form-select-lg" name="parent_id" id="">
                        <option value="0"> بدون والد </option>
                        @foreach ($parentCategory as $parent)
                            <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                        @endforeach

                    </select>
                </div>


                <button class="btn btn-outline-success" type="submit">create</button>

            </form>
        </div>
    </div>
@endsection
