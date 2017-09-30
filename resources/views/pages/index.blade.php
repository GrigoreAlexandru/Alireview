@extends('layouts.master')

@section('title', 'Welcome')


@section('content')
    <div class="container">
        <div class="row" style="background-color: #fff;padding: 2rem;box-shadow: 0 2px 3px rgba(10, 10, 10, 0.1), 0 0 0 1px rgba(10, 10, 10, 0.1);">
            <div class="col-md-12">
                <h1>Welcome</h1>
                <br>
                <h4>AliReview is a website dedicated to indexing products bought from Aliexpress and reviewing them. Buy cheap products from China and check the reviews at AliReview and be sure you know what you're buying.</h4>
                <br>
                <a href="{{url('/items')}}" class="btn btn-default">Start by looking over items  &nbsp;&nbsp;<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
            </div>
        </div>
    </div>
@endsection