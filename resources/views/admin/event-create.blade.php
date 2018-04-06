@extends('layouts.admin-site', ['bodyClass' => ''])

@section('content')
    <div class="row column small-12 medium-9 xlarge-5">
        <div class="card padding-1">
            <div class="card-section">
                <h3>{{$header}}</h3>
                <model-form data-model="{{ !empty($model) ? $model : '' }}" data-action="/api/events/" data-fields="{{ json_encode($fields) }}"></model-form>
            </div>
        </div>
    </div>
@stop