@extends('layouts.app')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Tambah Kegiatan</h1>
        </div>
        <form method="POST" action="{{ route('kegiatan.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="inputTitle" class="form-label">Title</label>
                <input type="text" class="form-control" id="inputTitle" name="title" placeholder="Enter Title">
            </div>
            <div class="mb-3">
                <label for="inputDescription" class="form-label">Description</label>
                <textarea class="form-control" id="inputDescription" name="description" placeholder="Enter Description"></textarea>
            </div>
            <div class="mb-3">
                <label for="inputPhoto" class="form-label">Photo</label>
                <input type="file" class="form-control" id="inputPhoto" name="photo">
            </div>
            <button type="submit" class="btn btn-success">Tambah</button>
            <a href="{{ route('home') }}" type="button" class="btn btn-secondary text-white">Kembali</a>
        </form>
    </main>
@endsection