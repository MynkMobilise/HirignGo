@extends('admin.layouts.app')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h3 class="m-0 font-weight-bold text-primary">Job List</h3>
            <a href="{{route('jobs.post-job')}}" class="d-none d-sm-inline-block ml-auto btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-plus fa-sm text-white-50"></i> Post New Job</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Requirements</th>
                            <th>Location</th>
                            <th>Salary</th>
                            <th>Posting Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jobs as $list)
                        <tr>
                            <td>{{$list->title}}</td>
                            <td>{{$list->description}}</td>
                            <td>
                                @foreach($list->requirements as $list2)
                                {{$list2}}
                                @endforeach
                            </td>
                            <td>{{$list->location}}</td>
                            <td>{{$list->salary}}</td>
                            <td>{{$list->posting_date}}</td>
                            <td>
                                <a href="{{route('jobs.edit-job',$list->id)}}"><i class="fa fa-edit text-primary"></i></a>
                                <a href="{{route('jobs.delete-job',$list->id)}}"><i class="fa fa-trash text-danger"></i></a>
                            </td>
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