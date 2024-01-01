@extends('layouts.master')

@section('title', 'Males')

@section('content')
<x-navbar />
<div class="mt-16 w-full flex flex-col justify-center items-center">
    <div class="w-10/12 h-auto flex flex-col justify-center items-start p-2">
        <p data-aos="fade-right" data-aos-delay="300" class="text-2xl mb-3 xl:ml-16 lg:ml-12 mt-5">Men</p>
        <swiper-container  data-aos="fade-left" data-aos-delay="500" class="mySwiper shadow-lg shadow-gray-800 " space-between="30" autoplay-delay="2500" autoplay-disable-on-interaction="false">
            <swiper-slide>
                <img class="w-full h-50 object-cover " src="{{ asset('males-1.jpg') }}" alt="males-1" />
            </swiper-slide>
            <swiper-slide>
                <img class="w-full object-cover " src="{{ asset('males-2.jpg') }}" alt="males-2" />
            </swiper-slide>
            <swiper-slide>
                <img class="w-full object-cover " src="{{ asset('males-3.jpg') }}" alt="males-3" />
            </swiper-slide>
        </swiper-container>
        <p data-aos="fade-right" class="text-2xl mb-3 ml-4 mt-6">Mens Product</p>
        <div class="flex flex-wrap justify-center items-center">
            @foreach ($products as $product)
            <x-product-card :product="$product" />
            @endforeach
        </div>
    </div>
</div>
@endsection