@extends('cms.parent');

@section('tittle' , 'author details')

@section('main-tittle' , 'author')
@section('sub-tittle' , 'author')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title"> author Details </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
           <div class="row">
            <div class="form-group col-md-4">
                <label for="first_name">First_name</label>
                <input value="{{ $authors->user->first_name }}" disabled class="form-control form-control-solid">
              </div>
              <div class="form-group col-md-4">
                  <label for="last_name">Last_name</label>
                  <input value="{{ $authors->user->last_name }}" disabled class="form-control form-control-solid">
                </div>
                <div class="form-group col-md-4">
                  <label for="mobile ">Mobile</label>
                  <input value="{{ $authors->user->mobile }}" disabled class="form-control form-control-solid">
                </div>
           </div>
             <div class="row">
                <div class="form-group col-md-4">
                    <label for="date_of_birth">Date_of_Birth</label>
                    <input value="{{ $authors->user->date_of_birth }}" disabled class="form-control form-control-solid">
                  </div>

                <div class="form-group col-md-4">
                    <label for="email">email</label>
                    <input value="{{ $authors->email }}" disabled class="form-control form-control-solid">
                </div>

                <div class="form-group col-md-4">
                   <label for="gender">Gender</label>
                   <input value="{{ $authors->user->gender }}" disabled class="form-control form-control-solid">
                </div>

          <div class="row">

               <div class="form-group col-md-4">
                   <label for="status">Status</label>
                   <input value="{{ $authors->user->status }}" disabled class="form-control form-control-solid">
                </div>
                <div class="form-group col-md-4">
                    <label for="country">Country</label>
                    <input value="{{ $authors->user->country->country_name }}" disabled class="form-control form-control-solid">
                 </div>

                 <div class="form-group col-md-4">
                    <label for="image">Image</label>
                    <div>
                        <img class="img-circle img-bordered-sm" src="{{ asset('images/author/'. $authors->user->image)  }}" width="50" alt="">

                    </div>
                  </div>
          </div>

      </div>
      <!-- /.card-body -->


    </form>
    <div class="card-footer">
        <a href="{{ route('authors.index') }}" type="submit" class="btn btn-success">Index page</a>
        </div>
  </div>



@endsection

@section('scripts')



@endsection





