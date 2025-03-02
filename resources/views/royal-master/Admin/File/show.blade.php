@extends('royal-master.admin.inc.main')
@section('container')
<div style="width:80%" class="container bg-dark px-5 pb-5 m-5  shadow ">
    <form action="#" method="post" enctype="multipart/form-data">
        <div class="d-flex justify-content-between pb-3 mb-5 border-bottom">
            <h2 class="text-white">File Section <span style="font-size:5rem; font-weight:100; margin-right:-13px;  position:relative; top:20px;">/</span><span style="font-size:5rem;font-weight:100; position:relative; color:aqua; top:20px;">/</span> <span style="color:aqua; "> ADMIN</span></h2>
            <a href="{{route('file.index')}}" type="button" class="btn  text-white btn-primary h-75 mt-5 text-center">Back <i class="fa-solid fa-arrow-right"></i></a>
        </div>


        <div class="mb-3 d-flex flex-column">
            <label for="exampleFormControlInput1" class="form-label text-white" >Title</label>
            <input type="text" class="form-control mb-2" value="{{$files->title}}" id="exampleFormControlInput1" name="title" readonly>
        </div>
        <div class="mb-3 d-flex flex-column">
            <img src="{{asset('uploads/'.$files->image)}}" height="100px" width="100px" alt="">
        </div>

    </form>
</div>
@endsection
