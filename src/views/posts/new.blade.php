@extends('laravel-bootstrap::layouts.interface-new')

@section('title')
    Create New Post
@stop

@section('heading')
    <h1>Create New Post</h1>
@stop

@section('form-items')

    <div class="form-group">
        {{ Form::label( "title" , 'Post Title' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::text( "title" , Input::old( "title" ) , array( 'class'=>'form-control' , 'placeholder'=>'Post Title' ) ) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label( "content" , 'Post Content' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::textarea( "content" , Input::old( "content" ) , array( 'class'=>'form-control rich' , 'placeholder'=>'Post Content' ) ) }}
        </div>
    </div>
    
@stop