

@extends('admin.index')

@section('content')

@push('js')
<script type="text/javascript">
$(document).ready(function(){

  $('#jstree').jstree({
    "core" : {
      'data' : {!! load_dep2($Department->parent,$Department->id) !!},
      "themes" : {
        "variant" : "large"
      }
    },
    "checkbox" : {
      "keep_selected_style" : false
    },
    "plugins" : [ "wholerow" ]
  });

});

 $('#jstree').on('changed.jstree',function(e,data){
    var i , j , r = [];
    for(i=0,j = data.selected.length;i < j;i++)
    {
        r.push(data.instance.get_node(data.selected[i]).id);
    }
    $('.parent_id').val(r.join(', '));
});

</script>

  <script type="text/javascript">        

  $('.datetpicker').datepicker({

        rtl:true,

        language:'{{ session("lang") }}',

        todayBtn:true,

        utoclose:false,

        clearBtn:true,

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
                                    <a href="{{url('/')}}/Departments">{{trans('trans.Department')}}</a>
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
                                            <span class="caption-subject bold uppercase"> {{trans('trans.edit')}}</span>
                                        </div>
                                         
                                    </div>
                                   <div class="portlet-body">
                                                    <div class="tab-content">
                                                        <!-- PERSONAL INFO TAB -->
                                                        <div class="tab-pane active" id="tab_1_1">
                  <form role="form" action="{{url('/')}}/Departments/{{$Department->id}}" method="POST" enctype="multipart/form-data">
 					@csrf
 					{{ method_field('PATCH') }}

 					<input type="hidden" name="id" value="{{$Department->id}}">

                    
        <div class="clearfix"></div>
        <div id="jstree"></div>
        <input type="hidden" name="parent" class="parent_id" value="{{ $Department->parent }}">
        <div class="clearfix"></div>
        


 					 <div class="form-group col-md-6">
                               <label class="control-label">{{trans('trans.name')}}</label>
              <input type="text" placeholder="{{trans('trans.name')}}" class="form-control"  value="{{$Department->name}}" name="name"  required=""/> 
          </div>

               
  <div class="form-group col-md-6">
                               <label class="control-label">{{trans('trans.photo')}}</label>

<input type="file" placeholder="{{trans('trans.photo')}}" class="form-control" name="photo" /> 

                               <br>
        

               @if($Department->photo)
                                             <img src="{{url('/')}}/{{$Department->photo}}"  style="width:200px;height:200px">
                                              @else
                                          
                                                @endif
          </div>

 

              <div class="form-group">
                <button type="submit" class="btn green-meadow">{{trans('trans.save')}}</button>
              </div >
 
           
                                                                
                                                                
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

