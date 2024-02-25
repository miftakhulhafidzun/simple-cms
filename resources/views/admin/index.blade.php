@extends('layouts.app')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Daftar Kegiatan</h1>
            <form action="{{ route('kegiatan.search') }}" method="POST" class="row g-2">
                @csrf
                <div class="col-md-8">
                    <label for="keyword" class="visually-hidden">Search:</label>
                    <input type="text" id="keyword" name="keyword" class="form-control" placeholder="Search">
                </div>
                <div class="col-md-2">
                    <input type="submit" value="Search" name="search" class="btn btn-primary">
                </div>
            </form>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="#" onclick="printPage()" class="btn btn-outline-primary"><i class="fas fa-print"></i> Print</a>
                    <a href="{{ route('kegiatan.create') }}" class="btn btn-outline-success"><i class="fas fa-plus"></i> Tambah Kegiatan</a>
                </div>
            </div>
        </div>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no=1)
                    @foreach ($kegiatans as $kegiatan)
                        <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td>{{ $kegiatan->title }}</td>
                            <td>{{ $kegiatan->description }}</td>
                            <td><img src="{{ asset('image/' . $kegiatan->photo) }}" width="100"></td>
                            <td>
                                <!-- Edit button -->
                                <form action="{{ route('kegiatan.edit', ['kegiatan' => $kegiatan->id]) }}" method="GET">
                                    <input type="hidden" name="id" value="{{ $kegiatan->id }}">
                                    <button type="submit" class="btn btn-success">Edit</button>
                                </form>
                                <!-- Delete button -->
                                <form action="{{ route('kegiatan.destroy', $kegiatan->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    <script>
        function printPage() {
            window.print();
        }
    </script>
@endsection