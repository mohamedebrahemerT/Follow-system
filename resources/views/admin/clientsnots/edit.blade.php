 

@extends('admin.index')

@section('content')

  
 


                        <!-- END THEME PANEL -->
                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                                 <a href="{{url('/')}}">{{trans('trans.Home')}}</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <a href="{{url('/')}}/clientsnots">{{trans('trans.clientsnots')}}</a>
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
                                            <span class="caption-subject bold uppercase"> {{trans('trans.create')}}</span>
                                        </div>
                                         
                                    </div>
                                   <div class="portlet-body">
                                                    <div class="tab-content">
                                                        <!-- PERSONAL INFO TAB -->
                                                        <div class="tab-pane active" id="tab_1_1">
                 <form role="form" action="{{url('/')}}/clientsnots/{{$clientsnots->id}}" method="POST" enctype="multipart/form-data">
 					@csrf
 					{{ method_field('PATCH') }}
                   
                   <input type="hidden" name="id" value="{{$clientsnots->id}}">
 

       <div class="row">

        
                         <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.name')}}</label>
              <input type="text" placeholder="{{trans('trans.name')}}" class="form-control"    name="name"  required="" value="{{$clientsnots->name}}" /> 
          </div>

 
        
                         <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.color')}}</label>
              <input type="color" placeholder="{{trans('trans.color')}}" class="form-control"    name="color"  required="" value="{{$clientsnots->color}}" /> 
          </div>

            <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.type')}}</label>

<select name="status" class="form-control" required="">
                   
                    <option value="0"  @if($clientsnots->status =='0')selected @endif>
                    {{trans('trans.otherPhase')}}              
                    </option>

                     <option value="1" @if($clientsnots->status =='1')selected @endif>
                    {{trans('trans.LastPhase')}}              
                    </option>
 
                   
                    
                </select>
          </div>
           
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

