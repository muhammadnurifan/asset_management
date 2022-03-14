@extends('layouts.master')
@section('content')

<div class="app-main__inner">
    <form action="/stock-movements" method="post">
    @csrf
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-plus text-success">
                        </i>
                    </div>
                    <div>
                        Add Stock Movement
                    </div>
                </div>
                <div class="page-title-actions">
                    <div class="d-inline-block dropdown">
                        <button type="submit" class="btn-shadow btn btn-info">
                            Save
                        </button>
                    </div>
                </div>    
            </div>
        </div>            
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail11"><b>Document Number</b></label>
                                            <input name="document_number" id="document_number" class="form-control document_number" value="{{$document_number}}">
                                        </div>
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail11"><b>Type</b></label>
                                            <select name="type" id="type" class="form-control type" value="">
                                                <option value="">-- Select Type --</option>
                                                <option value="Receipt">Receipt</option>
                                                <option value="Transfer">Transfer</option>
                                                <option value="Issue">Issue</option>
                                            </select>
                                        </div>
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail11"><b>Source Location</b></label>
                                            <select name="source_location_id" id="source_location_id" class="multiselect-dropdown form-control source_location_id" value="">
                                            <option value="">-- Select --</option>
                                            @foreach ($locations as $location)
                                                <option value="{{$location->id}}">{{$location->name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail11"><b>Source Floor</b></label>
                                            <select name="source_floor_id" id="source_floor_id" class="multiselect-dropdown form-control source_floor_id" value="">
                                            <option value="">-- Select --</option>
                                            @foreach ($floors as $floor)
                                                <option value="{{$floor->id}}">{{$floor->name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail11"><b>Source Room</b></label>
                                            <select name="source_room_id" id="source_room_id" class="multiselect-dropdown form-control source_room_id" value="">
                                            <option value="">-- Select --</option>
                                            @foreach ($rooms as $room)
                                                <option value="{{$room->id}}">{{$room->name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail11"><b>Posting Date</b></label>
                                            <input name="posting_date" type="date" id="posting_date" class="form-control posting_date @error('posting_date') is-invalid @enderror" autocomplete="off" value="{{ old('posting_date')}}"> 
                                        </div>
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail11"><b>Destination Location</b></label>
                                            <select name="destination_location_id" id="destination_location_id" class="multiselect-dropdown form-control destination_location_id" value="">
                                            <option value="">-- Select --</option>
                                            @foreach ($locations as $location)
                                                <option value="{{$location->id}}">{{$location->name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail11"><b>Destination Floor</b></label>
                                            <select name="destination_floor_id" id="destination_floor_id" class="multiselect-dropdown form-control destination_floor_id" value="">
                                            <option value="">-- Select --</option>
                                            @foreach ($floors as $floor)
                                                <option value="{{$floor->id}}">{{$floor->name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail11"><b>Destination Room</b></label>
                                            <select name="destination_room_id" id="destination_room_id" class="multiselect-dropdown form-control destination_room_id" value="">
                                            <option value="">-- Select --</option>
                                            @foreach ($rooms as $room)
                                                <option value="{{$room->id}}">{{$room->name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

@section('footer')
<script>
    $(document).ready(function(){
        $('.type').change(function(){
            console.log($(this).val());

            if($(this).val() == 'Receipt'){
                $('.source_location_id').attr('disabled', false);
                $('.source_floor_id').attr('disabled', false);
                $('.source_room_id').attr('disabled', false);
                $('.destination_location_id').attr('disabled', true);
                $('.destination_floor_id').attr('disabled', true);
                $('.destination_room_id').attr('disabled', true);
            } else if($(this).val() == 'Transfer') {
                $('.source_location_id').attr('disabled', false);
                $('.source_floor_id').attr('disabled', false);
                $('.source_room_id').attr('disabled', false);
                $('.destination_location_id').attr('disabled', false);
                $('.destination_floor_id').attr('disabled', false);
                $('.destination_room_id').attr('disabled', false);
            } else {
                $('.source_location_id').attr('disabled', false);
                $('.source_floor_id').attr('disabled', false);
                $('.source_room_id').attr('disabled', false);
                $('.destination_location_id').attr('disabled', true);
                $('.destination_floor_id').attr('disabled', true);
                $('.destination_room_id').attr('disabled', true);
            }
        });
    });
</script>
@stop