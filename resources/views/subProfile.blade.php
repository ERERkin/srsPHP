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
                <img class="ava" src="{{ asset('/storage/' . $user->profile_link) }}">
            </span>
                <!-- <button class="b1">Редактировать</button> -->
            <h1 class="nick">{{ $name }}</h1>
            <p class="descript">{{ $user->profile_description }}</p>
        </div>
    </div>

    <br>

    <!-- <div class="row">
        <div class="col-md-2 col-xs-6">
            <img class="img-fluid" src="{{ asset('/storage/' . $user->profile_link) }}">
        </div>
        <div class="col-md-9 col-xs-6">
            <label for="task" class="col-sm-3 control-label"> Имя </label>
            <h1>{{ $name }}</h1>
            <label for="task" class="col-sm-3 control-label"> Описание </label>
            <h2>{{ $user->profile_description }}</h2>

        </div>
    </div> -->



    <!-- TODO: Текущие задачи -->
    <!-- Текущие задачи -->
    @if (count($posts) > 0)
        <!-- <div class="panel panel-default"> -->
            <div id="panelofposts">
            <br>
            <div class="panel-heading">
                <h2>Посты</h2>
            </div>

            <!-- <div class="panel-body">
                <table class="table table-striped task-table"> -->
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
                            {{--                                <form action="{{ url('task/'.$task->id) }}" method="POST">--}}
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
