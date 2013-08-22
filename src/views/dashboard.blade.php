@extends('laravel-bootstrap::layouts.interface')

@section('title')
    Welcome To Your CMS
@stop

@section('content')

    <h1>Welcome To {{ $app_name }}</h1>
    <p class="lead">Manage content for your website, including but not limited to:</p>
    <ul class="lead">
        <li>Posts</li>
        <li>Content Blocks</li>
        <li>Image Galleries</li>
        <li>And More!</li>
    </ul>

@stop