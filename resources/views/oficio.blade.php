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
                    <h1>
                        <a href="{{ url('files') }}" class="btn btn-info" >Regresar al listado...</a>
                        Visualizando el oficio
                    </h1>
                    
                    {{--@foreach($contents as $row)
                    <ul class="list-group">
                        <li class="list-group-item"><a href="" id="showModal" value="{{ $row['path'] }}">{{ $row['name'] }}</a>({{ $row['basename'] }})</li>
                    </ul>                    
                    <!--<iframe 
                        height="500" 
                        src="https://docs.google.com/document/d/{{$row['path']}}/edit" 
                        width="75%">                            
                    </iframe>-->
                    @endforeach--}}
                    <!--<a href="https://docs.google.com/document/d/{{$file['basename']}}/edit">https://docs.google.com/document/d/{{$file['basename']}}/edit</a>-->
                    <iframe
                        height="300%"
                        src="https://docs.google.com/document/d/{{$file['basename']}}/edit"
                        width="100%">
                    </iframe>
                </div>
            </div>
        </div>
    </body>
</html>