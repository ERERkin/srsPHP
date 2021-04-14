<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap шаблон... -->

    <div class="panel-body">
        <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')
    <!-- Форма новой задачи -->
        <form action="{{ url('search') }}" method="POST" class="form-horizontal">
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
                <div class="form-group">
                    <div class="col-sm-6">
                        <input type="text" name="id" id="task-name" class="form-control" value="{{ $user->id }}" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="task" class="col-sm-3 control-label">{{ $user->name }}</label>
                </div>

                <!-- Кнопка добавления задачи -->
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-plus"></i> Подписаться
                        </button>
                    </div>
                </div>
            </form>
        </div>
    @endif
@endsection
