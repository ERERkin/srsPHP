<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')

@extends('layouts.list_of_subscriptions_css')

@section('content')

    @if (count($subs) > 0)
        <div id="panelofsubs">
            <div class="panel-heading">
                <h1>Подписки</h1>
            </div>

            <div class="subs">
                <table class="users">

                    <!-- Заголовок таблицы -->
                {{--                    <thead>--}}
                {{--                    <th>Подписчики</th>--}}
                {{--                    <th>&nbsp;</th>--}}
                {{--                    </thead>--}}

                <thead>
                    <th class="th1">ава</th>
                    <th class="th1">ник</th>
                </thead>

                <!-- Тело таблицы -->
                    <tbody>
                    @foreach ($subs as $sub)
                        <!-- <tr> -->
                            <!-- Имя задачи -->
                            {{--                            <td class="table-text">--}}
                            {{--                                <div>{{ $sub->name }}</div>--}}
                            {{--                            </td>--}}
                    
                    <!-- <thead>
                    <th class="th1">ава</th>
                    <th class="th1">ник</th>
                    </thead> -->

                    <!-- Тело таблицы -->
                    <!-- <tbody> -->
                        
                        <tr class="tr1">
                            <!-- Имя задачи -->
                            <td class="td1">
                                <img class="ava" src="{{ asset('/storage/' . $sub->profile_link) }}">
                            </td>

                            <td class="td1">
                                <div>{{ $sub->name }}</div>
                            </td>

                            <td class="td1">
                                <div class="br1"></div>
                            </td>

                            <td class="td1">
                                <a class="bsub1" href="{{ url('subProfile/' . $sub->id) }}}">⠀Просмотр⠀</a>
                                <!-- <button class="bsub1">Просмотр</button> -->
                            </td>

                            <td class="td1">
                                <a class="bunsub1" href="{{ url('subProfile/' . $sub->id) }}}">⠀Отписаться⠀</a>
                                <!-- <button class="bunsub1">Отписаться</button> -->
                            </td>

                            <!-- <a href="{{ url('subProfile/' . $sub->id) }}}">
                                <div class="row">
                                    <img class="img-fluid" src="{{ asset('/storage/' . $sub->profile_link) }}">
                                </div>
                                <div class="col-md-9 col-xs-6">
                                        <h2>{{ $sub->name }}</h2>
                                        <h2>{{ $sub->id }}</h2>
                                </div>
                                </div>
                            </a> -->
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
