@extends('layouts.app')

@section('title', 'Home')

@section('nav')
    @parent
@endsection

@section('content')
    <h1>Group Assets</h1>

    @if(!$group)
        <p>No such group</p>
    @else
        @if(isset($assets) && $assets->count() > 0)
            <ul>
                @foreach($assets as $asset)
                    <li>{{ $asset->name }}</li>
                @endforeach
            </ul>
        @else 
            <p>No assets found for this group</p>
        @endif
    @endif
@endsection