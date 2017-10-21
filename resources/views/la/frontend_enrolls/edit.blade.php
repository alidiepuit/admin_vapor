@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/frontend_enrolls') }}">Frontend enroll</a> :
@endsection
@section("contentheader_description", $frontend_enroll->$view_col)
@section("section", "Frontend enrolls")
@section("section_url", url(config('laraadmin.adminRoute') . '/frontend_enrolls'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Frontend enrolls Edit : ".$frontend_enroll->$view_col)

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
				{!! Form::model($frontend_enroll, ['route' => [config('laraadmin.adminRoute') . '.frontend_enrolls.update', $frontend_enroll->id ], 'method'=>'PUT', 'id' => 'frontend_enroll-edit-form']) !!}
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
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/frontend_enrolls') }}">Cancel</a></button>
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
	$("#frontend_enroll-edit-form").validate({
		
	});
});
</script>
@endpush
