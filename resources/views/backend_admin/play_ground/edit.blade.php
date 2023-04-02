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
                                <form class="forms-sample" action="{{ url('play_ground/store') }}" method="post" name="update_admin_password_form" id="update_admin_password_form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="ground_location">Ground Location</label>
                                        <input type="text" class="form-control" id="ground_location" name="ground_location" value="{{ $play_ground->ground_location }}" required placeholder="Enter Admin Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="ground_description">Ground description</label>
                                        <input type="text" class="form-control" id="ground_description" name="ground_description" value="{{ $play_ground->ground_description }}" required placeholder="Enter Admin Type">
                                    </div>
                                    <div class="form-group">
                                        <label for="ground_image">Ground Image</label>
                                        <input type="file" class="form-control" id="ground_image" name="ground_image" required accept="*" value="{{ $play_ground->ground_image }}">
                                        {{--                                @if(!empty(Auth::guard('admin')->user()->image_path))--}}
                                        {{--                                    <a target="_blank" href="{{ storage_path('public/admin_image/'.Auth::guard('admin')->user()->image_path) }}">View Image</a>--}}
                                        {{--                                    <img src="{{ asset('public/admin_image/'.Auth::guard('admin')->user()->image_path)}}" alt="test">--}}
                                        {{--                                    --}}{{--                                        <input type="hidden" name="current_admin_image" value="{{ Auth::guard('admin')->user()->image }}">--}}
                                        {{--                                @endif--}}
                                        {{--                                    --}}
                                    </div>
                                    <div class="form-floating col-md-4 col-sm-4  col-6 mb-7">
                                        <select class="form-select form-select-solid form-select-sm" name="ground_slot_time" id="ground_slot_time" data-placeholder="Select an option">
                                            <option value=""></option>
                                            <option value="{{ $play_ground->ground_slot_time }}">10-1</option>
                                            <option value="{{ $play_ground->ground_slot_time }}">3-6</option>
                                            <option value="{{ $play_ground->ground_slot_time }}">8-10</option>
                                        </select>
                                        <label class="" for="ground_slot_time">Slot Time</label>
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
