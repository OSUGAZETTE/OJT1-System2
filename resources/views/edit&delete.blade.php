@extends('layouts.app')

@section('title')
  <title>OSU | ADMIN EDIT & DELETE DOCUMENT</title>
@endsection

@section('a2')
  class="active"
@endsection

@section('content')
<div class="content-inner">
  <ul class="breadcrumb">
    <div class="container-fluid">
      <li class="breadcrumb-item ">Meetings</li>
      <li class="breadcrumb-item active">Edit & Delete Option</li>
    </div>
  </ul>
  <section class="forms py-0">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <form class="form-horizontal" data-parsley-validate id="editform" method="post" name="editform" enctype="multipart/form-data" action="{{ route('Editpdf') }}">
            {{ csrf_field() }}
            <div class="card my-3">
              <div class="card-header d-flex align-items-center">
                <h3 class="h4">Meeting Information</h3>
              </div>
              @if(session()->has('status2'))
                @if (session('status'))
                  <div class="alert alert-success text-center mb-0 w-100 p-2 formalert" role="alert">
                  {{ session('status') }}
                  </div>
                @endif
              @endif
              <div class="card-body editf">
               <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Meeting Name : </label>
                        <div class="col-sm-9">
                          <input type="text" id="meeting_name" name='meeting_name' class="form-control" data-parsley-trigger="focus" data-parsley-error-message="Invalid! This is required and must not contain numbers or special characters" value="{{ old('meeting_name') }}">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Meeting Date : </label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control" data-parsley-trigger="focus" data-parsley-type="date" data-parsley-required-message="This field is required" id="date"  name="date" value="{{ old('date') }}">
                          </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Meeting Venue : </label>
                          <div class="col-sm-9">
                            <input type="text" id="venue" name="venue" class="form-control" data-parsley-trigger="focus" data-parsley-error-message="Invalid! This is required and must not contain numbers or special characters" value="{{ old('venue') }}" >
                          </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Meeting Document <small>(PDF)</small> : </label>
                          <div class="col-sm-9">
                            <input id="myfile" type="file" data-parsley-fileextension='pdf' data-parsley-maxfilesize="10" id="meetingfile" name="meetingfile" class="form-control" data-parsley-trigger="focus" data-parsley-required-message="This field is required" >
                          </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Meeting Note <small>(optional)</small> : </label>
                        <div class="col-sm-9">
                          <input type="text" id="note" name="note" class="form-control" data-parsley-trigger="focus" data-parsley-error-message="Invalid! This is <b>optional</b> and must not contain numbers or special characters" value="{{ old('note') }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Status: </label>
                        <div class="col-sm-9">
                          <select class="form-control" id="meetingshow" name="meetingshow" data-parsley-trigger="focus" data-parsley-error-message="Invalid! This is required and must not contain numbers or special characters" value="{{ old('meetingshow') }}" >
                            <option value="Hidden">Hide</option>
                            <option value="Shown">Show</option>
                          </select>
                        </div>
                      </div>
                <div class="line my-4"></div>
                <div class="form-navigation btn-group w-100 my-1">
                  <input class="mi btn btn-danger w-50" id="submit" type="submit" value="SUBMIT"> <button class="mi btn btn-outline-danger w-50" id="cancel" type="button" value="">CANCEL</button>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-4">
          <div class="card my-3">
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">Meeting List</h3>
            </div>
            @if(session()->has('status'))
              @if (session('status'))
                <div class="alert alert-success text-center mb-0 w-100 p-2 formalert" role="alert">
                {{ session('status') }}
                </div>
              @endif
            @endif
            <div class="card-body p-2" style="height: calc(100vh - 260px);overflow: auto;">
              <table class="table table-striped">
                <tbody>
                  @foreach($meetings as $meeting)
                  <tr>
                    <td class="p-2" style="vertical-align: middle; width: 30%;">
                      <div class="form-navigation">
                        <button style="cursor: pointer;" id="<?php echo $meeting->MeetingID ?>" class="editbtn mi btn btn-danger w-100 p-0" >EDIT</button> 
                        <a href="/Delete/<?php echo $meeting->MeetingID ?>" class="w-100"><button  class="mi btn btn-outline-danger w-100 p-0" type="button">DELETE</button></a>
                      </div>
                    </td>
                    <td class="p-2" style="vertical-align: middle; width:70%">
                      <p class="mb-0 py-auto text-center tp">"<?php echo $meeting->MeetingName ?>"</p>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            {{ $meetings->links() }}
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection

@section('script')
<script>  
  
  $('#cancel').on('click', function() {
    $('#editform').trigger("reset");
  });
  window.Parsley.addValidator('fileextension', function(value, requirement) {
    // the value contains the file path, so we can pop the extension
    var fileExtension = value.split('.').pop();
    return fileExtension === requirement;
  }, 32).addMessage('en', 'fileextension', 'The extension doesn\'t match the required');
  $("#editform").parsley();
  window.Parsley.addValidator('maxfilesize', {
    validateString: function(_value, maxSize, parsleyInstance) {
      var files = parsleyInstance.$element[0].files;
      return files.length != 1 || files[0].size <= 10485760;
    },
    requirementType: 'integer',
    messages: {
      en: 'This file should not be larger than %s Mb',
    }
  });

  $(".editbtn").click(function(e){
    e.preventDefault();
    var id = $(this).prop("id");
    if(id != undefined){
      $.ajax({
        type: 'GET',
        dataType: 'json',
        url: 'GetData',
        data: {id:id},
        success: function(data)
        { 
          if(document.getElementById("eid")){
            $("input[type='hidden']").remove();
          }
          $('<input>').attr({
              type: 'hidden',
              id: 'eid',
              name: 'eid',
              value: data[0].MeetingID
          }).appendTo('form');
          $('#meeting_name').val(data[0].MeetingName);
          $('#date').val(data[0].MeetingDate);
          $('#venue').val(data[0].Venue);
          $('#meetingshow').val(data[0].MeetingShow);
          if(data[0].Note != ''){
            $('#note').val(data[0].Note);
          }
          
        }
      });
    }
  });



</script>
@endsection
  