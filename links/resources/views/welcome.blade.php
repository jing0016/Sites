@extends('layouts.app')

@section('content')

    <div class="container">
        @if(Auth::check())
            <h2>Links List</h2>
            <a href="/link" class="btn btn-primary">Add new link</a>

            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Url</th>
                        <th>Description</th>
                    </tr>
                </thead>

                <tbody>@foreach($user->links as $link)
                    <tr>
                        <td>{{$link->title}}</td>
                        <td>{{$link->url}}</td>
                        <td>{{$link->description}}</td>
                        <td>
                            <form action=""></form>
                        </td>
                    </tr>
                </tbody>
            </table>
    </div>
