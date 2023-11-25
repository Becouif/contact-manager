@extends('layouts.app')


@section('content')
<div class="container">
  <div >
    @if (Session::has('message'))
      <p class="alert alert-primary" role="alert">{{Session::get('message')}}</p>
    @endif
  </div>

  <table id="datatable" class="table">
  <thead>
    <tr>
      <th scope="col" onclick="sortTable(0)">#</th>
      <th scope="col" onclick="sortTable(1)" >Name</th>
      <th scope="col" onclick="sortTable(2)">Number</th>
      <th scope="col" onclick="sortTable(3)">action</th>
      <th scope="col" onclick="sortTable(4)">action</th>
    </tr>
  </thead>
  <tbody>

  @if (count($contacts)>0)
  @foreach ($contacts as $key=>$contact)
  <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{ $contact->name }}</td>
      <td>{{ $contact->number }}</td>
      <td><a href="{{route('contact.edit',[$contact->id])}}" class="btn btn-secondary">edit</a></td>
      <td><form action="" method="post">
        <button type="submit" class="btn btn-danger">delete</button>
      </form></td>
    </tr>
  @endforeach


  @else
  <p>Dear {{ Auth::user()->name }}, you have no contact yet</p>
  @endif





  </tbody>
  </table>



@endsection