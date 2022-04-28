@extends('adminlte::page')

@section('title', 'Equipment Details')

@section('content_header')
    <h2>Equipement</h2>
@stop

@section('content')
<x-adminlte-profile-widget name="{{ $equipment->hardwareSpecs; }}" theme="lightblue" layout-type="classic">
    <x-adminlte-profile-row-item icon="" title="Category: " text="{{$equipment->category;}}"/>
    <x-adminlte-profile-row-item icon="" title="Specs: " text="{{$equipment->hardwareSpecs;}}"/>
    <x-adminlte-profile-row-item icon="" title="User: " text="{{$equipment->user;}}"/>
    <x-adminlte-profile-row-item icon="" title="User Contact: " text="{{$equipment->userContact;}}"/>
    <x-adminlte-profile-row-item icon="" title="Manufacturer(M): " text="{{$equipment->manufacturerName;}}"/>
    <x-adminlte-profile-row-item icon="" title="M_Sales Contact: " text="{{$equipment->manufacturerSaleContact;}}"/>
    <x-adminlte-profile-row-item icon="" title="M_Tech Contact: " text="{{$equipment->manufacturerTechContact;}}"/>
    <x-adminlte-profile-row-item icon="" title="Date of Purchase: " text="{{$equipment->purchaseDate;}}"/>
    <x-adminlte-profile-row-item icon="" title="Price: " text="{{$equipment->price;}}"/>
    <x-adminlte-profile-row-item icon="" title="Invoice #:" text="{{$equipment->invoice;}}"/>
</x-adminlte-profile-widget>
    <x-adminlte-card title="NOTES: " theme="gray" icon="far fa-clipboard" >
      <div>
        <a href="{{route('note.create', ['myid'=>$equipment->id])}}" class="btn btn-primary">Add Note</a>
      </div>
      @foreach($equipment->notes AS $note)
      <x-adminlte-card title="Note #{{$note->id;}}" theme="dark" icon="far fa-sticky-note">
        created: {{$note->date;}}</br>
        <x-adminlte-textarea name="taDisabled" disabled>
          <x-slot name="prependSlot">
            <div class="input-group-text bg-dark">
                <i class="fas fa-lg fa-file-alt text-warning"></i>
            </div>
          </x-slot>
          {{$note->comments;}}
        </x-adminlte-textarea>
        <form action="{{ route('note.destroy',$note->id)}}" method="POST">
          @csrf
          @method('DELETE')
          <a href="{{route('note.edit', $note->id)}}" class="btn btn-primary">Edit</a>
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </x-adminlte-card>
      @endforeach
    </x-adminlte-card>
  </div>
@stop

@section('js')
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    } );
</script>
@stop
