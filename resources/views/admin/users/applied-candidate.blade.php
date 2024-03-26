@extends('admin.layouts.app')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h3 class="m-0 font-weight-bold text-primary">Candidate List</h3>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach($candidates as $list)
                <div class="col-lg-4 mb-3">
                    <div class="card p-3">
                        <img src="" alt="">
                        <h6 class="font-weight-bold mb-0">{{ $list->name}}</h6>
                        <p class="mb-0">{{ $list->email}}</p>
                        <p class="mb-0">{{ $list->phone}}</p>
                        <p class="mb-0">{{ $list->ytube_link}}</p>
                        <p class="mb-0">{{ $list->insta_link}} <span class="float-end">
                            <button class="btn btn-sm px-4 {{$list->is_shortlisted ? 'btn-success btn-disabled' : 'btn-outline-primary' }}">
                                @if($list->is_shortlisted == 1)
                                Shortlisted
                                @else
                                Shortlist
                                @endif
                            </button>
                        </span></p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection