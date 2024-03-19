@extends('admin.layouts.app')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h3 class="m-0 font-weight-bold text-primary">Applied Candidate List</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Job Title</th>
                            <th>Location</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($candidates as $list)
                        <tr>
                            <td>
                                @if($list->is_shortlisted == 1)
                                <i class="fa fa-check text-success"></i>
                                @else
                                <i class="fa fa-check"></i>
                                @endif
                            </td>
                            <td>{{ $list->name}}</td>
                            <td>{{ $list->email}}</td>
                            <td>{{ $list->title}}</td>
                            <td>{{ $list->location}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection