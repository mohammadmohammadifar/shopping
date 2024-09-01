@extends('layouts.admin')


@section('content')
    <div class="container mt-5">
        <div class="row">
            <form action="{{ route('roles.store') }}" method="POST">
                @csrf

                <div class="mb-3 col-md-4">
                    <label for="" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="" aria-describedby="helpId"
                        placeholder="" />
                </div>


                {{-- collaps --}}
                <p class="d-inline-flex gap-1">
                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button"
                        aria-expanded="false" aria-controls="collapseExample">
                        permissions
                    </a>
                </p>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">

                        @foreach ($permissions as $permission)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="{{ $permission->name }}" value="{{ $permission->name }}"
                                    id="flexCheckChecked-{{ $permission->id }}" {{ in_array($permission->id, $role->permissions->pluck('id'->toArray())) }}>
                                <label class="form-check-label" for="flexCheckChecked-{{ $permission->id }}">
                                    {{ $permission->name }}
                                </label>
                            </div>
                        @endforeach

                    </div>
                </div>

                <hr>

                <button class="btn btn-outline-success mt-5" type="submit">create</button>

            </form>
        </div>
    </div> 
@endsection
