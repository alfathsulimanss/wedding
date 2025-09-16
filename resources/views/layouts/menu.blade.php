@extends('layouts.mainapp')
@section('menu')
    <li class="menu-title">Navigation</li>

    <li>
        <a href="{{ url('home') }}">
            <i data-feather="airplay"></i>
            <span> Dashboards </span>
        </a>
    </li>

    <li class="menu-title mt-2">Apps</li>

    @if(auth()->user()->roles === 'admin')
        <li>
            <a href="{{ url('manage-wedding') }}">
                <i data-feather="grid"></i>
                <span> Manage Wedding </span>
            </a>
        </li>
    @endif

    @if(auth()->user()->roles === 'user')
        <li>
            <a href="{{ url('invitation-list') }}">
                <i data-feather="clipboard"></i>
                <span> Invitation List </span>
            </a>
        </li>
    @endif
@endsection
