@extends('layouts.admin')


@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="d-flex justify-content-between">
                <div>
                    <h4> brand index: {{ $brands->count() }}</h4>
                </div>
                <div>
                    <a href="{{ route('brands.create') }}" class="btn btn-outline-primary"> create</a>
                </div>

            </div>
        </div>

        <div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">operation</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brands as $brand)
                        <tr>
                            <th scope="row">{{ $brand->id }} </th>
                            <td>{{ $brand->name }}</td>
                            <td><a href="{{ route('brands.edit', $brand->id) }}">edit</a></td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>

    </div>
@endsection
