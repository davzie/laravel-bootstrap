@extends('laravel-bootstrap::layouts.interface-new')

@section('title')
    Create New Image Gallery
@stop

@section('heading')
    <h1>Create New Image Gallery</h1>
@stop

@section('form-items')

    <div class="form-group">
        {{ Form::label( "title" , 'Gallery Title' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::text( "title" , Input::old( "title" ) , array( 'class'=>'form-control' , 'placeholder'=>'Gallery Title' ) ) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label( "slug" , 'Gallery Key' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::text( "slug" , Input::old( "slug" ) , array( 'class'=>'form-control' , 'placeholder'=>'Gallery Slug' ) ) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label( "description" , 'Gallery Content' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::textarea( "description" , Input::old( "description" ) , array( 'class'=>'form-control rich' , 'placeholder'=>'Gallery Description' ) ) }}
        </div>
    </div>
    
@stop