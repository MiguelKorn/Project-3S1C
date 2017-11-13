@extends('layouts.cms')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        edit {{$pageName}} <a href="{{route('cms.home')}}">back</a>
                        @foreach($tabs as $tab)
                            <p>{{$tab->id}}</p>
                            @foreach($tab->translations as $translation)
                                <p>{{$translation->name}} {{$translation->locale}}</p>
                                <form action="{{route('cms.pages.change', $pageName)}}" method="post">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="tab" value="{{$tab->id}}">
                                    <input type="hidden" name="lang" value="{{$translation->locale}}">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" value="{{$translation->title}}"
                                               class="form-control"
                                               placeholder="Enter Title">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="desc" class="form-control" cols="30" rows="5"
                                                  placeholder="Enter Description">{{$translation->text}}</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection