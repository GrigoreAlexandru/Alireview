@extends('layouts.master')
@section('title', 'item')
@section('content')
    <div id="msg">
    </div>
    <a href="{{ url('/items') }}" class="btn btn-default" style="margin-right: 2rem;">Go Back</a>
    <div class="row " style="background-color: #fff;padding: 2rem ;    box-shadow: 0 2px 2px 0 rgba(0,0,0,0.16), 0 0 0 1px rgba(0,0,0,0.08);margin-top:2rem;">
        <div class="col-md-12">
            <h3><a href="{!! $item->url !!}">{!! $item->itemTitle !!}</a></h3>
            <hr>
        </div>
        <div class="col-md-6" >
            <div class="col-md-1 col-sm-2 col-xs-2" style="display: flex;align-items: center;text-align: center;">
                <div class="btn-group-vertical vcenter" role="group" aria-label="...">
                    <button class="btn btn-default" type="button" id="like"><span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span></button>
                    <h4 id="likes">
                        {{$item->likes}}
                        <h4>
                            <button class="btn btn-default" type="button" id="dislike"><span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></button>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6" >

                <img src="{!! $item->itemPicture !!}" style="max-width: 500px;">
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <hr>
                <h4>{!! $item->itemRating !!}</h4>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
            <br>
            {!! $item->itemSpecifics !!}
        </div>
    </div>
    <hr style="border-top:1px solid #dbdbdb;margin:3rem 0;">
    <div class="row" style="background-color: #fff;padding: 2rem;box-shadow: 0 2px 3px rgba(10, 10, 10, 0.1), 0 0 0 1px rgba(10, 10, 10, 0.1);">
        <div class="col-md-12">
            <h3>Review</h3>
            <div class="well">
                <div class="row">
                    <p>{!!$item->review!!}</p>
                </div>
            </div>
            <small>by {{$item->user->name ?? 'Anonymous'}} </small>
        </div>
        <div id="disqus_thread"></div>
        <script>
            /**
             *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
             *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

            (function() { // DON'T EDIT BELOW THIS LINE
                var d = document, s = d.createElement('script');
                s.src = 'https://chinkshit-ga.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
            })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    </div>
@endsection