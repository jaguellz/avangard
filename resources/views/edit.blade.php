<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Погода</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
    <form action="{{route('edit_api')}}" method="get">
        id: {{$order->id}} <br>
        email клиента: <input type="text" value="{{$order->client_email}}" name="client_email"> <br>
        партнер: <input type="text" value="{{$order->partner_name}}" name="partner_name"> <br>
        статус: <input type="text" value="{{$order->status}}" name="status"> <br>
        состав заказа: @foreach($order->products as $product)
            {{$product->name}} {{$product->pivot->count}}шт.,
        @endforeach
        <br>
        стоимость: {{$order->price()}} <br>
        <button type="submit" value="{{$order->id}}" name="id">Сохранить</button>
    </form>
    </body>
</html>
