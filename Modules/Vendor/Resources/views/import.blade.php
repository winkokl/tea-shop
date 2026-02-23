@extends ('backend.layouts.app')

@section ('title', __('vendor::labels.backend.vendor.management') . ' | ' . __('vendor::labels.backend.vendor.create'))

@section('breadcrumb-links')
    @include('vendor::includes.breadcrumb-links')
@endsection

@push('after-styles')
    
@endpush

@section('content')
{{ html()->form('POST', route('admin.vendor.import'))->class('form-horizontal')->attribute('enctype', 'multipart/form-data')->open() }}
	<div class="card">
		<div class="card-body">
			<div class="row">
			    <div class="col-sm-5">
			        <h4 class="card-title mb-0">
			            {{ __('vendor::labels.backend.vendor.import_text') }}
			        </h4>
			    </div><!--col-->
			</div><!--row-->

			<hr />

			<div class="well well-sm border p-2">
                <a href="{{route('admin.vendor.sample_csv')}}" class="btn btn-info btn-sm float-right"><i class="fa fa-download"></i> {{ __('vendor::labels.backend.vendor.download_text') }}</a>

                <p>
                	<span class="text-info">
                		The first line in downloaded csv file should remain as it is. Please do not change the order of columns.
                	</span><br>
                	<span class="text-success">
                		The correct column vendor is (<b>Name, NRC, Mobile, Code, Region/State, Township, Active, Confirmed</b>)
                	</span> 
            		<span class="text-primary">
            			&amp; you must follow this. If you are using any other language then English, please make sure the csv file is UTF-8 encoded and not saved with byte order mark (BOM)
            		</span>
            	</p>
            </div>

            <br><hr />
        	<div class="row mt-4 mb-4">
        	    <div class="col">
	            	<div class="form-group col-8">
                        <label for="csv_file">{{__('vendor::labels.backend.vendor.table.import_file')}}</label>                        
                        	<input type="file" name="import_file" id="csv_file" tabindex="-1" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);">
                        		<div class="bootstrap-filestyle input-group">
                        			<input type="text" class="form-control " disabled=""> 
                    				<span class="group-span-filestyle input-group-btn" tabindex="0">
                    					<label for="csv_file" class="btn btn-default ">
                    						<span class="fa fa-folder-open"></span> Choose file
                    					</label>
                    				</span>
            					</div>
                        <div class="inline-help">{{ __('vendor::labels.backend.vendor.limit_text') }}</div>
                    </div>
            	</div>
        	</div>
        	<div class="col text-left">
        	    {{ form_submit(__('vendor::menus.backend.vendor.import')) }}
        	</div><!--row-->
		</div>
	</div>
{{ html()->closeModelForm() }}
@endsection