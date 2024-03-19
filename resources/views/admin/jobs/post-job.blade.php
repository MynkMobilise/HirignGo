@extends('admin.layouts.app')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h3 class="m-0 font-weight-bold text-primary">Add Job Post Form</h3>
        </div>
        <div class="card-body">
            <form action="{{route('jobs.add-job')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label font-weight-bold" for="title">Enter Job Title</label>
                            <input type="text" id="title" value="{{$title}}" class="form-control" name="title" placeholder="Enter job title">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label font-weight-bold" for="desc">Enter Job Description</label>
                            <input type="text" id="desc" class="form-control" value="{{$description}}" name="desc" placeholder="Enter job description">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label font-weight-bold" for="loc">Location</label>
                            <input type="text" id="loc" class="form-control" value="{{$location}}" name="loc" placeholder="Enter job location">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label font-weight-bold" for="sal">Salary</label>
                            <input type="text" id="sal" class="form-control" value="{{$salary}}" name="sal" placeholder="Enter Salary">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label font-weight-bold" for="requirement">Requirement</label>
                            <select name="requirement[]" class="form-control" id="requirement" multiple style="height:100px">
                            @if($requirements == '')
                                <option value="Social Media 100k Reach">Social Media 100k Reach</option>
                                <option value="Social Media 200k Reach">Social Media 200k Reach</option>
                                <option value="Social Media Brand">Social Media Brand</option>
                            @else
                            @foreach($requirements as $list)
                                <option value="{{$list}}">{{$list}}</option>
                            @endforeach
                            @endif
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" name="add_post" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection