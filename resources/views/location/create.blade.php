@extends('layouts.master')
@section('content')

<div class="app-main__inner">
    <form action="/locations" method="post">
    @csrf
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-plus text-success">
                        </i>
                    </div>
                    <div>
                        Add Location
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
                                            <label for="exampleEmail11"><b>Name</b></label>
                                            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" autocomplete="off" value="{{ old('name')}}">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror 
                                        </div>
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail11"><b>Address</b></label>
                                            <textarea name="address" id="autocomplete" type="textarea" class="form-control" autocomplete="off"></textarea>
                                            @error('address')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror 
                                        </div>
                                        <div class="position-relative form-group" id="longtitudeArea">
                                            <label for="exampleEmail11"><b>Latitude</b></label>
                                            <input name="latitude" id="latitude" type="text" class="form-control @error('latitude') is-invalid @enderror" autocomplete="off" value="{{ old('latitude')}}">
                                            @error('latitude')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail11"><b>Phone</b></label>
                                            <input name="phone" type="number" class="form-control @error('phone') is-invalid @enderror" autocomplete="off" value="{{ old('phone')}}">
                                            @error('phone')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail11"><b>Postal Code</b></label>
                                            <input name="postal_code" type="number" class="form-control @error('postal_code') is-invalid @enderror" autocomplete="off" value="{{ old('postal_code')}}">
                                            @error('postal_code')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="position-relative form-group" id="latitudeArea">
                                            <label for="exampleEmail11"><b>Longitude</b></label>
                                            <input name="longitude" id="longitude" type="text" class="form-control @error('longitude') is-invalid @enderror" autocomplete="off" value="{{ old('longitude')}}">
                                            @error('longitude')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
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
