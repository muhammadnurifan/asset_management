@extends('layouts.master')
@section('content')

<div class="app-main__inner">
    <form action="/asset" method="post">
    @csrf
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-plus text-success">
                        </i>
                    </div>
                    <div>
                        Add Asset
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
                                            <label for="exampleEmail11"><b>Code</b></label>
                                            <input name="code" type="text" class="form-control @error('code') is-invalid @enderror" autocomplete="off" value="{{ old('code')}}">
                                            @error('code')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror 
                                        </div>
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail11"><b>Name</b></label>
                                            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" autocomplete="off" value="{{ old('name')}}">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail11"><b>Category</b></label>
                                            <select name="category_id" id="category_id" class="multiselect-dropdown form-control" value="">
                                            <option value="">-- Select --</option>
                                            @foreach ($asset_categories as $asset_category)
                                                <option value="{{$asset_category->id}}">{{$asset_category->name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail11"><b>UOM</b></label>
                                            <select name="uom" id="uom" class="multiselect-dropdown form-control" value="">
                                            <option value="">-- Select --</option>
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