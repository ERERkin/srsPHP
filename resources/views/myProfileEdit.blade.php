<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap шаблон... -->

    <div class="panel-body">
        <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')
    <!-- Форма новой задачи -->

        <form action="{{ route('image.upload') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
            {{ csrf_field() }}
            <div>
                <input type="file" name="photo">
            </div>


            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Введите описание</label>

                <div class="col-sm-6">
                    <input type="text" name="text" id="task-name" class="form-control">
                </div>
            </div>


            <!-- Кнопка добавления задачи -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Изменить
                    </button>
                </div>
            </div>
        </form>

        {{--        <form action="{{ url('search') }}" method="POST" class="form-horizontal">--}}
        {{--        {{ csrf_field() }}--}}

        {{--        <!-- Имя задачи -->--}}
        {{--            <div class="form-group">--}}
        {{--                <label for="task" class="col-sm-3 control-label">Введите ник</label>--}}

        {{--                <div class="col-sm-6">--}}
        {{--                    <input type="text" name="description" id="task-name" class="form-control">--}}
        {{--                </div>--}}
        {{--            </div>--}}


        {{--            <!-- Кнопка добавления задачи -->--}}
        {{--            <div class="form-group">--}}
        {{--                <div class="col-sm-offset-3 col-sm-6">--}}
        {{--                    <button type="submit" class="btn btn-default">--}}
        {{--                        <i class="fa fa-plus"></i> Поиск--}}
        {{--                    </button>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </form>--}}
        {{--    </div>--}}

        <div class="panel panel-default">
            <div class="panel-body">
                <a href="{{ url('/myProfile') }}"
                   class="list-group-item list-group-item-action text-center">Мой профиль</a>
            </div>
        </div>


        @isset($me)
            <div class="row">

                <div class="col-md-2 col-xs-6">
                    <img class="img-fluid" src="{{ asset('/storage/' . $me->profile_link) }}">
                </div>
                <div class="col-md-9 col-xs-6">
                    <label for="task" class="col-sm-3 control-label"> Имя </label>
                    <h1>{{ Auth::user()->name }}</h1>
                    <label for="task" class="col-sm-3 control-label"> Описание </label>
                    <h2>{{ $me->profile_description }}</h2>
                </div>
            </div>
        @endisset

    {{--    @if($me->profile_link != null)--}}
    {{--        <div>--}}
    {{--            <img width="300px" height="400px" src="{{ asset('/storage/' . $me->profile_link) }}">--}}
    {{--        </div>--}}

    {{--    @endif--}}
    {{--    @if($me->profile_description != null)--}}
    {{--        <div>--}}
    {{--            <img width="300px" height="400px" src="{{ asset('/storage/' . $task->name) }}">--}}
    {{--            <div width="300px" height="400px">--}}
    {{--                <p>{{ Auth::user()->name }}</p>--}}
    {{--                <p>{{ $me->profile_description }}</p>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    @endif--}}
@endsection
