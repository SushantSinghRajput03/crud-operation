
@extends('master')

@section('content')

<div class="row">
 <div class="col-md-12">
  <br />
  <h3 align="center">Student Data</h3>
  <br />
  @if($message = Session::get('success'))
  <div class="alert alert-success">
   <p>{{$message}}</p>
  </div>
  @endif
  <div align="right">
   <a href="{{route('student.create')}}" class="btn btn-primary">Add</a>
   <br />
   <br />
  </div>
  <table class="table table-bordered table-striped" ">
   <tr>
    <th width="20%">Name</th>
    <th width="25%">E-mail</th>
    <th width="8%">Age</th>
    <th width="15%">Image</th>
    <th width="36%" colspan="2" style="text-align:center;">Action</th>
   </tr>
   @foreach($students as $row)
   <tr>
    <td>{{$row['name']}}</td>
    <td>{{$row['email']}}</td>
    <td>{{$row['age']}}</td>
    <td><img src="{{ URL::to('/') }}/images/{{ $row->image }}" class="img-thumbnail" width="75" /></td>
    <td style="text-align:center;" > <form method="post" class="delete_form" action="{{action('StudentController@destroy', $row['id'])}}">
      <a href="{{action('StudentController@show', $row['id'])}}" class="btn btn-primary">Show</a>
      <a href="{{action('StudentController@edit', $row['id'])}}" class="btn btn-warning">Edit </a>
        {{csrf_field()}}
      <input type="hidden" name="_method" value="DELETE" />
      <button type="submit" class="btn btn-danger "> Delete</button>
     </form>
    </td>
   </tr>
   @endforeach
  </table>
  {!! $students->links() !!}
 </div>
</div>
<script>
$(document).ready(function(){
 $('.delete_form').on('submit', function(){
  if(confirm("Are you sure you want to delete it?"))
  {
   return true;
  }
  else
  {
   return false;
  }
 });
});
</script>

@endsection