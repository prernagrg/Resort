@extends('royal-master.admin.inc.main')
@section('container')
    <div style="width:80%" class="container bg-dark px-5 pb-5 m-5  shadow ">

        <form action="" method="" enctype="multipart/form-data">
            <div class="d-flex justify-content-between pb-3 mb-5 border-bottom">
                <h2 class="text-white">View Room Section <span
                        style="font-size:5rem; font-weight:100; margin-right:-13px;  position:relative; top:20px;">/</span><span
                        style="font-size:5rem;font-weight:100; position:relative; color:aqua; top:20px;">/</span> <span
                        style="color:aqua; "> ADMIN</span></h2>
                <a href="{{ route('room.index') }}" type="button"
                    class="btn  text-white btn-primary h-75 mt-5 text-center">Manage
                    Rooms &nbsp; <i class="fa-solid fa-arrow-right"></i></a>
            </div>

            <div class="mb-3">
                <label for="" class="form-label text-white">Room Type</label>
                <input class="rounded"  readonly type="text" value="{{$rooms->roomtype}}">
            </div>
            <div class="mb-3 d-flex flex-column">
                <label for="exampleFormControlInput1" class="form-label text-white">Upload Images</label>
                <div><img width="200rem" height="200rem" src="{{ asset('uploads/' . $rooms->image) }}" alt=""></div>
            </div>

            <div class="mb-3">
                <label for="" class="form-label text-white">Bed Type</label>
                <input class="rounded" readonly type="text" value="{{ $rooms->bedType }}">
            </div>

            <div class="mb-3">
                <label for="" class="form-label text-white">Capacity (no. of person)</label>
                <input class="rounded"  readonly type="text" value="{{ $rooms->capacity }}">
            </div>
            <div class="row my-3">
                <div class="border-bottom mb-2">
                    <h4>Service Pannel</h4>
                </div>
                <div class="col-lg-6">
                    <div class="form-check">
                        @if ($rooms->ac == "<i class='fa-regular fa-snowflake'></i> Air Conditioner")
                            <input checked disabled class="form-check-input" type="checkbox"
                                value="<i class='fa-regular fa-snowflake'></i> Air Conditioner" name='ac'
                                id="" />
                                <label class="form-check-label" for="">Air Conditioner</label>
                        @else
                        <input disabled class="form-check-input" type="checkbox"
                        value="<i class='fa-regular fa-snowflake'></i> Air Conditioner" name='ac'
                        id="" />
                        <label class="form-check-label text-decoration-line-through" for="">Air Conditioner</label>                        @endif
                    </div>
                    <div class="form-check">
                        @if ($rooms->wifi == "<i class='fa-solid fa-wifi'></i> Wi-Fi")
                            <input disabled checked class="form-check-input" type="checkbox"
                                value="<i class='fa-solid fa-wifi'></i> Wi-Fi" name='wifi' id="" />
                                <label class="form-check-label" for="">Wi-Fi</label>
                        @else
                        <input disabled class="form-check-input" type="checkbox"
                        value="<i class='fa-solid fa-wifi'></i> Wi-Fi" name='wifi' id="" />
                        <label class="form-check-label text-decoration-line-through" for="">Wi-Fi</label>
                        @endif

                    </div>
                    <div class="form-check">
                        @if ($rooms->teaCoffeeMaker == "<i class='fa-solid fa-mug-hot'></i> Tea/Coffee Maker")
                            <input checked disabled class="form-check-input" type="checkbox"
                                value="<i class='fa-solid fa-mug-hot'></i> Tea/Coffee Maker" name='teaCoffeeMaker'
                                id="" />
                                <label class="form-check-label" for=""> Tea/Coffee Maker</label>
                        @else
                        <input  disabled class="form-check-input" type="checkbox"
                        value="" name='teaCoffeeMaker'
                        id="" />
                        <label class="form-check-label text-decoration-line-through" for=""> Tea/Coffee Maker</label>
                        @endif

                    </div>
                    <div class="form-check">
                        @if ($rooms->inRoomSafe == "<i class='fa-solid fa-vault'></i> IN Room Safe")
                            <input checked disabled class="form-check-input" type="checkbox"
                                value="<i class='fa-solid fa-vault'></i> IN Room Safe" name='inRoomSafe' id="" />
                                <label class="form-check-label" for=""> IN Room Safe</label>
                        @else
                        <input  disabled class="form-check-input" type="checkbox" value=""/>
                        <label class="form-check-label text-decoration-line-through" for=""> IN Room Safe</label>

                        @endif

                    </div>
                    <div class="form-check">
                        @if ($rooms->purifiedWater == "<i class='fa-solid fa-bottle-water'></i> Purified Water")
                            <input checked disabled class="form-check-input" type="checkbox" />
                                <label class="form-check-label" for="">Purified Water </label>
                        @else
                        <input  disabled class="form-check-input" type="checkbox" />
                        <label class="form-check-label  text-decoration-line-through" for="">Purified Water </label>
                        @endif

                    </div>
                    <div class="form-check">
                        @if ($rooms->workplace == "<i class='fa-brands fa-uncharted'></i> Workplace")
                            <input checked disabled class="form-check-input" type="checkbox" />
                                <label class="form-check-label" for="">Workplace </label>
                        @else
                        <input  disabled class="form-check-input" type="checkbox" />
                        <label class="form-check-label  text-decoration-line-through" for="">Workplace </label>
                        @endif

                    </div>
                    <div class="form-check">
                        @if ($rooms->bathtub == "<i class='fa-solid fa-bath'></i> Bathtub")
                            <input checked disabled class="form-check-input" type="checkbox" />
                                <label class="form-check-label" for="">Bathtub</label>
                        @else
                        <input  disabled class="form-check-input" type="checkbox" />
                        <label class="form-check-label text-decoration-line-through" for="">Bathtub</label>
                        @endif

                    </div>
                    <div class="form-check">
                        @if ($rooms->iron == "<i class='fa-solid fa-shirt'></i> Iron")
                            <input checked disabled class="form-check-input" type="checkbox"/>
                                <label class="form-check-label " for="">Iron</label>
                        @else
                        <input  disabled class="form-check-input" type="checkbox"/>
                        <label class="form-check-label text-decoration-line-through" for="">Iron</label>
                        @endif

                    </div>


                </div>
                <div class="col-lg-6">
                    <div class="form-check">
                        @if ($rooms->tv == "<i class='fa-solid fa-tv'></i> Flat-screen TV")
                            <input checked disabled class="form-check-input" type="checkbox" />
                                <label class="form-check-label" for="">Flat-screen TV</label>
                        @else
                        <input  disabled class="form-check-input" type="checkbox" />
                        <label class="form-check-label text-decoration-line-through" for="">Flat-screen TV</label>
                        @endif

                    </div>
                    <div class="form-check">
                        @if ($rooms->rainShower == "<i class='fa-solid fa-shower'></i> Rain Shower")
                            <input checked disabled class="form-check-input" type="checkbox"/>
                                <label class="form-check-label" for="">Rain Shower</label>
                        @else
                        <input  disabled class="form-check-input" type="checkbox"/>
                        <label class="form-check-label text-decoration-line-through" for="">Rain Shower</label>
                        @endif

                    </div>
                    <div class="form-check">
                        @if ($rooms->wardrobe == "<i class='fa-solid fa-door-closed'></i> Wardrobe")
                            <input checked disabled class="form-check-input" type="checkbox" />
                                <label class="form-check-label" for=""> Wardrobe</label>
                        @else
                        <input  disabled class="form-check-input" type="checkbox" />
                        <label class="form-check-label text-decoration-line-through" for=""> Wardrobe</label>
                        @endif

                    </div>
                    <div class="form-check">
                        @if ($rooms->miniBar == "<i class='fa-solid fa-champagne-glasses'></i> Mini-bar")
                            <input checked disabled class="form-check-input" type="checkbox"/>
                                <label class="form-check-label" for=""> Mini-bar</label>
                        @else
                        <input  disabled class="form-check-input" type="checkbox"/>
                        <label class="form-check-label text-decoration-line-through" for=""> Mini-bar</label>
                        @endif

                    </div>
                    <div class="form-check">
                        @if ($rooms->livingSpace == "<i class='fa-solid fa-person-shelter'></i> Living Space")
                            <input checked disabled class="form-check-input" type="checkbox"/>
                                <label class="form-check-label" for="">Living Space</label>
                        @else
                        <input  disabled class="form-check-input" type="checkbox"/>
                        <label class="form-check-label text-decoration-line-through" for="">Living Space</label>
                        @endif

                    </div>
                    <div class="form-check">
                        @if ($rooms->fruit == "<i class='fa-solid fa-basket-shopping'></i> Fruit Basket")
                            <input checked disabled class="form-check-input" type="checkbox" />
                                <label class="form-check-label" for="">Fruit Basket</label>
                        @else
                        <input  disabled class="form-check-input" type="checkbox" />
                        <label class="form-check-label text-decoration-line-through" for="">Fruit Basket</label>
                        @endif

                    </div>
                    <div class="form-check">
                        @if ($rooms->refrigerator == "<i class='fa-solid fa-door-closed'></i> Refregerator")
                            <input checked disabled class="form-check-input" type="checkbox"/>
                                <label class="form-check-label" for="">Refregerator</label>
                        @else
                        <input  disabled class="form-check-input" type="checkbox"/>
                        <label class="form-check-label text-decoration-line-through" for="">Refregerator</label>
                        @endif

                    </div>
                    <div class="form-check">
                        @if ($rooms->hairDryer == "<i class='fa-solid fa-wind'></i> Hair Dryer")
                            <input checked disabled class="form-check-input" type="checkbox"/>
                                <label class="form-check-label" for="">Hair Dryer</label>
                        @else
                        <input  disabled class="form-check-input" type="checkbox"/>
                        <label class="form-check-label text-decoration-line-through" for="">Hair Dryer</label>
                        @endif

                    </div>


                </div>
                <div class="col-lg-6"></div>
            </div>


            <div class="mb-3 d-flex flex-column">
                <label for="exampleFormControlInput1" class="form-label text-white">Description</label>
                <textarea readonly name="description" class="rounded" id="" cols="30" rows="3">{{ $rooms->description }}</textarea>
            </div>
        </form>
    </div>
    <script>
        function moveimg() {
            var x = document.querySelector('input[name=imgname]:checked').value;
            document.getElementById('img').value = x;
        }
    </script>
@endsection
