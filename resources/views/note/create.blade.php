
@extends('adminlte::page')

@section('title', 'Schedule')

@section('content_header')
    <h1>Calendar</h1>
@stop

@section('content')
<form method="post" action="{{ route('note.store')}}" >
    @csrf
    <input type="hidden" name="equipment_id" value="{{$myid}}">
    <x-adminlte-textarea name="comments" label="Note Details" rows=5 label-class="text-warning"
      igroup-size="sm" placeholder="Insert Comments...">
      <x-slot name="prependSlot">
        <div class="input-group-text bg-dark">
            <i class="fas fa-lg fa-file-alt text-warning"></i>
        </div>
      </x-slot>
    </x-adminlte-textarea>
    <x-adminlte-input name="date" type="datetime-local" max="2025-01-01T00:00" label="Date" />
    <x-adminlte-button type="Submit" label="Submit" />
</form>
@stop

@section('js')
@stop
