@extends('backend_admin.layout.layout')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Input Text</h4>
                            </div>
                            <table class="table table-striped table-row-dashed table-row-gray-300 gy-7  gs-7">
                                <thead>
                                <tr class="fw-semibold fs-6 text-gray-800">
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Type</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $admins as $admin)
                                        <tr>
                                            <td>{{ $admin->name }}</td>
                                            <td>{{ $admin->mobile }}</td>
                                            <td>{{ $admin->email }}</td>
                                            <td>{{ $admin->type }}</td>
                                            <td>{{ $admin->image }}</td>
                                            <td>{{ $admin->status }}</td>
                                            <td>
                                                <div>
                                                    <a href="{{ url('new_admin/edit/'.$admin->id) }}" class="btn btn-sm btn-icon btn-success">
                                                        <i class="fas fa-regular fa-pen-to-square  fs-4"></i>
                                                    </a>

                                                    <form method="POST" action="{{ url('new_admin/destroy/'.$admin->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-icon btn-danger">
                                                            <i class="fas fa-regular fa-trash fs-4"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
