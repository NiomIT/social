@extends('dashboard')
@section('user')


<!-- Widget Start -->
<div class="widget">
    <!-- Profile Widget Start -->
    <div class="profile--widget">
        <div class="contributor--item style--1">
            <div class="img">
                <img src="{{ !empty($userData->photo) ? url('upload/user_images/' . $userData->photo) : url('upload/no_image.jpg') }}" alt="" data-rjs="2">
            </div>

            <div class="name">
                <h3 class="h4"><a href="author.html" class="btn-link">{{Auth::user()->name}}</a></h3>
            </div>

            <div class="desc">
                <p>Email: {{ $userData->email}}</p>
                <p>Phone: {{ $userData->phone}}</p>
                <p>Address: {{ $userData->address}}</p>
            </div>
        </div>
    </div>
    <!-- Profile Widget End -->
</div>
<!-- Widget End -->


@endsection
