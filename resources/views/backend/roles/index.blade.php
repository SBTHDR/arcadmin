@extends('layouts.backend.app')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
@endpush

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

                <div class="table-responsive">
                    <table id="datatable" class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Permissions</th>
                            <th class="text-center">Updated At</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $key => $role)
                            <tr>
                            <td class="text-center text-muted">{{ $key + 1 }}</td>

                            <td class="text-center">{{ $role->name }}</td>
                            <td class="text-center">
                                @if($role->permissions->count() > 0)
                                    <span class="badge badge-info">{{ $role->permissions->count() }}</span>
                                @else
                                    <span class="badge badge-warning">No permissions</span>
                                @endif
                            </td>
                                <td class="text-center">{{ $role->updated_at->diffForHumans() }}</td>
                            <td class="text-center">
                                <a href="{{ route('app.roles.edit', $role->id) }}"
                                        class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i>
                                    <span>Edit</span>
                                </a>
                                @if($role->deletable == true)
                                <button type="button"
                                        onclick="deleteData({{ $role->id }})"
                                   class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i>
                                    <span>Delete</span>
                                </button>
                                <form id="delete-form-{{ $role->id }}" method="POST" action="{{ route('app.roles.destroy', $role->id) }}" hidden>
                                    @csrf
                                    @method('DELETE')
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        } );
    </script>
@endpush
