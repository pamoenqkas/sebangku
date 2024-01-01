@extends('layouts.master')

@section('title', 'Register')

@section('content') 
<body class="font-[Poppins] bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('cover.png') }}')">
    <x-navbar />
    <div class="h-screen flex items-center justify-center">
        <div class="mt-24 bg-gradient-to-br from-black to-gray-600 p-8 rounded shadow-md w-1/3 ">
            <h2 class="text-2xl font-semibold mb-6 text-white text-center">Register</h2>
            @if(session('error'))
            <div class="alert alert-danger">
                <b>Opps!</b> {{session('error')}}
            </div>
            @endif
            <form action="{{ route('actionregister') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-white">Email </label>
                    <input type="email" name="email" required class="form-input mt-1 block w-full border p-1 pl-2">
                </div>
                <div class="mb-4">
                    <label for="name" class="block text-white">Name </label>
                    <input type="text" name="name" required class="form-input mt-1 block w-full border p-1 pl-2">
                </div>
                <div class="mb-4">
                    <label for="no_telp" class="block text-white">Nomor Telepon </label>
                    <input type="text" name="no_telp" required class="form-input mt-1 block w-full border p-1 pl-2">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-white">Password</label>
                    <input type="password" name="password" required class="form-input mt-1 block w-full border p-1 pl-2">
                </div>
                <!-- <label for="role" class="block text-white">Role</label>
                <input type="text" name="role" value="User" disabled required class="form-input mt-1 block w-full border p-1 pl-2 bg-gray-300"> -->
                <div class="flex flex-row justify-between items-center mt-6">
                    <div class="flex">
                        <p class="text-gray-300">Sudah punya akun ?
                            <a href="{{ route('login') }}" class="hover:text-gray-800">
                                <p class="text-gray-400 font-semibold pl-2">Login Disini</p>
                            </a>
                        </p>
                    </div>
                    <button class="bg-slate-800 border text-white px-4 py-2 rounded-full hover:bg-gray-300 hover:text-black">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
@endsection