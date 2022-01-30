
@extends('layouts.admin')
@section('style')
    
    <!-- BEGIN CHART CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/charts/morris.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/charts/chartist-plugin-tooltip.css')}}">
    <!--// END CHART CSS -->
@stop

@section('content')
    
    
            <div class="content-body">
                <div  class="row" id="crypto-stats-3">
                    
                    <div class="col-lg-4 col-md-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body p-1">
                                    <div class="app-counter d-flex justify-content-between align-items-center">
                                        <div class="img-icon">
                                           <img  src="{{asset('assets/admin/images/icons/tests-icon.png')}}" class="brand-logo img-responsive lazyload" data-src="{{asset('assets/admin/images/icons/tests-icon.png')}}" alt="Logo">
                                        </div>
                                        <div class="title">
                                            <h4> {{trans('admin.tests_count')}} </h4>
                                         </div>
                                    </div>
                                </div>
                                <div class="card-footer p-1 border-top-0">
                                    <div class="app-num">
                                        <span>{{$tests}}</span>
                                    </div>
                                    <div class="app-chart">
                                        <canvas id="btc-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body p-1">
                                <div class="app-counter d-flex justify-content-between align-items-center">
                                        <div class="img-icon">
                                               <img  src="{{asset('assets/admin/images/icons/results-icon.png')}}" class="brand-logo img-responsive lazyload" data-src="{{asset('assets/admin/images/icons/offers-icon.png')}}" alt="Logo">
                                        </div>                                     
                                         <div class="title">
                                            <h4>{{trans('admin.results_count')}}</h4>
                                         </div>
                                      
                                    </div>
                                </div>
                                <div class="card-footer p-1 border-top-0">
                                   <div class="app-num">
                                            <span>4</span>
                                    </div> 
                                  <div class="app-chart">
                                      <canvas id="eth-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body p-1">
                                <div class="app-counter d-flex justify-content-between align-items-center">
                                       
                                        <div class="img-icon">
                                               <img  src="{{asset('assets/admin/images/icons/reservations-icon.png')}}" class="brand-logo img-responsive lazyload" data-src="{{asset('assets/admin/images/icons/visits-icon.png')}}" alt="Logo">
                                        </div>        
                                        <div class="title">
                                            <h4>{{trans('admin.reservations_count')}}</h4>
                                         </div>
                                        
                                    </div>
                                </div>
                                <div class="card-footer p-1 border-top-0">
                                    <div class="app-num">
                                        <span>{{$visits}}</span>
                                    </div>
                                    <div class="app-chart">
                                        <canvas id="xrp-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
             
                <div class="row">
                   <div class="col-12">
                     <div class="card pull-up">
                        <div class="card-header card-btns d-flex justify-content-between align-items-center">
                            <div class="card-title">
                              <h3>{{trans('admin.last_offers')}}</h3>
                            </div>
                            <div class="btn-group position-relative gradient">
                               <span class="wrap-text">{{trans('admin.all_offers')}}</span>
                               <a href="{{route('offers.index')}}" class="btn btn-gradient">
                               {{trans('admin.all_offers')}}
                                </a>
                           </div> 
                         </div>

                        <div class="card-body">
                          <div class="table-responsive">
                             <table class="table  table-striped table-hovered" aria-describedby="table">
                                <thead>
                                   <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">{{trans('admin.name')}}</th>
                                      <th scope="col">{{trans('admin.type')}}</th>
                                      <th scope="col">{{trans('admin.target')}}</th>
                                      <th scope="col">{{trans('admin.value')}}</th>
                                      <th scope="col">{{trans('admin.action')}}</th>
                                   </tr>
                                </thead>
                                <tbody>

                                  @isset($lastOffers )
                                   @foreach($lastOffers as $key => $offer)
                                   <tr>
                                     <td>{{ $key +1}}</td>
                                     <td>{{$offer ->translate('en')-> name}}</td>
                                     <td>{{$offer -> type }}</td>
                                     <td>{{$offer -> target}}</td>
                                     <td>{{$offer -> value}}</td>
                                     <td class="col-2">
                                       <div class="d-flex justify-content-center align-items-center">
                                         <div class="btn-group position-relative info">
                                               <span class="wrap-text"><i class="las la-edit la-lg" aria-hidden="true"></i></span>
                                        
                                            <a href="{{route('offers.edit',$offer -> id)}}" class="btn btn-sm btn-icon btn-info"  
                                                 data-toggle="tooltip" data-placement="top" data-trigger="hover" data-html="true" title="<span class='info-tooltip'> @lang('admin.edit')</span>">
                                                <i class="las la-edit la-lg" aria-hidden="true"></i>
                                            </a>
                                           </div> 

                                          <div class="btn-group position-relative success">
                                               <span class="wrap-text"> <i class="las la-eye la-lg" aria-hidden="true"></i></span>
                                            <a href="{{route('offers.show',$offer->id)}}"
                                               class="btn btn-sm btn-icon btn-success" 
                                               data-toggle="tooltip" data-placement="top" data-trigger="hover" data-html="true" title="<span class='success-tooltip'> @lang('admin.details')</span>">
                                                <i class="las la-eye la-lg" aria-hidden="true"></i>
                                            </a>
                                          </div>  
                                          
                                          <div class="btn-group position-relative danger">
                                               <span class="wrap-text"> <i class="las la-trash la-lag" aria-hidden="true"></i></span>
                                               <a href="{{route('offers.delete',$offer -> id)}}"
                                                 class="btn btn-sm btn-icon btn-danger" 
                                                 data-toggle="tooltip" data-placement="top" data-trigger="hover" data-html="true" title="<span class='danger-tooltip'> @lang('admin.delete')</span>" >
                                                 <i class="las la-trash la-lag" aria-hidden="true"></i>
                                               </a>
                                          </div>     

                                       </div>
                                       </div>
                                      </td>
                                   </tr>
                                   @endforeach
                                   @endisset


                                </tbody>
                              </table>
                           </div>
                        </div>

                        <div class="card-header card-btns d-flex justify-content-between align-items-center">
                           <div class="card-title">
                             <h3>{{trans('admin.last_tests')}}</h3>
                           </div>
                           <div class="btn-group position-relative gradient">
                               <span class="wrap-text">{{trans('admin.all_tests')}}</span>
                               <a href="{{route('tests.index')}}" class="btn btn-gradient">{{trans('admin.all_tests')}}</a>
                           </div>
                        </div>

                        <div class="card-body">
                           <div class="table-responsive">
                             <table  class="table table-striped table-hovered" aria-describedby="table">
                                <thead>
                                   <tr>
                                     <th scope="col">#</th>
                                     <th scope="col">{{trans('admin.name')}}</th>
                                     <th scope="col">{{trans('admin.price')}}</th>
                                     <th scope="col">{{trans('admin.duration')}}</th>
                                     <th scope="col">{{trans('admin.action')}}</th>
                                   </tr>
                                </thead>
                                <tbody>
                                 @isset($lastTests )
                                   @foreach($lastTests as $key => $test)
                                     <tr>
                                       <td>{{ $key +1}}</td>
                                       <td>{{$test ->translate('en')-> name}}</td>
                                       <td>{{$test -> price}}</td>
                                       <td>{{$test -> duration}}</td>
                                       <td class="col-2">
                                       <div class="d-flex justify-content-center align-items-center"> 
                                          <div class="btn-group position-relative info">
                                            <span class="wrap-text"><i class="las la-edit la-lg" aria-hidden="true"></i></span>                                    
                                            <a href="{{route('tests.edit',$test -> id)}}" class="btn btn-sm btn-icon btn-info"  
                                               data-toggle="tooltip" data-placement="top" data-trigger="hover" data-html="true" title="<span class='success-tooltip'> @lang('admin.edit')</span>">
                                                 <i class="las la-edit la-lg" aria-hidden="true"></i>
                                            </a>
                                          </div>
                                          
                                          <div class="btn-group position-relative success">
                                            <span class="wrap-text"><i class="las la-eye la-lg" aria-hidden="true"></i></span>
                                              <a href="{{route('tests.show',$test->id)}}" class="btn btn-sm btn-icon btn-success" 
                                               data-toggle="tooltip" data-placement="top" data-trigger="hover" data-html="true" title="<span class='info-tooltip'> @lang('admin.details')</span>">
                                                <i class="las la-eye la-lg" aria-hidden="true"></i>
                                              </a>
                                          </div>    
                                          <div class="btn-group position-relative danger">
                                            <span class="wrap-text"><i class="las la-trash la-lag" aria-hidden="true"></i></span>
                                              <a href="{{route('tests.delete',$test -> id)}}" class="btn btn-sm btn-icon btn-danger" 
                                               data-toggle="tooltip" data-placement="top" data-trigger="hover" data-html="true" title="<span class='danger-tooltip'> @lang('admin.delete')</span>" >
                                                <i class="las la-trash la-lag" aria-hidden="true"></i>
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
                        </div>

                        <div class="card-header card-btns d-flex justify-content-between align-items-center">
                           <div class="card-title">
                              <h3>{{trans('admin.last_reservations')}}</h3>
                           </div>
                           <div class="btn-group position-relative gradient">
                               <span class="wrap-text">{{trans('admin.all_reservations')}}</span>
                               <a href="{{route('reservations')}}" class="btn btn-gradient">{{trans('admin.all_reservations')}}</a>
                            </div>
                          </div>
  

                        <div class="card-body">
                            <div class="table-responsive">
                              <table class="table table-striped table-hovered" aria-describedby="table">
                                <thead>
                                   <tr>
                                     <th scope="col">#</th>
                                     <th scope="col">{{trans('admin.name')}}</th>
                                     <th scope="col">{{trans('admin.phone')}}</th>
                                     <th scope="col">{{trans('admin.type')}}</th>
                                     <th scope="col">{{trans('admin.location')}}</th>
                                     <th scope="col">{{trans('admin.rate')}}</th>
                                     <th scope="col">{{trans('admin.action')}}</th>
                                   </tr>
                                </thead>
                                <tbody>
                                   @isset($lastVisit )
                                     @foreach($lastVisit as $key => $visit)
                                     <tr>
                                       <td>{{ $key + 1 }}</td>
                                       <td>{{$visit -> name}}</td>
                                       <td>{{$visit -> phone}}</td>
                                       <td>{{$visit -> choice}}</td>
                                       <td>{{$visit -> type}}</td>
                                       <td>{{$visit -> rate ? $visit -> rate ->rate : 'Not rated yest'}}</td>
                                       <td class="col-2">

                                           <div class="d-flex justify-content-center align-items-center"> 
                                             <div class="btn-group position-relative info">
                                                <span class="wrap-text"><i class="las la-check-circle la-lg" aria-hidden="true"></i></span>                                    
                                                  <a href="{{route('visit.confirm',$visit->id)}}" class="btn btn-sm btn-icon btn-info"  
                                                    data-toggle="tooltip" data-placement="top" data-trigger="hover" data-html="true" title="<span class='info-tooltip'> @lang('admin.confirm')</span>">
                                                    <i class="las la-check-circle la-lg" aria-hidden="true"></i>
                                                  </a>
                                              </div>   
                                                @if($visit->accept == null)
                                                <div class="btn-group position-relative success">
                                                   <span class="wrap-text"><i class="las la-eye la-lg" aria-hidden="true"></i></span> 
                                                   <a href="{{route('visit.details',$visit->id)}}" class="btn btn-sm btn-icon btn-success" 
                                                    data-toggle="tooltip" data-placement="top" data-trigger="hover" data-html="true" title="<span class='success-tooltip'> @lang('admin.details')</span>">
                                                    <i class="las la-eye la-lg" aria-hidden="true"></i>
                                                   </a>
                                                </div>   
                                                @else
                                                <div class="btn-group position-relative danger">
                                                   <span class="wrap-text"><i class="las la-trash la-lag" aria-hidden="true"></i></span> 
                                                   <a href="{{route('visit.accept',$visit->id)}}" class="btn btn-sm btn-icon btn-danger" 
                                                     data-toggle="tooltip" data-placement="top" data-trigger="hover" data-html="true" title="<span class='danger-tooltip'> @lang('admin.delete')</span>" >
                                                     <i class="las la-trash la-lag" aria-hidden="true"></i>
                                                   </a>
                                                </div>   
                                               @endif
                                              @php
                                              $result = App\Models\Result::where('visit_id',$visit->id)->first();
                                              @endphp
                                              @if(!$result)
                                              <div class="btn-group position-relative gray">
                                                   <span class="wrap-text"><i class="las la-cloud-upload-alt la-lg" aria-hidden="true"></i></span> 
                                                 <a href="{{route('visit.result',$visit->id)}}" class="btn btn-sm btn-icon btn-gray" 
                                                   data-toggle="tooltip" data-placement="top" data-trigger="hover" data-html="true" title="<span class='gray-tooltip'> @lang('admin.uploadresult')</span>" >
                                                    <i class="las la-cloud-upload-alt la-lg" aria-hidden="true"></i>
                                                 </a>
                                              </div> 
                                                @else
                                              <div class="btn-group position-relative gray">
                                                   <span class="wrap-text"><i class="las la-cloud-upload-alt la-lg" aria-hidden="true"></i></span>   
                                                   <a href="{{route('show.result',$visit->id)}}"
                                                    class="btn btn-sm btn-icon btn-gray" 
                                                    data-toggle="tooltip" data-placement="top" data-trigger="hover" data-html="true" title="<span class='gray-tooltip'> @lang('admin.uploadresult')</span>" >
                                                     <i class="las la-cloud-upload-alt la-lg" aria-hidden="true"></i>
                                                   </a>
                                              </div>     
                                             @endif
                                            </div>
                                      </td>

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
      
@stop

@section('script') 

    <!-- BEGIN CHART JS -->
    <script src="{{asset('assets/admin/vendors/js/charts/chart.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/admin/vendors/js/charts/echarts/echarts.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/admin/vendors/js/charts/echarts/chart/line.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/admin/vendors/js/charts/echarts/chart/scatter.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/admin/vendors/js/charts/echarts/chart/k.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/admin/js/scripts/pages/dashboard-crypto.js')}}" type="text/javascript"></script>
    <!--// END CHART CSS -->
    
@stop

   
