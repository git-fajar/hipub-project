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
                    <h1 class="font-bold capitalize">{{$article[0]->name}} </h1>
                    <h2 class=" text-sm">{{$article[0]->email}}</h2>
                    {{-- {{$coba_data}} --}}
                </div>
            </div>
        </div>
        <div class="bg-white px-[77px] py-[30px] text-center rounded-xl">
            <h2 class="text-xl capitalize">judul artikel</h2>
            <h1 class="mt-8 font-bold text-3xl capitalize">{{$article[0]->judul_artikel}}</h1>
            <div class="mt-10 flex flex-warp justify-center space-x-6">
                <div class="flex">
                    <a href="{{asset('cover_files/'.$article[0]->cover_file)}}" target="_blank"><button type="button" class="font-bold text-white w-[200px] text-center bg-sky-600 hover:bg-blue-700 py-2 rounded-lg capitalize">Download Cover</button></a>
                </div>
                <div class="flex">
                    <a href="{{asset('cv_files/'.$article[0]->cv_file)}}" target="_blank"><button type="button" class="font-bold text-white w-[200px] text-center bg-orange-500 hover:bg-orange-700 py-2 rounded-lg capitalize">Download CV</button></a>
                </div>
                <div class="flex">
                    <a href="{{asset('article_files/'.$article[0]->nama_file)}}" target="_blank"><button type="button" class="font-bold text-white w-[200px] text-center bg-red-600 hover:bg-red-700 py-2 rounded-lg capitalize">Download Artikel</button></a>
                </div>
                <form action="{{url('')}}/{{Auth::user()->type}}/{{$article[0]->id}}/save" method="POST" enctype="multipart/form-data" >
                    @method('put')
                    @csrf
                <div class="flex">
                    <select name="status" class="py-2 w-[200px] text-center rounded-lg capitalize bg-green-500 hover:bg-green-700 text-white font-semibold appearance-none cursor-pointer" required>
                        <option selected disabled class="capitalize">pilih status</option>
                        <option {{($article[0]->status == 'Under Review')?'selected':''}} class="capitalize" value="Under Review">Under Review</option>
                        <option {{($article[0]->status == 'Accepted')?'selected':''}} class="capitalize" value="Accepted">Accepted</option>
                        <option {{($article[0]->status == 'Rejected')?'selected':''}} class="capitalize" value="Rejected">Rejected</option>

                    </select>
                </div> 
            </div>
        </div>
        <div class="bg-white w-full px-10 py-8 mt-8 h-96 rounded-xl">
            <h1 class="text-xl font-bold capitalize">komentar :</h1>
            <hr class="h-1 mt-2 mb-2">
            <div class="mt-4 overflow-auto scrollbar-hide">
                <textarea class="w-full p-2 h-[100px] border border-cyan-400 bg-white text-md rounded-md" type="text" placeholder="Ketikkan Komentar" name="komentar_vendor" id="">{{$article[0]->komentar_vendor}}</textarea>
            </div>
            <hr class="h-1 my-4">
            <div class="mt-2">
                <h1 class="text-xl font-bold capitalize">File LOA :</h1>
                <hr class="h-1 mt-2 mb-2">
                <div class="mt-2 w-full border border-cyan-400 rounded-md overflow-auto cursor-pointer text-center">
                    <input type="file" class="py-4 w-[280px] cursor-pointer" name="loa_file">
                </div>
            </div>
        </div>
        <div class="text-center">
            <button class="mt-2 font-bold text-white w-[200px] text-center bg-cyan-400 hover:bg-cyan-600 py-2 rounded-lg capitalize">Submit</button>
        </div>
    </form>

    </div>
</div>
@endsection
{{-- @extends('layout')
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
            <div>
                <i class='bx bx-comment-dots bx-md mt-1'></i>
            </div>
        </div>
        <form action="{{url('')}}/vendor/{{$article[0]->id}}/save" method="POST" class="flex flex-col space-y-8">
            @method('put')
            @csrf
            <div class="bg-white px-[77px] py-[30px] text-center rounded-xl">
                <h2 class=" text-xl capitalize">Judul Artikel</h2>
                <h1 class=" mt-8 font-bold text-xl capitalize">{{$article[0]->judul_artikel}}</h1>
                <div class="mt-10 flex flex-warp justify-center space-x-6">
                    <div>
                        <a href="{{asset('article_files/'.$article[0]->nama_file)}}" target="_blank"><button type="button" class="font-bold text-white w-[200px] text-center bg-red-600 hover:bg-red-700 py-2 rounded-lg capitalize">Download Artikel</button></a>
                    </div>
                    <div class="flex">
                        <select name="status" class="py-2 w-[200px] text-center rounded-lg capitalize bg-orange-500 hover:bg-orange-700 text-white font-semibold appearance-none cursor-pointer" required>
                            <option selected disabled class="capitalize">pilih status</option>
                            <option class="capitalize" value="Review">Under Review</option>
                            <option class="capitalize" value="Accepted">Accepted</option>
                            <option class="capitalize" value="Rejected">Rejected</option>

                        </select>
                    </div>     
                </div>
            </div>
            <div class="bg-white px-14 py-10 h-96 rounded-xl">
                <h1 class="text-xl capitalize">komentar :</h1>
                <p class="mt-2 h-[260px] overflow-auto scrollbar-hide">
                        <input type="text" value="{{$article[0]->komentar_editor}}" name="komentar_editor" id="" style="border-width: 2px;width: 100%;max-height:250px;" required>
                </p>
            </div>
            <div>
                <button class="float-right font-bold text-white w-[200px] text-center bg-cyan-400 hover:bg-cyan-600 py-2 rounded-lg capitalize">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection --}}

