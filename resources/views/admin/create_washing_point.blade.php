@extends('admin.layouts.app')

@section('content')
<div class="container-wrapper">
    <div class="form-container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a><i class="fa fa-angle-right"></i>Add Washing Point</li>
        </ol>
        <div class="grid-form">
            <div class="grid-form1">
                <h3>Add Washing Point</h3>
                @if (session('success'))
                    <div class="succWrap">
                        {{ session('success') }}
                    </div>
                @endif
                <form class="form-horizontal" action="{{ route('admin.store_washing_point') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="washingPointName" class="col-sm-2 control-label">Car Wash Point Name</label>
                        <div class="col-sm-8">
                            <input type="text" name="washingPointName" id="washingPointName" class="form-control" placeholder="Washing Point Name" required>
                            @error('washingPointName')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="washingPointAddress" class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-8">
                            <textarea name="washingPointAddress" id="washingPointAddress" class="form-control" placeholder="Address" required rows="4"></textarea>
                            @error('washingPointAddress')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contactNumber" class="col-sm-2 control-label">Contact Number</label>
                        <div class="col-sm-8">
                            <input type="text" name="contactNumber" id="contactNumber" class="form-control" placeholder="Contact Number" required>
                            @error('contactNumber')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <button type="submit" class="btn btn-primary">Add</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--inner block start here-->
        <div class="inner-block"></div>
        <!--inner block end here-->
        <!--copy rights start here-->
        @include('includes.footer')
    </div>
</div>
@include('includes.sidebarmenu')
<div class="clearfix"></div>		
@endsection
