@extends('layouts.cms')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <a href="{{route('cms.projects.add', $pageName)}}">add</a>
                        @foreach($projects as $project)
                            <br>
                            <a href="{{route('cms.projects.project', [$pageName, $project->id])}}">{{$project->translation['title']}}</a>
                            -
                            <a href="{{route('cms.projects.edit', [$pageName, $project->id])}}">Edit</a>
                            -
                            <a href="{{route('cms.projects.delete', [$pageName, $project->id])}}">Delete</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection