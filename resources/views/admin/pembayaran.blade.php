@extends('layout')
@section('container')
       
    <div class="w-full h-screen pt-20 px-28">
        
        <div class="container text-center">
            <h1 class="text-2xl font-bold">Konfirmasi Pembayaran</h1>
        </div>
        <div class="mt-10 px-14 py-[100px] bg-white rounded-xl text-xl text-center">
            <p>
                Lakukan pembayaran sebesar Rp. 5.000.567 ke rekening berikut a.n HiPub untuk proses publikasi
                xxxx-xxxxxxxxxxxxx (BRI)
            </p>
        </div>
        <form action="{{url('')}}/{{Auth::user()->type}}/{{$article->id}}/submit_payment" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex mt-5">
                <div class=" w-5/6 rounded-l-2xl bg-white p-5 truncate" id="fileName">
                    Upload Bukti Pembayaran (.jpg)
                </div>
                <label class="w-1/4 p-5 capitalize rounded-r-lg text-center cursor-pointer bg-cyan-400 text-white justify-center hover:bg-cyan-600" for="file">
                    <i class="self-center bx bx-cloud-upload pr-1"></i>
                    browse
                </label>
                <input class="hidden" id="file" name="file_bukti" type="file" onchange="ganti()" accept="image/*">
            </div>
            <div>
                <button class="capitalize mt-10 py-4 px-6 w-60 float-right bg-cyan-400 rounded-lg text-white font-bold text-xl hover:bg-cyan-600" type="submit">kirim</button>
            </div>
        </form>
    </div>
    <script>
        function ganti(){
            var file_output =  document.getElementById('fileName');
            var file_name = document.getElementById('file');
            file_output.innerHTML = file_name.value;
        }
    </script>
@endsection