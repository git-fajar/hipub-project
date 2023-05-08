@extends('layout')
@section('container')
    <div class="h-screen w-full px-16 py-16">
        <div class="flex flex-warp">
            <div class="w-[15%] px-4 py-2 bg-white rounded-xl cursor-pointer">
                <span class="bx bx-filter" id="status-select"></span>
                    <select class="capitalize appearance-none focus:outline-none cursor-pointer" name="status" id="status-filter">
                        <option class="capitalize text-slate-600" value="">filter</option>
                        <option class="capitalize text-black" value="Verifikasi">verifikasi</option>
                        <option class="capitalize text-black" value="Revisi">revisi</option>
                        <option class="capitalize text-black" value="Proses">proses</option>
                        <option class="capitalize text-black" value="Publish">publish</option>
                    </select>
                </div>
            <div class="w-[85%] ml-4 px-4 py-2 bg-white rounded-xl capitalize cursor-pointer">
                <span class="bx bx-search"></span>
                <input class="w-[96%] appearance-none focus:outline-none" id="search" name="judul" type="text" placeholder="pencarian" >
            </div>
        </div>
        <div class="bg-white rounded-xl mt-6 px-5 pb-5">
            <table class="w-full" id="search">
                <thead>
                    <tr class="py-9 border-b-2 border-gray-400">
                        <th class="uppercase w-1/12 font-bold pt-4 pb-3"> no</td>
                        <th class="uppercase w-6/12 font-bold"> judul artikel</td>
                        <th class="uppercase w-2/12 font-bold"> Author</td>
                        <th class="uppercase w-3/12 font-bold"> status</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($article as $a)
                    <tr>
                        <td class="w-1/12 text-center border-b border-[#727272] border-opacity-50 py-3">{{$loop->iteration}}</td>
                        <td class="w-6/12 capitalize border-b border-[#727272] border-opacity-50">{{$a->judul_artikel}}</td>
                        <td class="w-2/12 capitalize border-b border-[#727272] border-opacity-50">{{$a->name}}</td>
                        <td class="w-3/12 border-b text-white capitalize border-[#727272] border-opacity-50 text-center">
                            <a href="{{url('')}}/{{Auth::user()->type}}/{{$a->id}}/artikel"><span class="bg-blue-600 px-10 rounded-2xl font-bold py-1">{{$a->status}}</span></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection