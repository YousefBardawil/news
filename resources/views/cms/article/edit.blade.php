@extends('cms.parent');

@section('tittle' , 'edit new article')

@section('main-tittle' , 'edit article')
@section('sub-tittle' , 'edit')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit data of article </h3>
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

          <input type="text" name="author_id" id="author_id" value="{{$articles->author->id}}"
                    class="form-control form-control-solid" hidden/>


        <div class="form-group">
          <label for="title"> article-title</label>
          <input type="text" class="form-control" id="title" name="title" value="{{ $articles->title }}" placeholder="">
        </div>
        <div class="form-group">
            <label for="short_description"> short_description</label>
            <input type="text" class="form-control" id="short_description" name="short_description" value="{{ $articles->short_description }}" placeholder="">
          </div>

        <div class="form-group">
        <div><label for="full_description">description of the article</label> </div>
          <textarea name="full_description" id="full_description"  rows="20" cols="60"> {{ $articles->full_description }} </textarea>
          </div>

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button onclick="performUpdate({{ $articles->id }})" type="button" class="btn btn-primary">update</button>
      </div>
    </form>
  </div>

@endsection

@section('scripts')

<script>

  function performUpdate(id){
    let formData = new FormData;
   formData.append('title' ,document.getElementById('title').value );
   formData.append('short_description' ,document.getElementById('short_description').value );
   formData.append('full_description' ,document.getElementById('full_description').value );
   formData.append('category_id' ,document.getElementById('category_id').value );
   formData.append('author_id' ,document.getElementById('author_id').value );


   storeRoute('/cms/admin/articles_update/'+id ,formData);

  }

</script>
@endsection





