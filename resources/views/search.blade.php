<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')

@extends('layouts.view_search_css')

@section('content')

    <!-- Bootstrap шаблон... -->

    <div class="panel-body">
        <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')

    <body id="body1">

    <!-- Форма новой задачи -->
        <form action="{{ url('search') }}" method="POST" class="form_add_post">
        {{ csrf_field() }}

        <!-- Имя задачи -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Введите ник</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>

            <!-- Кнопка добавления задачи -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Поиск
                    </button>
                </div>
            </div>
        </form>
    </div>
    @if ($user->id != 0)
        <div class="panel panel-default">
            <!-- Отображение ошибок проверки ввода -->
        @include('common.errors')

        <!-- Форма новой задачи -->
            <form action="{{ url('subs') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Имя задачи -->
                <!-- <div class="form-group">
                    <div class="col-sm-6">
                        <input type="text" name="id" id="task-name" class="form-control" value="{{ $user->id }}"
                               readonly>
                    </div>
                </div> -->


                <div class="users1">
                    <table class="users2">

                        <tr class="tr1">
                            <!-- Имя задачи -->
                            <td class="td1">
                                <input type="text" name="id" id="task-name" class="form-control" value="{{ $user->id }}"
                               readonly>
                           </td>

                            <td class="td1">
                                <img class="ava" src="{{ asset('/storage/' . $profile->profile_link) }}">
                            </td>

                            <td class="td1">
                                <div>{{ $user->name }}</div>
                            </td>

                            <td class="td1">
                                <div class="br1"></div>
                            </td>
                            
                            <td class="td1">
                                <a class="bview1" href="{{ url('subProfile/' . $user->id) }}">⠀Просмотр⠀</a>
                                <!-- <button class="bview1">Просмотр</button> -->
                            </td>

                            <td class="td1">
                            <!-- <a class="bsub1" href="{{ url('userProfile/' . $user->id) }}}">⠀Подписаться⠀</a> -->
                                <button type="submit" class="bsub1">Подписаться</button>
                            </td>

                            <td class="td1">
                                <a class="bunsub1" href="{{ url('userProfile/' . $user->id) }}">⠀Отписаться⠀</a>
                                <!-- <button class="bunsub1">Отписаться</button> -->
                            </td>

                        </tr>

                    </table>

                        <!-- <img class="ava" src="{{ asset('/storage/' . $profile->profile_link) }}">

                <div class="form-group">
                    <label for="task" class="col-sm-3 control-label">{{ $user->name }}</label>
                </div> -->

                            <!-- Кнопка добавления задачи -->
                            <!-- <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-plus"></i> Подписаться
                                    </button>
                                </div>
                            </div> -->
            </form>
        </div>
    @endif

</body>

@endsection
