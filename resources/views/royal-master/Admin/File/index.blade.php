@extends('royal-master.admin.inc.main')
@section('container')
<div class="container py-5">
@if (session('update'))
<div class="alert alert-success alert-dismissible fade show" role="alert"> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <strong>{{session('update')}}</strong>
  </div>
  <script>
    var alertList = document.querySelectorAll(".alert");
    alertList.forEach(function (alert) {
        new bootstrap.Alert(alert);
    });
</script>
@endif

    <div class="d-flex  justify-content-between pe-3 ">
      <h1 class="text-align-center ps-5"> Data</h1>
      <a type="button" class="btn btn-primary h-75 " href="{{route('file.create')}}"><i class="fa-solid fa-arrow-left"></i> Create Files</a>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Image Name</th>
          <th scope="col">Image</th>

          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($files as $file )

        <tr>
          <th scope="row">{{$loop->iteration}}</th>
          <td>{{$file->title}}</td>
          <td>{{$file->image}}</td>
          <td><a href="{{$file->image}}" target="_blank">
            <img style="width: 100px ;height:100px;" alt="No Image" src="{{ asset('uploads/'.$file->image) }}" alt="">
          </a></td>
          <td>
            <a href="{{ route('file.edit',$file->id)}}" type="button" class="btn btn-info   text-center">Edit</a>
            <a href="{{ route('file.show',$file->id)}}" type="button" class="btn btn-success   text-center">show</a>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$file->id}}">
              Delete
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{$file->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog        ">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body ">
                   <span>Do you want to delete this file?</span>
                  </div>
                  <div class="modal-footer">
                    <form action="{{ route('file.destroy',$file->id) }}" method="post" enctype="multipart/form-data">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="btn btn-danger"data-bs-dismiss="modal">Delete</button>

                    </form>
                    <button type="button" class="btn btn-primary"data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
          </td>

        </tr>
        @endforeach




      </tbody>
    </table>
    {{ $files->links()}}
  </div>
@endsection
