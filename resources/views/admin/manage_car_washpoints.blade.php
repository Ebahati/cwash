@extends('admin.layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a><i class="fa fa-angle-right"></i>Manage Car Washing Points</li>
    </ol>
    <div class="agile-grids">    
        <div class="agile-tables">
            <div class="w3l-table-info">
                <h2>Manage Car Washing Points</h2>
                <table id="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Washing Point Name</th>
                            <th>Address</th>
                            <th>Contact Number</th>
                            <th>Creation Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($washPoints->count() > 0)
                            @foreach($washPoints as $index => $point)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $point->washingPointName }}</td>
                                    <td>{{ $point->washingPointAddress }}</td>
                                    <td>{{ $point->contactNumber }}</td>
                                    <td>{{ $point->creationDate }}</td>
                                    <td>
                                        <a href="{{ route('admin.edit.car.washpoint', $point->id) }}">Edit</a> | 
                                        <a href="{{ route('admin.delete.car.washpoint', $point->id) }}" style="color:red;" onclick="return confirm('Do you really want to delete');">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" style="color:#7B68EE;">No Record found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="inner-block"></div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table').basictable();

            $('#table-breakpoint').basictable({
                breakpoint: 768
            });

            $('#table-swap-axis').basictable({
                swapAxis: true
            });

            $('#table-force-off').basictable({
                forceResponsive: false
            });

            $('#table-no-resize').basictable({
                noResize: true
            });

            $('#table-two-axis').basictable();

            $('#table-max-height').basictable({
                tableWrapper: true
            });
        });
    </script>
@endsection
