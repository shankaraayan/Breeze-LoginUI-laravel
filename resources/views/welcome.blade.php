@extends('layouts.master')
@section('page_title', 'Home Page')
@section('style')


@endsection
@section('body')

<main>

    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            @foreach ($banners as $banner)
                <div class="carousel-item @php if($banner->id == 1)echo 'active' @endphp">
                    <!-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
                                                                                                                                                            aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"> -->
                    <img src="/storage/{{ $banner->img }}">
                    <!-- </svg> -->

                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1>{{ $banner->heading }}</h1>
                            <p>{{ $banner->content }}</p>
                            @if ($banner->button_text)
                                <p><a class="btn btn-lg btn-primary" href="$banner->link">{{ $banner->button_text }}</a>
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <!-- body Part -->
    <div class="bg-grey p-5">

        <div class="container">
            <div class="row" id="card-container">

                @foreach ($blogs as $blog)
                    <div class="col-md-4 p-1">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <img class="img-fluid img-thumbnail"
                                    src='{{ env('APP_URL') . '/storage/' . $blog->image[0] }}'>
                                <h3 class="card-title mt-2">{{ $blog->title }}</h3>
                                <div class="card-text text-truncate">
                                    {{ $blog->description }}
                                </div>
                            </div>
                            <div class="card-footer">
                                <span class="small-text">
                                    {{ $blog->location }} - {{ date_format($blog->date, 'd-M-Y') }}
                                </span>
                                <button style="clear:both" class="btn btn-default">Read More</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>



    <div class="p-5">
        <div class="container">
            @php $x = 1 @endphp
            @foreach ($BharatKeDham as $dham)
                <div class="row">
                    <div class="col-md-6 p-0 @php if($x == 2) echo 'order-md-2' @endphp">
                        <img src='{{ env('APP_URL') }}/storage/{{ $dham->section[0]['image'] }}'
                            class="img-fluid img-full">
                    </div>
                    <div class="col-md-6 align-self p-5">
                        <h5>{{ $dham->section[0]['title'] }}</h5>
                        <h2>{{ $dham->section[0]['subheading'] }}</h2>
                        <span>{!! $dham->section[0]['content'] !!}</span>
                    </div>
                </div>
                @php $x++; @endphp
            @endforeach

        </div>
    </div>



</main>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var grid = document.getElementById("card-container");
        var masonry = new Masonry(grid, {
            itemSelector: ".col-md-4",
            columnWidth: ".col-md-4",
            // gutter: 16
        });
    });
</script>

@endsection

