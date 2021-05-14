<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')

@extends('layouts.myposts_view_css')

@section('content')

    <!-- Bootstrap шаблон... -->

    <div class="panel-body">
        <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')

<body id="body1">

    <!-- Форма новой задачи -->
        <form action="{{ url('post') }}" method="POST" class="form_add_post">
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
        <!-- <div class="panel panel-default"> -->
        <div id="panelofposts">
            <div class="panel-heading">
                <h2>Мои посты</h2>
            </div>

            <div class="posts">
                <table class="userposts">

                    <!-- Заголовок таблицы -->
                    <thead>
                    <th class="th1">Тема</th>
                    <th class="th1">Текст</th>
                    <th class="th1"></th>
                    <th class="th1"></th>
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
                                <div class="tdtext1">{{ $post->post_text }}</div>
                            </td>

                            <!-- Кнопка Удалить -->

                            <td class="td1">
                                <a href="{{ url('postEdit/' . $post->post_id) }}" class="btn btn-primary btn-lg">
                                    Изменить </a>
                            </td>

                            <td class="td1">
                                <form class="form1" action="{{ url('postDel/'.$post->post_id) }}" method="POST">
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

</body>

@endsection
