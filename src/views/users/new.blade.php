@extends('laravel-bootstrap::layouts.interface-new')

@section('title')
    Create New Content Blocks
@stop

@section('heading')
    <h1>Create New Content Block</h1>
@stop

@section('form-items')

    <div class="form-group">
        {{ Form::label( "title" , 'Block Title' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::text( "title" , Input::old( "title" ) , array( 'class'=>'form-control' , 'placeholder'=>'Block Title' ) ) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label( "key" , 'Block Key' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::text( "key" , Input::old( "key" ) , array( 'class'=>'form-control' , 'placeholder'=>'Block Key' ) ) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label( "content" , 'Block Content' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::textarea( "content" , Input::old( "content" ) , array( 'class'=>'form-control rich' , 'placeholder'=>'Block Content' ) ) }}
        </div>
    </div>
    
@stop