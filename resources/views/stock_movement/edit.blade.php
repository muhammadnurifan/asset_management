@extends('layouts.master')
@section('content')
<style>
.preloader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 999;
    background-color: #fff;
}

.preloader .loading {
    position: absolute;
    left: 57%;
    top: 50%;
    transform: translate(-50%,-50%);
    font: 14px arial;
}
</style>
<div class="app-main__inner">
    <form action="#" method="post" enctype="multipart/form-data">
    @csrf
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-edit text-success">
                        </i>
                    </div>
                    <div>
                        Edit Stock Movement
                    </div>
                </div>
                <div class="page-title-actions">
                    <div class="d-inline-block dropdown">
                        <a href="{{route('stock-movement.index')}}" type="button" class="btn-shadow btn btn-light">
                            Back To List
                        </a>
                    </div>
                    <div class="d-inline-block dropdown">
                        <button type="submit" class="btn-shadow btn btn-success">
                            Update
                        </button>
                    </div>
                </div>    
            </div>
        </div>            
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="main-card mb-3 card">

                    <!-- Loading Animation -->
                    <div class="preloader">
                        <div class="loading">
                            <img src="/assets/images/loading.gif" width="70">
                        </div>
                    </div>
                    <!-- Loading Animation -->

                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail11"><b>Type</b></label>
                                            <select name="type" id="type" class="form-control type">
                                                <option value="{{$stock_movements->type}}" @if($stock_movements->type) selected @endif>{{$stock_movements->type}}</option>
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
                                                <option value="{{$location->id}}" @if($stock_movements->source_location_id == $location->id) selected @endif>{{$location->name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail11"><b>Source Floor</b></label>
                                            <select name="source_floor_id" id="source_floor_id" class="multiselect-dropdown form-control source_floor_id" value="">
                                            <option value="">-- Select --</option>
                                            @foreach ($floors as $floor)
                                                <option value="{{$floor->id}}" @if($stock_movements->source_floor_id == $floor->id) selected @endif>{{$floor->name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail11"><b>Source Room</b></label>
                                            <select name="source_room_id" id="source_room_id" class="multiselect-dropdown form-control source_room_id" value="">
                                            <option value="">-- Select --</option>
                                            @foreach ($rooms as $room)
                                                <option value="{{$room->id}}" @if($stock_movements->source_room_id == $room->id) selected @endif>{{$room->name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail11"><b>Posting Date</b></label>
                                            <input name="posting_date" type="date" class="form-control" autocomplete="off" value="{{ $stock_movements->posting_date }}">
                                        </div>
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail11"><b>Destination Location</b></label>
                                            <select name="destination_location_id" id="destination_location_id" class="multiselect-dropdown form-control destination_location_id" value="">
                                            <option value="">-- Select --</option>
                                            @foreach ($locations as $location)
                                                <option value="{{$location->id}}" @if($stock_movements->destination_location_id == $location->id) selected @endif>{{$location->name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail11"><b>Destination Floor</b></label>
                                            <select name="destination_floor_id" id="destination_floor_id" class="multiselect-dropdown form-control destination_floor_id" value="">
                                            <option value="">-- Select --</option>
                                            @foreach ($floors as $floor)
                                                <option value="{{$floor->id}}" @if($stock_movements->destination_floor_id == $floor->id) selected @endif>{{$floor->name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail11"><b>Destination Room</b></label>
                                            <select name="destination_room_id" id="destination_room_id" class="multiselect-dropdown form-control destination_room_id" value="">
                                            <option value="">-- Select --</option>
                                            @foreach ($rooms as $room)
                                                <option value="{{$room->id}}" @if($stock_movements->destination_room_id == $room->id) selected @endif>{{$room->name}}</option>
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

        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <div class="">
                            <div class="d-inline-block dropdown" style="float: right;">
                                <a href="" class="btn-shadow btn btn-info">
                                    Add Item
                                </a>
                            </div>
                        </div> 
                        <br>
                        <br>    
                        <table style="width: 100%; background-color: #F5F5F5;" class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Asset</th>
                                    <th>Qty</th>
                                    <th>Condition</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('footer')
<script>
    $(document).ready(function() {
        $(".preloader").fadeOut();

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