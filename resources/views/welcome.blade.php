@extends('layouts.home-layout')

@section('content')
    <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-12 mx-auto">
                    <h1 class="text-white text-center"> BPSDMP Kominfo Surabaya </h1>

                    <h6 class="text-center">platform for creatives around the world</h6>

                    <form method="get" action="{{ route('welcome') }}" class="custom-form mt-4 pt-2 mb-lg-0 mb-5" role="search">
                        <div class="input-group input-group-lg">
                            <input name="keyword" type="search" class="form-control" id="keyword" placeholder="nusantara ..." value="{{ request('keyword') }}">
                            <button type="submit" class="form-control">Search</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </section>


    <section class="explore-section section-padding" id="section_2">
        <div class="container">
            <div class="col-12 text-center">
                <h2 class="mb-4"> Kegiatan Terkini </h2>
            </div>
        </div>

        <div class="container">
            @if(count($kegiatans) > 0)
                @php($counter = 0)
                @foreach($kegiatans as $kegiatan)
                    @if($counter % 3 === 0)
                        <div class="row">
                    @endif
                    <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                        <div class="custom-block bg-white shadow-lg">
                            <div class="d-flex">
                                <div>
                                    <h4 class="mb-2">{{ $kegiatan->title }}</h4>
                                    <p class="mb-0">{{ $kegiatan->description }}</p>
                                </div>
                            </div>
                            <img src="image/{{ $kegiatan->photo }}" class="custom-block-image img-fluid" alt="">
                            <a href="{{ url('/detail/' . $kegiatan->id) }}" class="btn btn-primary mt-3">More Information</a>
                        </div>
                    </div>
                    @if($counter % 3 === 2 || $loop->last)
                        </div>
                    @endif
                    @php($counter++)
                @endforeach
            @else
                <p>No activities found</p>
            @endif
        </div>

    </section>
@endsection