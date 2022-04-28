@extends('adminlte::page')

@section('title', 'Equipment')

@section('content_header')
    <h1>Edit Equipment</h1>
@stop

@section('content')
<form method="POST" action="{{ route('equipment.update', $equipment->id) }}">
    @csrf
    @csrf_field {{method_field('PUT')}}
    <x-adminlte-input name="hardwareSpecs" label="Hardware Specification" value="{{$equipment->hardwareSpecs}}" />
    <x-adminlte-select name="category" label="Category:" value="{{$equipment->category}}">
      <option>Laptop</option>
      <option>Desktop</option>
      <option>Phone</option>
      <option>Tablet</option>
  </x-adminlte-select>

    <x-adminlte-input name="user" label="Users Name" value="{{$equipment->user}}"/>
    <x-adminlte-input name="userContact" label="Users Contact Information" value="{{$equipment->userContact}}"/>

    <x-adminlte-input name="manufacturerName" label="Manufacturer" value="{{$equipment->manufacturerName}}"/>
    <x-adminlte-input name="manufacturerSaleContact" label="Manufacturer Sales Contact Information" value="{{$equipment->manufacturerSaleContact}}"/>
    <x-adminlte-input name="manufacturerTechContact" label="Manufacturer Tech Support Contact Information" value="{{$equipment->manufacturerTechContact}}"/>

    <x-adminlte-input name="purchaseDate" type="datetime-local" min="2022-01-01T00:00" max="2023-01-01T00:00" label="Date of Purchase" value="{{$equipment->purchaseDate}}"/>
    <x-adminlte-input name="price" type="Number" label="Equipment Price" value="{{$equipment->price}}"/>
    <x-adminlte-input name="invoice" type="Number" label="Invoice Number" value="{{$equipment->invoice}}"/>

    <x-adminlte-button type="Submit" label="Update" />
</form>
@stop

@section('js')
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    } );
</script>
@stop
