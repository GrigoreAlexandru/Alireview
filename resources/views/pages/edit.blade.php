@extends('layouts.master')

@section('title', 'Submit item')

@section('content')
    <h1>Edit item</h1>

    <form method="POST" action="{{action('ItemController@update', $item->id)}}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" placeholder="Item title" name="title" value="{{$item->title}}">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" placeholder="Item Price in usd" name="price" value="{{$item->price}}">
        </div>
        <div class="form-group">
            <label for="buyDate">Buy date</label>
            <input type="date" class="form-control" id="buyDate" name="buyDate" value="{{$item->buyDate}}">
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category" >
                <option>{{$item->category}}</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" rows="3" name="description" >{{$item->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="InputFile">Add picture</label>
            <input type="file" class="form-control-file" id="InputFile" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">Less than 2MB</small>
        </div>
        <input name="_method" type="hidden" value="PUT">
        <button type="submit" class="btn btn-primary">Submit edit</button>

    </form>




@endsection