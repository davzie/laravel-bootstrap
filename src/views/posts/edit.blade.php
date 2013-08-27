@extends('laravel-bootstrap::layouts.interface')

@section('title')
    Edit Post: {{ $item->title }}
@stop

@section('content')

    <h1>Edit Post: <small>{{ $item->title }}</small></h1>

    {{-- The error / success messaging partial --}}
    @include('laravel-bootstrap::partials.edit-menu')

    {{ Form::open( array( 'url'=>$edit_url.$item->id , 'class'=>'form-horizontal form-top-margin' , 'role'=>'form' ) ) }}

        {{-- The error / success messaging partial --}}
        @include('laravel-bootstrap::partials.messaging')

        <div class="tab-content">
            <div class="tab-pane active" id="main">

                <div class="form-group">
                    {{ Form::label( "title" , 'Post Title' , array( 'class'=>'col-lg-2 control-label' ) ) }}
                    <div class="col-lg-10">
                        {{ Form::text( "title" , Input::old( "title" , $item->title ) , array( 'class'=>'form-control' , 'placeholder'=>'Post Title' ) ) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label( "content" , 'Post Content' , array( 'class'=>'col-lg-2 control-label' ) ) }}
                    <div class="col-lg-10">
                        {{ Form::textarea( "content" , Input::old( "content" , $item->content ) , array( 'class'=>'form-control rich' , 'placeholder'=>'Post Content' ) ) }}
                    </div>
                </div>

            </div>
            @include('laravel-bootstrap::partials.images')
            @include('laravel-bootstrap::partials.tagging')
        </div>


        {{ Form::submit('Save Item' , array('class'=>'btn btn-large btn-primary pull-right')) }}

    {{ Form::close() }}

@stop