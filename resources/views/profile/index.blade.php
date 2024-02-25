@extends('layouts.app')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card text-center col-md-6 mt-5">
            <div class="card-header">
                <div class="profile-icon">
                    <i class="fas fa-user-circle fa-5x"></i> <!-- Ganti dengan kelas ikon yang sesuai -->
                </div>
                Admin
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ Auth::user()->name }}</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vestibulum felis in risus consequat, quis tristique odio sagittis. Nam nec tempor neque. Quisque id nisl nec risus fermentum consequat. Integer vehicula, leo id faucibus tristique, est justo pretium mi, sit amet convallis quam odio at ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi vitae lorem eget elit convallis luctus. Aenean non ultricies justo. Donec nec sapien ac turpis ultrices ultricies.</p>
                <a href="{{ route('users.edit', Auth::user()->id) }}" class="btn btn-primary">Edit Profile</a>
            </div>
            <div class="card-footer text-muted">
                <p></p>
            </div>
        </div>
    </main>
@endsection