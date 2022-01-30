@extends('layouts.admin')
@section('content')
   
        <div class="content-header px-1 mb-2">
                <div class="row">
                  <div class="col-12">
                    <div class="content-header-title">  
                      <h2 class="text-white">
                      {{trans('admin.profile')}}
                      </h2>
                    </div>  
                    <div class="breadcrumbs-top">
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{route('admin.dashboard')}}">{{trans('admin.home')}} </a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <a>{{trans('admin.edit_profile')}}</a>
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
                                   <h3> {{trans('admin.edit_profile')}} </h3>
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
                                        <form class="form" action="{{route('update.profile')}}"
                                              method="post"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')


                                                <input type="hidden" name="id" value="{{$admin -> id }}">

                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label"> {{trans('admin.name')}}  </label>
                                                            <input type="text" value="{{$admin -> name  }}" id="name"
                                                                   class="form-control"
                                                                   placeholder="{{trans('admin.name')}}"
                                                                   name="name">
                                                            @error("name")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label">  {{trans('admin.email')}}  </label>
                                                            <input type="text" value="{{$admin -> email  }}" id=""
                                                                   class="form-control"
                                                                   placeholder="{{trans('admin.email')}}"
                                                                   name="email">
                                                            @error("email")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label">   {{trans('admin.new_password')}}</label>
                                                            <input type="password" value="" id=""
                                                                   class="form-control"
                                                                   placeholder="{{trans('admin.new_password')}}"
                                                                   name="password">
                                                            @error("password")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label"> {{trans('admin.confirm_password')}}  </label>
                                                            <input type="password" value="" id=""
                                                                   class="form-control"
                                                                   placeholder="{{trans('admin.confirm_password')}}"
                                                                   name="password_confirmation">

                                                        </div>
                                                    </div>

                                                </div>


                                                <div class="d-flex justify-content-center align-items-center">
                                                  <div class="btn-group position-relative success">
                                                       <span class="wrap-text"> {{trans('admin.save')}}</span>
                                                    <button type="submit" class="btn btn-success">
                                                       {{trans('admin.save')}}
                                                   </button>
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
