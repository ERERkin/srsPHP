<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')

@extends('layouts.profileEdit_css')

@section('content')

    <!-- Bootstrap шаблон... -->

    <div class="panel-body">
        <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')
    <!-- Форма новой задачи -->

<body id="body1">

    <div class="form_edit_profile">
        <form action="{{ route('image.upload') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
            {{ csrf_field() }}
            <label for="task" class="col-sm-3 control-label">Выберите фото</label>
            <div>
                <input type="file" name="photo">
            </div>

<br>

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

<br>

        @isset($me)
            <div class="header">
                <!-- <div class="col-md-2 col-xs-6"> -->
                <span class="circle-image">
                    <img class="ava" src="{{ asset('/storage/' . $me->profile_link) }}">
                </span>
                <!-- </div> -->
                <!-- <div class="col-md-9 col-xs-6"> -->
                    <!-- <label for="task" class="col-sm-3 control-label"> Имя </label> -->
                    <h1 class="nick">{{ Auth::user()->name }}</h1>
                    <!-- <label for="task" class="col-sm-3 control-label"> Описание </label> -->
                    <p class="descript">{{ $me->profile_description }}</p>
                <!-- </div> -->
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

    </div>
    
</body>

@endsection
