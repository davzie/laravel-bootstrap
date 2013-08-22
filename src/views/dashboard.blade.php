@extends('laravel-bootstrap::layouts.interface')

@section('title')
    {{ $app_name }}
@stop

@section('content')

    <h1>Welcome To {{ $app_name }}</h1>
    <p>Manage content for your website, including but not limited to:</p>
    <ul>
        <li>Posts</li>
        <li>Content Blocks</li>
        <li>Image Galleries</li>
        <li>And More!</li>
    </ul>

@stop