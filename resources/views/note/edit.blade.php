@extends('adminlte::page')

@section('title', 'Equipment')

@section('content_header')
    <h1>Edit Equipment</h1>
@stop

@section('content')
<form method="POST" action="{{ route('note.update', $note->id)}}" >
    @csrf
    @csrf_field {{method_field('PUT')}}
    <input type="hidden" name="equipment_id" value="{{$note->equipment_id}}">
    <x-adminlte-textarea name="comments" label="Note Details" rows=5 label-class="text-warning"
      igroup-size="sm" placeholder="Insert Comments...">
      <x-slot name="prependSlot">
        <div class="input-group-text bg-dark">
            <i class="fas fa-lg fa-file-alt text-warning"></i>
        </div>
      </x-slot>
      {{$note->comments}}
    </x-adminlte-textarea>
    <x-adminlte-input name="date" type="date" label="Date"/>
    <x-adminlte-button type="Submit" label="Submit" />
</form>
@stop

@section('js')
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    } );
</script>
@stop
