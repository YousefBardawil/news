@extends('cms.parent');

@section('tittle' , 'create new comment')

@section('main-tittle' , 'create comment')
@section('sub-tittle' , 'create')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Create comment </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
        <div class="form-group">
          <label for="comment">comment</label>
          <input type="text" class="form-control" id="comment" name="comment" placeholder="Enter comment">
        </div>



          <div class="form-group">
            <label for="post_id">post</label>
            <select class="form-control select2" name="post_id" style="width: 100%;" id="post_id">

                   @foreach ($posts as $post )
                   <option value="{{ $post->id }}"> {{ $post->post }} </option>
                   @endforeach
            </select>
          </div>

      </div>

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <a href="{{ route('comments.index') }}" type="submit" class="btn btn-success">Index page</a>
        <button onclick="performStore()" type="button" class="btn btn-primary">Store</button>
      </div>
    </form>
  </div>

@endsection

@section('scripts')

<script>
  function performStore(){
    let formData = new FormData;
   formData.append('comment' ,document.getElementById('comment').value );
   formData.append('post_id' ,document.getElementById('post_id').value );


   store('/cms/admin/comments',formData);


  }

</script>

@endsection





