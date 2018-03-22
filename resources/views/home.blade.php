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
              <form method="GET" action="{{ url('/Home') }}" role="search" class="navbar-form navbar-left mb-0">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control " name="search" placeholder="Search..." > 
                      <span class="input-group-btn">
                        <button class="mi btn text-white btn-danger" type="submit">
                            Submit
                        </button>
                      </span>
                </div>
              </form>
               <form method="GET" action="{{ url('/Date') }}" role="search" class="navbar-form navbar-left mb-0">
                <div class="input-group custom-search-form">
                    <select name="month">
                      <option value="Month">Month</option>
                      <option value="01">January</option>
                      <option value="02">February</option>
                      <option value="03">March</option>
                      <option value="04">April</option>
                      <option value="05">May</option>
                      <option value="06">June</option>
                      <option value="07">July</option>
                      <option value="08">August</option>
                      <option value="09">September</option>
                      <option value="10">October</option>
                      <option value="11">November</option>
                      <option value="12">December</option>
                    </select>
                    <select id="year" name="year">
                      <option value="0">Year</option>
                    </select>
                    <button class="mi btn text-white btn-danger" type="submit">
                            Submit
                    </button>
                </div>
              </form>
            </div>
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">Meetings</h3>
            </div>
            <table class="table mb-0">
              <thead>
                <tr>
                  <!--<th class="text-center">#</th>-->
                  <th class="text-center" style="vertical-align: middle; width:17%">Title</th>
                  <th class="text-center" style="vertical-align: middle; width:17%">Place</th>
                  <th class="text-center" style="vertical-align: middle; width:17%">Date</th>
                  <th class="text-center" style="vertical-align: middle; width:17%">File</th>
                  <th class="text-center" style="vertical-align: middle; width:17%">Note</th>
                  <th class="text-center" style="vertical-align: middle; width:17%">Status</th>
                </tr>
              </thead>
            </table>
            <div class="card-body p-2" style="height: calc(100vh - 265px);overflow: auto;">
              <table class="table table-striped">
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