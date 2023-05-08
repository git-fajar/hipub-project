@extends('layout')
@section('container')
    <div class="w-full h-screen bg-cover flex items-center justify-center bg-teal-50 pt-2">
        <div class="w-[570px] pb-14 rounded-[20px] bg-white shadow-lg">
            <div class="container pt-6 pl-7">
                <a href="{{url('')}}/{{Auth::user()->type}}/artikel" class="bx bx-arrow-back bx-sm text-cyan-400" title="Kembali"></a>
            </div>
            <div class="container px-[60px] pt-2">
                <div class="container">
                    <h1 class="mt-2 font-bold text-3xl text-center capitalize tracking-wide text-cyan-400">upload artikel</h1>
                </div>
                <form action="/store_article" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id_user" id="id_user" value="{{Auth::user()->id}}">
                    <input type="hidden" name="status" id="status" value="Pembayaran">
                    <div class="flex flex-col space-y-5">
                        <input class="w-full mt-[30px] border border-cyan-400 focus:outline-cyan-400 bg-white placeholder-slate-600 pl-5 py-2 rounded-md" type="text" name="judul_artikel" placeholder="Judul Artikel">
                        <div class="flex capitalize w-full mt-[30px] border border-cyan-400 focus:outline-cyan-400 bg-white placeholder-slate-600 rounded-md cursor-pointer justify-between pr-4">
                            <select class="bg-none rounded-md px-4 py-2 w-full cursor-pointer" name="kategori_artikel" id="">
                                <option class="capitalize " value="">pilih kategori</option>
                                <option class="capitalize " value="teknologi">teknologi</option>
                                <option class="capitalize " value="kesehatan">kesehatan</option>
                                <option class="capitalize " value="ekonomi">ekonomi</option>
                                <option class="capitalize " value="umum">umum</option>
                            </select>
                        </div>
                        {{-- <div class="flex">
                                Input File sementara 
                            <input type="file" name="nama_file" id="nama_file" required>
                        </div> --}}
                        <div class="flex border border-cyan-400 focus:outline-cyan-400 rounded-md">
                            <div class="w-3/4 bg-white px-5 self-center truncate" id="fileName">
                                Unggah File
                            </div>
                            <label class="flex w-1/4 p-2 text-center capitalize rounded-r-md bg-cyan-400 hover:bg-cyan-600 text-white justify-center cursor-pointer" for="file">
                                <i class="self-center bx bx-cloud-upload pr-1"></i>
                                browse
                            </label>
                            <input class="hidden" id="file" name="nama_file" type="file" onchange="ganti()">
                        </div>
                        <hr class="h-1 mt-2 mb-2">
                        <button class="capitalize py-4 px-12 bg-cyan-400 rounded-xl text-white font-bold text-xl hover:bg-cyan-600" type="submit">upload artikel</button>
                    </div>    
                </form>
            </div>
        </div>
    </div>
    <script>
        function ganti(){
            var file_output =  document.getElementById('fileName');
            var file_name = document.getElementById('file');
            file_output.innerHTML = file_name.value;
        }
        
    </script>
@endsection