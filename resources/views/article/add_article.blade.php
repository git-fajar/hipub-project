@extends('layout')
@section('container')

    <div class="h-screen w-full">
        <form action="/store_article" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id_user" id="id_user" value="1">
            <input type="hidden" name="status" id="status" value="dalam proses">

            <table>
                <tr>
                    <td>Judul Artikel</td>
                    <td><input type="text" name="judul_artikel" id="judul_artikel" required></td>
                </tr>
                <tr>
                    <td>Kategori Artikel</td>
                    <td><input type="text" name="kategori_artikel" id="kategori_artikel" required></td>
                </tr>
                <tr>
                    <td>Nama File</td>
                    <td><input type="file" name="nama_file" id="nama_file" required></td>
                </tr>
            </table>
        <input type="submit" value="submit">
        </form>
    </div>
@endsection