@extends('layouts.master')
@section('content')

<div class="app-main__inner">
    <form action="/rooms" method="post">
    @csrf
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-plus text-success">
                        </i>
                    </div>
                    <div>
                        Add Room
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
                                <div class="position-relative form-group">
                                    <label for="exampleEmail11"><b>Room Name</b></label>
                                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" autocomplete="off" value="{{ old('name')}}" placeholder="Input Room Name ...">
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