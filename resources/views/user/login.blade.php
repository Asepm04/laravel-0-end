<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if(isset($error))
    {{$error}}
    @endif

    @if($errors->any())

    @foreach($errors->all() as $error)
       {{$error}}
       @endforeach
       {{$message}}
       @endif
    <form action="/user/doLogin" method="post">
        <input type="text" name="user" >
        <input type="password" name="pw" id="">@error('pw') {{$message}} @enderror
        <input type="submit" name="" id="">
        @csrf
    </form>
</body>
</html>