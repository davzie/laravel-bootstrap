@extends('laravel-bootstrap::layouts.interface')

@section('content')


    @yield('heading')

    {{-- The menu partial --}}
    @include('laravel-bootstrap::partials.edit-menu')

    {{ Form::open( array( 'url'=>$edit_url.$item->id , 'class'=>'form-horizontal form-top-margin' , 'role'=>'form' ) ) }}

        {{-- The error / success messaging partial --}}
        @include('laravel-bootstrap::partials.messaging')

        <div class="tab-content">
            <div class="tab-pane active" id="main">
                @yield('form-items')
            </div>
            @include('laravel-bootstrap::partials.images')
            @include('laravel-bootstrap::partials.tagging')
        </div>


        {{ Form::submit('Save Item' , array('class'=>'btn btn-large btn-primary pull-right')) }}

    {{ Form::close() }}

@stop