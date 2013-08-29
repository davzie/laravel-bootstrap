@extends('laravel-bootstrap::layouts.interface')

@section('content')


    @yield('heading')

    {{ Form::open( array( 'url'=>$new_url , 'class'=>'form-horizontal form-top-margin' , 'role'=>'form' ) ) }}

        {{-- The error / success messaging partial --}}
        @include('laravel-bootstrap::partials.messaging')

        @yield('form-items')

        {{ Form::submit('Create Item' , array('class'=>'btn btn-large btn-primary pull-right')) }}

    {{ Form::close() }}

@stop