@extends("la.layouts.app")

@section("contentheader_title", "Frontend enrolls")
@section("contentheader_description", "Frontend enrolls listing")
@section("section", "Frontend enrolls")
@section("sub_section", "Listing")
@section("htmlheader_title", "Frontend enrolls Listing")

@section("headerElems")
@la_access("Frontend_enrolls", "create")
	<button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal">Add Frontend enroll</button>
@endla_access
@endsection

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

<div class="box box-success">
	<!--<div class="box-header"></div>-->
	<div class="box-body">
		<table id="example1" class="table table-bordered">
		<thead>
		<tr class="success">
			@foreach( $listing_cols as $col )
			<th>{{ $module->fields[$col]['label'] or ucfirst($col) }}</th>
			@endforeach
			@if($show_actions)
			<th>Actions</th>
			@endif
		</tr>
		</thead>
		<tbody>
			
		</tbody>
		</table>
	</div>
</div>

@la_access("Frontend_enrolls", "create")
<div class="modal fade" id="AddModal" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Frontend enroll</h4>
			</div>
			{!! Form::open(['action' => 'LA\Frontend_enrollsController@store', 'id' => 'frontend_enroll-add-form']) !!}
			<div class="modal-body">
				<div class="box-body">
                    @la_form($module)
					
					{{--
					@la_input($module, 'enroll_fullname')
					@la_input($module, 'enroll_email')
					@la_input($module, 'enroll_phone')
					@la_input($module, 'enroll_gender')
					@la_input($module, 'enroll_identifier')
					@la_input($module, 'enroll_issueby')
					@la_input($module, 'enroll_issueon')
					@la_input($module, 'enroll_address')
					@la_input($module, 'enroll_marital')
					@la_input($module, 'enroll_healthy')
					@la_input($module, 'enroll_experience')
					@la_input($module, 'enroll_year')
					@la_input($module, 'enroll_skills')
					@la_input($module, 'enroll_tools')
					@la_input($module, 'enroll_know')
					@la_input($module, 'enroll_acceptterms')
					@la_input($module, 'enroll_tempaddress')
					--}}
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				{!! Form::submit( 'Submit', ['class'=>'btn btn-success']) !!}
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endla_access

@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('la-assets/plugins/datatables/datatables.min.css') }}"/>
@endpush

@push('scripts')
<script src="{{ asset('la-assets/plugins/datatables/datatables.min.js') }}"></script>
<script>
$(function () {
	$("#example1").DataTable({
		processing: true,
        serverSide: true,
        ajax: "{{ url(config('laraadmin.adminRoute') . '/frontend_enroll_dt_ajax') }}",
		language: {
			lengthMenu: "_MENU_",
			search: "_INPUT_",
			searchPlaceholder: "Search"
		},
		@if($show_actions)
		columnDefs: [ { orderable: false, targets: [-1] }],
		@endif
	});
	$("#frontend_enroll-add-form").validate({
		
	});
});
</script>
@endpush
