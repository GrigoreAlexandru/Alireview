@extends('layouts.master')

@section('title', 'Submit item')

@section('content')
    <h1>Results</h1>
    @if(count($search) > 0)
        @foreach($search as $item)
            <div class="well">
                <div class="row">
                    <div class="col-md-3">
                        <img src="{!! $item->itemPicture !!}" style="max-width: 20.5rem; max-height: 20.5rem;">
                    </div>
                    <div class="col-md-9">
                        <h3><a href="items/{{$item->id}}">{{$item->itemTitle}}</a></h3>
                        <p>{{$item->likes}} Upvotes</p>
                        <small>by {{$item->user->name ?? 'Anonymous'}} </small>
                    </div>

                </div>
            </div>

        @endforeach

        {{$search->links()}}
    @else
        <p>No items found</p>
    @endif
@endsection

