@extends('laravel-bootstrap::layouts.interface-edit')

@section('title')
    Edit Gallery: {{ $item->title }}
@stop

@section('heading')
    <h1>Edit Gallery: <small>{{ $item->title }}</small></h1>
@stop

@section('form-items')

    <div class="form-group">
        {{ Form::label( "title" , 'Gallery Title' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::text( "title" , Input::old( "title", $item->title ) , array( 'class'=>'form-control' , 'placeholder'=>'Gallery Title' ) ) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label( "slug" , 'Gallery Key' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::text( "slug" ,$item->slug , array( 'class'=>'form-control' , 'disabled'=>'disabled' ) ) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label( "description" , 'Gallery Content' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::textarea( "description" , Input::old( "description" , $item->description ) , array( 'class'=>'form-control rich' , 'placeholder'=>'Gallery Description' ) ) }}
        </div>
    </div>
    
@stop