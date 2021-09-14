<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('orders', ['orders' => $orders, 'type' => 'all']);
    }
    public function editPage($id)
    {
        $order = Order::find($id);
        if (!$order) abort(404);
        return view('edit', ['order' => $order]);
    }
    public function editOrder(Request $request)
    {
        $request->validate([
            'id' => ['required', 'exists:orders,id'],
            'client_email' => 'email',
            'status' => [Rule::in([0,10,20])],
        ]);
        $order = Order::find($request->id);
        $order->client_email = $request->client_email ?: $order->client_email;
        $order->status = $request->status ?: $order->status;
        $order->partner_name = $request->partner_name ?: $order->partner_name;
        $order->save();
        return new Response('Successful', 200);
    }

    public function oldOrders()
    {
        $orders = Order::where([['status', 10], ['delivery_at', '<', Carbon::now()]])->orderBy('delivery_at', 'desc')->limit(50)->get();
        return view('orders', ['orders' => $orders, 'type' => 'old']);
    }

    public function newOrders()
    {
        $orders = Order::where([['status', 0], ['delivery_at', '>', Carbon::now()]])->orderBy('delivery_at', 'asc')->limit(50)->get();
        return view('orders', ['orders' => $orders, 'type' => 'new']);
    }

    public function nowOrders()
    {
        $orders = Order::where([['status', 10], ['delivery_at', '>', Carbon::now()], ['delivery_at', '<', Carbon::now()->addHours(24)]])->orderBy('delivery_at', 'asc')->get();
        return view('orders', ['orders' => $orders, 'type' => 'now']);
    }

    public function doneOrders()
    {
        $orders = Order::where('status', 20)->whereDate('delivery_at', Carbon::today())->orderBy('delivery_at', 'desc')->limit(50)->get();
        return view('orders', ['orders' => $orders, 'type' => 'done']);
    }

}
