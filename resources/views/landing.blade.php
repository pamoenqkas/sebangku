@extends('layouts.master')

@section('title', 'Welcome')

@section('content')
<div class="w-full flex flex-col justify-center items-center">
    <video id="landingVideo" class="w-full h-screen object-cover z-40 relative" autoplay muted loop>
        <source src="ad-landing.mp4" type="video/mp4">
    </video>
    <a href="#productSection" class=" fixed right-0 mr-7 z-50">
        <div class="bg-black border-2 rounded-full px-2 py-1 flex justify-center text-center items-center">
            <i class="fa-solid fa-chevron-down mr-6 " style="color: #ffffff;"></i>
        </div>
    </a>
</div>
@endsection