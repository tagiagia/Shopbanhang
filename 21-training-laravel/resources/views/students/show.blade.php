@extends('students.layout')
@section('content')
<div class="card">
  <div class="card-header">Student View</div>
  <div class="card-body"> 
 <table class="table table-striped table-dark">
  <thead>
    <tr>
      
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Mobile</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>{{ $students->name }}</td>
      <td>{{ $students->address }}</td>
      <td>{{ $students->mobile }}</td>
    </tr>
  </tbody>
</table>
  </div>
      
    </hr>
  
  </div>
</div>