<aside>
  <div class="main-menu  menu-light menu-accordion   menu-shadow">
  <a class="navbar-brand" href="{{route('admin.dashboard')}}">
        <img  src="{{asset('assets/admin/images/logo/logo.png')}}" class="brand-logo img-responsive lazyload" data-src="{{asset('assets/admin/images/logo/logo.png')}}" alt="Logo">
    </a>
    <div class="main-menu-content">
   
     <ul class="navigation navigation-main"  data-menu="menu-navigation">
       
        <li class=" nav-item">
            <a href="{{route('admin.dashboard')}}">
             <span class="menu-icon">   
               <i class="las la-home la-lg" aria-hidden="true"></i>
            </span>  
             <span class="menu-title" data-i18n="nav.horz_nav.main">
                    {{trans('admin.home')}}
              </span>
            </a>
        </li>

        <li class=" nav-item">
            <a>
               <span class="menu-icon"> 
                  <i class="las la-map-marked-alt la-lg" aria-hidden="true"></i>
               </span>
               <span class="menu-title" data-i18n="nav.horz_nav.main">
                    {{trans('admin.countries')}}
               </span>
            </a>
            <ul class="menu-content">
            <li>
                
                <a class="menu-item" href="{{route('countries.create')}}" data-i18n="nav.horz_nav.horizontal_navigation_types.main">
 
                    <i class="la la-plus la-lg" aria-hidden="true"></i>
                 
                    {{trans('admin.create_country')}}
                
                </a>
            </li>
            <li>
                <a class="menu-item" href="{{route('countries.index')}}" data-i18n="nav.horz_nav.horizontal_navigation_types.main">
              
                    <i class="las la-eye la-lg" aria-hidden="true"></i>
               
                    {{trans('admin.show_countries')}}
                  
                </a>
            </li>
            </ul>
        </li>

        <li class=" nav-item">
            <a href="{{route('users')}}">
              <span class="menu-icon"> 
                <i class="las la-users la-lg" aria-hidden="true"></i>
              </span>  
              <span class="menu-title" data-i18n="nav.horz_nav.main">
                    {{trans('admin.users')}}
              </span>
            </a>
        </li>

        <li class=" nav-item">
            <a>
              <span class="menu-icon"> 
                <i class="las la-calendar la-lg" aria-hidden="true"></i>
              </span> 
              <span class="menu-title" data-i18n="nav.horz_nav.main">
                  
                  {{trans('admin.appointments')}}
                  
              </span>
            </a>

            <ul class="menu-content">
              <li>
                 <a class="menu-item" href="{{route('appointments.create')}}" data-i18n="nav.horz_nav.horizontal_navigation_types.main">
               
                     <i class="las la-plus la-lg" aria-hidden="true"></i>
                  

                     {{trans('admin.create_appointment')}}

                  </a>
              </li>
              <li>
                  <a class="menu-item" href="{{route('appointments.index')}}" data-i18n="nav.horz_nav.horizontal_navigation_types.main">
                  
                    
                     <i class="las la-eye la-lg" aria-hidden="true"></i>
                   
                       {{trans('admin.Show_appointments')}}
                    
                  </a>

              </li>
            </ul>
        </li>

        <li class=" nav-item">
           <a>
             <span class="menu-icon">   
               <i class="las la-flask la-lg" aria-hidden="true"></i>
             </span>    
             <span class="menu-title" data-i18n="nav.horz_nav.main">
                {{trans('admin.tests')}}
             </span>
            </a>

            <ul class="menu-content">
            <li>
              <a class="menu-item" href="{{route('tests.create')}}" data-i18n="nav.horz_nav.horizontal_navigation_types.main">
               
                    <i class="las la-plus la-lg" aria-hidden="true"></i>
               
                    {{trans('admin.create_test')}}
               
              </a>
            </li>
            <li>
                <a class="menu-item" href="{{route('upload_csv')}}" data-i18n="nav.horz_nav.horizontal_navigation_types.main">
               
                    <i class="las la-file-alt la-lg" aria-hidden="true"></i>
             
                   {{trans('admin.upload_csv')}}
              
                </a>
            </li>
                <li>
                    <a class="menu-item" href="{{route('tests.index')}}" data-i18n="nav.horz_nav.horizontal_navigation_types.main">
                   
                       <i class="las la-eye la-lg" aria-hidden="true"></i>
                  
                       {{trans('admin.show_tests')}}
                    
                    </a>
                </li>
            </ul>
        </li>

        <li class=" nav-item">
         <a>
            <span class="menu-icon"> 
                <i class="las la-capsules la-lg" aria-hidden="true"></i>
            </span>
            <span class="menu-title" data-i18n="nav.horz_nav.main">
            {{trans('admin.offers')}}
            </span>
          </a>
            <ul class="menu-content">
               <li>
                   <a class="menu-item" href="{{route('offers.create')}}" data-i18n="nav.horz_nav.horizontal_navigation_types.main">
                   
                       <i  class="las la-plus la-lg" aria-hidden="true"></i>
                        
                       {{trans('admin.create_offer')}}

                                          
                    </a>
                </li>
                <li>
                    <a class="menu-item" href="{{route('offers.index')}}" data-i18n="nav.horz_nav.horizontal_navigation_types.main">
                    
                       <i  class="las la-eye la-lg" aria-hidden="true"></i>

                       {{trans('admin.Show_offers')}}
                      
                    </a>
                </li>
            </ul>
        </li>

        <li class=" nav-item">
          <a>
          <span class="menu-icon"> 
            <i class="las la-stethoscope la-lg" aria-hidden="true"></i>
          </span>      
          <span class="menu-title" data-i18n="nav.horz_nav.main">
         
            {{trans('admin.reservations')}}

          </span>
          </a>
          
         <ul class="menu-content">
                <li>
                  <a class="menu-item" href="{{route('reservations')}}" data-i18n="nav.horz_nav.horizontal_navigation_types.main">
                   
                      <i class="las la-eye la-lg" aria-hidden="true"></i>
                       
                      {{trans('admin.show_reservations')}}
               
                   </a>
                </li>
            </ul>
        </li>

        <li class=" nav-item">
          <a href="{{route('contact')}}">
          <span class="menu-icon"> 
            <i class="las la-comments la-lg" aria-hidden="true"></i>
          </span>      
            <span class="menu-title" data-i18n="nav.horz_nav.main">
              {{trans('admin.contact')}}
            </span>
            </a>
        </li>
        
        </ul>
    </div>    
  </div>
</aside>
