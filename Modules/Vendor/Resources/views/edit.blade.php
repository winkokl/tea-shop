@extends ('backend.layouts.app')

@section ('title', __('vendor::labels.backend.vendor.management') . ' | ' . __('vendor::labels.backend.vendor.edit'))

@section('breadcrumb-links')
    @include('vendor::includes.breadcrumb-links')
@endsection

@push('after-styles')
    {{ style('assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}
    {{ style('assets/plugins/select2/css/select2.min.css') }}
    {{ style('assets/plugins/select2/css/select2-bootstrap.min.css') }}
@endpush

@section('content')
{{ html()->modelForm($vendor, 'PATCH', route('admin.vendor.update', $vendor->id))->class('form-horizontal')->attribute('enctype', 'multipart/form-data')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('vendor::labels.backend.vendor.management') }}
                        <small class="text-muted">{{ __('vendor::labels.backend.vendor.edit') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                    {{ html()->label(__('vendor::labels.backend.vendor.table.name'))->class('col-md-2 form-control-label')->for('name') }}

                        <div class="col-md-10">
                            {{ html()->text('name')
                                ->class('form-control')
                                ->placeholder(__('vendor::labels.backend.vendor.table.name'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('vendor::labels.backend.vendor.table.vendor_ref').'<span class="text-danger">*</span>')->class('col-md-2 form-control-label')->for('vendor_ref') }}
    
                        <div class="col-md-10">
                            {{ html()->text('vendor_ref')
                                ->class('form-control')
                                ->placeholder(__('vendor::labels.backend.vendor.table.vendor_ref'))
                                ->attribute('maxlength', 10)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('vendor::labels.backend.vendor.table.mobile'))->class('col-md-2 form-control-label')->for('mobile') }}
    
                            <div class="col-md-10">
                                {{ html()->text('mobile')
                                    ->class('form-control')
                                    ->placeholder(__('vendor::labels.backend.vendor.table.mobile'))
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('vendor::labels.backend.vendor.table.nrc'))->class('col-md-2 form-control-label')->for('nrc') }}
    
                            <div class="col-md-10">
                                {{ html()->text('nrc')
                                    ->class('form-control')
                                    ->placeholder(__('vendor::labels.backend.vendor.table.nrc'))
                                    ->attribute('maxlength', 191) }}
                            </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('vendor::labels.backend.vendor.table.email'))->class('col-md-2 form-control-label')->for('email') }}
    
                            <div class="col-md-10">
                                {{ html()->text('email')
                                    ->class('form-control')
                                    ->placeholder(__('vendor::labels.backend.vendor.table.email'))
                                    ->attribute('maxlength', 191) }}
                            </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('township::labels.backend.township.table.region_name').'<span class="text-danger">*</span>')->class('col-md-2 form-control-label')->for('region_name') }}

                        <div class="col-md-10">
                            <select name="region_id" id="region_id" class="form-control region-name" required="required">
                                <option></option>
                                @foreach ($regions as $key => $value)
                                   <option name="region_id" value="{{ $key }}" {{ $key == old('key',$vendor->region_id) ? 'selected' : '' }}>{{ $value}}</option>
                                @endforeach
                            </select>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('township::labels.backend.township.table.township_name'))->class('col-md-2 form-control-label')->for('township_name') }}

                        <div class="col-md-10">
                            <select name="township_id" id="township_id" class="form-control select2" disabled>
                                <option></option>
                                @foreach ($townships as $key => $value)
                                    
                                    <option name="township_id" value="{{ $key }}" {{ $key == old('key',$vendor->township_id) ? 'selected' : '' }}>{{ $value}}</option>
                                @endforeach                              
                            </select>
                        </div><!--col-->
                    </div><!--form-group-->

                    <input id="pac-input" class="controls" type="text" placeholder="Search Place" style="width:30%;">

                    <div class="form-group row">
                        <div class="col-md-2"></div>
                        <div class="col-md-10">
                            <div id="map-canvas"
                                    style="width:97%;height:400px;">
                                
                                </div>
                            <div id="ajax_msg"></div>
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ html()->label(__('vendor::labels.backend.vendor.table.latitude').'<span class="text-danger">*</span>')->class('col-md-2 form-control-label')->for('input-latitude') }}
                    
                            <div class="col-md-10">
                                {{ html()->text('latitude')
                                    ->id('input-latitude')
                                    ->class('form-control')
                                    ->placeholder(__('vendor::labels.backend.vendor.table.latitude'))
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('vendor::labels.backend.vendor.table.longitude').'<span class="text-danger">*</span>')->class('col-md-2 form-control-label')->for('input-longitude') }}
                    
                            <div class="col-md-10">
                                {{ html()->text('longitude')
                                    ->id('input-longitude')
                                    ->class('form-control')
                                    ->placeholder(__('vendor::labels.backend.vendor.table.longitude'))
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                    {{ html()->label(__('vendor::labels.backend.vendor.table.address'))->class('col-md-2 form-control-label')->for('address') }}

                        <div class="col-md-10">
                            {{ html()->textarea('address')
                                ->class('form-control')
                                ->placeholder(__('vendor::labels.backend.vendor.table.address'))
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('vendor::labels.backend.vendor.table.bank_info'))->class('col-md-2 form-control-label')->for('bank_info') }}
    
                            <div class="col-md-10">
                                {{ html()->textarea('bank_info')
                                    ->id('bank_info')
                                    ->class('form-control')
                                    ->placeholder(__('vendor::labels.backend.vendor.table.bank_info')) }}
                            </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('Opening Time'))->class('col-md-2 form-control-label')->for('opening_time') }}
                    
                        <div class="col-md-10">
                            {{ html()->text('opening_time')
                                ->class('form-control timepicker timepicker-24')
                                ->attribute('required', true) }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('Closing Time'))->class('col-md-2 form-control-label')->for('closing_time') }}
                    
                        <div class="col-md-10">
                            {{ html()->text('closing_time')
                                ->class('form-control timepicker timepicker-24')
                                ->attribute('required', true) }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('vendor::labels.backend.vendor.table.logo'))->class('col-md-2 form-control-label')->for('logo') }}
                    
                        <div class="col-md-10">
                            <input type="file" value="" id="logo" name="logo" class="form-control-file"><br>
                            <img src="{{ asset('uploads/'.$vendor->logo) }}" class="thumbnail"  style="width: 200px; height: 150px;">
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('vendor::labels.backend.vendor.table.shop_photo'))->class('col-md-2 form-control-label')->for('shop_photo') }}
                    
                        <div class="col-md-10">
                            <input type="file" value="" id="shop_photo" name="shop_photo" class="form-control-file"><br>
                            <img src="{{ asset('uploads/'.$vendor->shop_photo) }}" class="thumbnail"  style="width: 200px; height: 150px;">
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.vendor.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--row-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->closeModelForm() }}
@endsection

@push('after-scripts')
<script async
    src="https://maps.googleapis.com/maps/api/js?key={{ config('appsetting.basic.map_key') }}&libraries=weather,geometry,visualization,places,drawing&callback=initMap">
</script>
{{ script("assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js") }}
{{ script("assets/plugins/select2/js/select2.full.min.js")}}
{{ script("assets/plugins/select2/component/components-select2.js") }}
<script>

    $(document).ready(function(){
        $('.timepicker-24').timepicker({
            autoclose: true,
            minuteStep: 5,
            showSeconds: false,
            showMeridian: false
        });

        $('.timepicker-24').timepicker().on('changeTime.timepicker', function(e) {
            var hours = e.time.hours.toString().length === 1 ? '0' + e.time.hours : e.time.hours;
            var minutes = e.time.minutes.toString().length === 1 ? '0' + e.time.minutes : e.time.minutes;
            $(this).val(hours+':'+minutes);
        });
        
        $('.timepicker-24').attr('readonly',true);
        $('.timepicker-24').css('cursor','pointer');

        $('#region_id').select2({
        placeholder: "Choose Region"
        });
    
        $('#township_id').select2({
        placeholder: "Choose Township"
        });
    
        $('#region_id').on('select2:select', function(){
            
            var regionId = $(this).val();
            if(regionId){
                var township_id= $('#township_id').val();
                $('#township_id').empty();
            
                $('#township_id').removeAttr('disabled','disabled');
                $.ajax({
                    url: "{{ url('admin/customer/get-townships/') }}/"+regionId,
                    type: 'GET',
                    success: function (data){
                        if(data.length == 0) {
    
                            $('#township_id').attr('disabled','disabled');
                            $('#township_id').find('option').remove().end();
                            $('#township_id').hide();
                            $('#township_text').show();
                            
    
                        }else {
                            $('#township_id').show();
                            $('#township_id').removeAttr('disabled','disabled');
                            $('#township_text').hide();
                            $('#township_id').find('option').remove().end();
                            $('#township_id').append($('<option></option>') .attr('selected',true).text('Select Township'));
    
                            $.each(data, function(i, value) {
    
                                $('#township_id').append($('<option></option>').attr('value', value.id).text(value.name ));
                                $('#township_id').trigger('change');  
                                
                            });    
                            $('#township_id').removeAttr('disabled','disabled');
    
                            
                        }  
                    }, 
                });
            }else{
            $('#township_id').attr('disabled','disabled');  
            } 
        });
    });

    function initMap() {
        var mapOptions = {
            @if(old('latitude') && old('longitude'))
                center : new google.maps.LatLng('{{old('latitude')}}', '{{ old('longitude') }}'),
            @else
                center: new google.maps.LatLng(16.798703652839684, 96.14947007373053),
            @endif
            zoom: 13
        };
        var map = new google.maps.Map(document.getElementById('map-canvas'),
                mapOptions);

        @if(old('latitude') && old('longitude'))
            var marker_position = new google.maps.LatLng('{{old('latitude')}}', '{{ old('longitude') }}');
        @else
            var marker_position = new google.maps.LatLng(16.798703652839684, 96.14947007373053);
        @endif
        var input = /** @type {HTMLInputElement} */(
                document.getElementById('pac-input'));

        var types = document.getElementById('type-selector');
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
            position: marker_position,
            draggable: true,
            map: map,
            anchorPoint: new google.maps.Point(0, -29)
        });


        google.maps.event.addListener(marker, "mouseup", function (event) {
            $('#input-latitude').val(this.position.lat());
            $('#input-longitude').val(this.position.lng());
        });

        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            infowindow.close();
            marker.setVisible(false);
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                return;
            }

            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);
            }

            marker.setIcon(/** @type {google.maps.Icon} */({
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(35, 35)
            }));

            marker.setPosition(place.geometry.location);
            marker.setVisible(true);

            $('#input-latitude').val(place.geometry.location.lat());
            $('#input-longitude').val(place.geometry.location.lng());

            // var address = '';
            // if (place.address_components) {
            //     address = [
            //         (place.address_components[0] && place.address_components[0].short_name || ''),
            //         (place.address_components[1] && place.address_components[1].short_name || ''),
            //         (place.address_components[2] && place.address_components[2].short_name || '')
            //     ].join(' ');
            // }

            // $('input[name=address]').val(place.formatted_address);

            // infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
            infowindow.open(map, marker);
        });


        google.maps.event.addListener(marker, 'dragend', function() {

            $('#input-latitude').val(place.geometry.location.lat());
            $('#input-longitude').val(place.geometry.location.lng());

        });

    }

    if ($('#map-canvas').length != 0) {
        window.addEventListener('load', initMap);
    }


</script>
@endpush