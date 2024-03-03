@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">Edit Page</div>
    <div class="card-body">
        <form action="{{ route('violation_entry.update', ['id' => $v->id]) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
                        <label>violation No</label><br>
                        <input type="text" name="vno" id="vno" value="{{$v->vno}}" class="form-control"></br>
                        <label>Violation Date</label><br>
                        <input type="text" name="vdate" id="vdate" value="{{$v->vdate}}" class="form-control"></br>
                        <label>Violation Time</label><br>
                        <input type="text" name="vtime" id="vtime" value="{{$v->vtime}}" class="form-control"></br>
                        <label>Plate</label><br>
                        <input type="text" name="plate" id="plate" value="{{$v->plate}}" class="form-control"></br>
                      
                        <label>Fleet</label><br>
                        <input type="text" name="fleet" id="fleet" value="{{$v->fleet}}" class="form-control"></br>
                        <label>User</label><br>
                        <input type="text" name="user" id="user" value="{{$v->user}}" class="form-control"></br>
                        <label>Violation Type</label><br>
                        <input type="text" name="v_des_en" id="v_des_en" value="{{$v->v_des_en}}" class="form-control"></br>
                        <input type="submit" value="update" class="btn btn-success">      
        </form>
    </div>
</div>
@stop