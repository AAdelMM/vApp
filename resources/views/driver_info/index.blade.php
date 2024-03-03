@extends('layout')

@section('content')
<div class="container">
    <h1>Driver Information</h1>
    <a href="{{ route('driver_info.create') }}" class="btn btn-success">Add Driver</a>
    <table class="table">
        <thead>
            <tr>
                
                <th>PTC ID</th>
                <th>Name</th>
                <th>ID Number</th>
                <th>Created At</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($driverInfos as $driverInfo)
            <tr>
                
                <td style="background-color: #e6ffff;">{{ $driverInfo->ptc_id }}</td>
                <td style="background-color: #f2f2f2;">{{ $driverInfo->name }}</td>
                <td style="background-color: #e6ffff;">{{ $driverInfo->id_no }}</td>
                <td>{{ $driverInfo->created_at }}</td>
                <td></td>
                <td>
                    <form action="{{ route('driver_info.destroy', $driverInfo->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
