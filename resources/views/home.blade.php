@extends('layouts.app')

@section('title')
  <title>OSU | DASHBOARD</title>
@endsection

@section('a1')
  class="active"
@endsection

@section('content')
<div class="content-inner">
  <section class="forms py-0">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card my-3">
            <div class="card-close CC">
              <button type="button" class="btn btn-outline-danger btn-block" data-toggle="modal" data-target="#searchmodal">Filter Search</button>
              <div class="modal fade " id="searchmodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">BOR MEETING FILTER</h5>
                        </div>
                        <form method="GET" action="{{ url('/Dashboard/search') }}" role="search" class="navbar-form navbar-left mb-0">
                        <div class="modal-body">
                            <div class="row">
                              <div class="col-6">
                                <select class="custom-select w-100" name="month" id="S-month">
                                </select>
                              </div>
                              <div class="col-6">
                                <select class="custom-select w-100" name="year" id="S-year">
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="recipient-name" class="col-form-label"></label>
                              <input type="text" class="form-control" name="search" id="S-txt" placeholder="Enter BOR Meeting No. or Venue or Keywords:">
                            </div>
                          
                        </div>
                        <div class="modal-footer">
                          <button id="clearsearch" type="button" class="btn btn-outline-secondary w-50" data-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-danger w-50">Search</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">BOR Meetings</h3>
            </div>
            <div class="card-body p-2" style="height: calc(100vh - 265px);overflow: auto;">
              <table class="table table-striped">
                <thead>
                <tr>
                  <!--<th class="text-center">#</th>-->
                  <th class="text-center" style="vertical-align: middle; width:17%">Title</th>
                  <th class="text-center" style="vertical-align: middle; width:17%">Place</th>
                  <th class="text-center" style="vertical-align: middle; width:17%">Date</th>
                  <th class="text-center" style="vertical-align: middle; width:17%">File</th>
                  <th class="text-center" style="vertical-align: middle; width:17%">Tags</th>
                  <th class="text-center" style="vertical-align: middle; width:17%">Note</th>
                  <th class="text-center" style="vertical-align: middle; width:5%">Status</th>
                </tr>
              </thead>
                <tbody>
                  @foreach($meetings as $meeting)
                  <tr>
                    <!--<td class="p-2" style="vertical-align: middle;width: 5%;">
                      <p class="mb-0 py-auto text-center ">{{ $loop->iteration }}</p>
                    </td>-->
                    <td class="p-2" style="vertical-align: middle; width:17%">
                      <p class="mb-0 py-auto text-center "><?php echo $meeting->MeetingName ?></p>
                    </td>
                    <td class="p-2" style="vertical-align: middle; width:17%">
                      <p class="mb-0 py-auto text-center "><?php echo $meeting->Venue ?></p>
                    </td>
                    <td class="p-2" style="vertical-align: middle; width:17%">
                      <p class="mb-0 py-auto text-center "><?php echo date('F j Y', strtotime($meeting->MeetingDate)); ?></p>
                    </td>
                    <td class="p-2" style="vertical-align: middle; width:17%">
                       <a class="btn navbar-btn text-center w-100 text-white btn-danger" href="{{ URL::to('/') }}/Meetings/<?php echo $meeting->MeetingFileName ?>" target="_blank" style="cursor: pointer;"><i class="fa d-inline fa-lg fa-file-pdf-o mx-2"></i>FILE</a>
                    </td>
                    <td>
                      <?php $tags= explode(",",$meeting->tags); ?>
                        @foreach($tags as $tag)
                          <span class="badge badge-info"><?php echo trim($tag); ?></span>
                        @endforeach
                    </td>
                    <td class="p-2" style="vertical-align: middle; width:17%">
                      <p class="mb-0 py-auto text-center tp"><?php echo $meeting->Note ?></p>
                    </td>
                    <td class="p-2" style="text-align:center;vertical-align: middle; width:17%">
                      <p class="mb-0 py-auto text-center ">{{ $meeting->MeetingShow }}</p>
                    </td>
                  </tr>
                  @endforeach
                </tbody>                      
              </table>
            </div>
            {{ $meetings->links() }}

            <!--@include('layouts.paginator', ['paginator' => $meetings])-->
          </div>

        </div>
      </div>
    </div>
  </section>
</div>


@endsection

@section('script')
<script type="text/javascript">
  var end = 1900;
  var start = new Date().getFullYear();
  var optionyear = "";
  optionyear += "<option selected hidden>Year...</option>";
  for(var year = start ; year >=end; year--){
      optionyear += "<option value="+year+">"+ year +"</option>";
  }
  document.getElementById("S-year").innerHTML = optionyear;

  var optionsmonth = "";
  var monthNames = [ "January", "February", "March", "April", "May", "June",
      "July", "August", "September", "October", "November", "December" ];
  var a = 0;
  optionsmonth += "<option selected hidden>Month...</option>";
  for(this.a ; this.a <= (this.monthNames.length - 1); this.a++){
      optionsmonth += "<option value="+ (this.a + 1) +">"+ this.monthNames[this.a] +"</option>";
  }
  document.getElementById("S-month").innerHTML = optionsmonth;

  $("#clearsearch").click(function(){         
    $("#S-month").prop('selectedIndex',0);
    $("#S-year").prop('selectedIndex',0);
    $("#S-txt").val("");
  });
</script>
@endsection