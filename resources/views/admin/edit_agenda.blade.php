@extends('layout')
@section('container')
    <div class="w-full h-screen p-14">
        <div class="w-full pb-10">
            <div class="w-full rounded-[10px] bg-white p-5">
                <div class="mx-auto max-w-xl text-center">
                    <h2 class="my-2 text-3xl font-extrabold tracking-tight text-slate-900 md:text-3xl">Edit Agenda</h2>
                </div>
                <div class="mx-auto lg:w-full my-6 justify-center">
                    <div class="container lg:w-[75%] md:w-full sm:w-full mt-4 mb-6">
                        <form action="{{url('')}}/{{Auth::user()->type.'/'.$agenda->id}}/update_agenda" method="POST">
                            @method('put')
                            @csrf
                            <div class="flex flex-warp">
                                <div class="w-[25%] self-center text-md font-bold">Judul</div>
                                <div class="w-[4%] self-center text-md font-bold">:</div>
                                <input class="w-[71%] border border-cyan-400 focus:outline-cyan-400 bg-white placeholder-slate-600 px-2 py-2 rounded-md" name="title" type="text" placeholder="Masukkan Judul Agenda" value="{{$agenda->title}}" required>
                            </div>
                            <div class="flex flex-warp mt-4">
                                <div class="w-[25%] self-center text-md font-bold">Tanggal Mulai</div>
                                <div class="w-[4%] self-center text-md font-bold">:</div>
                                <input class="w-[71%] border border-cyan-400 focus:outline-cyan-400 bg-white placeholder-slate-600 px-2 py-2 rounded-md" name="start" type="date" placeholder="Masukkan Tanggal Mulai" value="{{date('Y-m-d', strtotime($agenda->start))}}" required>
                            </div>
                            <div class="flex flex-warp mt-4">
                                <div class="w-[25%] self-center text-md font-bold">Tanggal Akhir</div>
                                <div class="w-[4%] self-center text-md font-bold">:</div>
                                <input class="w-[71%] border border-cyan-400 focus:outline-cyan-400 bg-white placeholder-slate-600 px-2 py-2 rounded-md" name="end" type="date" placeholder="Masukkan Tanggal Berakhir" value="{{date('Y-m-d', strtotime($agenda->end))}}" required>
                            </div>
                            <div class="flex flex-warp mt-4">
                                <div class="w-[25%] pt-2 text-md font-bold">Deskripsi Kegiatan</div>
                                <div class="w-[4%] pt-2 text-md font-bold">:</div>
                                <textarea class="w-[71%] border border-cyan-400 focus:outline-cyan-400 bg-white placeholder-slate-600 px-2 py-2 rounded-md" name="desc" type="text" placeholder="Masukkan Deskripsi Kegiatan" required>{{$agenda->desc}}</textarea>
                            </div>
                            <div class="flex flex-warp mt-4">
                                <div class="w-[25%] self-center text-md font-bold">Jenis Kegiatan</div>
                                <div class="w-[4%] self-center text-md font-bold">:</div>
                                <div class="mb-[0.125rem] mr-4 inline-block min-h-[1.5rem] pl-[1.5rem]"></div>
                                <div class="flex">
                                    <input {{($agenda->tipe == 'offline')?'checked':''}} class="relative float-left mt-0.5 -ml-[1.5rem] h-5 w-5 appearance" name="tipe" type="radio" id="offline" value="offline"/>
                                    <label class="mt-px inline-block pl-[0.15rem] hover:cursor-pointer" for="offline">Offline</label>
                                </div>
                                <div class="pl-8">
                                    <input {{($agenda->tipe == 'online')?'checked':''}} class="float-left mt-0.5 mr-1 -ml-[1.5rem] h-5 w-5 appearance" name="tipe" type="radio" id="online" value="online"/>
                                    <label class="mt-px inline-block pl-[0.15rem] hover:cursor-pointer" for="online">Online</label>
                                </div>
                            </div>
                            <div class="flex flex-warp mt-4">
                                <div class="w-[25%] self-center text-md font-bold">Link/Alamat</div>
                                <div class="w-[4%] self-center text-md font-bold">:</div>
                                <input class="w-[71%] border border-cyan-400 focus:outline-cyan-400 bg-white placeholder-slate-600 px-2 py-2 rounded-md" name="link" type="text" value="{{$agenda->link}}" placeholder="Masukkan Alamat" required>
                            </div>
                            <div class="mt-6 flex flex-shrink items-center justify-between">
                                <a href="{{url('')}}/{{Auth::user()->type}}/klinik" type="button" class="inline-block rounded bg-indigo-100 px-5 py-2.5 mr-2 mb-2 text-xs font-medium uppercase leading-normal text-cyan-400 transition duration-150 ease-in-out hover:bg-cyan-400 hover:text-white">Batal</a>
                                <button class="text-white text-right bg-cyan-400 hover:bg-cyan-600 focus:ring-4 focus:ring-purple-300 font-medium rounded-md text-sm px-5 py-2.5 mb-2 focus:outline-none" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection