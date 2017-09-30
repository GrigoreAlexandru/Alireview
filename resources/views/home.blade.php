@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <h3>Your Items</h3>
                    @if(count($items) > 0)
                        <table class="table table-striped">
                            {{--<tr>--}}
                                {{--<th>Title</th>--}}
                                {{--<th></th>--}}
                                {{--<th></th>--}}
                            {{--</tr>--}}
                            @foreach($items as $item)
                                <tr>
                                    <td><a href="items/{{$item->id}}">{{$item->itemTitle}}</a></td>
                                    {{--<td><a href="{{url('items', $item->id)}}/edit" class="btn btn-default">Edit</a></td>--}}
                                    {{--<td>--}}
                                        {{--{!!Form::open(['action' => ['PostsController@destroy', $item->id], 'method' => 'POST', 'class' => 'pull-right'])!!}--}}
                                        {{--{{Form::hidden('_method', 'DELETE')}}--}}
                                        {{--{{Form::submit('Delete', ['class' => 'btn btn-danger'])}}--}}
                                        {{--{!!Form::close()!!}--}}

                                        {{--<form action="{{action('ItemController@destroy', $item->id)}}" class="pull-right" method="POST">--}}
                                            {{--{{ csrf_field() }}--}}
                                            {{--<input name="_method" type="hidden" value="DELETE">--}}
                                            {{--<button type="submit" class="btn btn-danger">Delete</button>--}}
                                        {{--</form>--}}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>You have no items</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
