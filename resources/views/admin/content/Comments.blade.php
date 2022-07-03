<!-- First Comment -->
          <article class="row">
            <div class="col-md-2 col-sm-2 hidden-xs">
              <figure class="thumbnail">
                <img class="img-responsive" 
                src="

                        @if($com->addby->image ==null ) 
http://www.tangoflooring.ca/wp-content/uploads/2015/07/user-avatar-placeholder.png
                                     @else 
                                     {{url('/')}}/{{ $com->addby->image }}
                                     @endif
                " />
                <figcaption class="text-center">{{$com->addby->name}}</figcaption>
              </figure>

            </div>
            <div class="col-md-10 col-sm-10">

              <div class="panel panel-default arrow left">
                <div class="panel-body">
                      <header class="text-right">
                        @if($com->addby->id == admin()->user()->id)
                        <a href="{{url('/')}}/comment_delete/{{$com->id}}">
                             <i class="fa fa-trash" style="color:red;font-size: 20px;"></i>
                        </a>
                        @endif
                  </header>

                  <header class="text-left">
                    <div class="comment-user"><i class="fa fa-user"></i> {{$com->addby->name}}</div>
                    <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> {{$com->created_at}}</time>

                      <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> 
                    {{trans('trans.typeofsend')}}:
                   @if($com->typeofsend == 'client')
                    {{trans('trans.toteam')}}
                    @else
                    {{trans('trans.toacountmager')}}

                   @endif
                </a></p>
                  </header>

                  <div class="comment-post">

                        @if($com->typeofsend == 'Design')

                        <!-- Button trigger modal -->
<a type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$com->id}}">
   @if($com->image)
 <img src="@if(file_exists($com->image))
 {{url('/')}}/{{$com->image}}
 @else
 {{url('/')}}/images/default.jpg
@endif
  " style="width:200px;height: 200px;">
     @else
    لا يوجد صورة 
    @endif
</a>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{$com->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
         
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

         @if($com->image)
 <img src="@if(file_exists($com->image))
 {{url('/')}}/{{$com->image}}
 @else
 {{url('/')}}/images/default.jpg
@endif
  " style="width:550px;height:400px">
     @else
    لا يوجد صورة 
    @endif
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('trans.Close')}}</button>
        
      </div>
    </div>
  </div>
</div>




                        @else
                           @if($com->clientsnot_id)
                           {{trans('trans.not')}}: {{$com->clientsnot->name}}
                        @endif/ {{trans('trans.Moreexplanation')}}:
                  {{$com->comment}}
              
                        @endif
                    </p>

                   
                  </div>
                

                        @if($com->typeofsend !== 'Design')

                     <table class="table table-hover">
  <thead>
    <tr>
    
   
      <th scope="col">{{trans('trans.title')}}</th>
      <th scope="col">{{trans('trans.content')}}</th>
    </tr>
  </thead>
  <tbody>
    <tr>
  
      
      <td>
             {!! $com->name !!}
      </td>
      <td>
             {!! $com->content !!}
      </td>
    </tr>
     
  </tbody>
</table>

                        @endif

                </div>
              </div>
            </div>
          </article>