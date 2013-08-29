@extends('laravel-bootstrap::layouts.interface-edit')

@section('title')
    Edit Post: {{ $item->title }}
@stop

@section('heading')
    <h1>Edit Post: <small>{{ $item->title }}</small></h1>
@stop

@section('form-items')

    <div class="form-group">
        {{ Form::label( "title" , 'Block Title' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::text( "title" , Input::old( "title", $item->title ) , array( 'class'=>'form-control' , 'placeholder'=>'Block Title' ) ) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label( "key" , 'Block Key' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::text( "key" , Input::old( "key", $item->key ) , array( 'class'=>'form-control' , 'placeholder'=>'Block Key' ) ) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label( "content" , 'Block Content' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::textarea( "content" , Input::old( "content", $item->content ) , array( 'class'=>'form-control rich' , 'placeholder'=>'Block Content' ) ) }}
        </div>
    </div>
    
@stop