<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')

@section('content')

    @if (count($subs) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Подписки</h1>
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Заголовок таблицы -->
                {{--                    <thead>--}}
                {{--                    <th>Подписчики</th>--}}
                {{--                    <th>&nbsp;</th>--}}
                {{--                    </thead>--}}

                <!-- Тело таблицы -->
                    <tbody>
                    @foreach ($subs as $sub)
                        <tr>
                            <!-- Имя задачи -->
                            {{--                            <td class="table-text">--}}
                            {{--                                <div>{{ $sub->name }}</div>--}}
                            {{--                            </td>--}}
                            <h2>{{ $sub->name }}</h2>
                            <h2>{{ $sub->id }}</h2>
                            <a href="{{ url('subProfile/' . $sub->id) }}}">
                                <div class="row">
                                    <div class="col-md-1 col-xs-1">
                                    </div>
                                    <div class="col-md-1 col-xs-5">
                                        <img class="img-fluid" src="{{ asset('/storage/' . $sub->profile_link) }}">
                                    </div>
                                    <div class="col-md-9 col-xs-6">
                                        <h2>{{ $sub->name }}</h2>
                                        <h2>{{ $sub->id }}</h2>
                                    </div>
                                </div>
                            </a>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
