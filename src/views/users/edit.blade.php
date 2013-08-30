@extends('laravel-bootstrap::layouts.interface-edit')

@section('title')
    Edit User: {{ $item->full_name }}
@stop

@section('heading')
    <h1>Edit User: <small>{{ $item->full_name }}</small></h1>
@stop

@section('form-items')

    {{-- The first name form item --}}
    <div class="form-group">
        {{ Form::label( "first_name" , 'First Name' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::text( "first_name" , Input::old( "first_name", $item->first_name ) , array( 'class'=>'form-control' , 'placeholder'=>'First Name' ) ) }}
        </div>
    </div>

    {{-- The last name form item --}}
    <div class="form-group">
        {{ Form::label( "last_name" , 'Last Name' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::text( "last_name" , Input::old( "last_name", $item->last_name ) , array( 'class'=>'form-control' , 'placeholder'=>'Last Name' ) ) }}
        </div>
    </div>

    {{-- The email form item --}}
    <div class="form-group">
        {{ Form::label( "email" , 'Email' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::text( "email" , Input::old( "email", $item->email ) , array( 'class'=>'form-control' , 'placeholder'=>'Email' ) ) }}
        </div>
    </div>

    <h3>Authentication</h3>

    {{-- The password form item --}}
    <div class="form-group">
        {{ Form::label( "password" , 'New Password' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::password( "password" , array( 'class'=>'form-control' , 'placeholder'=>'Enter New Password' ) ) }}
        </div>
    </div>

    {{-- The password confirmation form item --}}
    <div class="form-group">
        {{ Form::label( "password_confirmation" , 'Confirm' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::password( "password_confirmation" , array( 'class'=>'form-control' , 'placeholder'=>'Confirm New Password' ) ) }}
        </div>
    </div>
    
@stop