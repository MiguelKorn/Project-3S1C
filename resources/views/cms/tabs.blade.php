@extends('layouts.cms')

@section('content')
    <div>
        edit {{$page->name}} <a href="{{route('cms.home')}}">back</a>
        @foreach($tabs as $tab)
            <p>{{$tab->id}}</p>
            @foreach($tab->translations as $translation)
                <p>{{$translation->name}} {{$translation->locale}}</p>
                <form action="{{route('cms.pages.change', $page->name)}}" method="post">
                    {!! csrf_field() !!}
                    <input type="hidden" name="tab" value="{{$tab->id}}">
                    <input type="hidden" name="lang" value="{{$translation->locale}}">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" value="{{$translation->title}}" class="form-control"
                               placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="desc" class="form-control" cols="30" rows="10"
                                  placeholder="Enter Description">{{$translation->text}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            @endforeach
        @endforeach
    </div>
@endsection