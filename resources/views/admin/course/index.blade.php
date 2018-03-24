@extends('layouts.app')

@section('title','Course')

@push('css')
    <link rel="stylesheet" href="{{ asset('vendors/bower_components/select2/dist/css/select2.min.css') }}">
@endpush

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Course Action</h4>
            {{--<h6 class="card-subtitle">Click the buttons below to show and hide another element via class changes:</h6>--}}

            <div class="btn-demo">
                <a class="btn btn-light" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Assign Course To Student
                </a>
                <a href="{{ route('course.create') }}" class="btn btn-info">Create Course</a>

            </div>

            <div class="collapse" id="collapseExample">
                <hr>

                <div class="card card-body">
                    <form method="POST" action="{{ route('admin.assign.course') }}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label>All Courses</label>

                                    <select class="select2" name="course">
                                        @foreach($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label>All Students</label>

                                    <select class="select2" name="student">
                                        @foreach($students as $student)
                                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="btn-demo">
                            <a class="btn btn-danger" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                Close
                            </a>
                            <button type="submit" class="btn btn-success">Assign</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">All Courses</h4>
            {{--<h6 class="card-subtitle"></h6>--}}

            <div class="table-responsive">
                <table id="data-table" class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Students</th>
                            <th>Update At</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Students</th>
                        <th>Update At</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                        @foreach($courses as $key=>$course)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $course->name }}</td>
                                <td>{{ $course->description }}</td>
                                <td>{{ $course->students->count() }}</td>
                                <td>{{ $course->updated_at }}</td>
                                <td class="text-right">
                                <a href="{{ route('unit.index',$course->id) }}" class="btn btn-primary btn--icon-text">
                                        <i class="zmdi zmdi-eye"></i>Show Unit</a>

                                    <a class="btn btn-info btn--icon-text" href="{{ route('course.edit',$course->id) }}">
                                        <i class="zmdi zmdi-edit"></i>Edit</a>

                                    <button class="btn btn-danger btn--icon-text" 
                                                onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault; document.getElementById('delete-form-{{ $course->id }}').submit();
                                                }else{
                                                    event.preventDefault;
                                                }">
                                        <i class="zmdi zmdi-delete"></i>Delete</button>
                                    <form id="delete-form-{{ $course->id }}" method="POST" action="{{ route('course.destroy',$course->id) }}" style="display:none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <!-- Vendors: Data tables -->
    <script src="{{ asset('vendors/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
@endpush