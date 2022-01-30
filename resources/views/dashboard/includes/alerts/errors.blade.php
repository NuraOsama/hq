@if(Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade show" >
       <p class="mb-0" id="type-error">{{Session::get('error')}}</p>
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
       </button>   
    </div>
@endif

