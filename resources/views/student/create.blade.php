@extends('master')

@section('content')
<div class="row">
 <div class="col-md-12">
  <br />
  <h3 aling="center">Add Data</h3>
  <br />
  @if(count($errors) > 0)
  <div class="alert alert-danger">
   <ul>
   @foreach($errors->all() as $error)
    <li>{{$error}}</li>
   @endforeach
   </ul>
  </div>
  @endif
  @if(\Session::has('success'))
  <div class="alert alert-success">
   <p>{{ \Session::get('success') }}</p>
  </div>
  @endif

  <form method="post" action="/student" enctype="multipart/form-data">
   {{csrf_field()}}
   <div class="form-group">
    <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{old("name")}}"/>
   </div>
   <div class="form-group">
    <input type="text" name="email" class="form-control" placeholder="Enter Email" value="{{ old("email")}}" />
   </div>
   <div class="form-group">
    <input type="text" name="age" class="form-control" placeholder="Enter Age" value="{{ old("age")}}"/>
   </div>
   <div class="form-group">
    
    <input type="file" name="image"  placeholder="Select Profile Image"  />
   </div>
   <div class="form-group">
    <input type="submit" class="btn btn-primary"  />
   </div>
  </form>
 </div>
</div>
@endsection