<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

use App\Interfaces\Repositories\OrderRepositoryInterface;
use App\Interfaces\Services\CartServiceInterface;
use App\Models\Order;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    protected Order $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function all(string $column = 'created_at', string $direction = 'asc'): Builder
    {
        return $this->order::orderBy($column, $direction);
    }

    public function find(int $id): Order
    {
        return $this->order::findOrFail($id);
    }

    public function create(CartServiceInterface $cartService): Order
    {
        $prices = $cartService->getPrices();
        $order = $this->order::create([
            'user_id' => Auth::id(),
            'total_price' => $prices['total_price'],
            'payment_type' => 'dummy',
        ]);

        foreach($cartService->getAll() as $cart) {
            $order->orderProducts()->create([
                'product_id' => $cart->product_id,
                'price' => $cart->product->price,
                'quantity' => $cart->quantity,
                'tax_rate' => $cart->product->taxRate->rate,
            ]);
        }

        $cartService->deleteAll();

        return $order;
    }
}
