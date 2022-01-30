@extends('layouts.admin')
@section('content')
   
            <div class="content-header px-1 mb-2">
                <div class="row">
                  <div class="col-12">
                    <div class="content-header-title">  
                      <h2 class="text-white">
                      {{trans('admin.appointments')}}
                      </h2>
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
                                    <a href="{{route('appointments.index')}}">
                                      {{trans('admin.appointments')}}
                                    </a>
                                </li>
                                <li class="breadcrumb-item active"> 
                                    <a>
                                    {{trans('admin.edit')}} {{trans('admin.countries')}}
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
                                    <form action="{{Route('appointments.update',$appointment->id)}}"
                                     method="post" enctype="multipart/form-data">
                                     @method('put')
                                            @csrf         
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12">
                                                       <div class="form-group">
                                                        <label class="form-label">Day <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text" value="{{old('day', $appointment->day)}}" name="day">
                                                        @error("day" )
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                     </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                      <div class="form-group">
                                                         <label>Date <span class="text-danger">*</span></label>
                                                         <input class="form-control" type="date" value="{{old('date', $appointment->date)}}" name="date">
                                                         @error("date" )
                                                             <span class="text-danger">{{$message}}</span>
                                                         @enderror
                                                      </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                       <div class="form-group">
                                                        <label class="form-label">Time <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="time" value="{{old('time', $appointment->time)}}" name="time">
                                                        @error("time" )
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                       </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-center align-items-center">

                                                <div class="btn-group position-relative success">
                                                       <span class="wrap-text"> {{trans('admin.update')}}</span>
                                                       <button type="submit" class="btn btn-success">
                                                        {{trans('admin.update')}}
                                                       </button>
                                                    </div>   

                                                   <div class="btn-group position-relative info">
                                                      <span class="wrap-text"> {{trans('admin.back')}}</span> 
                                                        <a type="button" class="btn btn-info" href="{{route('appointments.index')}}">
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
