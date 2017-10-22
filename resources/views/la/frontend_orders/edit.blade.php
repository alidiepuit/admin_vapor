@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/frontend_orders') }}">Frontend order</a> :
@endsection
@section("contentheader_description", $frontend_order->$view_col)
@section("section", "Frontend orders")
@section("section_url", url(config('laraadmin.adminRoute') . '/frontend_orders'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Frontend orders Edit : ".$frontend_order->$view_col)

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
				{!! Form::model($frontend_order, ['route' => [config('laraadmin.adminRoute') . '.frontend_orders.update', $frontend_order->id ], 'method'=>'PUT', 'id' => 'frontend_order-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'order_typeservice')
					@la_input($module, 'order_typemachine')
					@la_input($module, 'order_power')
					@la_input($module, 'order_amount')
					@la_input($module, 'order_grouporder')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/frontend_orders') }}">Cancel</a></button>
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
	$("#frontend_order-edit-form").validate({
		
	});
});
</script>
@endpush
