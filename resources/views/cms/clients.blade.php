@extends('layouts.cms')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        clients - <a href="{{route('cms.clients.add', $pageName)}}">add</a>
                        @foreach($clients as $client)
                            <br>
                            <a href="{{route('cms.clients.client', [$pageName, $client->id])}}">{{$client->translation['name']}}</a>
                            -
                            <a href="{{route('cms.clients.edit', [$pageName, $client->id])}}">Edit</a>
                            -
                            <a href="{{route('cms.clients.delete', [$pageName, $client->id])}}">delete</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection