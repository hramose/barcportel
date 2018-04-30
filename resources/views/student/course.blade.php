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
                                                <th class="text-center">Action</th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            @foreach(Auth::user()->courses as $key=>$course)
                                                <tr>
                                                    <td>{{ $key ++ }}</td>
                                                    <td>{{ $course->name }}</td>
                                                    <td>{{ $course->description }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
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