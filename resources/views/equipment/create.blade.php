@extends('adminlte::page')

@section('title', 'Equipment')

@section('content_header')
    <h1>Equipment Creation</h1>
@stop

@section('content')
<form method="POST" action="{{ route('equipment.store') }}">
    @csrf
    <x-adminlte-input name="hardwareSpecs" label="Hardware Specification" />
    <x-adminlte-select name="category" label="Category:">
      <option>Laptop</option>
      <option>Desktop</option>
      <option>Phone</option>
      <option>Tablet</option>
  </x-adminlte-select>

    <x-adminlte-input name="user" label="Users Name" />
    <x-adminlte-input name="userContact" label="Users Contact Information" />

    <x-adminlte-input name="manufacturerName" label="Manufacturer" />
    <x-adminlte-input name="manufacturerSaleContact" label="Manufacturer Sales Contact Information" />
    <x-adminlte-input name="manufacturerTechContact" label="Manufacturer Tech Support Contact Information" />

    <x-adminlte-input name="purchaseDate" type="date" label="Date of Purchase"/>
    <x-adminlte-input name="price" type="Number" label="Equipment Price" />
    <x-adminlte-input name="invoice" type="Number" label="Invoice Number" />

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
