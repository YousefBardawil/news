@extends('cms.parent');

@section('tittle' , 'create new article')

@section('main-tittle' , 'create article')
@section('sub-tittle' , 'create')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Create article </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
        <div class="form-group col-md-12">
            <label for="category_id">category</label>
            <select class="form-control select2" name="category_id" style="width: 100%;" id="category_id">

                   @foreach ($categories as $category )
                   <option value="{{ $category->id }}"> {{ $category->name }} </option>
                   @endforeach
            </select>
          </div>

          <input type="text" name="author_id" id="author_id" value="{{$id}}"
                    class="form-control form-control-solid" hidden/>


        <div class="form-group col-md-12">
          <label for="title">article-title</label>
          <input type="text" class="form-control" id="title" name="title" placeholder="Enter article title">
        </div>
        <div class="form-group col-md-12">
            <label for="short_description">short_description</label>
            <input type="text" class="form-control" id="short_description" name="short_description" placeholder="Enter short_description">
          </div>
        <div class="form-group col-md-12">
        <div><label for="full_description">full_description </label></div>
          <textarea name="full_description" style="resize: none;" id="full_description"  rows="10" cols="130"></textarea>
        </div>

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <a href="{{ route('articles.index') }}" type="submit" class="btn btn-success">Index page</a>
        <button onclick="performStore()" type="button" class="btn btn-primary">Store</button>
      </div>
    </form>
  </div>

@endsection

@section('scripts')

<script>
  function performStore(){
    let formData = new FormData;
   formData.append('title' ,document.getElementById('title').value );
   formData.append('short_description' ,document.getElementById('short_description').value );
   formData.append('full_description' ,document.getElementById('full_description').value );
   formData.append('category_id' ,document.getElementById('category_id').value );
   formData.append('author_id' ,document.getElementById('author_id').value );

   store('/cms/admin/articles',formData);


  }

</script>

@endsection





