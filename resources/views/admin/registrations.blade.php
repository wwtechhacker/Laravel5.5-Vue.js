@extends('layouts.admin-site', ['bodyClass' => ''])

@section ('content')
    <div class="row column small-12">
        <div class="clearfix">
            <h3 class="display-inline-block margin-right-2">Events</h3>
            <div class="float-right">
                <a href="/admin/event-create" target="_blank" class="button small">+ Add Event</a>
                <form class="display-inline-block" action="" method="post">
                    {{ csrf_field() }}
                    <div class="text-right">
                        <button type="submit" name="download" value="1" class="button small"><i class="fas fa-download"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <registration-table table-rows="{{$rows}}" table-data="{{$data}}" filter="{{$filter}}"></registration-table>

    </div>
@stop
