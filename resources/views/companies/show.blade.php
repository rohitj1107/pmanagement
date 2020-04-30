@extends('layouts.app')
@section('content')
<div class="container">
  <div class="jumbotron">
    <h1>{{$result->name}}</h1>
    <p class="lead">
      {{$result->description}}
    </p>
  </div>
  <div class="row">
    
    @foreach($result->projects as $project)
    <div class="col-lg-4">
      <h2 class="">{{$project->name}}</h2>
      <p class="">{{$project->description}}</p>
      <p><a class="btn btn-primary" href="/projects/{{ $project->id }}" role="button">View project</a> </p>
    </div>
    @endforeach

  </div>
</div>
@endsection
