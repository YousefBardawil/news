@extends('cms.parent');

@section('tittle' , 'create new post')

@section('main-tittle' , 'create post')
@section('sub-tittle' , 'create')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Create post </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
        <div class="form-group">
          <label for="post">post_name</label>
          <input type="text" class="form-control" id="post" name="post" placeholder="Enter post ">
        </div>



      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <a href="{{ route('posts.index') }}" type="submit" class="btn btn-success">Index page</a>
        <button onclick="performStore()" type="button" class="btn btn-primary">Store</button>
      </div>
    </form>
  </div>

@endsection

@section('scripts')

<script>
  function performStore(){
    let formData = new FormData;
   formData.append('post' ,document.getElementById('post').value );

   store('/cms/admin/posts',formData);


  }

</script>

@endsection





