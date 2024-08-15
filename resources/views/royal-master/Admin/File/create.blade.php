@extends('royal-master.admin.inc.main')
@section('container')
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert"> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   <strong>{{session('success')}}</strong>
 </div>
 @endif

<div style="width:80%" class="container bg-dark px-5 pb-5 m-5  shadow ">
    <form action="{{Route('file.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="d-flex justify-content-between pb-3 mb-5 border-bottom">
            <h2 class="text-white">File Section <span style="font-size:5rem; font-weight:100; margin-right:-13px;  position:relative; top:20px;">/</span><span style="font-size:5rem;font-weight:100; position:relative; color:aqua; top:20px;">/</span> <span style="color:aqua; "> ADMIN</span></h2>
            <a href="{{ route('file.index')}}" type="button" class="btn  text-white btn-primary h-75 mt-5 text-center">Manage
               files &nbsp; <i class="fa-solid fa-arrow-right"></i></a>
        </div>


        <div class="mb-3 d-flex flex-column">
            <label for="exampleFormControlInput1" class="form-label text-white">Title</label>
            <input type="text" class="form-control mb-2" id="exampleFormControlInput1" name="title">
            @error('title')
<div class="alert alert-danger alert-dismissible fade show" role="alert"> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   {{$message}}
</div>
<script>
    var alertList = document.querySelectorAll(".alert");
    alertList.forEach(function (alert) {
        new bootstrap.Alert(alert);
    });
</script>

            @enderror
        </div>
        <div class="mb-3 d-flex flex-column">
            <label for="exampleFormControlInput1" class="form-label text-white">Upload Images</label>
            <input type="file" class="form-control mb-2" id="exampleFormControlInput1" name="image">
            @error('image')
            <div class="alert alert-danger alert-dismissible fade show" role="alert"> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               {{$message}}
            </div>
            <script>
                var alertList = document.querySelectorAll(".alert");
                alertList.forEach(function (alert) {
                    new bootstrap.Alert(alert);
                });
            </script>

                        @enderror
        </div>
        <button type="submit" class="btn btn-primary " value="upload file">
            Upload here
        </button>
    </form>
</div>
@endsection
