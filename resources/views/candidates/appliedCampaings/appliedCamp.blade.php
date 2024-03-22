@extends('candidates.layouts.app')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid" style="height:90vh;overflow:scroll;">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 font-weight-bold">My Applied Campaigns</h1>
        </div>


        <!-- Content Row -->
        <div class="row">
            <!-- Content Column -->
            @foreach($appliedCamps as $list)
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card border border-primary">
                    <div class="card-body p-3 py-0">
                        <img src="https://m.media-amazon.com/images/I/81CgtwSII3L._AC_UY327_FMwebp_QL65_.jpg" class="w-50 mb-3" alt="">
                        <h5 class="card-title font-weight-normal">
                            {{$list->title}}
                        </h5>
                        <p class="mb-0">
                            {{$list->description}}
                        </p>
                        <p class="mb-0">
                            {{$list->salary}}
                        </p>
                        <div class="d-flex">
                            {{$list->requirements}}
                            <button class="btn btn-primary btn-sm ml-auto">Apply</button>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach

        </div>

    </div>
    <!-- /.container-fluid -->
@endsection