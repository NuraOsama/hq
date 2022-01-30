
@extends('layouts.admin')
@section('content')

   
            <div class="content-header px-1 mb-2">
                <div class="row">
                  <div class="col-12"> 
                    <div class="content-header-title">
                      <h2  class="text-white">@lang('admin.reservations')</h2>
                    </div>  
                    <div class="breadcrumbs-top">
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{route('admin.dashboard')}}">
                                       @lang('admin.home')</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('reservations')}}"> 
                                    @lang('admin.reservations')
                                   </a>
                                </li>
                                <li class="breadcrumb-item active">
                                   <a> 
                                     @lang('admin.test_acceptance')
                                   </a>
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
                                      <h3> @lang('admin.test_acceptance') </h3>
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
                                      <div class="card-details">
                                        <div class="details-text">
                                           <h5>Reservation acceptance</h5>
                                          </div>
                                          <div class="details-alert">
                                            <p class="alert alert-secondary">{{ $visit->accept  }}</p>
                                         </div>  
                                    </div>
                                </div>
                               </div>    
                            </div>
                        </div>
                    </div>
            </div>
       
@stop
