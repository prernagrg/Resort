@extends('royal-master.admin.inc.main')
@section('container')
<div class="container py-5">
@if(session('delete')){
    <div
        class="alert alert-success alert-dismissible fade show"
        role="alert"
    >
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        ></button>
{{session('delete')}}
    </div>
    @endif
    <script>
        var alertList = document.querySelectorAll(".alert");
        alertList.forEach(function (alert) {
            new bootstrap.Alert(alert);
        });
    </script>

}
    <div class="d-flex  justify-content-between ">
        <h1 class="text-align-center ps-5"> Data</h1>
        <a type="button" class="btn btn-primary h-75 " href="{{ route('room.create') }}"><i
                class="fa-solid fa-arrow-left"></i> &nbsp; Add Rooms</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Room Type</th>
                <th scope="col">Description</th>
                <th scope="col">Bed Type</th>
                <th scope="col">Capacity</th>
                <th scope="col">Services Provided</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rooms as $room)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $room->image }}</td>
                    <td>{{ $room->roomtype }}</td>
                    <td>{{ $room->description }}</td>
                    <td>{{ $room->bedType }}</td>
                    <td>{{ $room->capacity }}</td>
                    <td>
                            <div>{!! $room->ac !!}</div>
                            <div>{!! $room->wifi !!}</div>
                            <div>{!! $room->teaCoffeeMaker !!}</div>
                            <div>{!! $room->inRoomSafe !!}</div>
                            <div>{!! $room->purifiedWater !!}</div>
                            <div>{!! $room->hairDryer !!}</div>
                           </div>

                            <div>{!! $room->workplace !!}</div>
                            <div>{!! $room->tv !!}</div>
                            <div>{!! $room->rainShower !!}</div>
                            <div>{!! $room->wardrobe !!}</div>
                            <div>{!! $room->miniBar !!}</div>


                            <div>{!! $room->iron !!}</div>
                            <div>{!! $room->livingSpace !!}</div>
                            <div>{!! $room->fruit !!}</div>
                            <div>{!! $room->refrigerator !!}</div>
                            <div>{!! $room->bathtub !!}</div>

                        </td>
                    <td>
                        <a href="{{ route('room.edit', $room->id) }}" type="button"
                            class="btn btn-info   text-center">Edit</a>
                        <a href="{{ route('room.show', $room->id) }}" type="button"
                            class="btn btn-success   text-center">show</a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#exampleModal{{ $room->id }}">
                            Delete
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{ $room->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog        ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body ">
                                        <span>Do you want to delete this data?</span>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('room.destroy', $room->id) }}" method="post"
                                            enctype="multipart/form-data">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit"
                                                class="btn btn-danger"data-bs-dismiss="modal">Delete</button>

                                        </form>
                                        <button type="button"
                                            class="btn btn-primary"data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>

                </tr>
            @endforeach




        </tbody>
    </table>
    {{ $rooms->links() }}
</div>
@endsection
