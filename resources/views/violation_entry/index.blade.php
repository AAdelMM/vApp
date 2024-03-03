@extends('layout')
@section('content')

<div class="col-12">
      <div class="container-fluid"> 
                    <div class="content">
                      <div class="row ">
                          <div class="container-fluid" id="addBn">
                                  
                                    <a href="{{ url('/violation_entry/create')}}"  class="btn btn-primary" >
                                      Add violation <i class="fas fa-plus"></i></a>
                                 
                                  <button class="btn btn-success">
                                      Export to Excell <i class="fa-solid fa-download"></i> 
                                  </button>
                          </div>
                      </div>
                     
                      <div class="row">
                              <table class="table">
                                    <thead class="thead-dark">
                                      <tr>
                                        <th scope="col-1">V No</th>
                                        <th scope="col-1">Date</th>
                                        <th scope="col-1">Time</th>
                                        <th scope="col-1">Plate</th>
                                        <th scope="col-1">Fleet</th>
                                        <th scope="col-1">Vehicle user</th>
                                        <th scope="col-4">Violation type</th>
                                        <th scope="col-4">Action</th>
                                      </tr>
                                    </thead>
                                          <tbody>
                                            @foreach($v as $entry)
                                                 <tr>
                                                    <td style="background-color: #e6ffff;">{{ $entry->vno }}</td>
                                                    <td style="background-color: #f2f2f2;">{{ $entry->vdate }}</td>
                                                    <td style="background-color: #e6ffff;">{{ $entry->vtime }}</td>
                                                    <td style="background-color: #f2f2f2;">{{ $entry->plate }}</td>
                                                    <td style="background-color: #e6ffff;">{{ $entry->fleet }}</td>
                                                    <td style="background-color: #f2f2f2;">{{ $entry->user }}</td> 
                                                    <td style="background-color: #e6ffff;">{{ $entry->v_des_en }}</td>
                                                    <td style="display: flex;justify-content: center;align-items: center;">
                                                        <form method="POST" action="{{ route('violation_entry.destroy', $entry->id) }}" style="display: inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger mr-2"><i class="fa fa-trash"></i></button>
                                                        </form>
                                                        <a href="{{ route('violation_entry.edit', $entry->id) }}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                                    </td>
                                                 </tr>
                                            @endforeach
                                            </tbody>
                                </table>
                      </div>
                              

                
                    </div>
     </div> 
</div>

@endsection
