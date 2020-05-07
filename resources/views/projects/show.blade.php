@extends('layouts.app')
@section('content')
<div class="container col-md-9 col-lg-9 col-ms-9 pull-left">
  <div class="jumbotron">
    <h1>{{$result->name}}</h1>
    <p class="lead">
      {{$result->description}}
    </p>
  </div>
  <a href="/project/create" class="pull-right btn-sm btn btn-primary" >Add Projects</a>

  <div class="row" style="background: white; margin:10px">

    @foreach($result->projects as $project)
    <div class="col-lg-4">
      <h2 class="">{{$project->name}}</h2>
      <p class="">{{$project->description}}</p>
      <p><a class="btn btn-primary" href="/projects/{{ $project->id }}" role="button">View project</a> </p>
    </div>
    @endforeach

  </div>
</div>
<div class="col-md-3 col-lg-3 com-sm-3 pull-right">
  <div class="sidebar-model">
    <h4>Actions</h4>
    <ol class="list-unstyled">
      <li><a href="/companies/{{$result->id}}/edit">Edit</a> </li>
      <li>
        <a href="#" onClick="var result = confirm('Are you sure you wish to delete this Project?');
        if(result){
        	event.preventDefault();
        	document.getElementById('delete-form').submit();
        }">
        Delete</a>
        <form id="delete-form" action="{{ route('companies.destroy',[$result->id]) }}" method="post" style="display: none;">
        <input type="hidden" name="_method" value="delete">
        {{ csrf_field() }}
        </form>

       </li>
      <li><a href="/project/create/">Add Project</a> </li>
      <li><a href="/companies/create/">Create a New Company</a> </li>
      <li><a href="/companies/">My companys</a> </li>

    </ol>
  </div>
  <!-- <div class="sidebar-model">
    <h4></h4>
    <ol class="unstyled">
      <li></li>
    </ol>
  </div> -->
</div>

@endsection
