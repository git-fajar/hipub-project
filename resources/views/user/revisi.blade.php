@extends('layout')
@section('container')
    <div class="w-full h-screen bg-cover flex items-center justify-center bg-teal-50 pt-2">
        <div class="w-[570px] pb-14 rounded-[20px] bg-white shadow-lg">
            <div class="container pt-6 pl-7">
                <a href="{{url('')}}/{{Auth::user()->type}}/artikel" class="bx bx-arrow-back bx-sm text-cyan-400" title="Kembali"></a>
            </div>
            <div class="container px-[60px] pt-2">
                <div class="container">
                    <h1 class="mt-2 font-bold text-3xl text-center capitalize tracking-wide text-cyan-400">upload revisi</h1>
                </div>
                @if($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first('message') }}
                    </div>
                @endif
                <form action="{{url('')}}/{{Auth::user()->type}}/{{$article->id}}/{{$link_form}}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <input type="hidden" name="id_user" id="id_user" value="{{Auth::user()->id}}">
                    <input type="hidden" name="status" id="status" value="{{$status_value}}">
                    <div class="flex flex-col space-y-5">
                        <input class="w-full mt-[30px] border border-cyan-400 focus:outline-cyan-400 bg-white placeholder-slate-600 pl-5 py-2 rounded-md" type="text" name="judul_artikel" placeholder="Judul Artikel" value="{{$article->judul_artikel}}">
                        <select class="capitalize w-full mt-[30px] border border-cyan-400 focus:outline-cyan-400 bg-white placeholder-slate-600 pl-5 py-2 rounded-md cursor-pointer" name="kategori_artikel" id="" required>
                            <option disabled selected class="capitalize ">pilih kategori</option>
                            <option {{($article->kategori_artikel == 'teknologi')?'selected':'';}} class="capitalize " value="teknologi">teknologi</option>
                            <option {{($article->kategori_artikel == 'kesehatan')?'selected':'';}} class="capitalize " value="kesehatan">kesehatan</option>
                            <option {{($article->kategori_artikel == 'ekonomi')?'selected':'';}} class="capitalize " value="ekonomi">ekonomi</option>
                            <option {{($article->kategori_artikel == 'umum')?'selected':'';}} class="capitalize " value="umum">umum</option>
                        </select>
                        {{-- <div class="flex">
                                Input File sementara 
                            <input type="file" name="nama_file" id="nama_file" required>
                        </div> --}}
                        <div class="flex">
                            <div class="w-3/4 border border-r-0 border-cyan-400 focus:outline-cyan-400 self-center rounded-l-md bg-white px-5 py-2 truncate" id="fileName">
                                {{$article->nama_file}}
                            </div>
                            <label class="flex w-1/4 p-2 text-center capitalize rounded-r-md bg-cyan-400 hover:bg-cyan-600 justify-center text-white cursor-pointer" for="file">
                                <i class="self-center bx bx-cloud-upload pr-1"></i>
                                browse
                            </label>
                            <input class="hidden" id="file" clas name="nama_file" type="file"  onchange="ganti()">
                        </div>
                        <hr class="h-1 mt-2 mb-2">
                        <button class="capitalize py-4 px-12 bg-cyan-400 rounded-xl text-white font-bold text-xl hover:bg-cyan-600" type="submit">Revisi artikel</button>
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
        setTimeout(function() {
            $('.alert').fadeOut('fast');
        }, 5000);
    </script>
    
@endsection