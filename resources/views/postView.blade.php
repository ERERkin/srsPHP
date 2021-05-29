<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')

@extends('layouts.post_view_css')

@section('content')


<body id="body1">

<div id="wrapper">
    <div>
        <br>
        <h1>{{ $post->post_name }}</h1>
        <br>
    </div>

    <div>
        <br>
        <h2>{{ $post->post_text }}</h2>
        <br>
    </div>
<!-- </div> -->

    <br>
    {{ $post->post_likes_count }}
    <a href="{{ url('like/' . $post->post_id) }}" type="button" class="like1"><img src="{{ asset('/storage/whitelike.png') }}">⠀⠀⠀Нравится</a>

    <br>
    <br>
    <br>
    <h1>Комментарии</h1>
    <br>

    <!-- TODO: Текущие задачи -->
    <!-- Текущие задачи -->
    @if (count($comments) > 0)
        <!--<div class="panel panel-default">-->
        @foreach ($comments as $comment)
            <div class="com1">
                <img class="ava" src="{{ asset('/storage/' . $comment->profile_link) }}">
                <h3 class="nick">{{ $comment->name }}</h3>
                <h5 class="comdate">{{ $comment->created_at }}</h5>
                <h4 class="comtext">{{ $comment->comment_text }}</h4>
                <form action="{{ url('comment/'.$comment->comment_id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button type="submit" class="b1">Удалить</button>
                </form>
                <br>
            </div>
        @endforeach
    @endif
    <br>
    <form action="{{ url('comment/'. $post->post_id) }}" method="POST" class="form-horizontal">
    {{ csrf_field() }}

    <!-- Имя задачи -->
        <div class="form-group">
            <div class="col-sm-6">
                <input type="text" name="text" id="task-name" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Добавить
                </button>
            </div>
        </div>
    </form>
</div>

</body>

@endsection
