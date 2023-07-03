@extends('layouts.master')
@section('page_title', 'Home Page')
@section('style')


@endsection
@section('body')

    <main role="main" class="container">



        <div class="row">
            <div class="col-md-8 blog-main">
                <h3 class="pb-3 mb-4 font-italic border-bottom">
                    Gallery
                </h3>
                <section class="container">
                    <div class="row">

                        @foreach ($gallery as $gallery)
                            {{-- @dd($content['title']); --}}
                            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                                <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
                                    <img src="{{ url('storage/' . $gallery->image) }}" class="w-100" />
                                    <a href="#!" data-mdb-toggle="modal" data-mdb-target="#exampleModal1">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>

            </div>



        </div><!-- /.row -->

    </main>



@endsection
