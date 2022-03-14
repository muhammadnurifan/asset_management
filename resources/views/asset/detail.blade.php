@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <img src="{{$asset->getImage()}}" class="img-fluid" alt="image" style="width: 200px; height: 150px; border-radius: 5px;">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label><b>Code</b></label>
                    <p>{{$asset->code}}</p>
                </div>
                <div class="form-group">
                    <label><b>Name</b></label>
                    <p>{{$asset->name}}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label><b>Category</b></label>
                    <p>{{$asset->category}}</p>
                </div>
                <div class="form-group">
                    <label><b>UOM</b></label>
                    <p>{{$asset->uom}}</p>
                </div>
            </div>
        </div>
    </div>
</div>          
@endsection