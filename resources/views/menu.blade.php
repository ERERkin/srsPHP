@extends('layouts.app')

@section('content')


    <div class="list-group">
        <a href="{{ url('subs') }}" class="list-group-item list-group-item-action text-center">Подписки</a>
{{--        <a href="{{ url('faculty') }}" class="list-group-item list-group-item-action active">Факультет</a>--}}
        <a href="{{ url('myProfile') }}" class="list-group-item list-group-item-action text-center">Мой профиль</a>
        <a href="{{ url('my') }}" class="list-group-item list-group-item-action text-center">Мои посты</a>
        <a href="{{ url('search') }}" class="list-group-item list-group-item-action text-center">Поиск</a>
{{--        <a href="{{ url('reg') }}" class="list-group-item list-group-item-action disabled">Vestibulum at eros</a>--}}
    </div>

@endsection
