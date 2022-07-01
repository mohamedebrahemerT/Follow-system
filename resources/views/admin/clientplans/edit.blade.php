 

@extends('admin.index')

@section('content')

   @push('js')
       

            <script>

                // Replace the <textarea id="editor1"> with a CKEditor

                // instance, using default configuration.

                CKEDITOR.replace( 'content' , {

        language: 'ar',

});
 
            </script>
                      @endpush
 


                        <!-- END THEME PANEL -->
                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                                 <a href="{{url('/')}}">{{trans('trans.Home')}}</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <a href="{{url('/')}}/clientplans">{{trans('trans.clientplans')}}</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                 
                            </ul>
                            
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject bold uppercase"> {{trans('trans.edit')}} / {{ $clientplans->client->name }} /  {{ $clientplans->name }} </span>
                                        </div>
                                         
                                    </div>
                                   <div class="portlet-body">
                                                    <div class="tab-content">
                                                        <!-- PERSONAL INFO TAB -->
                                                        <div class="tab-pane active" id="tab_1_1">
                 <form role="form" action="{{url('/')}}/clientplans/{{$clientplans->id}}" method="POST" enctype="multipart/form-data">
 					@csrf
 					{{ method_field('PATCH') }}
                   
                   <input type="hidden" name="id" value="{{$clientplans->id}}">
 


            <div class="row">
                         <div class="form-group col-md-6">
                               <label class="control-label">{{trans('trans.name')}}</label>
              <input type="text" placeholder="{{trans('trans.name')}}" class="form-control"    name="name"  required="" value="{{$clientplans->name}}" /> 
          </div>

                    <div class="form-group col-md-6">
                               <label class="control-label">{{trans('trans.date')}}</label>
              <input type="date" placeholder="{{trans('trans.date')}}" class="form-control"    name="date"  required="" value="{{$clientplans->date}}" /> 
          </div>

            </div>

                 
    <div class="row">
                 
                
           @foreach(App\Models\ContentTypes::get()  as $ContentType)
            
           <input type="hidden" name="ContentType_id[]" value="{{$ContentType->id}}">
 <div class="form-group col-md-2">
            <label class="control-label">{{$ContentType->name}}</label>
            @php
            $client_id=$clientplans->client_id;
            $ContentType_id=$ContentType->id;
            $plan_id=$clientplans->id;

           if(App\Models\clientspostscount::
            where('client_id',$client_id)->
            where('ContentType_id',$ContentType_id)->
            where('plan_id',$plan_id)->first())
           {
 $count=App\Models\clientspostscount::
            where('client_id',$client_id)->
            where('ContentType_id',$ContentType_id)->
            where('plan_id',$plan_id)->first()->count;
           }
           else
           {
            $count=0;
           }

            @endphp
              <input type="text" placeholder="{{trans('trans.name')}}" class="form-control"   
               name="count[]" value="{{$count}}"    /> 
          </div>

 @endforeach

          </div>
 
                 
                  <div class="form-group col-md-12">
              <label class="control-label">{{trans('trans.content')}}</label>
                <textarea class="form-control" name="content" class="form-control content">
                  {{$clientplans->content}}
              </textarea>
              
          </div>

          <div class="form-group">
            <button type="submit" class="btn green-meadow">{{trans('trans.save')}}</button>
          </div>
          

    
        
 
 
           
                                                                
                                                                
                                                            </form>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                            </div>
                        </div>
                       
                        
                    </div>
                    <!-- END CONTENT BODY -->
                @push('js')
            
 
 
                @endpush

  @endsection

