
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
                                    <a>{{trans('admin.addresses')}} </a>
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
                                      <h3> {{trans('admin.addresses')}} </h3>
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
                                                <th scope="col">City</th>
                                                <th scope="col">Street</th>
                                                <th scope="col">Building Number </th>
                                                <th scope="col">Floor Number</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @isset($addresses )
                                                @foreach($addresses as $address)
                                                    <tr>
                                                        <td>{{$address -> city}}</td>
                                                        <td>{{$address -> street}}</td>
                                                        <td>{{$address -> building_number}}</td>
                                                        <td>{{$address -> floor_number}}</td>
                                                    </tr>
                                                @endforeach
                                            @endisset


                                            </tbody>
                                         </table>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

@stop
