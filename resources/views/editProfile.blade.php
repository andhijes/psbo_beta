@extends('templates.master')

@section('header')
<header class="masthead" style="background-image: url({!! asset('assets/img/home-bg.jpg') !!})">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
            <h1>Edit Profile</h1>
            <span class="subheading">Lengkapi profile</span>
            </div>
        </div>
        </div>
    </div>

</header>
@endsection()

@section('content')

<div class="container">
        <div class="row">
           
          <!-- left column -->
          <div class="col-md-3">
            <div class="text-center">
              <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
              <h6>Upload a different photo...</h6>
              
              <input type="file" class="form-control">
            </div>
          </div>
          
          <!-- edit form column -->
          <div class="col-md-9 personal-info">
            <div class="alert alert-info alert-dismissable">
              <a class="panel-close close" data-dismiss="alert">×</a> 
              <i class="fa fa-coffee"></i>
              Edit profile untuk mencoba fitur match me.
            </div>

            @if (session()->has('success'))
              <div class="alert alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <strong> {{session()->get('success')}} </strong>
              </div>
            @endif

            <h3>Personal info</h3>
            
            <form class="form-horizontal" method="post" action="{{ route('user.updateProfile') }}" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" >
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }} 
              <div class="form-group">
                <label class="col-lg-3 control-label">Nama:</label>
                <div class="col-lg-8">
                  <input class="form-control" type="text" name="name" value="{{$user->name}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">Email:</label>
                <div class="col-lg-8">
                  <input class="form-control" type="email" name="email" value="{{$user->email}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">NIM:</label>
                <div class="col-lg-8">
                  <input class="form-control" type="text" name="nim" value="{{$user->nim}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">Departemen:</label>
                <div class="col-lg-8">
                  <input class="form-control" type="text" name="department" value="{{$user->department}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">Fakultas:</label>
                <div class="col-md-8">
                  <input class="form-control" type="text" name="faculty" value="{{$user->faculty}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">IPK:</label>
                <div class="col-md-8">
                  <input class="form-control" type="text" name="gda" value="{{$user->gda}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">Semester:</label>
                <div class="col-md-8">
                    <input class="form-control" type="text" name="semester" value="{{$user->semester}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">Program:</label>
                <div class="col-md-8">
                    <input class="form-control" type="text" name="program" value="{{$user->program}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">Telepon:</label>
                <div class="col-md-8">
                    <input class="form-control" type="text" name="telephon" value="{{$user->telephon}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-8">
                  <button type="submit"  class="btn btn-success"> Save </button>
                  <span></span>
                  <input type="reset" class="btn btn-default" value="Cancel">
                </div>
              </div>
            </form>
          </div>
      </div>
    </div>
    <hr>
@endsection()