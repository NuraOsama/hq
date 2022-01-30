@if(Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" >
        <p class="mb-0" id="type-error">{{Session::get('success')}}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
        </button>   
    </div>
@endif
