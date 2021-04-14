<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap шаблон... -->

    <div class="panel-body">
        <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')

    <!-- Форма новой задачи -->
        <form action="{{ url('postEdit/'.$post->post_id) }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Имя задачи -->

            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Тема</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control" value="{{ $post->post_name }}">
                </div>
            </div>

            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Текст</label>

                <div class="col-sm-6">
                    <input type="text" name="text" id="task-name" class="form-control" value="{{ $post->post_text }}">
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
    </div>

@endsection
