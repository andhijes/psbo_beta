@extends('templates.admins.master')

@section('stylesheets')

  <link href= "{{ asset('css/parsley.css') }}" rel="stylesheet">
  <link href= "{{ asset('css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="x_panel">
        <div class="x_title">
            <h2>Edit Beasiswa</h2>
            <div class="clearfix"></div>
            </div>
            <div class="x_content">
            <br />
            <form class="form-horizontal form-label-left" action="{{ route('editScholarship.update', $scholarships->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }} 
                      
                   
                    <div class="form-group">
                        
                        <label class="control-label col-md-2">Poster Beasiswa
                        </label>
                        <div class="col-md-4">
                          <img src="{{$scholarships->getImage()}}" alt="" style="width:200px;height:250px;">
                          <input type="file" class="form-control" name="image" value="{{$scholarships->getImage()}}" >
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-2">
                            <a href="{{ route('scholarship.view', $scholarships->id) }}" class="btn btn-round btn-primary">Back</a>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2">Nama Beasiswa
                          <span class="required">*</span>
                        </label>
                        <div class="col-md-9">
                        <input type="text" class="form-control" name="name" value="{{ $scholarships->name }}" class="form-control col-md-9 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">Perusahaan 
                          <span class="required">*</span>
                        </label>
                        <div class="col-md-9">
                        <input type="text" class="form-control" name="firm" value="{{ $scholarships->firm }}">
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-2">Program 
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-9">
                      <input type="text" class="form-control" name="program" value="{{ $requirements->program }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-2">Semester
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-9">
                      <input type="text" class="form-control" name="semester" value="{{ $requirements->semester }}">
                      </div>
                   </div>
        
                  <div class="form-group">
                    <label class="control-label col-md-2">Fakultas </label>
                    <div class="col-md-9">
                    <input type="text" class="form-control" name="faculty" value="{{ $requirements->faculty }}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-2">Minimum IPK</label>
                    <div class="col-md-9">
                    <input type="text" class="form-control" name="gda" value="{{ $requirements->gda }}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-2">Batas Pendaftaran 
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-9">
                    <input type="date" class="form-control" value="{{ $requirements->deadline }}" name="deadline">
                    </div>
                  </div>

                  <div class="control-group">
                      <label class="control-label col-md-2">Select Tags</label>
                      <div class="col-md-9">
                        <select class="tags form-control select2-multi" tabindex="-1" multiple="multiple" name="tags[]">
                          @foreach ($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                          @endforeach 
                        </select>
                        <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                      </div>
                    </div>

                    {{--  {{ Form::label('tags', 'Tags:', ['class' => 'form-spacing-top']) }}
              			{{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}   --}}
                    
                  <div class="item form-group">
                    <label class="control-label col-md-2" for="textarea">Deskripsi <span class="required">*</span>
                    </label>
                    <div class="col-md-9">
                      <textarea id="konten" required="required" name="description" class="form-control col-md-9 col-xs-12">
                            {{ $scholarships->description }}
                      </textarea>
                    </div>
                  </div>
              
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-2">
                        <a href="{{ route('scholarship.read') }}" class="btn btn-danger">Cancel</a>
                        <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>
              </form>               
        </div>
    </div>

    @endsection

@section('script')
  <script src="{{ asset('js/select2.min.js') }}"></script>
  <script src="{{ asset('js/parsley.min.js') }}"></script>
  <script>
    CKEDITOR.replace( 'konten' );
  </script>
	<script type="text/javascript">
		$('.select2-multi').select2();
		$('.select2-multi').select2().val({!! json_encode($scholarships->tags()->allRelatedIds()) !!}).trigger('change');
	</script>
@endsection