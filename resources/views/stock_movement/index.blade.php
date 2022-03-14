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
                <div>Floor
                    
                </div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <a href="{{route('stock-movement.create')}}" class="btn-shadow btn btn-info">
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
                        <th>Document Number</th>
                        <th>Posting Date</th>
                        <th>Type</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($stock_movements as $stock_movement)
                    <tr>
                        <td>{{$stock_movement->document_number}}</td>
                        <td>{{$stock_movement->posting_date}}</td>
                        <td>{{$stock_movement->type}}</td>
                        <td style="text-align: center;">
                            <?php
                                $states_label = '';
                                if($stock_movement->status == 1){
                                    echo '<label class="badge badge-danger">Draft</label>';
                                } elseif ($stock_movement->status == 2) {
                                    echo '<label class="badge badge-success">Complete</label>';
                                } elseif ($stock_movement->status == 3) {
                                    echo '<label class="badge badge-dark">Cencelled</label>';
                                }
                            ?>
                        </td>
                        <td style="text-align: center;">
                            <a href="#" class="btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-info lnr-eye btn-icon-wrapper"></a>
                            <a href="/stock-movement/{{$stock_movement->id}}/edit" class="btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-success lnr-pencil btn-icon-wrapper"></a>
                            <a href="#" class="btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-danger lnr-trash btn-icon-wrapper delete"></a>
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
        
        

    });
</script>
@stop