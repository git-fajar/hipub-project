@extends('layout')
@section('container')
    <div class="w-full h-screen px-14 pt-10 mb-20">
        <div class="w-full rounded-[10px] bg-white px-10 pt-2 pb-6">
            <table class="w-full">
                <thead>
                    <tr class="py-9 border-b-2 border-gray-400">
                        <th class="uppercase w-1/12 text-center font-bold px-3 pt-4 pb-3">no</td>
                        <th class="uppercase w-8/12 text-center font-bold pt-4 pb-3">log publikasi</td>
                        <th class="uppercase w-3/12 text-center font-bold pt-4 pb-3">tanggal</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($log as $l)
                    <tr>
                        <td class="w-1/12 text-center border-b border-gray-300 py-3">{{($log->currentpage()-1) * $log->perpage() + $loop->index + 1 }}</td>
                        <td class="w-8/12 text-center border-b border-gray-300">{{$l->keterangan}}</td>
                        <td class="w-3/12 text-center border-b border-gray-300">{{$l->tanggal}}</td>
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