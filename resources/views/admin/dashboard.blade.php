@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')

@if(Auth::check() && Auth::user()->role == 'Admin')
<div class="pb-4 w-full h-auto flex flex-col lg:flex-row justify-center items-center bg-gray-200">
    <div class="w-full md:w-2/12">
        <x-navbar />
        <div class="xl:w-10/12 h-auto flex flex-col justify-center items-center p-2 ">
            <div class="flex flex-col justify-between items-center ">
                <p class="font-semibold text-xl m-3 mt-20">Rangkuman</p>
                <div class="flex m-2 p-2 gap-5">
                    <div class="flex flex-col w-44 h-44 bg-[#404258] 
                        from-b items-center justify-center rounded-3xl shadow-lg shadow-gray-800 transition-transform duration-300 transform hover:scale-110">
                        <svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                            <path fill="#ffffff" d="M50.7 58.5L0 160H208V32H93.7C75.5 32 58.9 42.3 50.7 58.5zM240 160H448L397.3 58.5C389.1 42.3 372.5 32 354.3 32H240V160zm208 32H0V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V192z" />
                        </svg>
                        <p class="mt-2 text-2xl font-bold text-white">{{ $productCount }} </p>
                        <p class="mt-2 text-white"> Produk</p>
                    </div>
                    <div class="flex flex-col w-44 h-44 bg-[#474E68] 
                    from-b items-center justify-center rounded-3xl shadow-lg shadow-gray-800 transition-transform duration-300 transform hover:scale-110">
                        <div class="flex gap-1 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                <path fill="#ffffff" d="M50.7 58.5L0 160H208V32H93.7C75.5 32 58.9 42.3 50.7 58.5zM240 160H448L397.3 58.5C389.1 42.3 372.5 32 354.3 32H240V160zm208 32H0V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V192z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" height="32" width="28" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                <path fill="#ffffff" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                            </svg>
                        </div>
                        <p class="mt-2 text-2xl font-bold text-white">{{ $countAktifProducts }} </p>
                        <p class="mt-2 text-white"> Produk Aktif</p>
                    </div>
                    <div class="flex flex-col w-44 h-44 bg-[#50577A] 
                    from-b items-center justify-center rounded-3xl shadow-lg shadow-gray-800 transition-transform duration-300 transform hover:scale-110">
                        <svg xmlns="http://www.w3.org/2000/svg" height="65" width="65" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                            <path fill="#ffffff" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                        </svg>
                        <p class="mt-2 text-2xl font-bold text-white">{{ $userTotal }} </p>
                        <p class="text-sm text-white"> Pengguna </p>
                    </div>
                    <div class="flex flex-col w-44 h-44 bg-[#6B728E] 
                    from-b items-center justify-center rounded-3xl shadow-lg shadow-gray-800 transition-transform duration-300 transform hover:scale-110">
                        <div class="ml-5">
                            <svg xmlns="http://www.w3.org/2000/svg" height="70" width="70" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                <path fill="#ffffff" d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM625 177L497 305c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L591 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                            </svg>
                        </div>
                        <p class="mt-2 text-2xl font-bold text-white">{{ $countAktifUsers }} </p>
                        <p class="text-sm text-white"> Pengguna Aktif </p>
                    </div>
                </div>
            </div>
            <p class="font-semibold text-xl m-3 mt-5">10 Data terbaru</p>
            <table class="w-10/12 bg-white border border-collapse table border-gray-300 mt-3 shadow-lg shadow-gray-700">
                <thead>
                    <tr class="border-2">
                        <th class="py-2 px-4 border">Nama</th>
                        <th class="py-2 px-4 border">Harga</th>
                        <!-- <th class="py-2 px-4 border-b border-r">Jenis</th> -->
                        <th class="py-2 px-4 border">Timestamp</th>
                        <th class="py-2 px-4 border">Status</th>
                        <th class="py-2 px-4 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($newestProducts as $product)
                    <tr>
                        <td class="py-2 px-4 border-b border-r">{{ $product->name }}</td>
                        <td class="py-2 px-4 border-b border-r">
                            <div class="flex items-center justify-center">
                                Rp {{ $product->harga  }}
                            </div>
                        </td>
                        <td class="py-2 px-4 border-b border-r">
                            <div class="flex items-center justify-center">
                                {{ $product->formatted_updated_at }}
                            </div>
                        </td>
                        <td class="py-2 px-4 border-b border-r">
                            <div class="flex items-center justify-center">
                                @if ($product->status === 0)
                                <button disabled class="bg-red-700 text-white px-2 py-1 rounded-lg ">
                                    <i class="fa-solid fa-xmark" style="color: #ffffff;"></i>
                                    Tidak Aktif
                                </button>
                                @else
                                <button disabled class="bg-green-700 text-white px-2 py-1 rounded-lg ">
                                    <i class="fa-solid fa-check" style="color: #ffffff;"></i>
                                    Aktif
                                </button>
                                @endif
                            </div>
                        </td>
                        <td class="py-2 px-4 border-b border-r ">
                            <div class="flex items-center justify-center gap-2 ">
                                <div x-data="{ showModal: false }">
                                    <!-- Trigger button -->
                                    <button @click="showModal = true" data-id="{{ $product->id }}" class="bg-gray-700 hover:bg-gray-800 text-white px-2 py-1 rounded-full ">
                                        <i class="fa-solid fa-eye" style="color: #ffffff;"></i>
                                    </button>
                                    <!-- Modal -->
                                    <div x-show="showModal" class="fixed inset-0 mt-12 overflow-y-auto">
                                        <div class="flex items-center justify-center min-h-screen ">
                                            <div class="w-full xl:w-2/6 p-4">
                                                <div class="bg-white w-full h-full overflow-hidden relative shadow-lg shadow-gray-800 ">
                                                    <button @click="showModal = false" class="top-0 right-0 mr-3 mt-4 bg-gray-500 hover:bg-gray-700 text-white absolute px-2 py-1 rounded-xl z-10 ">
                                                        <i class="fa-solid fa-xmark" style="color: #ffffff;"></i>
                                                    </button>
                                                    <div class="transition-transform duration-300 transform hover:scale-125 z-0">
                                                        <img class="w-full h-auto" src="{{ $product->image_path }}" alt="{{ $product->name }}" />
                                                    </div>
                                                    <div class="p-4 relative bottom-0 left-0 right-0 bg-black bg-opacity-90  text-white hover:block">
                                                        <div class="flex flex-row justify-between items-center">
                                                            <p class="text-white text-xl font-semibold">{{ $product->name }}</p>
                                                            @if($product->status == '1')
                                                            <button disabled class="pointer-events-none bg-green-800 border text-sm text-white px-3 py-1 rounded-2xl  ">
                                                                AVAILABLE
                                                            </button>
                                                            @else
                                                            <button disabled class=" pointer-events-none bg-red-800 border text-sm text-white px-3 py-1 rounded-2xl  ">
                                                                UNAVAILABLE
                                                            </button>
                                                            @endif
                                                        </div>
                                                        <div class="flex flex-row justify-between items-center mt-4">
                                                            <p class="text-white uppercase">{{ $product->jenis }}</p>
                                                            <p class="text-white mr-1"> Rp. {{ $product->harga }}0.000,00</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>



            <!-- <div class="w-10/12 h-auto flex flex-col justify-center items-center p-2 border-t-2 border-gray-300 mt-4">
                <p class="font-bold text-2xl m-3">Produk Terbaru</p>
                <div class="flex flex-wrap justify-center items-center">
                    @foreach ($newestProducts as $product)
                    <div class="w-full xl:w-1/3 p-4">
                        <div class="bg-white w-full h-full overflow-hidden relative shadow-lg shadow-gray-800">
                            <div class="transition-transform duration-300 transform hover:scale-125">
                                <img class="w-full h-auto" src="{{ $product->image_path }}" alt="{{ $product->name }}" />
                            </div>
                            <div class="p-4 relative bottom-0 left-0 right-0 bg-gray-800 bg-opacity-90  text-white hover:block">
                                <div class="flex flex-row justify-between items-center">
                                    <p class="text-white text-xl font-semibold">{{ $product->name }}</p>
                                    @if($product->status == '1')
                                    <button disabled class="pointer-events-none bg-green-800 border text-xs text-white px-2 py-1 rounded-2xl  ">
                                        AVAILABLE
                                    </button>
                                    @else
                                    <button disabled class=" pointer-events-none bg-red-800 border text-xs text-white px-2 py-1 rounded-2xl  ">
                                        UNAVAILABLE
                                    </button>
                                    @endif
                                </div>
                                <div class="flex flex-row justify-between items-center mt-4">
                                    <p class="text-white uppercase">{{ $product->jenis }}</p>
                                    <p class="text-white mr-1"> Rp. {{ $product->harga }}0.000,00</p>
                                </div>
                                <p class="text-end mr-1 mt-4">
                                    {{ $product->formatted_updated_at }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div> -->
        </div>
    </div>
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
    @else
    <x-error-component />
    @endif
</div>
@endsection