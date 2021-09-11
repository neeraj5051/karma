<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>

<body>
    <div class="container-fluid">
        <div class="container">


            <div class="row" style="margin: 20px;">
                <div class="col-md-12">


                    <form method="post" action="/user" id="regForm" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col">
                                <input type="text" name="first_name" class="form-control" placeholder="First name">
                            </div>
                            <div class="col">
                                <input type="text" name="last_name" class="form-control" placeholder="Last name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Hobby</label>
                            <select class="form-control" required name="hobby[]" multiple="multiple" id="hobby">
                                <option value="1">Cricket</option>
                                <option value="2">Chess</option>
                                <option value="3">Football</option>

                            </select>
                        </div>

                        <div class="form-row">
                            <div id="document">
                                <div class="col doc-element">
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Upload Your document</label>
                                        <input type="file" name="document_file0[]" multiple class="form-control-file" id="exampleFormControlFile1">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="document_name0" class="form-control" placeholder="Document Name">
                                    </div>
                                </div>

                            </div>
                            <button id="addDocument" style="width: 50px;" class="form-control btn btn-primary" type="button">Add</button>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js
"></script>
    <script>
        $(document).ready(function() {
            // $("#regForm").validate({
            //     rules: {
            //         first_name: "required",
            //         last_name: "required",
            //         email: {
            //             required: true,
            //             email: true,
            //             maxlength: 50
            //         },
            //         hobby: "required",
            //         document_file: "required",
            //         document_name: "required",
            //     },
            //     submitHandler: function(form, e) {
            //         e.preventDefault();
            //         console.log('Form submitted');
            //         // console.log($("#hobby").val());
            //         // console.log($('#regForm').serialize())
            //         var ajaxData = new FormData();
            //         ajaxData.append('action', 'uploadImages');
            //         $.each($("input[type=file]"), function(i, obj) {
            //             // $.each(obj.files, function(j, file) {
            //             //     ajaxData.append('photo[' + j + ']', file);
            //             // })
            //         });
            //         console.log(ajaxData)
            //         // $.ajax({
            //         //     type: 'POST',
            //         //     url: '/user',
            //         //     data: $('#regForm').serialize(),
            //         //     success: function(result) {
            //         //         // console.log(result)
            //         //         // window.location.href = "dashboard.jsp";
            //         //     },
            //         //     error: function(error) {

            //         //     }
            //         // });
            //         return false;
            //     }
            //     // });
            // });
            $("#addDocument").on('click', function() {
                // console.log('clicked')
                console.log($('.doc-element').length)
                let index = $('.doc-element').length;
                let html = `<div class="col doc-element">
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Upload Your document</label>
                                        <input type="file" required name="document_file` + index + `[]" multiple class="form-control-file" id="exampleFormControlFile1">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" required name="document_name` + index + `" class="form-control" placeholder="Document Name">
                                    </div>
   
                                    <button  style="width: 100px;" class="form-control btn btn-primary removeDocument" type="button">Remove</button>
   
                                </div>`;
                $("#document").append(html)
            })
            $(document).on("click", ".removeDocument", function() {

                $(this).parent().remove();
            });
        });
    </script>
</body>
<style>
    label.error {
        color: #dc3545;
        font-size: 14px;
    }
</style>

</html>