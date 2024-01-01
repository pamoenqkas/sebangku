@extends('layouts.master')

@section('title', 'Login')

@section('content')

<body class="font-[Poppins] bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('cover.png') }}')">
    <x-navbar />
    <div class="min-h-screen flex items-center justify-center">
        <div class="mt-24 bg-gradient-to-br from-black from-10% via-slate-600 via-70% to-gray-600 to-90% p-8 rounded shadow-md w-1/3 ">
            <h2 class="text-2xl font-semibold mb-6 text-center text-white">Login</h2>
            @if(session('status') == 'error')
            <script>
                Swal.fire({
                    position: "top-end",
                    icon: 'error',
                    title: "Login Gagal",
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>
            @endif
            @if(session('statusLogout') == 'success')
            <script>
                Swal.fire({
                    position: "top-end",
                    icon: 'success',
                    title: 'Success!',
                    text: 'Logout successful!',
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>
            @endif
            <form action="{{ route('actionlogin') }}" method="post" class="flex flex-col">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-white">Email </label>
                    <input id="email" type="email" name="email" required class="form-input mt-1 block w-full border p-1">
                </div>
                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-white">Password</label>
                    <input id="password" type="password" name="password" required class="form-input mt-1 block w-full border p-1">
                </div>
                <div class="flex flex-row justify-between items-center mt-4">
                    <div class="flex">
                        <p class="text-gray-300">Belum punya akun ?
                            <a href="{{ route('register') }}" class="hover:text-gray-800">
                                <p class="text-gray-400 font-semibold pl-2">Register disini</p>
                            </a>
                        </p>
                    </div>
                    <button class="bg-slate-800 border text-white px-4 py-2 rounded-full hover:bg-gray-300 hover:text-black">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
@endsection