<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <title>Laravel File Upload</title>
    <style>
        .container {
            max-width: 500px;
        }

        dl,
        ol,
        ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <form action="/api/file-upload" method="post" enctype="multipart/form-data" class="app-form">
            <h3 class="text-center mb-5">Upload File</h3>
            @csrf
          
            <input type="file" name="file" id="chooseFile">
             
            <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                Upload Files
            </button>

            <div class="form-message">
            </div>

        </form>

        <br>
        <br>
        
        <div class="all-files">

            @foreach ($data as $item)

             <a href="{{ URL::to('/').$item['file_path']}}" target="_blank">{{ URL::to('/').$item['file_path']}}</a>
                
            @endforeach

        </div>

    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="script.js"></script>
</body>

</html>