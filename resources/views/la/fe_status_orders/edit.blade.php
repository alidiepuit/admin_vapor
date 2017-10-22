@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/fe_status_orders') }}">FE Status Order</a> :
@endsection
@section("contentheader_description", $fe_status_order->$view_col)
@section("section", "FE Status Orders")
@section("section_url", url(config('laraadmin.adminRoute') . '/fe_status_orders'))
@section("sub_section", "Edit")

@section("htmlheader_title", "FE Status Orders Edit : ".$fe_status_order->$view_col)

@section("main-content")

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="box">
	<div class="box-header">
		
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				{!! Form::model($fe_status_order, ['route' => [config('laraadmin.adminRoute') . '.fe_status_orders.update', $fe_status_order->id ], 'method'=>'PUT', 'id' => 'fe_status_order-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'status_title')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/fe_status_orders') }}">Cancel</a></button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script>
$(function () {
	$("#fe_status_order-edit-form").validate({
		
	});
});
</script>
@endpush
