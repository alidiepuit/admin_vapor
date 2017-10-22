@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/fe_discounts') }}">Fe discount</a> :
@endsection
@section("contentheader_description", $fe_discount->$view_col)
@section("section", "Fe discounts")
@section("section_url", url(config('laraadmin.adminRoute') . '/fe_discounts'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Fe discounts Edit : ".$fe_discount->$view_col)

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
				{!! Form::model($fe_discount, ['route' => [config('laraadmin.adminRoute') . '.fe_discounts.update', $fe_discount->id ], 'method'=>'PUT', 'id' => 'fe_discount-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'discount_percent')
					@la_input($module, 'discount_amount')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/fe_discounts') }}">Cancel</a></button>
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
	$("#fe_discount-edit-form").validate({
		
	});
});
</script>
@endpush
