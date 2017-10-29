@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/fe_type_machines') }}">FE Type Machine</a> :
@endsection
@section("contentheader_description", $fe_type_machine->$view_col)
@section("section", "FE Type Machines")
@section("section_url", url(config('laraadmin.adminRoute') . '/fe_type_machines'))
@section("sub_section", "Edit")

@section("htmlheader_title", "FE Type Machines Edit : ".$fe_type_machine->$view_col)

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
				{!! Form::model($fe_type_machine, ['route' => [config('laraadmin.adminRoute') . '.fe_type_machines.update', $fe_type_machine->id ], 'method'=>'PUT', 'id' => 'fe_type_machine-edit-form']) !!}
					{{--
            @la_form($module)
            --}}
					
					
					@la_input($module, 'typemachine_title')
					@la_input($module, 'typemachine_image', '', '', 'form-control', ['id' => 'typemachine_image'])
					@la_input($module, 'typemachine_cold', '', '', 'form-control', ['id' => 'typemachine_cold'])
					@la_input($module, 'typemachine_warm', '', '', 'form-control', ['id' => 'typemachine_warm'])
					
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/fe_type_machines') }}">Cancel</a></button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script src="/ckfinder/ckfinder.js"></script>
<script>
$(function () {
	$("#fe_type_machine-edit-form").validate({
		
	});
  function openPopup(ele) {
       CKFinder.modal( {
           chooseFiles: true,
           onInit: function( finder ) {
               finder.on( 'files:choose', function( evt ) {
                   var file = evt.data.files.first();
                   ele.value = file.getUrl();
               } );
               finder.on( 'file:choose:resizedImage', function( evt ) {
                   ele.value = evt.data.resizedUrl;
               } );
           }
       } );
   }
   $('#typemachine_image').click(function() {
    openPopup(this);
   });
   $('#typemachine_cold').click(function() {
    openPopup(this);
   });
   $('#typemachine_warm').click(function() {
    openPopup(this);
   });
});
</script>
@endpush
