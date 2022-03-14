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
    <form action="/asset/{{$assets->id}}/update" method="post" enctype="multipart/form-data">
    @csrf
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-edit text-success">
                        </i>
                    </div>
                    <div>
                        Edit Asset
                    </div>
                </div>
                <div class="page-title-actions">
                    <div class="d-inline-block dropdown">
                        <a href="{{route('asset.index')}}" type="button" class="btn-shadow btn btn-light">
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
                                            <label for="exampleEmail11"><b>Code</b></label>
                                            <input name="code" type="text" class="form-control" autocomplete="off" value="{{ $assets->code }}">
                                        </div>
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail11"><b>Name</b></label>
                                            <input name="name" type="text" class="form-control" autocomplete="off" value="{{ $assets->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleEmail11"><b>Image</b></label>
                                            <input name="image" type="file" class="form-control" value=""> 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail11"><b>Category</b></label>
                                            <select name="category_id" id="category_id" class="multiselect-dropdown form-control" value="">
                                            <option value="">-- Select --</option>
                                            @foreach ($asset_categories as $asset_category)
                                                <option value="{{$asset_category->id}}" @if($assets->category_id == $asset_category->id) selected @endif>{{$asset_category->name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail11"><b>UOM</b></label>
                                            <select name="uom" id="uom" class="multiselect-dropdown form-control">
                                                <option value="{{$assets->uom}}" @if($assets->uom) selected @endif>{{$assets->uom}}</option>
                                                <option value="Pcs">Pcs</option>
                                                <option value="Unit">Unit</option>
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
    $(document).ready(function() {
        $(".preloader").fadeOut();
    });
</script>
@stop