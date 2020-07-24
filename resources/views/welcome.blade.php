<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Google Drive integration in Laravel</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>
    <body class="text-center">
        <div class="container">
            <div class="row">              
                <div class="col-md-12">
                    @if(isset($success) && $success)
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Listo!</h4>
                        <p>Los datos se cargarón correctamente</p>
                    </div>
                    @endif  
                    <a class="btn btn-primary" href="{{ url('files') }}">Ver el listado de oficios</a>
                    <hr>

                    <form action="/upload" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" class="form-control">
                        <br>
                        <input 
                            type="submit" 
                            class="btn btn-sm btn-block btn-danger" 
                            value="Upload" 
                            name="">
                        
                    </form>                    
                </div>
            </div>
        </div>
    </body>
</html>
