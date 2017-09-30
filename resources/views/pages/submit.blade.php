@extends('layouts.master')

@section('title', 'Submit item')

@section('content')
    <h1>Submit new item</h1>

    <form method="POST" action="{{action('ItemController@store')}}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="url">Aliexpress url</label>
            <input type="url" class="form-control" id="url" name="url">

        </div>

        <div class="form-group">
            <label for="review">Your review</label>
            <textarea class="form-control" id="review" rows="3" name="review"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection