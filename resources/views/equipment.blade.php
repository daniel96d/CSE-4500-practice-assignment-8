@extends('adminlte::page')

@section('title', 'Equipment')

@section('content_header')
    <h1>Equipment</h1>
@stop

@section('content')
<div class="card">

  <div class="card-body">

    <table id="table" class="table table-bordered">

      <thead>
        <th>@sortablelink('category')</th>
        <th>hardwareSpecs</th>
        <th>@sortablelink('user')</th>
        <th>User Contact</th>
        <th>@sortablelink('manufacturerName')</th>
        <th>Manu Sale Contact</th>
        <th>Manu Tech Support</th>
        <th>Purchase Date</th>
        <th>Price</th>
        <th>Invoice #</th>
        <th>ACTIONS</th>
      </thead>
      <tbody>
        @foreach($equipments AS $equipment)
        <tr>
          <td>{{$equipment->category}}</td>
          <td>{{$equipment->hardwareSpecs}}</td>
          <td>{{$equipment->user}}</td>
          <td>{{$equipment->userContact}}</td>
          <td>{{$equipment->manufacturerName}}</td>
          <td>{{$equipment->manufacturerSaleContact}}</td>
          <td>{{$equipment->manufacturerTechContact}}</td>
          <td>{{$equipment->purchaseDate}}</td>
          <td>{{$equipment->price}}</td>
          <td>{{$equipment->invoice}}</td>
          <td>
          <form action="{{ route('equipment.destroy',$equipment->id)}}" method="POST">
            <a href="{{route('equipment.show', $equipment->id)}}" class="btn btn-info">View</a>
            <a href="{{route('equipment.edit', $equipment->id)}}" class="btn btn-primary">Edit</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </td>
        </tr>
        @endforeach
      </tbody>

    </table>
    {!! $equipments->appends(Request::except('page'))->render() !!}

    <p>
    Displaying {{$equipments->count()}} of {{ $equipments->total() }} product(s).
    </p>
  </div>

</div>
<a href = "{{route('equipment.create')}}" class = "btn btn-primary">Add Equipment</a>
@stop

@section('js')
@stop
