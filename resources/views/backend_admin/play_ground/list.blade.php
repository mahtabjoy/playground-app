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
                                    <th>Ground Location</th>
                                    <th>Ground Description</th>
                                    <th>Ground Image</th>
                                    <th>Ground Slot Time</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $play_grounds as $play_ground)
                                    <tr>
                                        <td>{{ $play_ground->ground_location }}</td>
                                        <td>{{ $play_ground->ground_description }}</td>
                                        <td>{{ $play_ground->ground_image }}</td>
                                        <td>{{ $play_ground->ground_slot_time }}</td>
                                        <td>
                                            <div>
                                                <a href="{{ url('play_ground/edit/'.$play_ground->id) }}" class="btn btn-sm btn-icon btn-success">
                                                    <i class="fas fa-regular fa-pen-to-square  fs-4"></i>
                                                </a>

                                                <form method="POST" action="{{ url('play_ground/destroy/'.$play_ground->id) }}">
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
