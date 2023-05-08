<?php 
function bang2($var){
if ($var == 'Menunggu Verifikasi') {
    $v = 'bg-sky-600'; 
}elseif ($var == 'Dalam Proses') {
    $v = 'bg-sky-600'; 
}elseif($var == 'Revisi (E)'){
    $v = 'bg-orange-500';
}elseif ($var == 'Revisi (V)') {
    $v = 'bg-orange-500'; 
}elseif ($var == 'sudah revisi') {
    $v = 'bg-orange-500'; 
}elseif ($var == 'Verifikasi (E)') {
    $v = 'bg-green-500'; 
}elseif ($var == 'Accepted') {
    $v = 'bg-green-500'; 
}elseif ($var == 'Publish') {
    $v = 'bg-red-600'; 
}elseif ($var == 'Pembayaran Ditolak') {
    $v = 'bg-red-600'; 
}elseif ($var == 'Rejected') {
    $v = 'bg-red-600'; 
}elseif ($var == 'Proses') {
    $v = 'bg-sky-600'; 
}elseif ($var == 'Pembayaran') {
    $v = 'bg-sky-600'; 
}elseif ($var == 'Under Review') {
    $v = 'bg-sky-600'; 
}else{
    $v = ''; 
}
return $v;
}
?>
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
        <table class="w-full" id="my-table">
            <thead>
                <tr class="py-9 border-b-2 border-gray-400">
                    <th class="uppercase w-1/12 font-bold px-3 pt-4 pb-3"> no</td>
                    <th class="uppercase w-7/12 font-bold pt-4 pb-3"> judul artikel</td>
                    <th class="uppercase w-1/12 font-bold pt-4 pb-3"> author</td>
                    <th class="uppercase w-3/12 font-bold pt-4 pb-3"> status</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($article as $a)
                <?php 
                $link_status = 'artikel';
                ?>
                <tr>
                    <td class="w-1/12 text-center border-b border-[#727272] border-opacity-50 py-3">{{$loop->iteration}}</td>
                    <td class="w-7/12 capitalize border-b border-[#727272] border-opacity-50">{{$a->judul_artikel}}</td>
                    <td class="w-1/12 capitalize border-b border-[#727272] border-opacity-50">{{$a->name}}</td>
                    <td class="w-3/12 capitalize text-white border-b border-[#727272] border-opacity-50 text-center">
                        <a href="{{url('')}}/{{Auth::user()->type}}/{{$a->id}}/artikel"><span class=" <?= bang2($a->status)?> px-10 rounded-2xl font-bold py-1">{{($a->status == 'Verifikasi (E)')?'Proofreading':$a->status;}}</span></a>
                    </td>
                </tr>
                @endforeach
                {{-- <tr>
                    <td class="w-1/12 text-center border-b border-[#727272] border-opacity-50 py-3">1</td>
                    <td class="w-8/12 capitalize border-b border-[#727272] border-opacity-50">Optimalisasi pola jam tubuh manusia dengan sleep hygiene</td>
                    <td class="w-3/12 border-b text-white capitalize border-[#727272] border-opacity-50 text-center">
                        <button class="bg-green-500 text-white text-center capitalize w-[120px] py-1 rounded-full font-bold">Verifikasi</button>
                    </td>
                </tr>
                <tr>
                    <td class="w-1/12 text-center border-b border-[#727272] border-opacity-50 py-3">1</td>
                    <td class="w-8/12 capitalize border-b border-[#727272] border-opacity-50">Optimalisasi pola jam tubuh manusia dengan sleep hygiene</td>
                    <td class="w-3/12 border-b text-white capitalize border-[#727272] border-opacity-50 text-center">
                        <button class="bg-red-600 text-white text-center capitalize w-[120px] py-1 rounded-full font-bold">Publish</button>
                    </td>
                </tr>
                <tr>
                    <td class="w-1/12 text-center border-b border-[#727272] border-opacity-50 py-3">1</td>
                    <td class="w-8/12 capitalize border-b border-[#727272] border-opacity-50">Optimalisasi pola jam tubuh manusia dengan sleep hygiene</td>
                    <td class="w-3/12 border-b text-white capitalize border-[#727272] border-opacity-50 text-center">
                        <button class="bg-orange-500 text-white text-center capitalize w-[120px] py-1 rounded-full font-bold">Revisi</button>
                    </td>
                </tr>
                <tr>
                    <td class="w-1/12 text-center border-b border-[#727272] border-opacity-50 py-3">1</td>
                    <td class="w-8/12 capitalize border-b border-[#727272] border-opacity-50">Optimalisasi pola jam tubuh manusia dengan sleep hygiene</td>
                    <td class="w-3/12 border-b text-white capitalize border-[#727272] border-opacity-50 text-center">
                        <button class="bg-sky-600 text-white text-center capitalize w-[120px] py-1 rounded-full font-bold">Proses</button>
                    </td>
                </tr> --}}
            </tbody>
        </table>
    </div>
</div>
    
@endsection