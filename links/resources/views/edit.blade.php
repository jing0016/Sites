@extends('layouts.app')
@section('content')
    <div class="container">

        <h2>Edit the Link</h2>

        <form action="/link/{{$link->id}}" method="post">

            <div class="form-group">
                <label for="title">Title</label>
                <textarea name="title" class="form-control">{{$link->title}}</textarea>
            </div>

            <div class="form-group">
                <label for="url">Url</label>
                <textarea name="url" class="form-control">{{$link->url}}</textarea>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control">{{$link->description}}</textarea>
            </div>

            <div class="form-group">
                <button type="submit" name="update" class="btn btn-primary">Update link</button>
            </div>
            {{csrf_field()}}
        </form>
    </div>
@endsection
