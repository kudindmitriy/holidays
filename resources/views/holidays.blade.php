<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>

<body>
<div class="container mt-5">
    <form action="" method="post" action="{{ route('holiday.date') }}">
        @csrf
        <div class="form-group">
            <label class="w-100">
                <input type="text" class="form-control" name="holiday_date" id="holiday_date" placeholder="Please enter the date">
                <span class="mt-3 d-block">Example date format <span class="text-primary">01.12.2021</span></span>
            </label>
        </div>

        <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
    </form>
    @if($errors->any())
        <p class="error-block">{{$errors->first()}}</p>
    @endif
</div>
</body>

</html>
