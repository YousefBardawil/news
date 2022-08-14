@extends('cms.parent');

@section('tittle' , 'edit new post')

@section('main-tittle' , 'edit post')
@section('sub-tittle' , 'edit')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit data of post </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
        <div class="form-group">
          <label for="post">post</label>
          <input type="text" class="form-control" id="post" name="post" value="{{ $posts->post }}" placeholder="">
        </div>

      <!-- /.card-body -->

      <div class="card-footer">
        <button onclick="performUpdate({{ $posts->id }})" type="button" class="btn btn-primary">update</button>
      </div>
    </form>
  </div>

@endsection

@section('scripts')

<script>

  function performUpdate(id){
    let formData = new FormData;
   formData.append('post' ,document.getElementById('post').value );

   storeRoute('/cms/admin/posts_update/'+id ,formData);

  }

</script>
@endsection





