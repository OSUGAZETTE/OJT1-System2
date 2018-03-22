@extends('layouts.home')

@section('title')
  <title>USeP - OSU</title>
@endsection

@section('content')
  <nav class="navbar navbar-expand-md navbar-dark sticky-top" style="background-color: #782b30;">
    <div class="container">
      <a class="navbar-brand" href="http://www.usep.edu.ph"><b style="font-weight: 400;">USeP OSU</b></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-white" href="#"><i class="fa d-inline fa-lg mx-2 fa-info-circle"></i>About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#"><i class="fa d-inline fa-lg mx-2 fa-file-pdf-o"></i>Gazette</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#"><i class="fa d-inline fa-lg mx-2 fa-address-book"></i>Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="py-5 d-flex align-items-center gradient-overlay" style="background-image: url('img/bg.jpg'); background-size: cover; background-position: center; height: 50vh;">
    <div class="container py-5">
      <div class="row">
        <div class="col-md-3 text-white">
          <img class="img-fluid d-block mx-auto mb-5 my-auto" src="img/useplogo.png" style="position:relative; height: 100%;"> </div>
        <div class="col-md-9 text-white align-self-center">
          <h1 class="display-3 mt-1">GAZETTE</h1>
          <hr class="m-0" style="background-color: snow;">
          <p class="lead mt-1" style="font-size: 25px">Office of the Secretary of the University</p>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row mb-3">
        <div class="col-md-12">
          <h1 class="text-danger display-5 mb-3">About Us</h1>
          <p class="lead mb-" style="font-family: arial;">
            <span class="ml-5"></span>The University of Southeastern Philippines Records Office is a branch of the university that handles and stores all the University’s legal documents of all campuses. They ensure the integrity, accuracy, and security of all academic records of current and former employees; builds secure employee data files and sets policy and procedure for their responsible use; maintains up-to-date course schedules, catalogs, meeting schedules; manages efficient use of classrooms.</p>
          <p class="lead mb-" style="font-family: arial;">
          <span class="ml-5"></span>The Records Office shall be one of the strong forces that would contribute to the attainment of the University’s goal as a premier university by ensuring the preservation, security and integrity of all University records.</p>

        </div>
      </div>
    </div>
  </div>
  <hr class="my-0">
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-danger display-5 mb-3">Gazette</h1>
        </div>
        <div class="col-md-12">
          <div class="pull-right">
              <form method="GET" action="{{ url('/') }}" role="search" class="form-inline">
                <div class="form-group custom-search-form">
                    <input type="text" class="form-control " name="search" placeholder="Search...">
                      <span class="input-group-btn">
                        <button class="mi btn text-white btn-danger" type="submit">
                            Submit
                        </button>
                      </span>
                </div>
              </form>
            </div>
        </div>
        <div class="col-md-12" style="overflow-x: auto;">
          <table class="table table-hover table-reflow">
            <thead class="thead-default">
              <tr>
                <th>BOR Meeting</th>
                <th>Venue</th>
                <th>Date</th>
                <th>Document</th>
                <th>Note</th>
              </tr>
            </thead>
            <tbody>
              @foreach($meetings as $meeting)
              <tr>
                <td><?php echo $meeting->MeetingName ?></td>
                <td><?php echo $meeting->Venue ?></td>
                <td><?php echo date('F j Y', strtotime($meeting->MeetingDate)); ?></td>
                <td>
                  <a class="btn navbar-btn ml-2 text-white btn-danger" href="{{ URL::to('/') }}/Meetings/<?php echo $meeting->MeetingFileName ?>" target="_blank"><i class="fa d-inline fa-lg fa-file-pdf-o mx-2"></i>Download File</a>
                </td>
                <td><?php echo $meeting->Note ?></td>
              </tr>
               @endforeach
            </tbody>
          </table>
          {{ $meetings->links() }}
        </div>
      </div>
    </div>
  </div>
  <div class="pt-5 pb-2 text-white" style="background-color: #782b30;">
    <div class="container">
      <div class="row">
        <div class="col-md-6 text-center align-self-center">
          <p class="mb-5"> <strong>Office of the Secretary of the President</strong>
            <br>795 Folsom Ave, Suite 600
            <br>San Francisco, CA 94107 </p>
          <div class="my-3 row">
            <div class="col-12 col-sm-4 col-md-4 col-lg-4">
              <p class="mb-0"><i class="fa fa-phone mx-1"></i> (082) 227-8192 local 209 or 211 </p>
            </div>
            <div class="col-12 col-sm-4 col-md-4 col-lg-4">
              <a href="http://www.usep.edu.ph" class="text-white"><i class="fa fa-globe mx-1"></i> www.usep.edu.ph </a>
            </div>
            <div class="col-12 col-sm-4 col-md-4 col-lg-4">
              <p><i class="fa fa-envelope mx-1"></i> osu@usep.edu.ph</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 p-0">
          <img class="img-fluid" src="img/location.png"> </div>
      </div>
      <div class="row">
        <div class="col-md-12 mt-3">
          <p class="text-center text-white mb-0">© Copyright 2017 Intitute of Computing - All rights reserved. </p>
        </div>
      </div>
    </div>
  </div>






@endsection