@extends('layouts.master')

@section('title', 'Kelola User')

@section('content')
@if(Auth::check() && Auth::user()->role == 'Admin')
<div class="my-2 w-full flex flex-col lg:flex-row justify-center items-center">
    <div class="w-full md:w-2/12">
        <x-navbar />
        <div class="xl:w-10/12 h-auto flex flex-col justify-center items-center mt-20 p-2">
            <h1 class="text-2xl font-semibold mb-4">Daftar Pengguna</h1>
            <table class="w-10/12 bg-white border border-gray-300 table-fixed shadow-lg shadow-gray-700">
                <thead>
                    <tr class="border-b-2">
                        <th class="py-2 px-4 border-b-2 border-r">Name</th>
                        <th class="py-2 px-4 border-b border-r">Email</th>
                        <th class="py-2 px-4 border-b border-r">Phone</th>
                        <th class="py-2 px-4 border-b border-r">Status</th>
                        <th class="py-2 px-4 border-b border-r">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($userTotal as $user)
                    <tr>
                        <td class="py-2 px-4 border-b border-r ">{{ $user->name }}</td>
                        <td class="py-2 px-4 border-b border-r">
                            <div class="flex items-center justify-center">
                                {{ $user->email }}
                            </div>
                        </td>
                        <td class="py-2 px-4 border-b border-r">
                            <div class="flex items-center justify-center">
                                {{ $user->no_telp }}
                            </div>
                        </td>
                        <td class="py-2 px-4 border-b border-r">
                            <div class="flex items-center justify-center"> 
                                @if($user->status == '0')
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
                            <div class="flex items-center justify-center"> 
                                @if ($user->status === '0' && $user->role === 'User')
                                <a href="{{ route('activate-user',$user->id) }}">
                                    <button class="bg-green-700 text-white px-2 py-1 rounded-full hover:bg-green-800">
                                        <i class="fa-solid fa-check" style="color: #ffffff;"></i> 
                                    </button>
                                </a>
                                @elseif ($user->status === '1' && $user->role === 'User')
                                <a href="{{ route('deactivate-user',$user->id) }}">
                                    <button class="bg-red-700 text-white px-2 py-1 rounded-full hover:bg-red-800">
                                        <i class="fa-solid fa-xmark" style="color: #ffffff;"></i>
                                    </button>
                                </a> 
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
</div>
</div>

@endsection