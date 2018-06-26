@extends('templates.admins.master')

@section('stylesheets')

  <link href= "{{ asset('css/parsley.css') }}" rel="stylesheet">
  <link href= "{{ asset('css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="x_panel">
        <div class="x_title">
            <h2>Tambah Beasiswa</h2>
            <div class="clearfix"></div>
            </div>
            <div class="x_content">
            <br />
            <form class="form-horizontal form-label-left" action="{{ route('addScholarship.store') }}" method="post"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    
                    <div class="form-group">
                        <label class="control-label col-md-2">Poster Beasiswa
                        </label>
                        <div class="col-md-4">
                        {{--  <input type="file" class="form-control" name="name" placeholder="Nama Beasiswa" class="form-control col-md-9 col-xs-12">  --}}
                        <input type="file" class="form-control" name="image" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2">Nama Beasiswa
                          <span class="required">*</span>
                        </label>
                        <div class="col-md-9">
                        <input type="text" class="form-control" required="required" name="name" placeholder="Nama Beasiswa" class="form-control col-md-9 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">Perusahaan 
                          <span class="required">*</span>
                        </label>
                        <div class="col-md-9">
                        <input type="text" class="form-control" name="firm" placeholder="Nama Perusahaan" required="required">
                        </div>
                    </div>


                    <div class="form-group">
                      <label class="control-label col-md-2">Program 
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-9">
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="D3" name="d3">
                              <label class="form-check-label" for="inlineCheckbox1">D3</label>
                             
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="S1" name="s1">
                              <label class="form-check-label" for="inlineCheckbox1">S1</label>

                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="S2" name="s2">
                              <label class="form-check-label" for="inlineCheckbox1">S2</label>

                              
                          </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-2">Semester
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-9">
                      <input type="text" class="form-control" name="semester" placeholder="1-2" required="required">
                      </div>
                   </div>
        
                  <div class="form-group">
                    <label class="control-label col-md-2">Fakultas </label>
                    <div class="col-md-9">
                    <input type="text" class="form-control" name="faculty" placeholder="FMIPA, FATETA" required="required">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-2">Minimum IPK</label>
                    <div class="col-md-9">
                    <input type="text" class="form-control" name="gda" placeholder="2.7" required="required">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-2">Batas Pendaftaran 
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-9">
                    <input type="text" class="form-control datepicker" name="deadline" id="date" required="required">
                    </div>
                    <script>
                      $('#date').datepicker({
                        startDate: new Date(),
                        format: 'dd-mm-yyyy',
                        todayHighlight:'TRUE',
                        autoclose: true
                      });    
                    </script>
                  </div>
                  


                    <div class="control-group">
                      <label class="control-label col-md-2">Select Tags</label>
                      <div class="col-md-9">
                        <select class="tags form-control select2-multi" tabindex="-1" multiple="multiple" name="tags[]">
                          @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                          @endforeach 
                        </select>
                        <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                      </div>
                    </div>
                  {{--  </div>  --}}
                  

                  
                  <div class="form-group">
                      
                  <div class="item form-group">
                    <label class="control-label col-md-2" for="textarea">Deskripsi <span class="required">*</span>
                    </label>
                    <div class="col-md-9">
                      <textarea id="konten" required="required" name="description" class="form-control col-md-9 col-xs-12" required="required"></textarea>
                    </div>
                  </div>
                 </div>
              
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-success">Submit</button>
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
	</script>
@endsection