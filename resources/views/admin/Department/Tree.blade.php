

@extends('admin.index')

@section('content')

  @push('js')
<script type="text/javascript">
 $(document).ready(function(){

  $('#jstree').jstree({
    "core" : {
      'data' : {!! load_dep() !!},
      "themes" : {
        "variant" : "large"
      }
    },
    "checkbox" : {
      "keep_selected_style" : true
    },
    "plugins" : [ "wholerow" ]//checkbox
  });

});

 $('#jstree').on('changed.jstree',function(e,data){
    var i , j , r = [];
    var  name = [];
    for(i=0,j = data.selected.length;i < j;i++)
    {
        r.push(data.instance.get_node(data.selected[i]).id);
        name.push(data.instance.get_node(data.selected[i]).text);
    }
    $('#form_Delete_department').attr('action','{{ url("/Departments") }}/'+r.join(', '));
    $('#dep_name').text(name.join(', '));
    if(r.join(', ') != '')
    {
      $('.showbtn_control').removeClass('hidden');
      $('.edit_dep').attr('href','{{ url('/Departments') }}/'+r.join(', ')+'/edit');
    }else{
      $('.showbtn_control').addClass('hidden');
    }
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
                                            <span class="caption-subject bold uppercase"> {{trans('trans.Department')}}</span>
                                        </div>
                                         
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-toolbar">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="btn-group">
                 <a id="sample_editable_1_new" class="btn sbold green" href="{{url('/')}}/Departments/create"> {{trans('trans.Add New')}}
                                                            <i class="fa fa-plus"></i>
                                                        </a>
 
                  
                                                    </div>
                                                     <a   class="btn sbold green" href="{{url('/')}}/Departments"> {{trans('trans.back')}}
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                </div>
                                                
                                            </div>
                                        </div >
                                              <a href="" class="btn btn-info edit_dep showbtn_control hidden" ><i class="fa fa-edit"></i> {{ trans('trans.edit') }}</a>
<a href="" class="btn btn-danger delete_dep showbtn_control hidden"  data-toggle="modal" data-target="#delete_bootstrap_modal" ><i class="fa fa-trash"></i> {{ trans('trans.delete') }}</a>

           <div id="jstree"></div>

                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                            </div>
                        </div>
                       
                        
                    </div>
                    <!-- END CONTENT BODY -->
               <!-- Modal -->
<div id="delete_bootstrap_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{ trans('trans.delete') }}</h4>
      </div>
      {!! Form::open(['url'=>'','method'=>'delete','id'=>'form_Delete_department']) !!}
      <div class="modal-body">
        <h4>
         {{ trans('trans.ask_delete_dep') }} <span id="dep_name"></span>
        </h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">{{ trans('trans.close') }}</button>
        {!! Form::submit(trans('trans.yes'),['class'=>'btn btn-danger']) !!}
      </div>
      {!! Form::close() !!}
    </div>

  </div>
</div>



  @endsection

  