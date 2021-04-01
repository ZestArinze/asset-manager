@extends('layouts.app')

@section('title', 'Home')

@section('nav')
    @parent
@endsection

@section('content')
    <h1>Asset Manager</h1>
    @if(isset($users))
        <h3>Individual Assets</h3>
        <ul>
        @foreach($users as $user)
            <li>
                <a href="{{ route('user.assets', $user->id) }}">{{ $user->name }}</a>
            </li>
        @endforeach
        </ul>
    @endif

    @if(isset($groups))
        <h3>Group Assets</h3>
        <ul>
        @foreach($groups as $group)
            <li>
                <a href="{{ route('group.assets', $group->id) }}">{{ $group->name }}</a>
            </li>
        @endforeach
        </ul>
    @endif
@endsection