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
    <div class="app-page-title tab-pane">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-folder icon-gradient bg-tempting-azure">
                    </i>
                </div>
                <div>Locations
                    
                </div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <a href="/location-create" class="btn-shadow btn btn-info">
                        Add New
                    </a>
                </div>
            </div>    
        </div>
    </div>            
    <div class="main-card mb-3 card">

        <!-- Loading Animation -->
        <div class="preloader">
            <div class="loading">
                <img src="/assets/images/loading.gif" width="70">
            </div>
        </div>
        <!-- Loading Animation -->

        <div class="card-body">
            <table style="width: 100%;" id="datatable" class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($locations as $location)
                    <tr>
                        <td>{{$location->id}}</td>
                        <td>{{$location->name}}</td>
                        <td>{{$location->address}}</td>
                        <td style="text-align: center;">
                            <a href="/location/{{$location->id}}/detail" class="btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-info lnr-eye btn-icon-wrapper" id="showModal" data-toggle="modal" data-target="#exampleModal" data-name="{{$location->name}}" data-phone="{{$location->phone}}" data-postal_code="{{$location->postal_code}}" data-address="{{$location->address}}" data-latitude="{{$location->latitude}}" data-longitude="{{$location->longitude}}"></a>
                            <a href="/location/{{$location->id}}/edit" class="btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-success lnr-pencil btn-icon-wrapper"></a>
                            <a href="#" class="btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-danger lnr-trash btn-icon-wrapper delete" location-id="{{$location->id}}" location-name="{{$location->name}}"></a> 
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Location</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><b>Name</b></label>
                                    <p id="name"></p>
                                </div>
                                <div class="form-group">
                                    <label><b>Address</b></label>
                                    <p id="address"></p>
                                </div>
                                <!-- <div class="form-group">
                                    <label><b>Latitude</b></label>
                                    <p id="latitude"></p>
                                </div> -->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><b>Phone</b></label>
                                    <p id="phone"></p>
                                </div>
                                <div class="form-group">
                                    <label><b>Postal code</b></label>
                                    <p id="postal_code"></p>
                                </div>
                                <!-- <div class="form-group">
                                    <label><b>Longitude</b></label>
                                    <p id="longitude"></p>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div id="googleMap" style="width:465px; height:300px; border-radius: 5px;"></div>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

@section('footer')
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable({
            "order": [ 0, 'desc' ],
        });

        $(".preloader").fadeOut();

        $('.delete').click(function(){
            var location_name = $(this).attr('location-name');
            var location_id = $(this).attr('location-id');
            swal({
                title: "Are you sure deleted data?",
                text: "With name "+location_name +" ??",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    window.location = "/location/"+location_id+"/delete";
                } 
            });
        });

        $(document).on('click', '#showModal', function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var phone = $(this).data('phone');
            var postal_code = $(this).data('postal_code');
            var address = $(this).data('address');
            var latitude = $(this).data('latitude');
            var longitude = $(this).data('longitude');
            // console.log(latitude);
           
            $('#name').text(name);
            $('#phone').text(phone);
            $('#postal_code').text(postal_code);
            $('#address').text(address);
            // $('#latitude').text(latitude);
            // $('#longitude').text(longitude);

            var options = {
                center:new google.maps.LatLng(latitude,longitude),
                zoom:15,
                mapTypeId:google.maps.MapTypeId.ROADMAP
            };
            var map=new google.maps.Map(document.getElementById("googleMap"),options);
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(latitude,longitude),
                map: map,
                title: 'Jakarta'
            });
            google.maps.event.addDomListener(window, 'load');
        });
    });
</script>
@stop


