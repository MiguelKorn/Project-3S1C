@extends('layouts.cms')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <form action="{{route('cms.projects.add.submit', $pageName)}}" method="post">
                        {{csrf_field()}}
                        {{-- NL input --}}
                        <div class="form-group">
                            <label>Title NL</label>
                            <input type="text" name="title-nl" title="title-nl" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Description NL</label>
                            <textarea name="desc-nl" title="desc-nl" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        {{-- EN input --}}
                        <div class="form-group">
                            <label>Title EN</label>
                            <input type="text" name="title-en" title="title-en" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Description EN</label>
                            <textarea name="desc-en" title="desc-en" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>

                        <input type="submit" value="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection