@extends('laravel-bootstrap::layouts.interface')

@section('title')
    Manage Image Galleries
@stop

@section('content')

    <h1>Manage Image Galleries</h1>
    <p>Image galleries are images separated into their own little section.</p>
    

    {{-- The error / success messaging partial --}}
    @include('laravel-bootstrap::partials.messaging')
    
    @if( !$items->isEmpty() )
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Created</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td><a href="{{ $edit_url.$item->id }}">{{ $item->id }}</a></td>
                        <td><a href="{{ $edit_url.$item->id }}">{{ $item->title }}</a></td>
                        <td><a href="{{ $edit_url.$item->id }}">{{ $item->slug }}</a></td>
                        <td><a href="{{ $edit_url.$item->id }}">{{ $item->created_at }}</a></td>
                        <td>
                            <div class="pull-right">
                                <a href="{{ $edit_url.$item->id }}" class="btn btn-sm btn-primary">Edit Item</a> <a href="{{ $delete_url.$item->id }}" class="btn btn-sm btn-danger">Delete Item</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info">
            <strong>No Items Yet:</strong> You don't have any items here just yet. Add one using the button below.
        </div>
    @endif
    <a href="{{ $new_url }}" class="btn btn-primary pull-right">New Item</a>
@stop