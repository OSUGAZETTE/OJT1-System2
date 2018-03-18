@extends('layouts.app')

@section('title')
  <title>OSU | ADMIN UPLOAD DOCUMENT</title>
@endsection

@section('a2')
  class="active"
@endsection

@section('content')
        <div class="content-inner">
         <ul class="breadcrumb">
            <div class="container-fluid">
              <li class="breadcrumb-item ">Meetings</li>
              <li class="breadcrumb-item active">Upload Option</li>
            </div>
          </ul>
         <section class="forms py-0"> 
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                  <form id="uploadform" class="form-horizontal" data-parsley-validate enctype="multipart/form-data" method="post" action="{{ route('Uploadpdf') }}" >

                  {{ csrf_field() }}

                  <div class="card my-3">
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4"> Information</h3>
                    </div>

                    <div class="card-body">
                   
                    @if ($errors->any())
                      <div class="alert alert-danger mx-auto p-2 formalert" role="alert">
                        @foreach ($errors->all() as $error)
                          <p class="m-0">{{ $error }}</p>
                        @endforeach
                      </div>
                    @endif
                    
                    @if(session()->has('status'))
                      @if (session('status'))
                        <div class="alert alert-success mx-auto p-2 formalert" role="alert">
                         {{ session('status') }}
                        </div>
                      @endif
                    @endif
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Meeting Name : </label>
                        <div class="col-sm-9">
                          <input type="text" name='meeting_name' class="form-control" data-parsley-trigger="focus" data-parsley-error-message="Invalid! This is required and must not contain numbers or special characters" value="{{ old('meeting_name') }}" required>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Meeting Date : </label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control" data-parsley-trigger="focus" data-parsley-type="date" data-parsley-required-message="This field is required" required  name="date" value="{{ old('date') }}">
                          </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Meeting Venue : </label>
                          <div class="col-sm-9">
                            <input type="text" name="venue" class="form-control" data-parsley-trigger="focus" data-parsley-error-message="Invalid! This is required and must not contain numbers or special characters" value="{{ old('venue') }}" required>
                          </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Meeting Document <small>(PDF)</small> : </label>
                          <div class="col-sm-9">
                            <input id="myfile" type="file" data-parsley-fileextension='pdf' data-parsley-maxfilesize="10" name="meetingfile" class="form-control" data-parsley-trigger="focus" data-parsley-required-message="This field is required" required >
                          </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Meeting Note <small>(optional)</small> : </label>
                        <div class="col-sm-9">
                          <input type="text" name="note" class="form-control" data-parsley-trigger="focus" data-parsley-error-message="Invalid! This is <b>optional</b> and must not contain numbers or special characters" value="{{ old('note') }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Status: </label>
                        <div class="col-sm-9">
                          <select class="form-control" id="meetingshow" name="meetingshow" data-parsley-trigger="focus" data-parsley-error-message="Invalid! This is required and must not contain numbers or special characters" value="{{ old('meetingshow') }}" >
                            <option value="Hide">Hide</option>
                            <option value="Show">Show</option>
                          </select>
                        </div>
                      </div>
                      <div class="line my-4"></div>
                      <div class="form-navigation btn-group w-100 my-1">
                        <input id="submit" type="submit" value="SUBMIT" class="mi btn btn-danger w-50" > 
                        <button id="cancel" class="mi btn btn-outline-danger w-50" type="button" value="">CANCEL</button> 
                      </div>
                    </div>
                  </div> 
                  </form>
                </div>
              </div>
            </div>
          </section>
        </div>
@endsection

@section('script')
    <script>

    $('#cancel').on('click', function () {
      $('#uploadform').trigger("reset");
    });

    window.Parsley
      .addValidator('fileextension', function (value, requirement) {
        // the value contains the file path, so we can pop the extension
        var fileExtension = value.split('.').pop();
          return fileExtension === requirement;
      }, 32)
      .addMessage('en', 'fileextension', 'The extension doesn\'t match the required');
    $("#uploadform").parsley();

    window.Parsley.addValidator('maxfilesize', {
      validateString: function(_value, maxSize, parsleyInstance) {
        var files = parsleyInstance.$element[0].files;
        return files.length != 1  || files[0].size <= 10485760;
      },
      requirementType: 'integer',
      messages: {
        en: 'This file should not be larger than %s Mb',
      }
    });
    </script>
@endsection