<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="container mt-5">
        <div class="form-group response">
            @if(count($response))
                <p class="text-center font-weight-bold">It’s next holidays on that date!</p>
                <ul>
                    @foreach($response as $holiday)
                        <li>{{$holiday['name'] ?? ''}}</li>
                    @endforeach
                </ul>
            @else
                <p>There are no holidays for this date!</p>
            @endif
        </div>
    </div>
</body>
</html>
