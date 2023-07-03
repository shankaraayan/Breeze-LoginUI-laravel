@extends('layouts.master')
@section('page_title', 'Home Page')
@section('style')


@endsection
@section('body')

    <main role="main" class="container">



        <div class="row">
            <div class="col-md-8 blog-main">
                <h3 class="pb-3 mb-4 font-italic border-bottom">
                    About Us
                </h3>

                @foreach ($about as $section)
                    @foreach ($section->section as $content)
                        {{-- @dd($content['title']); --}}
                        <div class="blog-post">
                            <h2 class="blog-post-title">{{ $content['title'] }}</h2>

                            <p>
                                {{ $content['content'] }}
                            </p>
                        </div>
                    @endforeach
                @endforeach

            </div>



        </div><!-- /.row -->

    </main>



@endsection
