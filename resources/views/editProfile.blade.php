@extends('templates.master')

@section('header')
<header class="masthead" style="background-image: url({!! asset('assets/img/ipba.jpg') !!})">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-8">
            <div class="site-heading">
                <h3>"Searching and Serving The Best"</h3>
            </div>
        </div>
        </div>
    </div>

</header>
@endsection()

@section('content')

<div class="container">
        {{-- <div class="row"> --}}
           
          <!-- left column -->
          {{-- <div class="col-md-4">
            <div class="text-center">
              <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
              <h6>Upload a different photo...</h6>
              
              <input type="file" class="form-control">
            </div>
          </div> --}}

          
         

       
          <!-- edit form column -->
          <div class="col-md-1 col-sm-1 col-xs-1"></div>
          <div class="col-md-2 col-sm-2 col-xs-2">
              <div class="text-center">
                  
                  @if ($user->avatar != null)
                    <img src="/storage/{{Auth::user()->avatar}}" class="avatar img-circle" alt="avatar"  height="100">  

                    @else
                      <img src="//placehold.it/100" class="avatar img-circle" alt="avatar"  height="100">      
                  @endif
                  
                  
              </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-6">

            {{-- alert --}}
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

            {{-- end alert --}}
            

              <form class="form-horizontal" method="post" action="{{ route('user.updateProfile') }}" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" >
                {{ csrf_field() }}
                {{ method_field('PATCH') }} 

                

                <div class="form-group">
                  <label class="col-md-4 control-label">Update Photo</label>
                  <div class="col-md-8">
                    <input type="file" id="first-name" name="avatar" value="{{ old('name', $user->avatar) }}" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Nama:</label>
                    <div class="col-md-8">
                      <input class="form-control" type="text" name="name" value="{{$user->name}}">
                    </div>
                  </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Email:</label>
                  <div class="col-md-8">
                    <input class="form-control" type="email" name="email" value="{{$user->email}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">NIM:</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="nim" value="{{$user->nim}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">Departemen:</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="department" value="{{$user->department}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">Fakultas:</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="faculty" value="{{$user->faculty}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">IPK:</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="gda" value="{{$user->gda}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">Semester:</label>
                  <div class="col-md-8">
                      <input class="form-control" type="text" name="semester" value="{{$user->semester}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">Program:</label>
                  <div class="col-md-8">
                      <input class="form-control" type="text" name="program" value="{{$user->program}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">Telepon:</label>
                  <div class="col-md-8">
                      <input class="form-control" type="text" name="telephon" value="{{$user->telephon}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label"></label>
                  <div class="col-md-8">
                    <button type="submit"  class="btn btn-success"> Save </button>
                    <span></span>
                    <input type="reset" class="btn btn-default" value="Cancel">
                  </div>
                </div>
              </form>
          </div>
          {{-- <div class="col-md-2 col-sm-2 col-xs-2"></div> --}}

          
            
          </div>
      </div>
    {{-- </div> --}}
@endsection()