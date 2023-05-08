@extends('layout')
@section('container')
<div class="h-auto w-full pt-10 px-10">
    <div class="flex flex-col space-y-8 mb-10">
        <div class="w-full py-2 px-10 flex justify-between rounded-xl bg-white">
            <div class="flex space-x-4">
                <div class=" w-10 h-10 p-2 my-auto rounded-full bg-pink-400 text-white">
                    <i class="bx bx-user bx-sm"></i>
                </div>
                <div class=" flex flex-col">                    
                    <h1 class="font-bold capitalize">{{$article[0]->name}}</h1>
                    <h2 class=" text-sm">{{$article[0]->email}}</h2>

                </div>
            </div>
        </div>
        <form action="{{url('')}}/editor/{{$article[0]->id}}/save" method="POST" class="flex flex-col" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="bg-white px-[77px] py-[30px] text-center rounded-xl">
                <h2 class=" text-xl capitalize">Judul Artikel</h2>
                <h1 class=" mt-8 font-bold text-xl capitalize">{{$article[0]->judul_artikel}}</h1>
                <div class="mt-10 flex flex-warp justify-center space-x-6">
                    <div>
                        <a href="{{asset('article_files/'.$article[0]->nama_file)}}" target="_blank"><button type="button" class="font-bold text-white w-[200px] text-center bg-red-600 hover:bg-red-700 py-2 rounded-lg capitalize">Download Artikel</button></a>
                    </div>
                    <div>
                        <a href="{{asset('payment_files/'.$article[0]->file_bukti)}}" target="_blank"><button type="button" class="font-bold text-white w-[200px] text-center bg-sky-600 hover:bg-blue-700 py-2 rounded-lg capitalize">Bukti Pembayaran</button></a>
                    </div>
                    <div class="flex">
                        {{-- <label for="status" class="font-bold text-white bg-blue-500 px-20 py-2 rounded-[10px] capitalize">pilih status</label> --}}
                        <select name="status" class="py-2 w-[200px] text-center rounded-lg capitalize bg-orange-500 hover:bg-orange-700 text-white font-semibold appearance-none cursor-pointer" required>
                            <option selected disabled class="capitalize">pilih status</option>
                            <option {{($article[0]->status == 'Revisi (E)')?'selected':'';}} class="capitalize" value="Revisi (E)">revisi</option>
                            <option {{($article[0]->status == 'Verifikasi (E)')?'selected':'';}} class="capitalize" value="Verifikasi (E)">Proofreading</option>

                        </select>
                    </div>     
                </div>
            </div>
            <div class="bg-white w-full px-10 py-8 mt-8 h-96 rounded-xl">
                <h1 class="text-xl font-bold capitalize">komentar :</h1>
                <hr class="h-1 mt-2 mb-2">
                <div class="mt-4 overflow-auto scrollbar-hide">
                    <textarea class="w-full p-2 h-[100px] border border-cyan-400 bg-white text-md rounded-md" placeholder="Ketikkan Komentar" name="komentar_editor" id="" type="text">{{$article[0]->komentar_editor}}</textarea>
                </div>
                <hr class="h-1 my-4">
                <div class="mt-2">
                    <h1 class="text-xl font-bold capitalize">Upload File Revisi :</h1>
                    <hr class="h-1 mt-2 mb-2">
                    <div class="mt-2 w-full border border-cyan-400 rounded-md overflow-auto cursor-pointer text-center">
                        <input type="file" class="py-4 w-[280px] cursor-pointer" name="file_revisi">
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button class="mt-8 font-bold text-white w-[200px] text-center bg-cyan-400 hover:bg-cyan-600 py-2 rounded-lg capitalize">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection


