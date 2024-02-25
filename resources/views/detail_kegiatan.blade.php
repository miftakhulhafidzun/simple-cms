@extends('layouts.home-layout')

@section('content')
    <section class="topics-detail-section section-padding mt-5" id="topics-detail">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 m-auto">
                    <div class="custom-block bg-white shadodw-lg">
                        <h3 class="mb-4">{{ $data->title }}</h3>
                        <img src="{{ asset("image") . '/' . $data->photo }}" alt="">
                        <p>
                            {{ $data->description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection