@extends('layouts.cms')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <form action="{{route('cms.clients.add.submit', $pageName)}}" method="post">
                        {{csrf_field()}}
                        {{-- NL input --}}
                        <div class="form-group">
                            <label>Naam NL</label>
                            <input type="text" name="name-nl" title="name-nl" class="form-control">
                        </div>
                        {{-- EN input --}}
                        <div class="form-group">
                            <label>Naam EN</label>
                            <input type="text" name="name-en" title="name-en" class="form-control">
                        </div>

                        {{-- URL --}}
                        <div class="form-group">
                            <label>Url</label>
                            <input type="url" name="url" title="url" class="form-control">
                        </div>

                        <input type="submit" value="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection