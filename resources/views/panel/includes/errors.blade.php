@if(count($errors))
    <div class="col-12 text-left mx-auto mb-4">
        @foreach($errors->all() as $err)
           <div class="@if(route('panel.admin.users.index')) col-md-12 col-sm-12 @endif col-md-6 col-sm-10 col-12 px-0">
               <div class="alert alert-danger mb-1 py-2 fade show" role="alert">
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                   <strong>خطا! </strong> {{ $err }}
               </div>
           </div>
        @endforeach
    </div>
@endif

