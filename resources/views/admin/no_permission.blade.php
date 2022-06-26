@extends('admin.index')

@section('content')
<div class="error-page">
    <h2 class="headline text-info">403</h2>
    <div class="error-content">
        <h3><i class="fa fa-exclamation-triangle text-info"></i> {{ trans('trans.error_permission_1') }}</h3>
        <p>
          {{ trans('trans.error_permission_2') }}
        </p>
         <p> {{ trans('trans.error_permission_4') }}
                <br/>

                                          @if(Auth::guard('admin')->check())
                          
                <a href="{{ url('/dashboard') }}"> {{ trans('trans.error_permission_5') }} </a>
                                            @else
                <a href="{{ url('/dashboardCompanies') }}"> {{ trans('trans.error_permission_5') }} </a>
                                            
                                            @endif



            {{ trans('trans.error_permission_6') }} </p>

    </div>
</div>
<!-- /.error-page -->
@endsection