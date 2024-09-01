@extends('layouts.admin')


@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="d-flex justify-content-between">
                <div>
                    <h4> category index: {{ $categories->count() }}</h4>
                </div>
                <div>
                    <a href="{{ route('categories.create') }}" class="btn btn-outline-primary"> create</a>
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
                    @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }} </th>
                            <td>{{ $category->name }}</td>
                            <td><a href="{{ route('categorys.edit', $category->id) }}">edit</a></td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>

    </div>
@endsection
