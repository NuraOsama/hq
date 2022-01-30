
@extends('layouts.admin')
@section('content')
  
            <div class="content-header px-1 mb-2">
                <div class="row">
                  <div class="col-12"> 
                    <div class="content-header-title">  
                      <h2 class="text-white">
                          @lang('admin.countries')
                      </h2>
                     </div>
                    <div class="breadcrumbs-top">
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{route('dashboard.index')}}">{{trans('admin.home')}} </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('countries.index')}}">
                                    {{trans('admin.countries')}}
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">
                                     {{trans('admin.edit')}} - {{$country -> name}}
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
                                    <h3> {{trans('admin.edit')}} {{trans('admin.countries')}} </h3>
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
                                  @include('dashboard.includes.alerts.success')
                                  @include('dashboard.includes.alerts.errors')
                                    <form action="{{Route('countries_update',$country->id)}}"
                                     method="post" enctype="multipart/form-data">
                                            @csrf
                                           
                                                    @foreach (config('translatable.locales') as $key => $locale)
                                                        <div class="fade show @if($key == 0) active @endif" id="{{$locale}}">
                                                            <div class="form-group">
                                                                <label class="form-label">@lang('admin.name') (@lang('admin.'.$locale))<span class="text-danger">*</span></label>
                                                                <input
                                                                    type="text"
                                                                    name="{{ $locale.'[name]' }}"
                                                                    id="{{ $locale . '[name]' }}"
                                                                    placeholder="@lang('admin.name')"
                                                                    class="form-control @error("$locale.name" ) is-invalid @enderror"
                                                                    value="{{old($locale.'.name',$country->translate($locale)->name )}}">
                                                                    @error("$locale.name" )
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                            </div>
                                                        </div>
                                                    @endforeach
                                               
                                                    <div class="d-flex justify-content-center align-items-center">
                                                      
                                                     <div class="btn-group position-relative success">
                                                        <span class="wrap-text"> {{trans('admin.update')}}</span>
                                                         <button type="submit" class="btn btn-success">
                                                          {{trans('admin.update')}}
                                                          </button>
                                                      </div> 

                                                       <div class="btn-group position-relative info">
                                                         <span class="wrap-text"> {{trans('admin.back')}}</span>
                                                          <a  class="btn btn-info"
                                                            href="{{route('countries.index')}}">
                                                            {{trans('admin.back')}}
                                                          </a>
                                                        </div>
                                                         
                                                    </div>
                                        </form>

                                 </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
    @stop
