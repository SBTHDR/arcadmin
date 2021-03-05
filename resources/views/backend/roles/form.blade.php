@extends('layouts.backend.app')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Roles</div>
            </div>
            <div class="page-title-actions">
                <a href="{{ route('app.roles.create') }}" class="btn-shadow mr-3 btn btn-primary">
                    <i class="fas fa-plus-circle"></i>
                    Create Role
                </a>
                <div class="d-inline-block dropdown">
                    <div tabindex="-1" role="menu" aria-hidden="true"
                         class="dropdown-menu dropdown-menu-right">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="javascript:void(0);" class="nav-link">
                                    <i class="nav-link-icon lnr-inbox"></i>
                                    <span>
                                                        Inbox
                                                    </span>
                                    <div class="ml-auto badge badge-pill badge-secondary">86</div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0);" class="nav-link">
                                    <i class="nav-link-icon lnr-book"></i>
                                    <span>
                                                        Book
                                                    </span>
                                    <div class="ml-auto badge badge-pill badge-danger">5</div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0);" class="nav-link">
                                    <i class="nav-link-icon lnr-picture"></i>
                                    <span>
                                                        Picture
                                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a disabled href="javascript:void(0);" class="nav-link disabled">
                                    <i class="nav-link-icon lnr-file-empty"></i>
                                    <span>
                                                        File Disabled
                                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <form action="{{ isset($role) ? route('app.roles.update', $role->id) : route('app.roles.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <h5 class="card-title">Manage Role</h5>

                        <hr>

                        <div class="form-group">
                            <lebel for="name">Role Name</lebel>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name" value="{{ $role->name ?? old('name') }}" required autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <div>
                            <strong>Manage permissions for roles</strong>
                        </div>

                        <hr>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="select-all">
                                <label for="select-all" class="custom-control-label">Select all</label>
                            </div>
                        </div>

                        <hr>

                        @forelse($modules->chunk(2) as $key => $chunks)
                            <div class="form-row">
                                @foreach($chunks as $key => $module)
                                    <div class="col">
                                        <h5>Module: {{ $module->name }}</h5>
                                        @foreach($module->permissions as $key => $permission)
                                            <div class="mb-3 ml-4">
                                                <div class="custom-control custom-checkbox mb-2">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="permission-{{ $permission->id }}"
                                                           name="permissions[]"
                                                           value="{{ $permission->id }}"
                                                    >
                                                    <label for="permission-{{ $permission->id }}" class="custom-control-label">
                                                        {{ $permission->name }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        @empty
                            <div class="row">
                                <div class="col text-center">
                                    <strong>No modules found.</strong>
                                </div>
                            </div>
                        @endforelse

                        <hr>

                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-plus-circle"></i>
                            Create
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $('#select-all').click(function () {
            if (this.checked) {
                $(':checkbox').each(function () {
                    this.checked = true;
                });
            } else {
                $(':checkbox').each(function () {
                    this.checked = false;
                });
            }
        });
    </script>
@endpush