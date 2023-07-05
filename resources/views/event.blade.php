@extends('layouts.master')
@section('page_title', 'Home Page')
@section('style')


@endsection
@section('body')

    <main role="main" class="container">
        <div class="bg-grey p-5">

            <div class="container">
                <div class="row" id="card-container">

                    @foreach ($blogs as $blog)
                        <div class="col-md-4 p-1">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <img class="img-fluid img-thumbnail"
                                        src='{{ env('APP_DOMAIN') . '/storage/' . $blog->image[0] }}'>
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

    </main>



@endsection
