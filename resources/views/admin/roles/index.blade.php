@extends('layouts.admin')


@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="d-flex justify-content-between">
                <div>
                    <h4> permission index: {{ $permissions->count() }}</h4>
                </div>
                <div>
                    <a href="{{ route('permissions.create') }}" class="btn btn-outline-primary"> create</a>
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
                    @foreach ($permissions as $permission)
                        <tr>
                            <th scope="row">{{ $permission->id }} </th>
                            <td>{{ $permission->name }}</td>
                            <td><a href="{{ route('permissions.edit', $permission->id) }}">edit</a></td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>

    </div>
@endsection
