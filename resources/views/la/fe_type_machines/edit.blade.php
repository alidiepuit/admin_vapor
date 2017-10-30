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
<a href="/filemanager/dialog.php?type=2&field_id=typemachine_image&relative_url=1&callback=responsive_filemanager_callback" class="iframe-btn" id="iframe-image" style="display: none;">Open Filemanager</a>
<a href="/filemanager/dialog.php?type=2&field_id=typemachine_cold&relative_url=1" class="iframe-btn" id="iframe-cold"  style="display: none;">Open Filemanager</a>
<a href="/filemanager/dialog.php?type=2&field_id=typemachine_warm&relative_url=1" class="iframe-btn" id="iframe-warm"  style="display: none;">Open Filemanager</a>
@endsection

@push('scripts')
<script src="/ckfinder/ckfinder.js"></script>
<script src="/fancybox/jquery.fancybox.min.js"></script>
<link  href="/fancybox/jquery.fancybox.min.css" rel="stylesheet">
<script>
$(function () {
	$("#fe_type_machine-edit-form").submit(function() {
    var linkImage = $('#typemachine_image').val();
    if (linkImage.length > 0 && !linkImage.match("^\/static\/images\/")) {
      $('#typemachine_image').val('/static/images/' + linkImage);
    }
    var linkCold = $('#typemachine_cold').val();
    if (linkCold.length > 0 && !linkCold.match("^\/static\/images\/")) {
      $('#typemachine_cold').val('/static/images/' + linkCold);
    }
    var linkWarm = $('#typemachine_warm').val();
    if (linkWarm.length > 0 && !linkWarm.match("^\/static\/images\/")) {
      $('#typemachine_warm').val('/static/images/' + linkWarm);
    }
  }).validate({
    
  });
  $('.iframe-btn').fancybox({ 
    'width'   : 900,
    'height'  : 600,
    'type'    : 'iframe',
    'autoScale'     : false
  });
  $('#typemachine_image').click(function() {
    $('#iframe-image').click();
  });
  $('#typemachine_cold').click(function() {
    $('#iframe-cold').click();
  });
  $('#typemachine_warm').click(function() {
    $('#iframe-warm').click();
  });
});
</script>
@endpush
