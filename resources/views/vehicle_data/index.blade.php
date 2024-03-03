<!-- resources/views/drivers/create.blade.php -->

@extends('layout')

@section('content')
    <div class="container">
        <h2 class="text-success">Vehicles Data</h2>
        <h3 class="text-success">The page still <span  class="text-danger">"Under construction”</span> </h3>
       
        <button type="button" id="back-button" class="btn btn-warning">Back</button>
       
    </div>


    <script>
    $(function() {

        $("#back-button").click(function() {
        window.location.href = "{{ url('driver_info') }}";
        });
    });
    </script>

@endsection
