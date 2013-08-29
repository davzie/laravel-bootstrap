@extends('laravel-bootstrap::layouts.interface-edit')

@section('title')
    Edit User: {{ $item->full_name }}
@stop

@section('heading')
    <h1>Edit User: <small>{{ $item->full_name }}</small></h1>
@stop

@section('form-items')

    <div class="form-group">
        {{ Form::label( "first_name" , 'First Name' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::text( "first_name" , Input::old( "first_name", $item->first_name ) , array( 'class'=>'form-control' , 'placeholder'=>'First Name' ) ) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label( "last_name" , 'Last Name' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::text( "last_name" , Input::old( "last_name", $item->last_name ) , array( 'class'=>'form-control' , 'placeholder'=>'Last Name' ) ) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label( "email" , 'Email' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::text( "email" , Input::old( "email", $item->email ) , array( 'class'=>'form-control' , 'placeholder'=>'Email' ) ) }}
        </div>
    </div>
    <h3>Authentication</h3>
    <div class="form-group">
        {{ Form::label( "password" , 'New Password' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::text( "password" , null , array( 'class'=>'form-control' , 'placeholder'=>'Enter New Password' ) ) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label( "password_confirmation" , 'Confirm' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::text( "password_confirmation" , null , array( 'class'=>'form-control' , 'placeholder'=>'Confirm New Password' ) ) }}
        </div>
    </div>
@stop