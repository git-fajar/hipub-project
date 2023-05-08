@extends('layout')
@section('container')
    <div class="w-full h-screen px-16 py-20">
        <div class="w-full rounded-[10px] bg-white px-5 py-5">
            <table class="w-full">
                <thead>
                    <tr>
                        <td class="w-2/12 uppercase font-bold text-2xl text-center border-b-2 border-gray-400 py-3">no</td>
                        <td class="w-8/12 capitalize font-bold text-2xl text-center border-b-2 border-gray-400">Catatan</td>
                        <td class="w-2/12 capitalize font-bold text-2xl text-center border-b-2 border-gray-400">tanggal</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($log as $l)
                    <tr>
                        <td class="w-2/12 text-center border-b border-gray-300 py-3">{{($log->currentpage()-1) * $log->perpage() + $loop->index + 1 }}</td>
                        <td class="w-8/12 text-center border-b border-gray-300">{{$l->keterangan}}</td>
                        <td class="w-2/12 text-center border-b border-gray-300">{{$l->tanggal}}</td>
                    </tr>
                    @endforeach
                    
                   
                </tbody>
            </table>
            <br/>
	{{-- Halaman : {{ $log->currentPage() }} <br/>
	Jumlah Data : {{ $log->total() }} <br/>
	Data Per Halaman : {{ $log->perPage() }} <br/> --}}
 
 
	{{ $log->links() }}
        </div>
    </div>
@endsection