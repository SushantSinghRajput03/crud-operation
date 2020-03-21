@extends('master')

@section('content')

<div class="row">
 <div class="col-md-12">
  <br />
  <h3>Edit Record</h3>
  <br />
  @if(count($errors) > 0)

  <div class="alert alert-danger">
         <ul>
         @foreach($errors->all() as $error)
          <li>{{$error}}</li>
         @endforeach
         </ul>
  @endif
  <form method="post" action="{{action('StudentController@update', $student->id)}}" enctype="multipart/form-data">
   {{csrf_field()}}
   {{ method_field('PUT') }}
   <input type="hidden" name="_method" value="PATCH" />
   <div class="form-group">
    <input type="text" name="name" class="form-control" value="{{$student->name}}" placeholder="Enter Name"  />
   </div>
   <div class="form-group">
    <input type="text" name="email" class="form-control" value="{{$student->email}}" placeholder="Enter Your E-mail" />
   </div>
   <div class="form-group">
    <input type="text" name="age" class="form-control" value="{{$student->age}}" placeholder="Enter Your Age" />
   </div>
   <div class="form-group">
    <img src="{{ URL::to('/') }}/images/{{ $student->image }}" class="img-thumbnail" width="100" />
    <input type="file" name="image" class="form-control" value="{{ $student->image }}" placeholder="Select Profile Image" />
     <input type="hidden" name="hidden_image" class="form-control" value="{{ $student->image }}" placeholder="Select Profile Image" />
   </div>
   <div class="form-group">
    <input type="submit" class="btn btn-primary" value="Edit" />
   </div>
  </form>
 </div>
</div>

@endsection