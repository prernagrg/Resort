@extends('royal-master.admin.inc.main')
@section('container')


<div style="width:80%" class="container bg-dark px-5 pb-5 m-5  shadow ">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert"> <button type="button" class="btn-close"
                data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>{{ session('success') }}</strong>
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-success alert-dismissible fade show" role="alert"> <button type="button" class="btn-close"
                data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>{{ session('error') }}</strong>
        </div>
        @endif
        <form action="{{route('room.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="d-flex justify-content-between pb-3 mb-5 border-bottom">
                <h2 class="text-white">Add Room Section <span
                        style="font-size:5rem; font-weight:100; margin-right:-13px;  position:relative; top:20px;">/</span><span
                        style="font-size:5rem;font-weight:100; position:relative; color:aqua; top:20px;">/</span> <span
                        style="color:aqua; "> ADMIN</span></h2>
                <a href="{{ route('room.index') }}" type="button"
                    class="btn  text-white btn-primary h-75 mt-5 text-center">Manage
                    Rooms &nbsp; <i class="fa-solid fa-arrow-right"></i></a>
            </div>

            <div class="mb-3">
                <label for="" class="form-label text-white">Room Type</label>
                <select  class="form-select form-select-lg" name="roomtype" id="">
                    <option selected>Select one</option>
                    <option value="Presidential Suit">Presidential Suit</option>
                    <option value="Suits">Suits</option>
                    <option value="Executive Deluxe">Executive Deluxe</option>
                    <option value="Super Deluxe">Super Deluxe</option>
                    <option value="Deluxe">Deluxe</option>
                    <option value="Deluxe family Huts">Deluxe family Huts</option>
                </select>
                @error('roomType')
                <div class="alert alert-danger alert-dismissible fade show" role="alert"> <button type="button"
                        class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    {{ $message }}
                </div>
                @enderror
            </div>



            <div class="mb-3 d-flex flex-column">
                <label for="exampleFormControlInput1" class="form-label text-white">Upload Images</label>
                <div class="d-flex">

                    <input type="text" class="form-control mb-2" id="img" value="" name="image" readonly>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <span> Select&nbsp;Image</span>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog        ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Select Image</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <style>
                                        [type=radio]:checked+img {
                                            outline: 3px solid blue;
                                        }
                                    </style>
                                    @foreach ($files as $file)
                                        <label>
                                            <input type="radio" style="opacity: 0" name="imgname"
                                                value="{{ $file->image }}">
                                            <img height="100px" width="100px" name="imgname"
                                                src="{{ asset('uploads/' . $file->image) }}" alt="">
                                        </label>
                                    @endforeach
                                </div>
                                {{ $files->links() }}
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="moveimg()"
                                        data-bs-dismiss="modal">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @error('image')
                <div class="alert alert-danger alert-dismissible fade show" role="alert"> <button type="button"
                        class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="" class="form-label text-white">Bed Type</label>
                <select  class="form-select form-select-lg" name="bedType" id="">
                    <option value="Kingsize">Kingsize</option>
                    <option value="Kingsize/Twinbed">Kingsize/Twinbed</option>
                </select>
                @error('bedType')
                <div class="alert alert-danger alert-dismissible fade show" role="alert"> <button type="button"
                        class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="" class="form-label text-white">Capacity (no. of person)</label>
                <select  class="form-select form-select-lg" name="capacity" id="">
                    <option selected>Select one</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                @error('capacity')
                <div class="alert alert-danger alert-dismissible fade show" role="alert"> <button type="button"
                        class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="row my-3">
                <div class="border-bottom mb-2"><h4>Service Pannel</h4></div>
                <div class="col-lg-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"
                            value="<i class='fa-regular fa-snowflake'></i> Air Conditioner" name='ac'
                            id="" />
                        <label class="form-check-label" for="">Air Conditioner</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<i class='fa-solid fa-wifi'></i> Wi-Fi" name='wifi'
                            id="" />
                        <label class="form-check-label" for="">Wi-Fi</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<i class='fa-solid fa-mug-hot'></i> Tea/Coffee Maker" name='teaCoffeeMaker'
                            id="" />
                        <label class="form-check-label" for=""> Tea/Coffee Maker</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<i class='fa-solid fa-vault'></i> IN Room Safe" name='inRoomSafe'
                            id="" />
                        <label class="form-check-label" for=""> IN Room Safe</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<i class='fa-solid fa-bottle-water'></i> Purified Water" name='purifiedWater'
                            id="" />
                        <label class="form-check-label" for="">Purified Water </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<i class='fa-brands fa-uncharted'></i> Workplace" name='workplace'
                            id="" />
                        <label class="form-check-label" for="">Workplace </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<i class='fa-solid fa-bath'></i> Bathtub" name='bathtub'
                            id="" />
                        <label class="form-check-label" for="">Bathtub</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<i class='fa-solid fa-shirt'></i> Iron" name='iron'
                            id="" />
                        <label class="form-check-label" for="">Iron</label>
                    </div>


                </div>
                <div class="col-lg-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"
                            value="<i class='fa-solid fa-tv'></i> Flat-screen TV" name='tv'
                            id="" />
                        <label class="form-check-label" for="">Flat-screen TV</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<i class='fa-solid fa-shower'></i> Rain Shower" name='rainShower'
                            id="" />
                        <label class="form-check-label" for="">Rain Shower</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<i class='fa-solid fa-door-closed'></i> Wardrobe" name='wardrobe'
                            id="" />
                        <label class="form-check-label" for=""> Wardrobe</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<i class='fa-solid fa-champagne-glasses'></i> Mini-bar" name='miniBar'
                            id="" />
                        <label class="form-check-label" for=""> Mini-bar</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<i class='fa-solid fa-person-shelter'></i> Living Space" name='livingSpace'
                            id="" />
                        <label class="form-check-label" for="">Living Space</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<i class='fa-solid fa-basket-shopping'></i> Fruit Basket" name='fruit'
                            id="" />
                        <label class="form-check-label" for="">Fruit Basket</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<i class='fa-solid fa-door-closed'></i> Refregerator" name="refrigerator"
                            id="" />
                        <label class="form-check-label" for="">Refregerator</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<i class='fa-solid fa-wind'></i> Hair Dryer" name="hairDryer"
                            id="" />
                        <label class="form-check-label" for="">Hair Dryer</label>
                    </div>


                </div>
                <div class="col-lg-6"></div>
            </div>


            <div class="mb-3 d-flex flex-column">
                <label for="exampleFormControlInput1" class="form-label text-white">Description</label>
                <textarea name="description" class="rounded" id="" cols="30" rows="3"></textarea>
                @error('description')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert"> <button type="button"
                            class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        {{ $message }}
                    </div>
                    @enderror
            </div>

            <button type="submit" class="btn btn-primary " value="upload file">
                Upload here
            </button>
        </form>
    </div>
    <script>
        function moveimg() {
            var x = document.querySelector('input[name=imgname]:checked').value;
            document.getElementById('img').value = x;
        }
    </script>
@endsection
