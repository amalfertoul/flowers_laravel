<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('orderItems.product')->get();
    
        $orders = $orders->map(function ($order) {
            $order->orderItems = $order->orderItems->map(function ($item) {
                return [
                    'id' => $item->id,
                    'quantity' => $item->quantity,
                    'product_name' => $item->product->name,
                ];
            });
            return $order;
        });
    
        return response()->json($orders);
    }
    

    public function show($id)
    {
        return response()->json(Order::findOrFail($id));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'total_price' => 'required|numeric',
        ]);

        $order = Order::create($request->all());
        return response()->json($order, 201);
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->all());
        return response()->json($order);
    }

    public function destroy($id)
    {
        Order::findOrFail($id)->delete();
        return response()->json(['message' => 'Order deleted']);
    }

    //functions outside of crud here
    public function downloadInvoice($id)
    {
        $user = auth()->user();

        if (!$user || !$user->isAdmin) {
            return response()->json(['message' => 'Access denied'], 403);
        }

        $order = Order::with(['user', 'orderItems.product'])->findOrFail($id);

        $pdf = Pdf::loadView('invoice', compact('order'));
        return $pdf->download('invoice_' . $order->id . '.pdf');
    }
}
