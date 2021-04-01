@extends('layouts.app')

@section('title', 'Home')

@section('nav')
    @parent
@endsection

@section('content')
    <h1>User Assets</h1>

    @if(!$user)
        <p>No such user</p>
    @else
        @if(isset($assets) && $assets->count() > 0)
            <h3>{{ $user->name }} Assets</h3>
            <ul>
                @foreach($assets as $asset)
                    <li>{{ $asset->name }}</li>
                @endforeach
            </ul>
        @else 
            <p>No assets found for this user</p>
        @endif
    @endif
@endsection