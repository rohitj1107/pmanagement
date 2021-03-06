@extends('layouts.app')
@section('content')

<div class="row col-md-9 col-lg-9 col-sm-9 pull-left">
  <div class="row col-md-12 col-lg-9 col-sm-9" style="background: white; margin:10px" >
    <form action="{{ route('companies.store') }}" method="post">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="company-name">Name <span class="required"></span> </label>
        <input type="text" class="form-control" id="company-name" name="name">
      </div>
      <div class="form-group">
        <label for="company-name">Description <span class="required"></span> </label>
        <textarea type="text" class="form-control autosize-target text-left" style="resize: vertical" rows="5"
         id="company-name" name="description"></textarea>
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
