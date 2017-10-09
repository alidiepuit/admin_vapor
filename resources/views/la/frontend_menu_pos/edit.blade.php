@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/frontend_menu_pos') }}">Frontend menu po</a> :
@endsection
@section("contentheader_description", $frontend_menu_po->$view_col)
@section("section", "Frontend menu pos")
@section("section_url", url(config('laraadmin.adminRoute') . '/frontend_menu_pos'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Frontend menu pos Edit : ".$frontend_menu_po->$view_col)

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
				{!! Form::model($frontend_menu_po, ['route' => [config('laraadmin.adminRoute') . '.frontend_menu_pos.update', $frontend_menu_po->id ], 'method'=>'PUT', 'id' => 'frontend_menu_po-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'title')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/frontend_menu_pos') }}">Cancel</a></button>
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
	$("#frontend_menu_po-edit-form").validate({
		
	});
});
</script>
@endpush
