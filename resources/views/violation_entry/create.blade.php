@extends('layout')
@section('content')

<div class="container">
        <div class="col-6">
            <div class="card">
                <div class="card-header">Add violation</div>
                <div class="card-body">
                    <form action="{{ url('violation_entry') }}" method="post" id="violation-form">
                        {!! csrf_field() !!}
                        <label>violation No</label><br>
                        <input type="text" name="vno" id="vno" class="form-control" required></br>
                        <label>Violation Date</label><br>
                        <input type="text" name="vdate" id="vdate" class="form-control" required></br>
                        <label>Violation Time</label><br>
                        <input type="text" name="vtime" id="vtime" class="form-control" required></br>
                        <label>Plate</label><br>
                        <select name="plate" id="plate" class="form-control" required>
                            <option value="">Select a plate</option>
                            @foreach ($options as $option)
                                <option value="{{ $option->id }}">{{ $option->Plate }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="plate" id="plate_text" value="">
                        <br>                    
                     
                        <label>Violation Type</label><br>
                        
                        <select name="v_des_en" id="violation_type" class="form-control" required>
                            <option value="">Select Type</option>
                            @foreach ($vts as $vt)
                                <option value="{{ $vt->id }}">{{ $vt->VDesEn }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="v_des_en" id="violation_type_text" value="">
                        <br> 
                        <!--<input type="submit" value="save" class="btn btn-success">-->
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="button" id="back-button" class="btn btn-warning">Back</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-3" >
            <div class="container">
             <!--message-->
             <div id="message" class="alert alert-success" style="display:none;">
                     <h1>Record added successfully!</h1>
            </div>
             <!--message-->
             </div>
        </div>
    </div>
   
    <script>
    $(function() {
       
        // Initialize calendar for date field
        $("#vdate").datepicker();

        // Initialize clock for time field
        $("#vtime").timepicker();

         // Update hidden field for plate when value is selected
        $("#plate").change(function() {
            $("#plate_text").val($("#plate option:selected").text());
        });

        // Update hidden field for violation type when value is selected
        $("#violation_type").change(function() {
            $("#violation_type_text").val($("#violation_type option:selected").text());
        });  

        $("#back-button").click(function() {
        window.location.href = "{{ url('violation_entry') }}";
        });

        

        //handle message
        // AJAX form submission
        $("#violation-form").submit(function(e) {
                e.preventDefault(); // Prevent default form submission

                var formData = $(this).serialize(); // Serialize the form data

                $.ajax({
                    url: "{{ url('violation_entry') }}",
                    type: "POST",
                    data: formData,
                    success: function(response) {

                       
                        // Optionally, clear the form fields first
                        $('#violation-form').trigger("reset");
                        
                        // Display success message
                        $("#message").fadeIn().delay(5000).fadeOut(); // Show the message, then hide after 5 seconds

                        // If you have additional logic for a successful submission, add it here
                    },
                    
                    error: function(xhr, status, error) {
                        // Log or display the error
                        console.error("An error occurred: " + error);

                        // Optionally, you can display an error message to the user
                        alert("An error occurred. Please try again.");
                    }
                    
                });
            });

          });
   
    
    </script>
@stop
