
@extends('layouts.admin')
@section('content')

    
        <div class="content-header px-1 mb-2">
                <div class="row">
                   <div class="col-12"> 
                    <div class="content-header-title">  
                      <h2 class="text-white">{{trans('admin.offers')}}</h3>
                    </div>  
                    <div class="breadcrumbs-top">
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{route('admin.dashboard')}}">{{trans('admin.home')}}</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('offers.index')}}">{{trans('admin.offers')}}</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <a>{{trans('admin.offer_details')}}</a>
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
                                     <h3> {{trans('admin.offer_details')}}</h3>
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
                                    <div class="card-body">
                                    
                                        @foreach (config('translatable.locales') as $key => $locale)
                                            <div class="@if($key == 0) active @endif" id="{{$locale}}" role="tabpanel">
                                                
                                            <div class="card-details mb-2">
                                               <div class="details-text">
                                                    <h5>@lang('admin.name')
                                                         (@lang('admin.'.$locale))
                                                    </h5>
                                                </div>
                                                <div class="details-alert">     
                                                    <p class="alert alert-secondary">
                                                    {{ $offer->translate($locale)->name }}</p>                                                
                                                  </div>
                                                </div>

                                                <div class="card-details mb-2">
                                                   <div class="details-text">
                                                      <h5>@lang('admin.description')
                                                         (@lang('admin.'.$locale))
                                                      </h5>
                                                    </div>
                                                    <div class="details-alert">  
                                                      <p class="alert alert-secondary">{{ $offer->translate($locale)->description }}</p> 
                                                   </div>                                               
                                                </div>

                                            </div>
                                        @endforeach


                                    <div class="card-details mb-2">
                                      <div class="details-text">
                                        <h5>Type</h5>
                                      </div>
                                      <div class="details-alert">
                                        <p class="alert alert-secondary" >{{ $offer->type  }}</p>
                                      </div> 
                                    </div>

                                    <div class="card-details mb-2">
                                      <div class="details-text">
                                        <h5>Target</h5>
                                      </div>
                                      <div class="details-alert"> 
                                        <p class="alert alert-secondary">{{ $offer->target  }}</p>
                                       </div>
                                    </div>
 
                                    <div class="card-details mb-2">
                                        <div class="details-text">
                                            <h5>Value</h5>
                                        </div>
                                        <div class="details-alert">    
                                            <p class="alert alert-secondary">{{ $offer->value  }}</p>
                                        </div>    
                                    </div>

 
                                    <div class="card-details mb-2">
                                       <div class="details-text">
                                            <h5>Tests</h5>
                                       </div>
                                        
                                            @php
                                            $ids = json_decode($offer->tests);
                                            $tests = App\Models\Test::whereIn('id',json_decode($offer->tests))->get();
                                            @endphp

                                            @foreach($tests as $test)
                                            <div class="details-alert">  
                                              <p class="alert alert-secondary">{{($test->translate('en')->name) }}</p>
                                            </div>
                                            @endforeach
                                    </div>


                                    <div class="card-details mb-2">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12">
                                              <div class="details-text">  
                                                 <h5>@lang('admin.image') </h5>
                                              </div>
                                              <div class="details-img">  
                                                <img  src="{{asset($offer->image)}}" class="img-responsive img-resize lazyload" data-src="{{asset($offer->image)}}" alt="">
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
