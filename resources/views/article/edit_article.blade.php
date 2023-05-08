@extends('layout')
@section('container')

<div class="h-screen w-full">
    <form action="/update_article/{{$article->id}}" method="POST">
        @method('put')
        @csrf
        <input type="hidden" name="id_user" id="id_user" value="1">
        <input type="hidden" name="status" id="status" value="dalam_proses">

        <table>
            <tr>
                <td>Judul Artikel</td>
                <td><input type="text" name="judul_artikel" id="judul_artikel" value="{{$article->judul_artikel}}" required></td>
            </tr>
            <tr>
                <td>Kategori Artikel</td>
                <td><input type="text" name="kategori_artikel" id="kategori_artikel" value="{{$article->kategori_artikel}}" required></td>
            </tr>
            <tr>
                <td>Nama File</td>
                <td><input type="text" name="nama_file" id="nama_file" value="{{$article->nama_file}}" required></td>
            </tr>
        </table>
        <input name="submit" type="submit" value="submit">
    </form>
</div>
@endsection