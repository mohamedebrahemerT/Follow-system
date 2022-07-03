    <td>
@if(admin()->user()->type == 'superadmin' or admin()->user()->type == 'GraphicDesign'  or admin()->user()->type == 'AccountManager' )

                 @if($content->ContentMangerConfirm == '1' and $content->Contentclientconfirm == '1')
                    <!-- Button trigger modal -->
<a type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$content->id}}">
  @if($content->image)
 <img src="@if(file_exists($content->image))
 {{url('/')}}/{{$content->image}}
 @else
 {{url('/')}}/images/default.jpg
@endif
  " style="width:100px;height: 100px;">              
</a>
 

 @else
     جاري  التصميم 
    @endif

<!-- Modal -->
<div class="modal fade" id="exampleModal{{$content->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           @if($content->image)
 <img src="@if(file_exists($content->image))
 {{url('/')}}/{{$content->image}}
 @else
 {{url('/')}}/images/default.jpg
@endif
  "   style="width:550px;height:400px">
     @else
     جاري  التصميم 
  

               @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('trans.Close')}}</button>
       
      </div>
    </div>
  </div>
</div>
     
           
                         @endif  

 @elseif(admin()->user()->type == 'client' or admin()->user()->type == 'Emp' )

                      @if($content->ContentMangerConfirm == '1' and $content->Contentclientconfirm == '1' and $content->acountmangerDesignConfirm == '1')               
                 <!-- Button trigger modal -->
<a type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  @if($content->image)
 <img src="@if(file_exists($content->image))
 {{url('/')}}/{{$content->image}}
 @else
 {{url('/')}}/images/default.jpg
@endif
  " style="width:100px;height: 100px;">              
</a>
 

 @else
     جاري  التصميم 
    @endif

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           @if($content->image)
 <img src="@if(file_exists($content->image))
 {{url('/')}}/{{$content->image}}
 @else
 {{url('/')}}/images/default.jpg
@endif
  "   style="width:550px;height:400px">
     @else
     جاري  التصميم 
  

               @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('trans.Close')}}</button>
       
      </div>
    </div>
  </div>
</div>
     
          
                             @endif



@endif  

           </td>