@extends('cms.parent');

@section('tittle' , 'edit new comment')

@section('main-tittle' , 'edit comment')
@section('sub-tittle' , 'edit')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit data of comment </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
        <div class="form-group">
          <label for="comment">comment_name</label>
          <input type="text" class="form-control" id="comment" name="comment" value="{{ $comments->comment }}" placeholder="">
        </div>


          <div class="form-group col-md-4">
            <label for="post_id">post</label>
            <select class="form-control select2" name="post_id" style="width: 100%;" id="post_id">
                   <option selected value="{{$comments->post->id}} " >{{$comments->post->post}} </option>
                   @foreach ($posts as $post )
                   <option value="{{ $post->id }}"> {{ $post->post }} </option>
                   @endforeach
            </select>
          </div>

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button onclick="performUpdate({{ $comments->id }})" type="button" class="btn btn-primary">update</button>
      </div>
    </form>
  </div>

@endsection

@section('scripts')

<script>

  function performUpdate(id){
    let formData = new FormData;
   formData.append('comment' ,document.getElementById('comment').value );
   formData.append('post_id' ,document.getElementById('post_id').value );


   storeRoute('/cms/admin/comments_update/'+id ,formData);

  }

</script>
@endsection





