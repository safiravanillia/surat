@if(count($errors) )
    <div class="alert alert-danger alert-dismissible fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        @foreach ($errors->all() as $error)
            <strong>{{ $error }}</strong>
        @endforeach
  </div>
@endif