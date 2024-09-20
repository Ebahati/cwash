@extends('admin.layouts.app')

@section('content')
<div class="container-wrapper">
    <div class="form-container">
            <!--header start here-->
           
            <div class="clearfix"></div>	
            <!--header end here-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a><i class="fa fa-angle-right"></i>Update Page Data</li>
            </ol>
            <div class="grid-form">
                <div class="grid-form1">
                    <h3>Update Page Data</h3>
                    @if(session('success'))
                        <div class="succWrap">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('admin.update-page.post', ['type' => $type]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="pgedetails">{{ ucfirst($type) }} Details:</label>
                            <textarea name="pgedetails" id="pgedetails" class="form-control" rows="5">{{ $page->detail }}</textarea>
                        </div>
                        @if($type == 'contact')
                            <div class="form-group">
                                <label for="openignHrs">Opening Hours:</label>
                                <input type="text" name="openignHrs" id="openignHrs" class="form-control" value="{{ $page->openignHrs }}">
                            </div>
                            <div class="form-group">
                                <label for="phoneNumber">Phone Number:</label>
                                <input type="text" name="phoneNumber" id="phoneNumber" class="form-control" value="{{ $page->phoneNumber }}">
                            </div>
                            <div class="form-group">
                                <label for="emailId">Email ID:</label>
                                <input type="email" name="emailId" id="emailId" class="form-control" value="{{ $page->emailId }}">
                            </div>
                        @endif
                        <button type="submit" class="btn btn-primary">Update</button>
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
</div>
@endsection
