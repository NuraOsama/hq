
@extends('layouts.admin')
@section('content')



        <div class="content-header px-1 mb-2">
                  <div class="row">
                      <div class="col-12">
                        <div class="content-header-title">  
                          <h2 class="text-white">{{trans('admin.tests')}}  </h2>
                       </div>   
                    <div class="breadcrumbs-top">
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{route('admin.dashboard')}}">{{trans('admin.home') }} </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('tests.index')}}"> 
                                       {{trans('admin.tests')}} 
                                    </a>
                                </li>
                                <li class="breadcrumb-item active"> 
                                  <a>{{trans('admin.upload_csv')}}</a>
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
                                     <h3>   
                                    {{trans('admin.upload_csv')}}
                                     </h3>
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
                                        <form class="form"
                                              action="{{route('upload.csv')}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group form-icon">
                                                <label class="file center-block form-label"> {{trans('admin.upload_csv')}}  </label>
                                                
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="file"  name="csv_file" required>
                                                        <label class="custom-file-label  form-control" for="file">@lang('admin.upload_csv')</label>
                                                    </div>         
                                                    <br>
                                                    <span class="file-custom"></span>
                                                
                                                @error('csv_file')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="btn-group position-relative success">
                                                  <span class="wrap-text"> {{trans('admin.save')}}</span>   
                                                  <button type="submit" class="btn btn-success">
                                                    {{trans('admin.save')}}
                                                  </button>
                                                </div> 
                                                <div class="btn-group position-relative info">
                                                   <span class="wrap-text"> {{trans('admin.back')}}</span>  
                                                     <a  class="btn btn-info" href="{{route('tests.index')}}">
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