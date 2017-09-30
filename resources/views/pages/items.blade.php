@extends('layouts.master')

@section('title', 'Submit item')

@section('content')
    <h1>Items</h1>
    @if(count($items) > 0)
        @foreach($items as $item)
            <div class="well" style="background-color: white;box-shadow: 0 2px 2px 0 rgba(0,0,0,0.16), 0 0 0 1px rgba(0,0,0,0.08);">
                <div class="row">
                    <div class="col-md-3 col-sm-4">
                        <img src="{!! $item->itemPicture !!}" style="max-width: 20.5rem; max-height: 20.5rem;">
                    </div>
                    <div class="col-md-9 col-sm-8">
                        <h3><a href="items/{{$item->id}}">{{$item->itemTitle}}</a></h3>
                        <p>{{$item->likes}} Votes</p>
                        <small>by {{$item->user->name ?? 'Anonymous'}} </small>
                    </div>

                </div>
            </div>
        @endforeach

            {{$items->links()}}
        @else
            <p>No posts found</p>
        @endif
@endsection

