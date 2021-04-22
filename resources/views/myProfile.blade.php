<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')

@extends('layouts.view_profile_css')

@section('content')


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
                            <td><a href="{{ url('postView/' . $post->post_id) }}">Читать дальше</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
