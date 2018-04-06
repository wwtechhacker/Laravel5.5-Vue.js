@extends('cms::site')

@section('css')
    <style type="text/css">

    </style>
@stop

@section('main')
<div class="row column medium-10 small-12">
    <cms-form data-page="{{$title}}" data-route="{{config('cms.prefix', 'cms')}}"></cms-form>
</div>
@stop
