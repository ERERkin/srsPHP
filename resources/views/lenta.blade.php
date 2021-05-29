<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')

@extends('layouts.lenta_css')

@section('content')


<body id="body1">

    <!-- TODO: Текущие задачи -->
    <!-- Текущие задачи -->
    @if (count($posts) > 0)
        <!--<div class="panel panel-default">-->
        <div id="panelofposts">
            <br>
            <div class="panel-heading">
                <h2>Лента</h2>
            </div>

            <!-- <div class="panel-body"> -->
            <div class="posts">
                <table class="userposts">

                    <!-- Заголовок таблицы -->
                    <thead>
                    <!-- <th class="th1">Ава</th> -->
                    <th class="th1">Тема</th>
                    <th class="th1">Время</th>
                    <th class="th1">Текст</th>
                    <th class="th1"></th>
                    </thead>

                    <!-- Тело таблицы -->
                    <tbody>
                    @foreach ($posts as $post)
                        <tr class="tr1">
                            <!-- Имя задачи -->
                            <!-- <td class="td1">
                                <div></div>
                            </td> -->
                            
                            <td class="td1">
                                <div>{{ $post->post_name }}</div>
                            </td>

                            <td class="td1">
                                <div>{{ $post->created_at }}</div>
                            </td>

                            <td class="td1">
                                <div>{{ $post->post_text }}</div>
                            </td>
                            <td><a href="{{ url('postView/' . $post->post_id) }}">Читать дальше</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</body>
@endsection
