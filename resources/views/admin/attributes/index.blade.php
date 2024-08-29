@extends('layouts.admin')


@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="d-flex justify-content-between">
                <div>
                    <h4> attribute index: {{ $attributes->count() }}</h4>
                </div>
                <div>
                    <a href="{{ route('attributes.create') }}" class="btn btn-outline-primary"> create</a>
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
                    @foreach ($attributes as $attribute)
                        <tr>
                            <th scope="row">{{ $attribute->id }} </th>
                            <td>{{ $attribute->name }}</td>
                            <td><a href="{{ route('attributes.edit', $attribute->id) }}">edit</a></td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>

    </div>
@endsection
