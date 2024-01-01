@extends('layouts.master')

@section('title', 'Tambah Produk')

@section('content')
@if(Auth::check() && Auth::user()->role == 'Admin')
<div class="my-2 w-full flex flex-col lg:flex-row justify-center items-center">
    <div class="w-full md:w-2/12">
        <x-navbar />
        <div class="xl:w-10/12 h-screen flex flex-col justify-center items-center p-2">
            <div class=" bg-gradient-to-br border border-gray-700 bg-gray-200 p-8 rounded shadow-md shadow-gray-600 w-2/3 ">
                <a href="{{ route('kelola-product') }}">
                    <button class="bg-gray-600 absolute border text-white py-1 px-2 rounded-full hover:bg-gray-800 ">
                        <i class="fa-solid fa-arrow-left" style="color: #ffffff;">
                        </i>
                    </button>
                </a>
                <h2 class="text-2xl font-semibold mb-6 text-gray-700 text-center">Produk</h2>
                <form action="{{ route('tambah-product') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700">Nama </label>
                        <input type="text" placeholder="Nama" name="name" required class="form-input mt-1 block w-full border p-1 pl-2 text-black">
                    </div>
                    <div class="mb-4">
                        <label for="status" class="block text-gray-700">Status Produk </label>
                        <div class="flex flex-row gap-6">
                            <label class="block text-gray-700">
                                <input type="radio" name="status" value="1" class="mr-2">
                                <span class="text-gray-700">Active</span>
                            </label>
                            <label class="block text-gray-700">
                                <input type="radio" name="status" value="0" class="mr-2">
                                <span class="text-gray-700">Non-Active</span>
                            </label>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="jenis" class="block text-gray-700">Jenis Produk </label>
                        <div class="flex flex-row gap-6">
                            <label class="block text-gray-700 ">
                                <input type="radio" name="jenis" value="kids" class="mr-2">
                                <span class="text-gray-700">Kids</span>
                            </label>
                            <label class="block text-gray-700">
                                <input type="radio" name="jenis" value="males" class="mr-2">
                                <span class="text-gray-700">Males</span>
                            </label>
                            <label class="block text-gray-700">
                                <input type="radio" name="jenis" value="females" class="mr-2">
                                <span class="text-gray-700">Females</span>
                            </label>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="flex justify-between flex-row gap-2">
                            <label for="harga" class="block text-gray-700">Harga </label>
                        </div>
                        <label class="block text-gray-700" for="harga">
                            <input type="number" name="harga" id="harga" placeholder="1000000" class="form-input mt-1 block w-full border p-1 pl-2 text-black ">
                        </label>
                    </div>
                    <div class="mb-4">
                        <div class="flex justify-between flex-row gap-2">
                            <label for="image_path" class="block text-gray-700">Gambar </label>
                        </div>
                        <label class="block text-gray-700" for="image_path">
                            <input type="file" name="image_path" class="form-control" placeholder="image">
                        </label>
                    </div>
                    <div class="flex justify-end mt-2">
                        <a href="{{ route('kelola-product') }}">
                            <button type="submit" class="bg-gray-600 border text-white px-4 py-2 rounded-full hover:bg-gray-800">
                                Submit
                                <i class="fa-solid fa-arrow-right" style="color: #ffffff;"></i>
                            </button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
        <!-- @if(session('statusLogout') == 'success')
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
        @endif -->
    </div>
</div>
@else
<x-error-component />
@endif
@endsection