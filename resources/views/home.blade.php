<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trains</title>
</head>
<body>
    <ul>
        @foreach ($trains as $train)
        <li>
        <h2>{{ $train->company }}</h2>
        <h3>Codice Treno: {{ $train->train_code }}</h3>
        <h3>Partenza da: {{ $train->departure_station }}</h3>
        <h4>Giorno: {{\Carbon\Carbon::parse($train->departure_day)->format('d/M/Y')}}</h4>
        <h4>Alle ore: {{\Carbon\Carbon::parse($train->departure_hour)->format('H:i')}}</h4>
        <h3>Arrivo a: {{ $train->arrival_station }}</h3>
        <h4>Alle ore: {{\Carbon\Carbon::parse($train->arrival_hour)->format('H:i')}}</h4>
        <h3>Numero vagoni: {{ $train->wagons_number }}</h3>
        @if ($train->on_time && !$train->cancelled)
        <h5>In arrivo il treno da {{ $train->departure_station }}</h5> 
        @elseif (!$train->on_time && !$train->cancelled)    
        <h5>Il treno in arrivo da {{ $train->departure_station }} è in ritardo!</h5>            
        @endif
        @if ($train->cancelled)
        <h2>Il treno in partenza da {{ $train->departure_station }} è stato cancellato, ci scusiamo per l'inconveniente!</h2>
        @endif
        </li>
        @endforeach
    </ul>  
</body>
</html>