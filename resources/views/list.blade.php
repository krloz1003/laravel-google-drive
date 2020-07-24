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
                        <a href="{{ url('') }}" class="btn btn-info" >Cargar oficio</a>
                        Visualizando el oficio
                    </h1>

                    @foreach($contents as $row)
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a target="_blank" href="{{ url('show') }}/{{ $row['name'] }}" id="showModal" value="{{ $row['path'] }}">{{ $row['name'] }}</a>  ({{ $row['basename'] }})</li>
                    </ul>
                    
                    <!--<iframe 
                        height="500" 
                        src="https://docs.google.com/document/d/{{$row['path']}}/edit" 
                        width="75%">                            
                    </iframe>-->
                    @endforeach           
                </div>
            </div>
        </div>
    </body>
</html>