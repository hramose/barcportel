@extends('layouts.app')

@section('title','Students')

@push('css')

@endpush

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">All Student</h4>
            {{--<h6 class="card-subtitle"></h6>--}}

            <div class="table-responsive">
                <table id="data-table" class="table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Courses</th>
                        <th>Status</th>
                        <th>Register At</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Courses</th>
                        <th>Status</th>
                        <th>Register At</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($students as $key=>$student)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>
                                @foreach($student->courses as $course)
                                    <span class="badge badge-pill badge-info">{{ $course->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @if($student->status == true)
                                    <span class="badge badge-pill badge-success">Active</span>
                                @else
                                    <span class="badge badge-pill badge-danger">Deactive</span>
                                @endif
                            </td>
                            <td>{{ $student->created_at->diffForHumans() }}</td>
                            <td class="text-right">

                                @if($student->status == true)
                                    <button class="btn btn-danger btn--icon-text"
                                            onclick="if(confirm('Are you sure? You want to Deactive this?')){
                                                    event.preventDefault; document.getElementById('status-form-{{ $student->id }}').submit();
                                                    }else{
                                                    event.preventDefault;
                                                    }">
                                        <i class="zmdi zmdi-minus-circle-outline"></i>Deactive</button>

                                @else
                                    <button class="btn btn-info btn--icon-text"
                                            onclick="if(confirm('Are you sure? You want to Active this?')){
                                                    event.preventDefault; document.getElementById('status-form-{{ $student->id }}').submit();
                                                    }else{
                                                    event.preventDefault;
                                                    }">
                                        <i class="zmdi zmdi-check-circle-u"></i>Active</button>
                                @endif
                                    <form id="status-form-{{ $student->id }}" method="POST" action="{{ route('admin.student.status',$student->id) }}"  style="display: none;">
                                        @csrf
                                    </form>

                                <button class="btn btn-danger btn--icon-text"
                                        onclick="if(confirm('Are you sure? You want to delete this?')){
                                                event.preventDefault; document.getElementById('delete-form-{{ $student->id }}').submit();
                                                }else{
                                                event.preventDefault;
                                                }">
                                    <i class="zmdi zmdi-delete"></i>Delete</button>
                                <form id="delete-form-{{ $student->id }}" method="POST" action="{{ route('admin.student.destroy') }}" style="display:none;">
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
