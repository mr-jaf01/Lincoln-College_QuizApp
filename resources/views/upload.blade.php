<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <form action="/upload" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="filename[]" multiple="multiple" />
            <button type="submit">Upload Images</button>
        </form>
    </div>

    <div>
        @if (Session::get('images'))
            <p>{{Session::get('images')}}</p></br>
        @endif
    </div>
</body>
</html>
