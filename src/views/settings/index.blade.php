@extends('laravel-bootstrap::layouts.interface')

@section('title')
    Manage Website Settings
@stop

@section('content')

    <h1>Website Settings</h1>
    <p>Update settings related to your website below:</p>
    {{ Form::open( array( 'url'=>"$urlSegment/settings" ) ) }}

    {{ Form::close() }}

@stop