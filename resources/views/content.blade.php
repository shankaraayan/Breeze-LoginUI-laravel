@extends('layouts.master')
@section('page_title', 'Home Page')
@section('style')
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <style>
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Playfair Display", Georgia, "Times New Roman", serif;
        }
    </style>
@endsection
@section('body')

    <main role="main" class="container">

        <div class="p-3">
        </div>
        <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
            <div class="col-md-8 px-0">
                @php
                    $filteredItems = $about->where(function ($item) {
                        return is_array($item['section']) && in_array('banner', array_column($item['section'], 'title'));
                    });
                @endphp
                <h1 class="display-4 font-italic">{{ $filteredItems[1]['section'][0]['subheading'] }} </h1>
                <p class="lead my-3">{!! $filteredItems[1]['section'][0]['content'] !!}</p>
                <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Join Us</a></p>
            </div>
        </div>

        <div class="p-3">
        </div>

        <div class="row">
            <div class="col-md-8 blog-main">

                {{-- <h3 class="pb-3 mb-4 font-italic border-bottom">
                    About Us
                </h3> --}}
                {{-- @dd($content); --}}
                {{-- @foreach ($content as $section) --}}
                @foreach ($content->section as $content)
                    {{-- @dd($content); --}}
                    <div class="blog-post">
                        <h2 class="blog-post-title">{{ $content['subheading'] }}</h2>

                        <p>
                            {!! $content['content'] !!}
                        </p>
                    </div>
                    {{-- @endforeach --}}
                @endforeach

            </div>



        </div><!-- /.row -->

    </main>



@endsection
