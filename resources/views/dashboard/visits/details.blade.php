
@extends('layouts.admin')
@section('content')

  
            <div class="content-header px-1 mb-2">
                <div class="row">
                  <div class="col-12"> 
                   <div class="content-header-title">  
                      <h2 class="text-white">@lang('admin.reservations') </h2>
                   </div>  
                    <div class="breadcrumbs-top">
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{route('admin.dashboard')}}">
                                       @lang('admin.home')
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('reservations')}}"> 
                                    @lang('admin.reservations')
                                   </a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <a>@lang('admin.reservations_details')</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                  </div> 
                </div>
            </div>
            <div class="content-body">
                    <div class="row">
                        <div class="col-12">
                        <div class="card pull-up">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                   <div class="card-title"> 
                                     <h3>@lang('admin.reservations_details')</h3>
                                   </div> 
                                   <div class="btn-icons">
                                        <ul class="list-inline mb-0">
                                            <li>
                                                <a data-action="collapse">
                                                   <i class="las la-minus la-lg" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a data-action="reload">
                                                   <i class="las la-sync la-lg" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            
                                

                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        
                                    
                                    <div class="card-details mb-2">
                                        <div class="details-text">
                                            <h5>Time</h5>
                                        </div>
                                        <div class="details-alert"> 
                                          <p class="alert alert-secondary">
                                         @if($visit->type == 'lab')
                                        {{ $visit->appointment->time}}
                                         @else
                                         {{ $visit->time }}
                                         @endif
                                        </p>
                                       </div>
                                
                                    </div>

                                    <div class="card-details mb-2">
                                      <div class="details-text">
                                         <h5> Date </h5>
                                      </div>
                                      <div class="details-alert"> 
                                        <p class="alert alert-secondary">
                                        @if($visit->type == 'lab')
                                        {{ $visit->appointment->date}}
                                         @else
                                         {{ $visit->date }}
                                         @endif
                                        </p>
                                       </div>
                                    </div>
                                    @if($visit->type == 'lab')
                                    <div class="card-details mb-2">
                                      <div class="details-text">
                                         <h5>Day</h5> 
                                      </div>
                                      <div class="details-alert">
                                        <p class="alert alert-secondary" >
                                        {{ $visit->appointment->day}}
                                        </p>
                                      </div> 
                                    </div>
                                    @endif
                                    
                                    <div class="card-details mb-2">

                                       <div class="details-text">
                                         <h5>Name</h5> 
                                       </div>
                                       <div class="details-alert">
                                        <p class="alert alert-secondary" >{{ $visit->name }}</p>
                                        </div>                                   
                                     </div>

                                    <div class="card-details mb-2">
                                        <div class="details-text">
                                            <h5>Phone</h5>
                                         </div>
                                         <div class="details-alert">
                                           <p class="alert alert-secondary">{{ $visit->phone }}</p>
                                         </div>  
                                    </div>

                                    <div class="card-details mb-2">
                                       <div class="details-text">
                                          <h5> Type </h5>
                                       </div>
                                       <div class="details-alert">
                                        <p class="alert alert-secondary" >{{ $visit->choice  }}</p>
                                       </div>
                                    </div>

                                    <div class="card-details mb-2">
 
                                       <div class="details-text">
                                          <h5> location </h5>
                                       </div>
                                       <div class="details-alert">
                                        <p class="alert alert-secondary" >{{ $visit->type  }}</p>
                                       </div> 
                                
                                    </div>

                                    @if($visit->choice== 'test')
                                    <div class="card-details mb-2">
                                      <div class="details-text">
                                        <h5>Test </h5>
                                       </div>  
                                        <div class="details-alert">
                                          <p  class="alert alert-secondary">
                                            <a href="{{route('tests.show',$visit->test -> id)}}">
                                              {{ $visit->test->name  }}
                                             </a>
                                          </p>
                                        </div>
                                    </div>
                                    @else
                                    <div class="card-details mb-2">
                                      <div class="details-text">
                                        <h5>Offer </h5>
                                      </div>
                                      <div class="details-alert">
                                        <p  class="alert alert-secondary">
                                            <a href="{{route('offers.show',$visit->offer -> id)}}">
                                             {{ $visit->offer->name  }}
                                            </a>
                                        </p>
                                        </div> 
                                    </div>
                                    @endif
                                    @if($visit->type == "home")
                                    <div class="card-details mb-2">
                                      <div class="details-text">
                                        <h5>Address </h5>
                                       </div> 
                                       <div class="details-alert">
                                        <p  class="alert alert-secondary">
                                         {{ $visit->address->street  }}
                                        </p>
                                       </div>
                                    </div>
                                    @endif

                                    <div class="card-details mb-2">
                                      <div class="details-text">
                                        <h5>Rate </h5>
                                       </div>
                                        <div class="details-alert">
                                        <p  class="alert alert-secondary" >{{$visit -> rate ? $visit -> rate ->rate : 'Not rated yest'}}</p>
                                        </div>
                                    </div>
                                    <div class="card-details mb-2">
                                      <div class="details-text">
                                        <h5>Created at </h5>
                                       </div>
                                       <div class="details-alert"> 
                                         <p  class="alert alert-secondary">
                                         {{ $visit->created_at }}</p>
                                        </div>
                                    </div>

                                    <div class="card-details mb-2">
                                      <div class="details-text">
                                        <h5>User </h5>
                                      </div>
                                      <div class="details-alert">
                                        <p class="alert alert-secondary">
                                        <a href="{{route('user.details',$visit->user->id)}}">
                                        {{  $visit->user->name  }}
                                        </a>
                                        </p>
                                       </div>
                                    </div>

                                    <div class="card-details mb-2">
                                     <div class="row">
                                         <div class="col-lg-6 col-md-12">
                                           <div class="details-text">
                                           <h5>@lang('admin.image') </h5>
                                           </div>
                                           <div class="details-img"> 
                                              <img  src="{{asset($visit->photo)}}" class="img-responsive img-resize lazyload" data-src="{{asset($visit->photo)}}" alt=""/>
                                           </div>
                                       </div>
                                    </div>
                                  </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
    
@stop
