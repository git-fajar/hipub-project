@extends('layout')
@section('container')

<div class="h-screen w-full">

        <input type="hidden" name="id_user" id="id_user" value="1">
        <input type="hidden" name="status" id="status" value="dalam_proses">

        <table>
            <tr>
                <td>Judul Artikel : </td>
                <td>{{$article->judul_artikel}}</td>
            </tr>
            <tr>
                <td>Kategori Artikel : </td>
                <td>{{$article->kategori_artikel}}</td>
            </tr>
            <tr>
                <td>Nama File : </td>
                <td>{{$article->nama_file}}</td>
            </tr>
            <tr>
                <td>Link File</td>
                <td><a href="{{public_path($article->nama_file)}}">Klik  disini</a></td>
            </tr>
        </table>
        <a href="javascript:history.back()">Back</a>
</div>
@endsection