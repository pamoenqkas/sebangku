@extends('layouts.master')

@section('title', 'Nike')

@section('content')

<body class="font-[Poppins]">
    <div className="scroll-smooth focus:scroll-auto bg-black">
        <x-navbar />
        @if(Auth::check() && Auth::user()->role == 'Admin')
        @else
        <div class=" w-full flex flex-col justify-center items-center mt-24">
            <swiper-container data-aos="fade-left" navigation="true" data-aos-delay="500" class="mySwiper shadow-lg shadow-gray-800 " space-between="30" autoplay-delay="2500" loop="true">
                <swiper-slide>
                    <img class="w-full object-cover " src="{{ asset('landing-1.jpg') }}" alt="landing-1" />
                </swiper-slide>
                <swiper-slide>
                    <img class="w-full object-cover " src="{{ asset('landing-2.jpg') }}" alt="landing-2" />
                </swiper-slide>
                <swiper-slide>
                    <img class="w-full object-cover " src="{{ asset('landing-3.jpg') }}" alt="landing-3" />
                </swiper-slide>
            </swiper-container> 
            <!-- <a href="#productSection" class=" fixed right-0 mr-1">
                <div class="bg-slate-800  rounded-full px-2 py-1 flex justify-center items-center">
                    <i class="fa-solid fa-chevron-down mr-6" style="color: #ffffff;"></i>
                </div>
            </a> -->
        </div>
        @endif
        @if(Auth::check() && Auth::user()->role == 'Admin')
        @else
        @endif
        <section id="productSection">
            <div class="my-2 w-full flex flex-col justify-center items-center">
                @if(Auth::check() && Auth::user()->role == 'Admin')
                <p>admin</p>
                @else
                <div class="w-10/12 h-auto flex flex-col justify-center items-start p-2">
                    <p class=" text-2xl mb-3 ml-4 mt-4">Product</p>
                    <div class="flex flex-wrap justify-center items-center">
                        @foreach ($products as $product)
                        <x-product-card :product="$product" />
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </section>
        @if(session('statusLogout') == 'success')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Logout Berhasil!',
            });
        </script>
        @elseif(session('status') == 'success')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Login Berhasil! ',
            });
        </script>
        @endif
    </div>
    </div>
    @endsection