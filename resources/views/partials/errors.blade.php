@if(session()->has('errors'))
  <div class="alert alert-dismissable alert-danger">
    <button type="button" class="close" data-dismiss="alert" arial-label="close" name="button">
      <span aria-hidden="true">&items;</span>
    </button>
    <strong>
      {!! session()->get('success') !!}
    </strong>
  </div>
@endif
