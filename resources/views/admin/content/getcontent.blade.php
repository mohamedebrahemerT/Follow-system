

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
                                    <a href="{{url('/')}}/content">{{trans('trans.content')}}</a>
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
                                            <span class="caption-subject bold uppercase"> {{trans('trans.content')}}</span>
                                        </div>
                                         
                                    </div>
                                    <div class="portlet-body">
                                       
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                                            <span></span>
                                                        </label>
                                                    </th>
                                                
                                                       <th> {{trans('trans.title')}}  </th>
                                                       <th> {{trans('trans.content')}}  </th>
                                        @if(admin()->user()->type !=='client')

                                                    <th> {{trans('trans.client_id')}}  </th>
                                                    @endif
                                    <th> {{trans('trans.departmet_id')}}  </th >
                                    <th> {{trans('trans.ContentType_id')}}  </th>
                                    <th> {{trans('trans.plan_id')}}  </th>
                                 
                                    <th> {{trans('trans.design')}}  </th>
                                                    
                                                 
                   
                 <th> {{trans('trans.clientsnot')}}  </th>
               
                                        @if(admin()->user()->type =='CompanyManger')
                 <th> {{trans('trans.Approval of the company manager')}}  </th>

                                                    @endif

                                 @if(admin()->user()->type =='AccountManager')
     
                 <th> {{trans('trans.Approval design')}}  </th>
                                                    @endif
                                                  
                                     


                                        @if(admin()->user()->type =='superadmin' or admin()->user()->type =='AccountManager')
                                                   
                                                    <th>{{trans('trans.Actions')}}  </th>
                                                    @endif

                                                </tr>
                                            </thead>
                                            <tbody>

                                            	@foreach($content as $content)
                                                <tr class="odd gradeX">
                                                    <td>
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="checkboxes" value="1" />
                                                            <span></span>
                                                        </label>
                                                    </td>
      
                                                  <td> 
                                               <a href="{{url('/')}}/content/{{$content->id}}"> 

                                                        {!! $content->name !!} 
                                                    </a>
                                                    </td>
                                                    <td> 
                                               <a href="{{url('/')}}/content/{{$content->id}}"> 

                                                        {!! $content->content !!} 
                                                    </a>
                                                    </td>
                                        @if(admin()->user()->type !=='client')

                                                    <td> 
                                    @if($content->client_id)

                                                        {{$content->client->name}} 
                                    @endif

                                                    </td>
                                                    @endif
                                   <td> 
                                    @if($content->departmet_id)
                                    {{$content->Department->name}} 
                                    @endif
                                </td >
                                                    <td>
                                                        @if($content->ContentType_id)
                                                     {{$content->ContentType->name}} 
                                                     @endif
                                                 </td>
                                                    <td> 
                                                        @if($content->plan_id)
                                                        {{$content->plan->name}} 
                                                        @endif
                                                    </td>
                                                     @include('admin.content.checkDesinStatus')
                                                     <td>
                 @if($content->clientsnot_id)
                  {{$content->clientsnots->name}} 
               @endif
                                                     </td>

                                        @if(admin()->user()->type =='CompanyManger')

                                                     <td>
                                       <div class="switch">
                                            <label>
                                                <input onchange="update_active(this)" value="{{ $content->id }}"
                                                       type="checkbox" <?php if ($content->ContentMangerConfirm == '1') echo "checked";?> >
                                                <span class="lever switch-col-indigo"></span>
                                            </label>
                                        </div>
                                                     </td>
                                       @endif

                                      

                                                     <td>
                                                         @if(admin()->user()->type =='AccountManager')
     @if($content->ContentMangerConfirm == '1' and $content->Contentclientconfirm == '1')
                                       <div class="switch">
                                            <label>
                                 <input onchange="update_acountmangerDesignConfirm(this)" value="{{ $content->id }}"
                                                       type="checkbox" <?php if ($content->acountmangerDesignConfirm == '1') echo "checked";?> >
                                                <span class="lever switch-col-indigo"></span>
                                            </label>
                                        </div>
                                          @endif
                                       @endif
                                                     </td>
                                     

                                                    
                        @if(admin()->user()->type =='superadmin' or admin()->user()->type =='AccountManager')
                                                  
                                                    <td>
                                                        <div class="btn-group">
                                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> {{trans('trans.Actions')}}
                                                                <i class="fa fa-angle-down"></i>
                                                            </button>
                                                            <ul class="dropdown-menu pull-left" role="menu">
                                                                <li>
                                                 <a href="{{url('/')}}/content/{{$content->id}}/edit">
                                     <i class="icon-docs"></i>{{trans('trans.edit')}} </a>
                                                                </li>

                                                                 <li>
                                                 <a href="{{url('/')}}/content/{{$content->id}}/destroy ">
                                     <i class="icon-docs"></i>{{trans('trans.delete')}} </a>
                                                                </li>
                                                                
                                                                
                                                               
                                                                 
                                                            </ul>
                                                        </div>
                                                    </td>
                                                    @endif
                                                </tr>
                                                  @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                            </div>
                        </div>
                       
                        
                    </div>
                    <!-- END CONTENT BODY -->
               @push('js')

            <script type="text/javascript">
                function update_active(el) {
                    if (el.checked) {
                        var ContentMangerConfirm = 1;
                    } else {
                        var ContentMangerConfirm = 0;
                    }
                    $.post('{{ route('content.ContentMangerConfirm') }}', {
                        _token: '{{ csrf_token() }}',
                        id: el.value,
                        ContentMangerConfirm: ContentMangerConfirm
                    }, function (data) {
                        if (data == 1) 
                        {
                            toastr.success("{{trans('trans.ContentMangerConfirmdone')}}");
                        } else 
                        {
                            toastr.error("{{trans('trans.ContentMangerConfirmnotdone')}}");
                        }
                    });
                }
            </script>

            <script type="text/javascript">
                function update_acountmangerDesignConfirm(el) {
                    if (el.checked) {
                        var acountmangerDesignConfirm = 1;
                    } else {
                        var acountmangerDesignConfirm = 0;
                    }
                    $.post('{{ route('content.acountmangerDesignConfirm') }}', {
                        _token: '{{ csrf_token() }}',
                        id: el.value,
                        acountmangerDesignConfirm: acountmangerDesignConfirm
                    }, function (data) {
                        if (data == 1) 
                        {
                            toastr.success("{{trans('trans.acountmangerDesignConfirmdone')}}");
                        } else 
                        {
                            toastr.error("{{trans('trans.acountmangerDesignConfirmnotdone')}}");
                        }
                    });
                }
            </script>

            

        @endpush

  @endsection

  