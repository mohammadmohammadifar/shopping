@extends('layouts.admin')


@section('content')
    <div class="container mt-5">
        <div class="row">
            <form action="{{ route('brands.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="" aria-describedby="helpId"
                        placeholder="" />
                </div>

                <button class="btn btn-outline-success" type="submit">create</button>

            </form>
        </div>
    </div>
@endsection
