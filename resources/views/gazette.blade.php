@extends('layouts.landing')

@section('css')
  <link href="{{ asset('landing/css/osu-gazette.css') }}" rel="stylesheet">
@endsection

@section('navbar')
  <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{ route('home') }}">Home</a>
            </li>
            <span class="dotdot bg-white mx-3" style="margin-top: 12px; border-radius: 50%; height: 15px; width: 15px;" ></span>
            <div class="lineline dropdown-divider"></div>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger active" href="{{ route('gazette') }}">Gazette</a>
            </li>
          </ul>
@endsection

@section('head')
 <div class="col-lg-9 mx-auto">
              <div class="container-fluid">
                <div class="row">
                  <div class=" col-sm-12 col-md-3 px-0 ">
                    <img class="mb-3 rounded-circle" width="140" 
                         src="{{ asset('landing/img/useplogo.png') }}"
                         style="box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
                    "/>
                  </div>  
                  <div class=" col-sm-12 col-md-9 px-3 FSearch">
                    <h1 class="brand-heading mb-1 h-title">US<span class="text-lowercase">e</span>P <em>GAZETTE</em></h1>
                    <hr class="mt-1 mb-1 bg-light" />
                    <p class="intro-text mt-3 mb-3 h-sub">Office of the Secretary of the President</p>
                  </div> 
                </div>
              </div>
            </div>
@endsection

@section('content')

<!-- Latest Info Section -->
    <section id="LI" class="content-section bg-white text-dark">
      <div class="container-fluid">
        <div  class="row ">
          <div class="col-lg-12 mx-auto">
            
            <div class="container-fluid">
              <div class="row">
                <div class=" col-sm-12 col-md-7 px-0 ">
                  <div class="text-dark text-left px-4">
                    <h2 class="mb-0">BOR Meetings</h2>
                  </div>
                </div>  
                <div class=" col-sm-12 col-md-5 px-3 FSearch">
                  <button type="button" class="btn btn-outline-secondary btn-block" data-toggle="modal" data-target="#searchmodal">Filter Search</button>
                  <div class="modal fade" id="searchmodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">BOR MEETING FILTER</h5>
                        </div>
                        <form method="GET" action="{{ url('/gazette/search') }}" role="search" class="navbar-form navbar-left mb-0">
                        <div class="modal-body">
                            <div class="form-row">
                              <div class="col">
                                <select class="custom-select" name="month" id="S-month">
                                </select>
                              </div>
                              <div class="col">
                                <select class="custom-select" name="year" id="S-year">
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
              </div>
              <hr/>
              <div class="row">
                <div class="table-responsive">
                   <table class="table h-75 mb-0 BMTable" >
                            <thead class="bg-danger text-white">
                              <tr>
                                <th width="15%" scope="col">Meeting No.</th>
                                <th width="15%" scope="col">Venue</th>
                                <th width="15%" scope="col">Date</th>
                                <th width="15%" scope="col">Gazette</th>
                                <th width="15%" scope="col">Keywords</th>
                                <th width="26%" scope="col">Note</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($meetings as $meeting)
                              <tr>
                                <th><?php echo $meeting->MeetingName ?></th>
                                <td><?php echo $meeting->Venue ?></td>
                                <td><?php echo date('F j Y', strtotime($meeting->MeetingDate)); ?></td>
                                <td>
                                  <a class="btn btn-link btn-sm" href="{{ URL::to('/') }}/Meetings/<?php echo $meeting->MeetingFileName ?>" target="_blank" role="button"> 
                                    <i data-feather="download"></i> Gazette File</a>
                                </td>
                                <td>
                                  <?php $tags= explode(",",$meeting->tags); ?>
                                  @foreach($tags as $tag)
                                    <span class="badge badge-info"><?php echo trim($tag); ?></span>
                                  @endforeach
                                </td>
                                <td><?php echo $meeting->Note ?></td>
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
      </div>
    </section>
@endsection

@section('script')
  <script src="{{ asset('landing/js/osu-gazette.js') }}"></script>
@endsection