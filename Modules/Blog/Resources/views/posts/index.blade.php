@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Posts Management</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Post</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($posts as $key => $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->content }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('posts.show',$post->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', $post->id],'style'=>'display:inline', 'onsubmit' => 'return confirm("Do you really want to delete this item?");']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>


    {!! $posts->render() !!}


@endsection
