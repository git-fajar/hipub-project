@extends('layout')
@section('container')

    <div class="h-screen w-full">
        {{-- {{dd($artikel)}} --}}
        <div>
            <a href="/add_article">
                Link Tambah Artikel
            </a>
        </div>
        {{-- <table>
            <tr>
                <th>ID Artikel</th>
                <th>Judul Artikel</th>
                <th>Status</th>
                <th colspan="3">Aksi</th>
            </tr>
            @foreach ($article as $a)
            <tr>
                <td>{{$a->id}}</td>
                <td>{{$a->judul_artikel}}</td>
                <td>{{$a->status}}</td>
                <td><a href="show_article/{{$a->id}}">Show </a></td>
                <td><a href="edit_article/{{$a->id}}">Edit </a></td>
                <form action="hapus_article/{{$a->id}}" method="post">
                @csrf
                @method('delete')
                <td><input type="submit" value="Hapus"></td>
                </form>
            </tr>
            @endforeach
            
        </table> --}}
    </div>
@endsection