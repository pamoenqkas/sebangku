@props(['product'])

<div class="w-full xl:w-1/3 p-4">
    <div class="bg-white w-full h-full overflow-hidden relative shadow-lg shadow-gray-800" data-aos="flip-down" >
        <div class="transition-transform duration-300 transform hover:scale-125" >
            <img class="w-full h-auto" src="{{ $product->image_path }}" alt="{{ $product->name }}" />
        </div>
        <div class="p-4 relative bottom-0 left-0 right-0 bg-black bg-opacity-90  text-white hover:block"  >
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
            <div class="flex flex-row justify-between items-end mt-3">
                <div class="w-5/6">
                    <div class="flex-col">
                        <p class="text-white uppercase">{{ $product->jenis }}</p>
                        <p class="text-white mr-1"> Rp. {{ $product->harga }} </p>

                    </div>
                </div>
                <div class="w-2/6 flex justify-end items-end ">
                    <button class="bg-black border text-white px-5 py-1 rounded-full hover:bg-white hover:text-black transition duration-200 ease-out hover:ease-in">
                        <i class="fa-solid fa-cart-shopping fa-sm text-white hover:text-black"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>