@extends('backend_admin.layout.layout')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Input Text</h4>
                            </div>
                            <div class="card-body">
                                @if(Session::has('error_message'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Error:</strong>{{Session::get('error_message')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                @if(Session::has('success_message'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Success:</strong>{{Session::get('success_message')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                @if($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <form class="forms-sample" action="{{ url('new_admin/store') }}" method="post" name="update_admin_password_form" id="update_admin_password_form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="" required placeholder="Enter Admin Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Admin Email</label>
                                        <input type="text" class="form-control" id="email" name="email" value="" required placeholder="Enter Admin Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Admin Password</label>
                                        <input type="text" class="form-control" id="password" name="password" value="" required placeholder="Enter Admin Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="type">Admin Type</label>
                                        <input type="text" class="form-control" id="type" name="type" value="" required placeholder="Enter Admin Type">
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile">Mobile</label>
                                        <input type="number" class="form-control" id="mobile" name="mobile" value="" required placeholder="Enter 11 Digit Mobile Number">
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" class="form-control" id="image" name="image" required accept="*">
                                        {{--                                @if(!empty(Auth::guard('admin')->user()->image_path))--}}
                                        {{--                                    <a target="_blank" href="{{ storage_path('public/admin_image/'.Auth::guard('admin')->user()->image_path) }}">View Image</a>--}}
                                        {{--                                    <img src="{{ asset('public/admin_image/'.Auth::guard('admin')->user()->image_path)}}" alt="test">--}}
                                        {{--                                    --}}{{--                                        <input type="hidden" name="current_admin_image" value="{{ Auth::guard('admin')->user()->image }}">--}}
                                        {{--                                @endif--}}
                                        {{--                                    --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <input type="number" class="form-control" id="status" name="status" value="" required placeholder="Enter 0 or 1">
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
