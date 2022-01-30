
@extends('layouts.admin')
@section('content')

   
        <div class="content-header px-1 mb-2">
                <div class="row">
                    <div class="col-12">
                        <div class="content-header-title">  
                            <h2 class="text-white">{{trans('admin.offers')}} </h2>
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
                                    <a href="{{route('offers.index')}}">    
                                    {{trans('admin.offers')}} 
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <a> {{trans('admin.edit')}} {{trans('admin.offer')}}  </a>
                                </li>
                            </ol>
                        </div>
                       </div>
                    </div>
                </div>
        </div>
         <div class="content-body">
                    <div class="row">
                        <div class="col-md-12">
                        <div class="card pull-up">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                   <div class="card-title">  
                                     <h3>  {{trans('admin.edit')}} {{trans('admin.offer')}}</h3>
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
                                    <form action="{{Route('offers.update',$offer->id)}}"
                                     method="post" enctype="multipart/form-data">
                                     @method('put')
                                            @csrf

                                                    @foreach (config('translatable.locales') as $key => $locale)
                                                        <div class="@if($key == 0) active @endif" id="{{$locale}}">
                                                            <div class="form-group">
                                                                <label class="form-label">@lang('admin.name') (@lang('admin.'.$locale))<span class="text-danger">*</span></label>
                                                                <input
                                                                    type="text"
                                                                    name="{{ $locale.'[name]' }}"
                                                                    id="{{ $locale . '[name]' }}"
                                                                    placeholder="@lang('admin.name')"
                                                                    class="form-control @error("$locale.name" ) is-invalid @enderror"
                                                                    value="{{old($locale.'.name',$offer->translate($locale)->name )}}">
                                                                    @error("$locale.name" )
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                    <label class="form-label">@lang('admin.description')(@lang('admin.'.$locale))<span
                                                                    class="text-danger">*</span></label>
                                                                    <textarea class="form-control @error($locale . '.description') is-invalid @enderror "
                                                                    type="text" name="{{ $locale . '[description]' }}" placeholder="Description" rows="4"
                                                                    id="{{ $locale }}.editor1">{{old($locale.'.description',$offer->translate($locale)->description )}}</textarea>
                                                                    @error("$locale.description" )
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                            </div>
                                                               
                                                        </div>
                                                    @endforeach
                                                <div class="row">
                                                 <div class="col-lg-6 col-md-12">  
                                                   <div class="form-group">
                                                        <label class="form-label">Type <span class="text-danger">*</span></label>
                                                            <select class="js-example-placeholder-single" name="type">
                                                                <option value=""></option>
                                                                <option value="laboratory"  @if($offer->type == 'laboratory') selected @endif>Laboratory</option>
                                                                <option value="individual" @if($offer->type == 'individual') selected @endif>Individual</option>
                                                            </select>
                                                      </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12"> 
                                                    <div class="form-group">
                                                        <label class="form-label">Tests<span class="text-danger">*</span></label>
                                                        <select class="js-example-placeholder-multiple" name="tests[]" id='tests' multiple>
                                                            @foreach ($tests as $item)
                                                                <option value="{{ $item->id }}" @if(in_array($item->id, json_decode($offer->tests))) selected @endif>
                                                                    {{ $item->translate('en')->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                  </div>
                                                </div>

                                                <div class="row">
                                                  <div class="col-lg-6 col-md-12"> 
                                                    <div class="form-group">
                                                        <label class="form-label">Offer Category <span class="text-danger">*</span></label>
                                                            <select class="js-example-placeholder-single offer_type" name="target" >
                                                                <option value=""></option>
                                                                <option value="gender"  @if($offer->target == 'gender') selected @endif>gender</option>
                                                                <option value="age" @if($offer->target == 'age') selected @endif>age</option>
                                                            </select>
                                                            @error("target" )
                                                               <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                    </div>
                                                   </div>
                                                   <div class="col-lg-6 col-md-12"> 
                                                   
                                                    <div class="form-groups">
                                                      <div class="form-group form-icon">
                                                         <label class="form-label">@lang('admin.image') <span class="text-danger">*</span></label>
                                                          
                                                           <div class="custom-file">
                                                               <input type="file" class="custom-file-input" id="customfile"  name="image" required>
                                                               <label class="custom-file-label  form-control" for="customfile">@lang('admin.upload_image_file')</label>
                                                             </div>    
                                                    </div>
                                                    <div class="form-group">                                               
                                                       <img src="{{asset($offer->image)}}" class="img-responsive lazyload img-resize"  data-src="{{asset($offer->image)}}" alt="">
                                                    </div>
                                                  </div>
                                                  </div>
                                                </div> 

                                                <div class="row d-none">
                                                  <div class="col-lg-6 col-md-12">
                                                       <div class="form-group" id="age">
                                                        <label class="form-label">age<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="age" value="{{$offer->value}}">
                                                        @error("age" )
                                                        <span class="text-danger">{{$message}}</span>
                                                         @enderror   
                                                    </div>
                                                
                                                 </div>

                                                <div class="col-lg-6 col-md-12">
                                                      <div class="form-group" id="gender">
                                                    <label class="form-label">gender<span class="text-danger">*</span></label>
                                                    <select class="js-example-placeholder-single" name="gender">
                                                        <option value=""></option>
                                                        <option value="male"  @if($offer->value == 'male') selected @endif>male</option>
                                                        <option value="female"  @if($offer->value == 'female') selected @endif>female</option>
                                                    </select>
                                                    @error("gender" )
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
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
                                                <div class="btn-group position-relative info">
                                                  <span class="wrap-text"> {{trans('admin.back')}}</span> 
                                                    <a class="btn btn-info"
                                                    href="{{route('offers.index')}}">
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

    @section('script')
       
     <script src="{{asset('assets/admin/vendors/js/editors/ckeditor/ckeditor.js')}}" type="text/javascript"></script>

    <script>
     
     //ckeditor
     CKEDITOR.replace('{{ $locale }}.editor1', {
            extraPlugins: 'bidi',
            // Setting default language direction to right-to-left.
            contentsLangDirection: ($("html").attr("lang")=="ar") ? "rtl":"ltr",
            height: 270,
            scayt_customerId: '1:Eebp63-lWHbt2-ASpHy4-AYUpy2-fo3mk4-sKrza1-NsuXy4-I1XZC2-0u2F54-aqYWd1-l3Qf14-umd',
            scayt_sLang: 'auto',
            removeButtons: 'PasteFromWord'
    });
  
   //offer type
  $('.offer_type').on('change', function()
    {
        var form = $(this);
        var type = form.val();
        if(type == 'gender')
        {
            $('#gender').removeClass("d-none");
            $('#age').addClass("d-none");
        }
        if(type == 'age')
        {
            $('#age').removeClass("d-none");
            $('#gender').addClass("d-none");

        }
    });

    //toggle radio input
        $('input:radio[name="type"]').change(
            function(){
                if (this.checked && this.value == '2') {  // 1 if main cat - 2 if sub cat
                    $('#cats_list').removeClass('hidden');

                }else{
                    $('#cats_list').addClass('hidden');
                }
            });
    </script>
    @stop
