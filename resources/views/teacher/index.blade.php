<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 8 ajax Crud Application</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="{{ asset('js') }}/sweetalert2@8.js"></script>
    <script src="{{ asset('js') }}/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
    <div style="padding: 30px;"></div>
    <div class="container">
        <h2 style="color: red;">
        </h2>
        <div class="row">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header">
                        All Teacher
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Institute</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <span id="addT">Add New Teacher</span> <br>
                        <span id="output"></span>
                        <!-- <span id="updateT">Update Teacher</span> -->
                    </div>

                    <div class="card-body">
                        <form id="my-form">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" id="name" name="name" class="form-control" aria-describedby="emailHelp" placeholder="Enter name" required>
                                <span class="text-danger" id="nameError"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Title</label>
                                <input type="text" id="title" name="title" class="form-control " placeholder="Job Positon" required>
                                <span class="text-danger" id="titleError"></span>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Institute</label>
                                <input type="text" id="institute" class="form-control" name="institute" placeholder="Institute Name" required>
                                <span class="text-danger" id="instituteError"></span>
                            </div>
                            <!-- <input type="hidden" id="id">
                        <button type="submit" id="add" onclick="addData()" class="btn btn-primary">Add</button>
                        <button type="submit" id="update" onclick="updateData()" class="btn btn-primary">Update</button> -->

                            <button type="submit" id="btnSubmit" class="btn btn-primary">Add</button>
                        </form>
                 

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
            }
        })
    </script>
<!-- 

    <script>
        $(document).ready(function() {
            $("#my-form").on("submit", function(e) {
                e.preventDefault();
                var form = $("#my-form")[0];
                var data = new FormData(form);
                $("#btnSubmit").prop("disabled", true)
            });
            $.ajax({
                type: "POST",
                url: "{{ route('store') }}", // Replace with your server-side endpoint
                data: data,
                processData: false,
                contentType: false,
                success: function(data) {
                    // Handle the response from the server
                    $(".result").html(response);
                }
                error:arguments(e){

                }
            });
        });
    </script> -->
    <script>
    $(document).ready(function() {
        $("#my-form").on("submit", function(e) {
            e.preventDefault();
            var form = $("#my-form")[0];
            var data = new FormData(form);

            // Disable the submit button while the AJAX request is in progress
            $("#btnSubmit").prop("disabled", true);

            // Send the AJAX request
            $.ajax({
                type: "POST",
                url: "{{ route('store') }}", // Replace with your server-side endpoint
                data: data,
                processData: false,
                contentType: false,
                success: function(data) {
                    
                    // Handle the response from the server
                    $("#output").text(data.message);
                    setTimeout(function() {
                        $("#output").text("");
                        }, 2000);

                    $("#btnSubmit").prop("disabled", false); // Re-enable the submit button
                    form.reset();
                },
                error: function(e) {
                    // Handle the error
                    $("#output").text(data.responseText);
                    $("#btnSubmit").prop("disabled", false); // Re-enable the submit button
                }
            });
        });
    });
</script>
