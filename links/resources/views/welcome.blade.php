@extends('layouts.app')

@section('content')

    <div class="container">
        @if(Auth::check())
            <h2>Links List</h2>
            <a href="/submit" class="btn btn-primary">Add new link</a>

            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Url</th>
                        <th colspan="2">Description</th>
                    </tr>
                </thead>

                <tbody>@foreach($links as $link)
                    <tr>
                        <td>{{$link->title}}</td>
                        <td>{{$link->url}}</td>
                        <td>{{$link->description}}</td>
                        <td style='white-space: nowrap'>
                            <form action="/link/{{$link->id}}">
                                <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                                <button type="submit" name="delete" class="btn btn-danger" formmethod="post">Delete</button>
                                {{csrf_field()}}
                            </form>
                        </td>
                    </tr>
                        @endforeach
                </tbody>

            </table>
        @else
            <h3>You need to log in. <a href="/login">Click here to login</a></h3>
        @endif
    </div>
@endsection
