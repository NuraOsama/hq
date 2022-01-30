
@extends('layouts.admin')
@section('content')

  
            <div class="content-header px-1 mb-2">
                <div class="row">
                <div class="col-12">
                <div class="content-header-title">
                    <h2 class="text-white">
                        {{trans('admin.users')}} 
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
                                <li class="breadcrumb-item active">
                                    <a>{{trans('admin.users')}} </a>
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
                                    @include('dashboard.includes.alerts.success')
                                    @include('dashboard.includes.alerts.errors')   
                                    <div class="table-responsive">
                                        <table class="table  table-striped table-hovered" aria-describedby="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">{{trans('admin.name')}}</th>
                                                <th scope="col">{{trans('admin.email')}}</th>
                                                <th scope="col">{{trans('admin.phone')}} </th>
                                                <th scope="col">{{trans('admin.id_number')}}</th>
                                                <th scope="col">{{trans('admin.action')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @isset($users )
                                                @foreach($users as $user)
                                                    <tr>
                                                        <td>{{$user -> name}}</td>
                                                        <td>{{$user -> email}}</td>
                                                        <td>{{$user -> phone}}</td>
                                                        <td>{{$user -> id_number}}</td>
                                                    <td class="col-2">
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <div class="btn-group position-relative success">
                                                                 <span class="wrap-text"> <i class="las la-eye la-lg" aria-hidden="true"></i></span>
                                                                    <a href="{{route('user.details',$user->id)}}"
                                                                       class="btn btn-sm btn-icon btn-success" 
                                                                        data-toggle="tooltip" data-placement="top" data-trigger="hover" data-html="true" title="<span class='success-tooltip'> @lang('admin.details')</span>">
                                                                        <i class="las la-eye la-lg" aria-hidden="true"></i>
                                                                    </a>
                                                            </div>            
                                                            <div class="btn-group position-relative info">
                                                                <span class="wrap-text"><i class="las la-map-marker la-lg" aria-hidden="true"></i></span>     
                                                                        <a href="{{route('user.addresses',$user->id)}}"
                                                                        class="btn btn-sm btn-icon btn-info" 
                                                                        data-toggle="tooltip" data-placement="top" data-trigger="hover" data-html="true" title="<span class='info-tooltip'> @lang('admin.addresses')</span>">
                                                                        <i class="las la-map-marker la-lg" aria-hidden="true"></i>
                                                                    </a>
                                                            </div>        
                                                            <div class="btn-group position-relative gray">
                                                                <span class="wrap-text"><i class="las la-history la-lg" aria-hidden="true"></i></span> 
                                                                    <a href="{{route('user.reservations',$user->id)}}"
                                                                        class="btn btn-sm btn-icon btn-gray" 
                                                                        data-toggle="tooltip" data-placement="top" data-trigger="hover" data-html="true" title="<span class='gray-tooltip'> @lang('admin.visits')</span>" >
                                                                        <i class="las la-history la-lg" aria-hidden="true"></i>
                                                                    </a>
                                                            </div>        
                                                          </div>
                                                    </td>
                        
                                                    </tr>
                                                @endforeach
                                            @endisset


                                            </tbody>
                                        </table>
                                      </div>
                                        <div class="content-pagination d-flex justify-content-center align-items-center flex-wrap">
                                        {{ $users->links('vendor.pagination.custom') }}

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                </div>
            </div>
@stop
