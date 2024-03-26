@extends('admin.layouts.app')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h3 class="m-0 font-weight-bold text-primary">My Profile</h3>
        </div>
        <div class="card-body">
            <form action="{{route('user.updateBrandProfile')}}" method="post"  enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label font-weight-bold" for="name">Name</label>
                            <input type="text" id="name" value="{{$userDet->name}}" class="form-control" name="name" placeholder="Name">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label font-weight-bold" for="email">Email</label>
                            <input type="text" id="email" value="{{$userDet->email}}" class="form-control" name="email" placeholder="Name">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label font-weight-bold" for="email">Uplaod Image</label>
                            <input type="file" id="email" value="{{$userDet->image}}" class="form-control" name="image" placeholder="Name">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label font-weight-bold" for="phone">Phone</label>
                            <input type="text" id="phone" value="{{$userDet->phone}}" class="form-control" name="phone" placeholder="Phone">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label font-weight-bold" for="insta_link">Instagram Link</label>
                            <input type="text" id="insta_link" value="{{$userDet->insta_link}}" class="form-control" name="insta_link" placeholder="Insta Link">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label font-weight-bold" for="ytube_link">Youtube Link</label>
                            <input type="text" id="ytube_link" value="{{$userDet->ytube_link}}" class="form-control" name="ytube_link" placeholder="Ytube Link">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection