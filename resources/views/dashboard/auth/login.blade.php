@php
$lang = LaravelLocalization::getCurrentLocale();
@endphp

@extends('layouts.login')

 @section('content')

   
    <section class="login">
        <div class="container-fluid">
         <div class="language position-relative">
          <ul class="list-unstyled">
              
          @if ($lang == 'ar')
              <li class="lang-en">
                   <a href="{{  LaravelLocalization::getLocalizedURL('en') }}">
                     <span class="lang-icon">
                     <i class="las la-globe la-lg" aria-hidden="true"></i>
                     </span>
                     <span class="lang-text"> 
                     @lang('admin.en')                                       
                    </span> 
                 </a>
              </li>
              @else
              <li class="lang-ar">
                   <a href="{{  LaravelLocalization::getLocalizedURL('ar') }}">
                     <span class="lang-icon">
                     <i class="las la-globe la-lg" aria-hidden="true"></i>
                     </span>
                     <span class="lang-text"> 
                     @lang('admin.ar')                                         
                     </span> 
                 </a>
              </li>
              @endif
          </ul>
         
         </div>
        </div>
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="card">

                    <div class="card-header border-0 p-0">
                         <div class="navbar-brand p-0 d-block mx-auto text-center">
                            <img src="{{asset('assets/admin/images/logo/logo.png')}}" class="img-responsive lazyload" data-src="{{asset('assets/admin/images/logo/logo.png')}}" alt="logo"/>
                         </div>
                        <h3 class="text-center">
                            @lang('admin.admin_login')
                        </h3>
                    </div>
                   
                    <div class="card-content">
                        <div class="card-body pt-0">
                            @include('dashboard.includes.alerts.errors')
                            @include('dashboard.includes.alerts.success')
                            <form  action="{{route('admin.post.login')}}" method="post"novalidate>
                                @csrf

                                <div class="form-group form-icon position-relative">
                                    <label class="form-label login-label">@lang('admin.email')</label>
                                    <input type="text" name="email" class="form-control"
                                          id="email" placeholder="@lang('admin.email_address')">
                                    <div class="form-control-position">
                                       <i class="las la-user-alt la-lg" aria-hidden="true"></i>
                                    </div>       
                                </div>
                                @error('email')
                                     <span class="text-danger">{{$message}}</span>
                                @enderror

                                <div class="form-group form-icon position-relative">
                                    <label class="form-label">@lang('admin.password')</label>
                                    <input type="password" name="password" class="form-control"
                                        id="user-password" placeholder="*********">
                                    <div class="form-control-position">
                                       <i class="las la-key la-lg" aria-hidden="true"></i>
                                    </div>
                                </div>
                                @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                <div class="btn-group position-relative gradient w-100">
                                   <span class="wrap-text"> @lang('admin.login')</span>
                                   <button class="btn btn-gradient w-100" type="submit">
                                      @lang('admin.login')
                                  </button>
                               </div>   
             
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card mb-0">
                      <div class="image">
                         <img src="{{asset('assets/admin/images/elements/login-img.png')}}" class="img-responsive lazyload" data-src="{{asset('assets/admin/images/elements/login-img.png')}}" alt="logo"/>
                      </div>
                </div>
            </div>
         </div>
      </div>
    </section>

 @stop
 @section('script')

<script>
// alert

setTimeout(function() {
  
  $(".alert-dismissible").fadeOut(); 
  
}, 4000);

</script>

@stop