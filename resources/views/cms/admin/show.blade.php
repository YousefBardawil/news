@extends('cms.parent');

@section('tittle' , 'admin details')

@section('main-tittle' , 'admin')
@section('sub-tittle' , 'admin')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title"> Admin Details </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
           <div class="row">
            <div class="form-group col-md-4">
                <label for="first_name">Full_name</label>
                <input value="{{ $admins->user->first_name . ' '. $admins->user->last_name }}" disabled class="form-control form-control-solid">
              </div>

                <div class="form-group col-md-4">
                  <label for="mobile ">Mobile</label>
                  <input value="{{ $admins->user->mobile }}" disabled class="form-control form-control-solid">
                </div>
           </div>
             <div class="row">
                <div class="form-group col-md-4">
                    <label for="date_of_birth">Date_of_Birth</label>
                    <input value="{{ $admins->user->date_of_birth }}" disabled class="form-control form-control-solid">
                  </div>

                <div class="form-group col-md-4">
                    <label for="email">email</label>
                    <input value="{{ $admins->email }}" disabled class="form-control form-control-solid">
                </div>

                <div class="form-group col-md-4">
                   <label for="gender">Gender</label>
                   <input value="{{ $admins->user->gender }}" disabled class="form-control form-control-solid">
                </div>

          <div class="row">

               <div class="form-group col-md-4">
                   <label for="status">Status</label>
                   <input value="{{ $admins->user->status }}" disabled class="form-control form-control-solid">
                </div>
                <div class="form-group col-md-4">
                    <label for="country">Country</label>
                    <input value="{{ $admins->user->country->country_name }}" disabled class="form-control form-control-solid">
                 </div>

                 <div class="form-group col-md-4">
                    <label for="image">Image</label>
                    <div>
                        <img class="img-circle img-bordered-sm" src="{{ asset('images/admin/'. $admins->user->image)  }}" width="50" alt="">

                    </div>
                  </div>
          </div>

      </div>
      <!-- /.card-body -->


    </form>
    <div class="card-footer">
        <a href="{{ route('admins.index') }}" type="submit" class="btn btn-success">Index page</a>
        </div>
  </div>



@endsection

@section('scripts')



@endsection





