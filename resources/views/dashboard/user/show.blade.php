
@extends('layouts.admin')
@section('content')

    
            <div class="content-header px-1 mb-2">
                <div class="row">
                  <div class="col-12">  
                    <div class="content-header-title">  
                       <h2 class="text-white">{{trans('admin.users')}} </h2>
                    </div> 
                    <div class="breadcrumbs-top">
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{route('admin.dashboard')}}">
                                      {{trans('admin.home')}}
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('users')}}">
                                      {{trans('admin.users')}}
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <a>{{trans('admin.users_details')}}</a>
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
                            <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                 <div class="card-title"> 
                                    <h3> {{trans('admin.users')}} </h3>
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
                                        <h5>@lang('admin.name') </h5>
                                       </div>
                                       <div class="details-alert">  
                                        <p class="alert alert-secondary">{{ $user->name }}</p>
                                       </div>     
                                    </div>

                                    <div class="card-details mb-2">
                                     <div class="details-text">
                                        <h5>@lang('admin.email') </h5>
                                     </div>
                                     <div class="details-alert">  
                                        <p class="alert alert-secondary">{{ $user->email }}</p>
                                      </div>
                                    </div>
                                       
                                    
                                    <div class="card-details mb-2">
                                      <div class="details-text">
                                        <h5>@lang('admin.phone')</h5>
                                       </div>
                                       <div class="details-alert"> 
                                        <p class="alert alert-secondary">{{ $user->phone }}</p>
                                        </div>                                   
                                     </div>

                                    <div class="card-details mb-2">
                                      <div class="details-text">
                                        <h5>@lang('admin.id_number')</h5>
                                      </div>
                                      <div class="details-alert">
                                        <p class="alert alert-secondary">{{ $user->id_number }}</p>
                                      </div>
                                    </div>

                                    <div class="card-details mb-2">
                                      <div class="details-text">
                                        <h5>@lang('admin.birthrate')</h5>
                                      </div>
                                      <div class="details-alert">
                                        <p class="alert alert-secondary">{{ $user->birthrate  }}</p>
                                      </div>
                                    </div>

                                    <div class="card-details mb-2">
                                      <div class="details-text">
                                        <h5>@lang('admin.age')</h5>
                                      </div>
                                      <div class="details-alert">
                                        <p class="alert alert-secondary">{{ $user->age  }}</p>
                                       </div>
                                    </div>

                                    <div class="card-details mb-2">
                                      <div class="details-text">
                                        <h5>@lang('admin.gender') </h5>
                                      </div>
                                      <div class="details-alert">
                                        <p class="alert alert-secondary">{{ $user->gender  }}</p>
                                      </div>
                                    </div>

                                    <div class="card-details mb-2">
                                       <div class="details-text"> 
                                        <h5>@lang('admin.country')</h5>
                                       </div> 
                                       <div class="details-alert">
                                        <p class="alert alert-secondary">
                                        @php
                                        $country = App\Models\Country::find( $user->nationality);
                                        @endphp
                                        {{  $country->name  }}
                                        </p>
                                      </div>
                                
                                    </div>

                                     <div class="card-details mb-2">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12">                                            
                                               <div class="details-text">
                                                 <h5>@lang('admin.ID_image') </h5>
                                               </div>
                                               <div class="details-img"> 
                                                  <img src="{{asset($user->ID_image)}}" class="img-responsive img-resize lazyload" data-src="{{asset($user->ID_image)}}" alt="" />
                                              </div>
                                            </div>
                                        </div>
                                     </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
    
@stop
