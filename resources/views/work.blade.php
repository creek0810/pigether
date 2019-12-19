@extends('layouts.master')

@section('title', "作品")

@section('header')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/work.css') }}" >
    <script src="https://kit.fontawesome.com/ecddf4d37d.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/work.js') }}"></script>
@endsection

@section('content')
<div class="row padding-10">
    <div class="col work-container">
        <div>
            <h3 class="btn div-green">作品</h3>
        </div>
        <div>
            <h4>
                題目: {{ $work['title'] }}
            </h4>
        </div>
        <div>
            <h4>
                內容:
            </h4>
            <h5>
                {!! $work['content'] !!}
            </h5>
        </div>
        <div class="row img-container">
            <div class="col align-self-center">
                <div id="carouselExampleIndicators" class="carousel slide h-100" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @for($i = 0; $i < count($work['images']); $i++)
                            @if($i == 0)
                                <li data-target="#carouselExampleIndicators" data-slide-to="$i" class="active"></li>
                            @else
                                <li data-target="#carouselExampleIndicators" data-slide-to="$i"></li>
                            @endif
                        @endfor
                    </ol>
                    <div class="carousel-inner h-100">
                        @for($i = 0; $i < count($work['images']); $i++)
                            @if($i == 0)
                                <div class="carousel-item active h-100 w-100">
                                    <img class="d-block mh-100 mw-100" src="data:image/jpeg;base64,{{ $work['images'][$i]['image'] }}">
                                </div>
                            @else
                                <div class="carousel-item h-100 w-100">
                                    <img class="d-block mh-100 mw-100" src="data:image/jpeg;base64,{{ $work['images'][$i]['image'] }}">
                                </div>
                            @endif
                        @endfor
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection