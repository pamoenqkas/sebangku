@if(Auth::check() && Auth::user()->role == 'Admin')
<span class="absolute text-white text-4xl top-5 left-4 cursor-pointer" onclick="Openbar()">
    <i class="bi bi-filter-left px-2 bg-gray-200 rounded-md"></i>
</span>
<div class="fixed w-2/12 top-0 bottom-0 lg:left-0 left-[-300px] duration-1000 z-20 border-r-2 border-gray-600 py-2 overflow-y-auto text-center bg-gray-200 h-screen">
    <div class="w-10/12 right-0 min-w-min h-20 border-b-2 border-gray-600 bg-gray-200 fixed -z-20 top-0 justify-start items-center flex">
        <p class="text-3xl font-bold text-gray-600 ml-10">
            @if(request()->is('dashboard'))
            Dashboard
            @elseif(request()->is('kelola-user'))
            Kelola Pengguna
            @elseif(request()->is('kelola-product'))
            Kelola Produk
            @elseif(request()->is('create-product'))
            Tambah Produk
            @elseif(request()->is('edit-product/*'))
            Edit Produk
            @endif
        </p>
    </div>
    <div class="text-gray-600 text-xl p-3 scroll-smooth">
        <div class="p-2.5 mt-1 flex items-center rounded-md  ">
            <img class="w-10 h-10 rounded-full" src="{{ asset('profile.jpg') }}" alt="Logos" />
            <h1 class="text-[15px]  ml-3 text-xl text-gray-700 font-bold">{{ Auth::user()->name  }} </h1>
            <i class="bi bi-x ml-20 cursor-pointer lg:hidden" onclick="Openbar()"></i>
        </div>
        <div class="border-gray-400 border-t-2 my-4">
            <a href="{{ route('dashboard') }}">
                <div class="p-2.5 mt-5 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-gray-400">
                    <i class="fa-solid fa-house fa-lg" style="color: #999999;"></i>
                    <span class="text-[15px] ml-4 text-gray-700 font-semibold">Dashboard</span>
                </div>
            </a>
            <a href="{{ route('kelola-user') }}">
                <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-gray-400">
                    <i class="fa-solid fa-user fa-xl" style="color: #999999;"></i>
                    <span class="text-[15px] ml-4 text-gray-700 font-semibold">Kelola Pengguna</span>
                </div>
            </a>
            <a href="{{ route('kelola-product') }}">
                <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-gray-400">
                    <i class="fa-solid fa-box fa-xl" style="color: #999999;"></i>
                    <span class="text-[15px] ml-4 text-gray-700 font-semibold">Kelola Produk</span>
                </div>
            </a>
            <a href="{{ route('actionlogout') }}">
                <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-gray-400">
                    <i class="fa-solid fa-right-from-bracket fa-xl" style="color: #999999;"></i>
                    <span class="text-[15px] ml-4 text-gray-700 font-semibold">Logout</span>
                </div>
            </a>
        </div>
    </div>
</div>

<!-- <script>
    function dropDown() {
        document.querySelector('#submenu').classList.toggle('hidden')
        document.querySelector('#arrow').classList.toggle('rotate-0')
    }
    dropDown()

    function Openbar() {
        document.querySelector('.sidebar').classList.toggle('left-[-300px]')
    }
</script> -->
@else
<div className="bg-black w-full flex items-center justify-center scroll-smooth focus:scroll-auto z-0">
    <div class="bg-black border-b z-10 fixed w-full rounded-none borber-b-2 border-white top-0">
        <div class="container mx-auto space-x-4 flex justify-between items-center p-3">
            <div class="flex items-center">
                <a href="{{ route('welcome') }}">
                    <div class="flex flex-row items-center gap-2">
                        <img class="w-12 h-12" src="{{ asset('logos.png') }}" alt="Logos" />
                        @if(Auth::check() && Auth::user()->role == 'Admin')
                        <p class="text-white font-bold ">Admin</p>
                        @else
                        @endif
                    </div>
                </a>
            </div>
            <div class="flex gap-4 text-white">
                <a href="{{ route('males') }}" class="hover:font-bold">Men</a>
                <a href="{{ route('females') }}" class="hover:font-bold">Women</a>
                <a href="{{ route('kids') }}" class="hover:font-bold">Kids</a>
            </div>
            <div class="flex gap-3 items-center ">
                @if(Auth::check())
                <div class="w-auto h-auto rounded-full bg-black border hover:bg-white hover:text-black flex items-center justify-center p-2">
                    <img class="w-10 h-10 rounded-full" src="{{ asset('profile.jpg') }}" alt="Logos" />
                    <p class="text-white hover:text-black ml-2">{{ Auth::user()->name }}</p>
                </div>
                <div class="w-12 h-12 rounded-full bg-black hover:bg-white hover:text-black border flex items-center justify-center transition duration-300 ease-in-out">
                    <a href="{{ route('actionlogout') }}" class="flex items-center justify-center">
                        <i class="fa-solid fa-right-from-bracket fa-lg text-white hover:text-black"></i>
                    </a>
                </div>
                @else
                <a href="{{ route('register') }}">
                    <button class="bg-black border text-white px-4 py-2 rounded-full hover:bg-white hover:text-black transition duration-200 ease-out hover:ease-in">
                        Register
                    </button>
                </a>
                <a href="{{ route('login') }}">
                    <button class="bg-black border text-white px-4 py-2 rounded-full hover:bg-white hover:text-black transition duration-200 ease-out hover:ease-in">
                        Login
                    </button>
                </a>
                @endif
            </div>
        </div>
    </div>
</div>
@endif
</div>