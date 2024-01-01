@extends('layouts.master')

@section('title', 'Kelola Produk')

@section('content')
@if(Auth::check() && Auth::user()->role == 'Admin')
<div class="my-2 w-full flex flex-col lg:flex-row justify-center items-center">
    <div class="w-full md:w-2/12">
        <x-navbar />
        <div class="xl:w-10/12 h-auto flex flex-col justify-center items-center mt-20 p-2">
            <div class="w-10/12 flex flex-row justify-between items-center m-2">
                <h1 class="flex text-2xl  items-center text-center">Daftar Produk</h1>
                <a href="{{ route('create-product') }}">
                    <button class="bg-gray-500 text-white px-4 py-2 rounded-2xl hover:bg-gray-700">
                        Tambah Produk
                    </button>
                </a>
            </div>
            <table class="w-10/12 bg-white border border-gray-300 table-fixed mt-6 shadow-lg shadow-gray-700">
                <thead>
                    <tr class="border-b-2">
                        <th class="py-2 px-4 border-b border-r">Nama</th>
                        <th class="py-2 px-4 border-b border-r">Jenis</th>
                        <th class="py-2 px-4 border-b border-r">Timestamp</th>
                        <th class="py-2 px-4 border-b border-r">Status</th>
                        <th class="py-2 px-4 border-b border-r">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td class="py-2 px-4 border-b border-r ">{{ $product->name }}</td>
                        <td class="py-2 px-4 border-b border-r">
                            <div class="flex items-center justify-center">
                                {{ ucfirst($product->jenis) }}
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
                                @if ($product->status === 0)
                                <a href="{{ route('activate-product',$product->id) }}">
                                    <button class="bg-green-700 text-white px-2 py-1 rounded-full hover:bg-green-800">
                                        <i class="fa-solid fa-check" style="color: #ffffff;"></i>
                                    </button>
                                </a>
                                @else
                                <a href="{{ route('deactivate-product',$product->id) }}">
                                    <button class="bg-red-700 text-white px-2 py-1 rounded-full hover:bg-red-800">
                                        <i class="fa-solid fa-xmark" style="color: #ffffff;"></i>
                                    </button>
                                </a>
                                @endif
                                <div x-data="{ showModal: false }">
                                    <!-- Trigger button -->
                                    <button @click="showModal = true" data-id="{{ $product->id }}" class="bg-gray-700 hover:bg-gray-900 text-white px-2 py-1 rounded-full ">
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
                                                        <img class="w-full h-auto" src="{{ asset($product->image_path) }}" alt="{{ $product->name }}" />
                                                    </div>
                                                    <div class="p-4 relative bottom-0 left-0 right-0 bg-black bg-opacity-90 text-white hover:block">
                                                        <div class="flex flex-row justify-between items-center">
                                                            <p class="text-white text-xl font-semibold">{{ $product->name }}</p>
                                                            @if($product->status == '1')
                                                            <button disabled class="pointer-events-none bg-green-800 border text-sm text-white px-3 py-1 rounded-full  ">
                                                                AVAILABLE
                                                            </button>
                                                            @else
                                                            <button disabled class=" pointer-events-none bg-red-800 border text-sm text-white px-3 py-1 rounded-full  ">
                                                                UNAVAILABLE
                                                            </button>
                                                            @endif
                                                        </div>
                                                        <div class="flex flex-row justify-between items-center mt-4">
                                                            <p class="text-white uppercase">{{ $product->jenis }}</p>
                                                            <p class="text-white mr-1"> Rp. {{ $product->harga }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{ route('delete-product', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-gray-600 text-white px-2 py-1 rounded-full hover:bg-gray-800">
                                        <i class="fa-solid fa-trash" style="color: #ffffff;"></i>
                                    </button>
                                </form>
                                <a href="{{ route('edit-product',$product->id) }}">
                                    <button class="bg-gray-500 text-white px-2 py-1 rounded-full hover:bg-gray-400">
                                        <i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i>
                                    </button>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if(session('status') == 'success')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Berhasil Menambahkan! ',
            });
        </script>
        @endif
        @else
        <x-error-component />
        @endif
    </div>
</div>
</div>

@endsection