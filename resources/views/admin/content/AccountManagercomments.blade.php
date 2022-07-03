<tr>
      <td>
             {!! $allcomm->name !!}
      </td>
      <td>
            @if($allcomm->typeofsend == 'Design')
                <!-- Button trigger modal -->
<a type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$allcomm->id}}">
  @if($allcomm->image)
 <img src="@if(file_exists($allcomm->image))
 {{url('/')}}/{{$allcomm->image}}
 @else
 {{url('/')}}/images/default.jpg
@endif
  " style="width:100px;height: 100px;">              
</a>
 

 @else
     جاري  التصميم 
    @endif

<!-- Modal -->
<div class="modal fade" id="exampleModal{{$allcomm->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           @if($allcomm->image)
 <img src="@if(file_exists($allcomm->image))
 {{url('/')}}/{{$allcomm->image}}
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
            @else
             {!! $allcomm->content !!}
            @endif
      </td>
       <td>
          {{$allcomm->addby->name}}
      </td>
       

      <td>
            @if($allcomm->clientsnot_id)
                    
                        {{$allcomm->clientsnot->name}}
                    

                  
                        @endif
                  
      </td>

       <td>
          {{$allcomm->comment}}
      </td>

       <td>
              {{ $allcomm->created_at }}
      </td>
     
    </tr>