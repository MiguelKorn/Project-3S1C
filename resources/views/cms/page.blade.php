@extends('layouts.cms')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {{$page->name}}
                        @switch($page->name)
                            @case('portfolio')
                            <br>
                            <a href="{{route('cms.pages.tabs', $page->name)}}">tab</a>
                            <br>
                            <a href="{{route('cms.projects', $page->name)}}">projects</a>
                            <br>
                            <a href="{{route('cms.clients', $page->name)}}">clients</a>
                            @break;
                            @case('bnb')
                            {{-- bnb --}}
                            @break;
                            @case('cv')
                            {{-- cv --}}
                            @break;
                        @endswitch
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection