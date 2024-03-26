@extends('admin.layouts.app')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h3 class="m-0 font-weight-bold text-primary">Campaign List</h3>
            <a href="{{route('jobs.post-job')}}" class="d-none d-sm-inline-block ml-auto btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-plus fa-sm text-white-50"></i> Post New Campaign</a>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach($jobs as $list)
                <div class="col-lg-3 col-md-4 col-6 mb-3">
                    <div class="card p-3">
                        <h6 class="font-weight-bold mb-0">{{$list->title}}</h6>
                        <small>{{$list->description}}</small>
                        <small><b>Requirements : </b>@foreach($list->requirements as $list2){{$list2}}@endforeach</small>
                        <small><b>Location : </b>{{$list->location}}</small>
                        <small><b>Salary : </b>{{$list->salary}}</small>
                        <small><b>Posting Date : </b>{{$list->salary}} <span class="float-right"><a href="{{route('jobs.edit-job',$list->id)}}"><i class="fa fa-edit text-primary mr-1"></i></a><a href="{{route('jobs.delete-job',$list->id)}}"><i class="fa fa-trash text-danger"></i></a></span></small>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection