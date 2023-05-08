@extends('layout')
@section('container')
    <div class="h-screen w-full pt-[100px] px-[92px]">

        <div class="flex flex-col space-y-8">
            <div class="w-full py-2 pl-14 pr-4 flex justify-between rounded-[20px] bg-white">
                <div class="flex space-x-4">
                    <div class=" w-10 h-10 my-auto rounded-full bg-pink-400"></div>
                    <div class=" flex flex-col">
                        <h1 class="font-bold capitalize">{{Auth::user()->name}} </h1>
                        <h2 class=" text-sm">{{Auth::user()->email}}</h2>
                        {{-- {{$coba_data}} --}}
                    </div>
                </div>
                <div>
                    <i class='bx bx-message-square-dots bx-md mt-1' ></i>
                </div>
            </div>
            <div class="bg-white px-[77px] py-[30px] text-center rounded-[20px]">
                <h2 class=" text-3xl capitalize">judul artikel</h2>
                <h1 class=" mt-8 font-bold text-3xl capitalize">Belum ada Artikel</h1>
                <div class="mt-14 flex justify-center">
                    <div class="font-bold text-white bg-blue-500 px-20 py-2 rounded-[10px]">status</div>  
                </div>
            </div>
            <div class="bg-white px-14 py-11 h-96 rounded-[20px]  overflow-auto scrollbar-hide">
                <h1 class="text-3xl capitalize">komentar :</h1>
                <p class=" text-[22px]">
                    Belum Ada Komentar
                </p>
            </div>
        </div>
    </div>
@endsection