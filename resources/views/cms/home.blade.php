@extends('layouts.cms')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">ADMIN Dashboard</div>

                    <div class="panel-body">
                        Welcome {{ Auth::user()->name }}

                        <div class="list-group">
                            <a href="{{route('cms.pages')}}" class="list-group-item list-group-item-action">Edit Pages</a>
                            <a href="{{route('cms.pages.page', 'portfolio')}}" class="list-group-item list-group-item-action">Edit Portfolio</a>
                            <a href="{{route('cms.pages.page', 'bnb')}}" class="list-group-item list-group-item-action">Edit BnB</a>
                            <a href="{{route('cms.pages.page', 'cv')}}" class="list-group-item list-group-item-action">Edit CV</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection