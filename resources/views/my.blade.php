<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap шаблон... -->

    <div class="panel-body">
        <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')

    <!-- Форма новой задачи -->
        <form action="{{ url('post') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Имя задачи -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Тема</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Текст</label>

                <div class="col-sm-6">
                    <input type="text" name="text" id="task-name" class="form-control">
                </div>
            </div>

            <!-- Кнопка добавления задачи -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Опубликовать
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- TODO: Текущие задачи -->
    <!-- Текущие задачи -->
    @if (count($posts) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Мои посты
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Заголовок таблицы -->
                    <thead>
                    <th>Тема</th>
                    <th>Текст</th>
                    </thead>

                    <!-- Тело таблицы -->
                    <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <!-- Имя задачи -->
                            <td class="table-text">
                                <div>{{ $post->post_name }}</div>
                            </td>

                            <td class="table-text">
                                <div>{{ $post->post_text }}</div>
                            </td>

                            <!-- Кнопка Удалить -->

                            <td>
{{--                                <form action="{{ url('postEdit/'.$post->post_id) }}" method="POST">--}}
{{--                                    {{ csrf_field() }}--}}
{{--                                    {{ method_field('POST') }}--}}

{{--                                    <button type="submit" class="btn btn-danger">--}}
{{--                                        <i class="fa fa-trash"></i> Удалить--}}
{{--                                    </button>--}}
{{--                                </form>--}}
                                <a href="{{ url('postEdit/' . $post->post_id) }}" class="btn btn-primary btn-lg"> Изменить </a>
                            </td>

                            <td>
                                <form action="{{ url('postDel/'.$post->post_id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i> Удалить
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
