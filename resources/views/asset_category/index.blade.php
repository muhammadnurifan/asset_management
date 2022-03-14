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
                <div>Asset Category
                    
                </div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <a href="{{route('asset-category.create')}}" class="btn-shadow btn btn-info">
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
                        <th style="width: 5%;">Id</th>
                        <th>Name</th>
                        <th style="width: 15%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($asset_categories as $asset_category)
                    <tr>
                        <td>{{$asset_category->id}}</td>
                        <td>{{$asset_category->name}}</td>
                        <td style="text-align: center;">
                            <a href="/asset-categories/{{$asset_category->id}}/edit" class="btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-success lnr-pencil btn-icon-wrapper"></a>
                            <a href="#" class="btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-danger lnr-trash btn-icon-wrapper delete" asset_category-id="{{$asset_category->id}}" asset_category-name="{{$asset_category->name}}"></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script>
    $(document).ready(function() {
        $('#datatable').DataTable({
            "order": [ 0, 'desc' ],
        });

        $(".preloader").fadeOut();
        
        $('.delete').click(function(){
            var asset_category_name = $(this).attr('asset_category-name');
            var asset_category_id = $(this).attr('asset_category-id');
            swal({
                title: "Are you sure deleted data?",
                text: "With name "+asset_category_name +" ??",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    window.location = "/asset-categories/"+asset_category_id+"/delete";
                } 
            });
        });
    });
</script>
@stop