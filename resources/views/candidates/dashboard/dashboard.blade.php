@extends('candidates.layouts.app')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid" style="height:90vh;overflow:scroll;">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Latest Campaigns</h1>
        </div>


        <!-- Content Row -->
        <div class="row">
            <!-- Content Column -->
            @foreach($liveCamps as $list)
            <div class="col-lg-3 col-md-4 col-6 mb-3">
                    <div class="card p-3">
                        <h6 class="font-weight-bold mb-0">{{$list->title}}</h6>
                        <small>{{$list->description}}</small>
                        <small><b>Requirements : </b>@foreach($list->requirements as $list2){{$list2}}@endforeach</small>
                        <small><b>Location : </b>{{$list->location}}</small>
                        <small><b>Salary : </b>{{$list->salary}}</small>
                        <small><b>Posting Date : </b>{{$list->salary}} <span class="float-right"><a href="{{route('jobs.apply',$list->id)}}" class="btn btn-sm btn-primary">Apply</a></span></small>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
    <!-- /.container-fluid -->
@endsection