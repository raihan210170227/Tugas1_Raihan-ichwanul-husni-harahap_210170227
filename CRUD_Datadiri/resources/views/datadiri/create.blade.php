@extends('layout.template')
<!-- START FORM -->
@section('konten')

<form action='{{ url('datadiri') }}' method='post'>
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{ url('datadiri') }}' class="btn btn-secondary"><< kembali</a>
        <div class="mb-3 row">
            <label for="nim" class="col-sm-2 col-form-label">NIM</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='nim' value="{{ Session::get('nim')}}" id="nim">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama' value="{{ Session::get('nama')}}" id="nama">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='jurusan' value="{{ Session::get('jurusan')}}" id="jurusan">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="programstudi" class="col-sm-2 col-form-label">Program Studi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='programstudi' value="{{ Session::get ('programstudi')}}" id="programstudi">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="matakuliah" class="col-sm-2 col-form-label">Matakuliah</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='matakuliah' value="{{ Session::get ('matakuliah')}}" id="matakuliah">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    </div>
</form>
@endsection

    <!-- AKHIR FORM -->