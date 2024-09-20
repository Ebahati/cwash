@extends('admin.layouts.app')

@section('title', 'CarLux | Edit Washing Point')

@section('styles')
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ asset('assets/css/style.css') }}" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="{{ asset('assets/css/morris.css') }}" type="text/css"/>
    <link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/icon-font.min.css') }}" type='text/css' />
    <style>
        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
        .succWrap{
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
    </style>
@endsection

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a><i class="fa fa-angle-right"></i>Edit Washing Point</li>
    </ol>
    <div class="grid-form">
        <div class="grid-form1">
            <h3>Edit Washing Point</h3>
            @if(session('success'))
                <div class="succWrap">
                    {{ session('success') }}
                </div>
            @endif
            <form class="form-horizontal" method="POST" action="{{ route('admin.update.car.washpoint', $washPoint->id) }}">
                @csrf
                <div class="form-group">
                    <label for="washingpointname" class="col-sm-2 control-label">Car Wash Point Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="washingpointname" id="washingpointname" value="{{ old('washingpointname', $washPoint->washingPointName) }}" required>
                        @error('washingpointname')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="col-sm-2 control-label">Address</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" name="address" id="address" placeholder="Address" required rows="4">{{ old('address', $washPoint->washingPointAddress) }}</textarea>
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="contactno" class="col-sm-2 control-label">Contact Number</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="contactno" id="contactno" value="{{ old('contactno', $washPoint->contactNumber) }}" required>
                        @error('contactno')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <button type="submit" class="btn-primary btn">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var toggle = true;
        $(".sidebar-icon").click(function() {                
            if (toggle) {
                $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
                $("#menu span").css({"position":"absolute"});
            } else {
                $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
                setTimeout(function() {
                    $("#menu span").css({"position":"relative"});
                }, 400);
            }
            toggle = !toggle;
        });
    </script>
    <script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
@endsection
