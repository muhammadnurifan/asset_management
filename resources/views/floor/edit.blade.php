@extends('layouts.master')
@section('content')
<style>
.preloader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
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
    <form action="/floor/{{$floors->id}}/update" method="post">
    @csrf
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-edit text-success">
                        </i>
                    </div>
                    <div>
                        Edit Floor
                    </div>
                </div>
                <div class="page-title-actions">
                    <div class="d-inline-block dropdown">
                        <a href="{{route('floor.index')}}" type="button" class="btn-shadow btn btn-light">
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
                                <div class="position-relative form-group">
                                    <label for="exampleEmail11" class=""><b>Floor Name</b></label>
                                    <input name="name" type="text" class="form-control" autocomplete="off" value="{{ $floors->name }}">
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