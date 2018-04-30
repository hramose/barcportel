@extends('layouts.app')

@section('title','Course')

@push('css')
    <!-- JQuery DataTable Css -->
    <link rel="stylesheet" href="{{ asset('plugins/jquery-datatable/dataTables.bootstrap4.min.css') }}">
    <!-- Bootstrap Select Css -->
    <link href="{{ asset('plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <!-- Main Content -->
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Manage Courses</h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button  class="btn btn-white btn-icon btn-round hidden-sm-down float-right m-l-10" type="button">
                        <a href="{{ route('course.create') }}"><i class="zmdi zmdi-plus"></i></a>
                    </button>
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Oreo</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Class</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Manage</strong> Class</h2>
                            <ul class="header-dropdown">
                                <li class="remove">
                                    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <ul class="nav nav-tabs padding-0">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#classlist">Class list</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#addclass">Add Class</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="classlist">
                            <div class="card">
                                <div class="body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
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
                        </div>
                        <div class="tab-pane" id="addclass">
                            <div class="card">
                                <div class="body">
                                    <form method="POST" action="{{ route('admin.assign.course') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label>All Courses</label>

                                                    <select class="form-control show-tick" name="course" data-live-search="true">
                                                        @foreach($courses as $course)
                                                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label>All Students</label>

                                                    <select class="form-control show-tick" name="student" data-live-search="true">
                                                        @foreach($students as $student)
                                                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btn-demo">
                                            <button type="submit" class="btn btn-success">Assign</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('bundles/datatablescripts.bundle.js') }}"></script>

    <script src="{{ asset('bundles/mainscripts.bundle.js') }}"></script>
    <script src="{{ asset('js/pages/tables/jquery-datatable.js') }}"></script>
@endpush