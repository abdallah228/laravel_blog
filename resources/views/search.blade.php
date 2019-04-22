@extends('layouts.frontend')

@section('single_post')

<!-- start post title -->

<div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">Search : {{$query}}</h1>
    </div>
</div>
<!-- End post Header -->




<!-- Post Details -->


<div class="container">
    <div class="row medium-padding120">
        <main class="main">
            
            <div class="row">
                @if($post->count() > 0)
                <div class="case-item-wrap">
                    @foreach($post as $post)
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="case-item">
                            <div class="case-item__thumb">
                                <img src="{{$post->featured}}" alt="our case">
                            </div>
                            <h6 class="case-item__title"><a href="{{route('single.post',['slug'=>$post->slug])}}">TITLE</a></h6>
                        </div>
                    </div>

                   @endforeach

                </div>
                @else
                    no request here
                    @endif
            </div>
        </main>
    </div>
</div>







<!-- Post Details -->


@endsection

