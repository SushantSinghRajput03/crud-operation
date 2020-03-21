@extends('master')

@section('content')
<div class=" text-center">
 <div align="right"><br>
  <a href="{{ route('student.index') }}" class="btn btn-primary">Back</a>
 </div>
 <br />
 <img src="{{ URL::to('/') }}/images/{{ $student->image }}" class="img-thumbnail" width="150" /><br>
 <h3>Name - {{$student->name}} </h3>
 <h3>E-mail - {{$student->email}} }}</h3>
 <h3>Age - {{$student->age}}</h3>
</div>
@endsection