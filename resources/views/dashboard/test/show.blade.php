
@extends('layouts.admin')
@section('content')

    
            <div class="content-header px-1 mb-2">
                <div class="row">
                   <div class="col-12"> 
                    <div class="content-header-title">  
                      <h2 class="text-white">{{trans('admin.tests')}} </h2>
                    </div>  
                    <div class="breadcrumbs-top">
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{route('admin.dashboard')}}">{{trans('admin.home')}}</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('tests.index')}}">{{trans('admin.tests')}}</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <a>{{trans('admin.test_details')}}</a>
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
                                     <h3> {{trans('admin.test_details')}}</h3>
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

                                <div class="card-body">
                            
                                        @foreach (config('translatable.locales') as $key => $locale)
                                            <div class="@if($key == 0) active @endif" id="{{$locale}}">
                                                <div class="card-details mb-2">
                                                  <div class="details-text">
                                                    <h5>@lang('admin.name') (@lang('admin.'.$locale))</h5>
                                                   <div>
                                                   <div class="details-alert">  
                                                    <p class="alert alert-secondary">
                                                    {{ $test->translate($locale)->name }}</p>
                                                   </div>                                                
                                                </div>

                                                <div class="card-details mb-2">
                                                   <div class="details-text">
                                                      <h5>@lang('admin.description')
                                                         (@lang('admin.'.$locale))
                                                      </h5>
                                                   </div>
                                                   <div class="details-alert">    
                                                    <p class="alert alert-secondary">
                                                    {{ $test->translate($locale)->description }}</p>  
                                                   </div>                                              
                                                </div>

                                                <div class="card-details mb-2">
                                                  <div class="details-text">
                                                    <h5>@lang('admin.type')
                                                         (@lang('admin.'.$locale))
                                                    </h5>
                                                   </div>
                                                   <div class="details-alert">
                                                    <p class="alert alert-secondary">
                                                    {{ $test->translate($locale)->type }}</p> 
                                                    </div>                                               
                                                </div>

                                            </div>
                                        @endforeach


                                    <div class="card-details mb-2">
                                      <div class="details-text">
                                        <h5>@lang('admin.price') </h5>
                                      </div> 
                                      <div class="details-alert">
                                        <p class="alert alert-secondary">{{ $test->price  }}</p>
                                      </div> 
                                    </div>

                                    <div class="card-details mb-2">
                                       <div class="details-text">
                                        <h5>@lang('admin.duration') </h5>
                                       </div>
                                       <div class="details-alert">
                                        <p class="alert alert-secondary" >{{ $test->duration  }}</p>
                                         </div>
                                
                                    </div>
 

                                    <div class="card-details mb-2">
                                    <div class="row">
                                            <div class="col-lg-6 col-md-12">
                                       <div class="details-text">
                                           <h5>@lang('admin.image') </h5>
                                        </div>   
                                        <div class="details-img">
                                           <img src="{{asset($test->image)}}" class="img-responsive img-resize lazyload" data-src="{{asset($test->image)}}" alt="" />
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
