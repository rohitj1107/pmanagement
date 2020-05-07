@extends('layouts.app')
@section('content')

<div class="row col-md-9 col-lg-9 col-sm-9 pull-left">
  <div class="row col-md-12 col-lg-9 col-sm-9" style="background: white; margin:10px" >
    <form action="{{ route('project.store') }}" method="post">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="project-name">Name <span class="required"></span> </label>
        <input type="text" class="form-control" id="project-name" name="name">
        <input type="hidden" class="form-control" id="comapny-id" name="comapny_id" value="{{ $comapny_id }}">
      </div>
      <div class="form-group">
        <label for="project-name">Description <span class="required"></span> </label>
        <textarea type="text" class="form-control autosize-target text-left" style="resize: vertical" rows="5"
         id="project-name" name="description"></textarea>
      </div>
      <div class="form-group">
        <label for="project-name">Days <span class="required"></span> </label>
        <select class="form-group" name="days">
          <option value="10">10</option>
          <option value="20">20</option>
          <option value="30">30</option>
        </select>
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-primary" value="submit">
      </div>
    </form>
  </div>
</div>

<div class="col-md-3 col-lg-3 com-sm-3 pull-right">
  <div class="sidebar-model">
    <h4>Actions</h4>
    <ol class="list-unstyled">
      <li><a href="/companies/">All Companies</a> </li>
    </ol>
  </div>
</div>


@endsection
