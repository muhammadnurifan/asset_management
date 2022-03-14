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
                <div>Assets
                    
                </div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <a href="{{route('asset.create')}}" class="btn-shadow btn btn-info">
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
                        <th>Code</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>UOM</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($assets as $asset)
                    <tr>
                        <td>{{$asset->id}}</td>
                        <td>{{$asset->code}}</td>
                        <td>{{$asset->name}}</td>
                        <td>{{$asset->asset_category->name}}</td>
                        <td>{{$asset->uom}}</td>
                        <td style="text-align: center;">
                            <a href="/asset/{{$asset->id}}/detail" class="btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-info lnr-eye btn-icon-wrapper" id="showModal" data-toggle="modal" data-target="#exampleModal" data-id="{{$asset->id}}" data-code="{{$asset->code}}" data-name="{{$asset->name}}" data-category="{{$asset->asset_category->name}}" data-uom="{{$asset->uom}}" data-image="img/{{$asset->image}}"></a>
                            <a href="/asset/{{$asset->id}}/edit" class="btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-success lnr-pencil btn-icon-wrapper"></a>
                            <a href="#" class="btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-danger lnr-trash btn-icon-wrapper delete" asset-id="{{$asset->id}}" asset-name="{{$asset->name}}"></a> 
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Asset</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <img src="" id="image" class="img-fluid photo" alt="image" style="width: 250px; height: 150px; border-radius: 5px;">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label><b>Code</b></label>
                                    <p id="code"></p>
                                </div>
                                <div class="form-group">
                                    <label><b>Name</b></label>
                                    <p id="name"></p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label><b>Category</b></label>
                                    <p id="category_id"></p>
                                </div>
                                <div class="form-group">
                                    <label><b>UOM</b></label>
                                    <p id="uom"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

@section('footer')
<script>
    $(document).ready(function() {
        $('#datatable').DataTable({
            "order": [ 0, 'desc' ],
        });

        $(".preloader").fadeOut();

        $('.delete').click(function(){
            var asset_name = $(this).attr('asset-name');
            var asset_id = $(this).attr('asset-id');
            swal({
                title: "Are you sure deleted data?",
                text: "With name "+asset_name +" ??",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    window.location = "/asset/"+asset_id+"/delete";
                } 
            });
        });

        $(document).on('click', '#showModal', function() {
            var id = $(this).data('id');
            var code = $(this).data('code');
            var name = $(this).data('name');
            var category = $(this).data('category');
            var uom = $(this).data('uom');
            var image = $(this).data('image');
           
            $('#code').text(code);
            $('#name').text(name);
            $('#category_id').text(category);
            $('#uom').text(uom);
            $('#image').attr('src', image);
        });
    });
</script>
@stop