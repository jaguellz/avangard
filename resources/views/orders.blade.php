<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Заказы</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
    @switch($type)
        @case('all')
            Все заказы
            <button><a href="{{route('oldOrders')}}">Просроченные</a></button>
            <button><a href="{{route('nowOrders')}}">Текущие</a></button>
            <button><a href="{{route('newOrders')}}">Новые</a></button>
            <button><a href="{{route('doneOrders')}}">Выполненные</a></button>
            @break
        @case('old')
            <button><a href="{{route('orders')}}">Все заказы</a></button>
            Просроченные
            <button><a href="{{route('nowOrders')}}">Текущие</a></button>
            <button><a href="{{route('newOrders')}}">Новые</a></button>
            <button><a href="{{route('doneOrders')}}">Выполненные</a></button>
            @break
        @case('now')
            <button><a href="{{route('orders')}}">Все заказы</a></button>
            <button><a href="{{route('oldOrders')}}">Просроченные</a></button>
            Текущие
            <button><a href="{{route('newOrders')}}">Новые</a></button>
            <button><a href="{{route('doneOrders')}}">Выполненные</a></button>
            @break
        @case('new')
            <button><a href="{{route('orders')}}">Все заказы</a></button>
            <button><a href="{{route('oldOrders')}}">Просроченные</a></button>
            <button><a href="{{route('nowOrders')}}">Текущие</a></button>
            Новые
            <button><a href="{{route('doneOrders')}}">Выполненные</a></button>
            @break
        @case('done')
            <button><a href="{{route('orders')}}">Все заказы</a></button>
            <button><a href="{{route('oldOrders')}}">Просроченные</a></button>
            <button><a href="{{route('nowOrders')}}">Текущие</a></button>
            <button><a href="{{route('newOrders')}}">Новые</a></button>
            Выполненные
            @break
    @endswitch
        <table border="1">
            <thead>
            <tr>
                <td>
                    ID заказа
                </td>
                <td>
                    Название партнера
                </td>
                <td>
                    Стоимость заказа
                </td>
                <td>
                    Состав заказа
                </td>
                <td>
                    Дата доставки
                </td>
                <td>
                    Статус заказа
                </td>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>
                        <a href="{{route('edit', ['id' => $order->id])}}">{{$order->id}}</a>
                    </td>
                    <td>
                        {{$order->partner_name}}
                    </td>
                    <td>
                        {{$order->price()}}
                    </td>
                    <td>
                        @foreach($order->products as $product)
                            {{$product->name}} {{$product->pivot->count}}шт.,
                        @endforeach
                    </td>
                    <td>
                        {{$order->delivery_at}}
                    </td>
                    <td>
                        {{$order->status}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </body>
</html>
