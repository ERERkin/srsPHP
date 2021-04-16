<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')

@extends('layouts.view_profile_css')

@section('content')

    <!-- Bootstrap шаблон... -->

    {{--    <div class="panel-body">--}}
    {{--        <!-- Отображение ошибок проверки ввода -->--}}
    {{--    @include('common.errors')--}}

    {{--    <!-- Форма новой задачи -->--}}
    {{--        <form action="{{ url('task') }}" method="POST" class="form-horizontal">--}}
    {{--        {{ csrf_field() }}--}}

    {{--        <!-- Имя задачи -->--}}
    {{--            <div class="form-group">--}}
    {{--                <label for="task" class="col-sm-3 control-label">Задача</label>--}}

    {{--                <div class="col-sm-6">--}}
    {{--                    <input type="text" name="name" id="task-name" class="form-control">--}}
    {{--                </div>--}}
    {{--            </div>--}}

    {{--            <!-- Кнопка добавления задачи -->--}}
    {{--            <div class="form-group">--}}
    {{--                <div class="col-sm-offset-3 col-sm-6">--}}
    {{--                    <button type="submit" class="btn btn-default">--}}
    {{--                        <i class="fa fa-plus"></i> Добавить задачу--}}
    {{--                    </button>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </form>--}}
    {{--    </div>--}}

    <div id="wrapper">
        <div id="header">
            <span class="circle-image">
                <img class="ava" src="{{ asset('/storage/' . $me->profile_link) }}">
            </span>
                <!-- <button class="b1">Редактировать</button> -->
            <h1 class="nick">{{ Auth::user()->name }}</h1>
            <a type="button" class="b1" href="{{ url('/myProfileEdit') }}">Редактировать</a>
            <p class="descript">{{ $me->profile_description }}</p>
        </div>
    </div>

    <br>

    <!-- <div class="row">
        <div class="col-md-2 col-xs-6">
            <img class="img-fluid" src="{{ asset('/storage/' . $me->profile_link) }}">
        </div>
        <div class="col-md-9 col-xs-6">
            <label for="task" class="col-sm-3 control-label"> Имя </label>
            <h1>{{ Auth::user()->name }}</h1>
            <label for="task" class="col-sm-3 control-label"> Описание </label>
            <h2>{{ $me->profile_description }}</h2>
        </div>
    </div> -->

{{--    <div class="panel-body">--}}
{{--        <!-- Отображение ошибок проверки ввода -->--}}
{{--    @include('common.errors')--}}

{{--    <!-- Форма новой задачи -->--}}
{{--        <form action="{{ url('post') }}" method="POST" class="form-horizontal">--}}
{{--        {{ csrf_field() }}--}}

{{--        <!-- Имя задачи -->--}}
{{--            <div class="form-group">--}}
{{--                <label for="task" class="col-sm-3 control-label">Тема</label>--}}

{{--                <div class="col-sm-6">--}}
{{--                    <input type="text" name="name" id="task-name" class="form-control">--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="form-group">--}}
{{--                <label for="task" class="col-sm-3 control-label">Текст</label>--}}

{{--                <div class="col-sm-6">--}}
{{--                    <input type="text" name="text" id="task-name" class="form-control">--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- Кнопка добавления задачи -->--}}
{{--            <div class="form-group">--}}
{{--                <div class="col-sm-offset-3 col-sm-6">--}}
{{--                    <button type="submit" class="btn btn-default">--}}
{{--                        <i class="fa fa-plus"></i> Опубликовать--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}

    <!-- TODO: Текущие задачи -->
    <!-- Текущие задачи -->
    @if (count($posts) > 0)
        <!--<div class="panel panel-default">-->
        <div id="panelofposts">
            <br>
            <div class="panel-heading">
                <h2>Мои посты</h2>
            </div>

            <!-- <div class="panel-body"> -->
            <div class="posts">
                <table class="userposts">

                    <!-- Заголовок таблицы -->
                    <thead>
                    <th class="th1">Тема</th>
                    <th class="th1">Текст</th>
                    </thead>

                    <!-- Тело таблицы -->
                    <tbody>
                    @foreach ($posts as $post)
                        <tr class="tr1">
                            <!-- Имя задачи -->
                            <td class="td1">
                                <div>{{ $post->post_name }}</div>
                            </td>

                            <td class="td1">
                                <div>{{ $post->post_text }}</div>
                            </td>

                            <!-- Кнопка Удалить -->
{{--                            <td>--}}
{{--                                <form action="{{ url('post/'.$post->post_id) }}" method="POST">--}}
{{--                                    {{ csrf_field() }}--}}
{{--                                    {{ method_field('DELETE') }}--}}

{{--                                    <button type="submit" class="btn btn-danger">--}}
{{--                                        <i class="fa fa-trash"></i> Удалить--}}
{{--                                    </button>--}}
{{--                                </form>--}}
{{--                            </td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
