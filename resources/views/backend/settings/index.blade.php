@extends('backend/layout')

@section('bodyClass', 'settings')
@section("containerAttributes", "data-spy=scroll data-target=#myScrollspy data-offset=1")

@section('content')
    @include('backend/settings/index-template')
@endsection

