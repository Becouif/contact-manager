@extends('layouts.app')

@section('content')
    
<div class="container">
<form action="{{route('contact.update',[$contact->id])}}" method="POST"> @csrf
  @method('PUT')
  <div class="mb-3">
    <label for="name" class="form-label">name</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{$contact->name}}" aria-describedby="emailHelp">
    
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <!-- <div id="name" class="form-text">enter contact name</div> -->
  </div>
  <div class="mb-3">
    <label for="number" class="form-label">number</label>
    <input type="number" class="form-control @error('number') is-invalid @enderror" value="{{$contact->number}}" name="number" id="number">
    @error('number')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <!-- <div class="mb-3 form-check"> -->
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}" class="form-check-input" id="exampleCheck1" readonly>
    <!-- <label class="form-check-label" for="exampleCheck1">Check me out</label> -->
  <!-- </div> -->
  <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>

@endsection