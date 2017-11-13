@extends('layouts.cms')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        client {{$client->id}}
                        @foreach($client['translations'] as $translation)
                            <p>{{$translation->name}}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection