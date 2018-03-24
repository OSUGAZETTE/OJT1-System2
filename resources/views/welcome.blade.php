@extends('layouts.landing')

@section('css')
   <link href="{{ asset('landing/css/osu-landing.css') }}" rel="stylesheet">
@endsection

@section('navbar')
   <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class=" nav-link js-scroll-trigger " style="width: 122px;" href="#LI">Latest Info</a>
            </li>
            <li class="nav-item">
              <a class=" nav-link js-scroll-trigger " href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class=" nav-link js-scroll-trigger " href="#contact">Contact</a> 
            </li>
            <span class="dotdot bg-white mx-3" style="margin-top: 12px; border-radius: 50%; height: 15px; width: 15px;" ></span>
            <div class="lineline dropdown-divider"></div>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{ route('gazette') }}">Gazette</a>
            </li>
          </ul>
@endsection

@section('head')
 <div class="col-lg-8 mx-auto">
              <img class="mb-3 rounded-circle" width="150" 
                  src="{{ asset('landing/img/useplogo.png') }}"
                  style="box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
                         "/>
              <h1 class="brand-heading mb-1">US<span class="text-lowercase">e</span>P <em>GAZETTE</em></h1>
              <hr class="mt-1 mb-1 bg-light" />
              <p class="intro-text mt-3 mb-3">Office of the Secretary of the President</p>
              
            </div>
@endsection

@section('content')

<<<<<<< HEAD
    <!-- Latest Info Section -->
    <section id="LI" class="content-section bg-white text-dark">
      <div class="container-fluid">
        <div  class="row ">
          <div class="col-lg-10 mx-auto">
            <h2 class="text-center mb-5">Latest BOR Meeting</h2>
            <div class="container-fluid">
              <div class="row">

                <div class=" col-sm-12 col-md-4 px-0 ">
                  <div class="card border-danger mb-0 w-100 h-100" 
                       style="box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23); 
                       z-index: 10">
                      <div class="card-header text-white text-center bg-danger">
                        <strong>BOR MEETING</strong>
                      </div>
                      <div class="card-body text-dark">
                        <h4 class="card-title text-center mt-4 mb-4">Meeting No.</h4>
                        <hr/>
                        <h1 class="meeitngtxt text-center my-4 py-3 text-capitalize">
                          {{ $meetingno->MeetingName }}
                        </h1>
                      </div>
                  </div>
                </div>  
                
                <div class="sched col-sm-12 col-md-8 px-0">
                   <div class="card mb-0 w-100" >
                      <div class="card-header text-dark text-center">
                        <strong>BOR MEETING INFO</strong>
                      </div>
                      <div class="card-body text-dark">
                        <div class="container">
                          <div class="row mt-3">
                            <div class="col-sm-4 col-md-3 ">
                              <strong>Meeting Venue:</strong>
                            </div>
                            <div class="col-sm-8 col-md-9">
                              {{ $meetingno->Venue }}
                            </div>
                          </div>

                          <div class="row mt-3">
                            <div class="col-sm-4 col-md-3">
                              <strong>Meeting Date:</strong>
                            </div>
                            <div class="col-sm-8 col-md-9">
                              <?php echo date('F j Y', strtotime($meetingno->MeetingDate)); ?>
                            </div>
                          </div>

                          <div class="row mt-3">
                            <div class="col-sm-4 col-md-3">
                              <strong>Meeting File:</strong>
                            </div>
                            <div class="col-sm-8 col-md-9">
                              <a class="btn btn-danger btn-sm" href="{{ URL::to('/') }}Meetings/<?php echo $meetingno->MeetingFileName ?>" role="button"> 
                                Download File
                              </a>
                            </div>
                          </div>

                          <div class="row mt-3">
                            <div class="col-sm-4 col-md-3">
                              <strong>Keywords:</strong>
                            </div>
                            <div class="col-sm-8 col-md-9">
                              <?php $tags= explode(",",$meetingno->tags); ?>
                              @foreach($tags as $tag)
                                <span class="badge badge-danger"><?php echo trim($tag); ?></span>
                              @endforeach
                            </div>
                          </div>
                          <div class="row mt-3">
                            <div class="col-sm-4 col-md-3">
                              <strong>Note:</strong>
                            </div>
                            <div class="col-sm-8 col-md-9">
                              {{ $meetingno->Note }}
                            </div>
                          </div>
                          
                        </div>
                        <hr class="my-3" />
                        <a class="btn btn-outline-secondary btn-block" href="{{ route('gazette') }}" role="button">Show More</a>
                      </div>
                  </div>
                </div>
              </div>

=======
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
              <form method="GET" action="{{ url('Welcome/Date') }}" role="search" class="navbar-form navbar-left mb-0">
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
>>>>>>> fca653f7858ccb9756f6e8e1be82494d8e80abd4
            </div>
          </div>
        </div>
      </div>
    </section>
   
    <hr class="my-0" style="background-color: #EEEEEE;" />
   
   
     <!-- About Section -->
    <section id="about" class="content-section bg-white text-dark">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-lg-10 mx-auto">
            <h2 class="text-center mb-5">About OSU</h2>
            <div class="container-fluid">
              <div class="row">
                <div class=" col-sm-12 col-md-4">
                  <div class="d-flex justify-content-center mt-4">
                    <img class="mb-3 rounded-circle align-self-center" width="150" 
                    src="{{ asset('landing/img/face.jpg') }}""
                    style="box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
                           "/>
                  </div>
                  <p class="lead text-center mb-0">John Doe</p>
                  <hr class="my-2" />
                  <p class="text-center mb-2" style="font-size: 1.15rem; font-weight: 700;"><em>Secretary</em></p>
                  <p class="lead text-justify mx-2" style="font-size: 1.05rem;"> <span style="margin-left: 3rem;"></span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>  
                
                <div class="col-sm-12 col-md-8">
                  <p class="mb-3 mt-4" style="font-size: 1.50rem;">
                    <strong>VISION</strong>
                  </p>
                  <p class="text-justify" ><span style="margin-left: 3rem;"></span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                  <p class="mb-3 mt-4" style="font-size: 1.50rem;">
                    <strong>MISSION</strong>
                  </p>
                  <p class="text-justify" ><span style="margin-left: 3rem;"></span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <hr class="my-0" style="background-color: #EEEEEE;" />
    <!-- Contact Section -->
    <section id="contact" class="content-section bg-white text-dark">
      <div class="container">
        <div class="row ">
          <div class="col-lg-12 mx-auto">
            <h2 class="text-center mb-5">Contact</h2>
            <div class="container-fluid">
              <div class="row">
                <div class=" col-sm-12 col-md-3">
                  <div class="d-flex justify-content-center mt-4 mb-3">
                    <i data-feather = "map-pin" style="width: 60px; height: 60px;"></i>
                  </div>
                  <p class="text-center mb-2" style="font-size: 1.15rem; font-weight: 700;">Location</p>
                  <hr class="my-2" />
                  <p class="lead mx-2 text-center" style="font-size: 1.05rem; font-size: 16px;">
                    University of Southeastern Philippines, 
                    Iñigo Street, Obrero, Poblacion District, 
                    Davao City, 8000 Davao del Sur
                  </p>
                </div>  
                
                <div class=" col-sm-12 col-md-3">
                  <div class="d-flex justify-content-center mt-4 mb-3">
                    <i data-feather = "phone" style="width: 60px; height: 60px;"></i>
                  </div>
                  <p class="text-center mb-2" style="font-size: 1.15rem; font-weight: 700;">Tel. No.</p>
                  <hr class="my-2" />
                  <p class="lead mx-2 text-center" style="font-size: 1.05rem; font-size: 16px;">
                    (082) 227-8192 local 209 or 211 
                  </p>
                </div>  
                
                <div class=" col-sm-12 col-md-3">
                  <div class="d-flex justify-content-center mt-4 mb-3">
                    <i data-feather = "globe" style="width: 60px; height: 60px;"></i>
                  </div>
                  <p class="text-center mb-2" style="font-size: 1.15rem; font-weight: 700;">USeP Website</p>
                  <hr class="my-2" />
                  <p class="lead mx-2 text-center" style="font-size: 1.05rem; font-size: 16px;">
                     www.usep.edu.ph 
                  </p>
                </div>  
                
                <div class=" col-sm-12 col-md-3">
                  <div class="d-flex justify-content-center mt-4 mb-3">
                    <i data-feather = "mail" style="width: 60px; height: 60px;"></i>
                  </div>
                  <p class="text-center mb-2" style="font-size: 1.15rem; font-weight: 700;">Email</p>
                  <hr class="my-2" />
                  <p class="lead mx-2 text-center" style="font-size: 1.05rem; font-size: 16px;">
                    osu@usep.edu.ph
                  </p>
                </div>  
                
                
                
            </div>
          </div>
        </div>
      </div>
<<<<<<< HEAD
    </section>
=======
    </div>
  </div>

<script>
  var start = 1900;
    var end = new Date().getFullYear();
    var options = "";
    for(var year = start ; year <=end; year++){
      options += "<option>"+ year +"</option>";
    }
    document.getElementById("year").innerHTML = options;
</script>




>>>>>>> fca653f7858ccb9756f6e8e1be82494d8e80abd4
@endsection