<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- jika error -->
    @if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
    <form action="{{url('rekening/create')}}" method="POST">
        @csrf
        <label>Nama:  
            <input type="text" name="nama" value="{{old('nama')}}" required>
        </label>
        <label>NO Rekening:     
            <input type="text" name="noRekening" value="{{old('noRekening')}}" required>
        </label>
        <input type="submit">
    </form>
</body>
</html>