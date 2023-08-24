<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;

use App\Http\Requests\Cart\CreateRequest;
use App\Http\Requests\Cart\UpdateRequest;
use App\Interfaces\Repositories\CartRepositoryInterface;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartRepository extends BaseRepository implements CartRepositoryInterface
{
    protected Cart $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function all(string $column = 'created_at', string $direction = 'asc')
    {
        return $this->cart::where('user_id', Auth::id())
                                ->orderBy($column, $direction)
                                ->get();
    }

    public function getSubtotalPrices()
    {
        return DB::table('carts')
                    ->join('products', 'products.id', '=', 'carts.product_id')
                    ->join('tax_rates', 'products.tax_rate_id', '=', 'tax_rates.id')
                    ->where('user_id', Auth::id())
                    ->groupBy('rate')
                    ->selectRaw('SUM(price * quantity) as subtotal_price, rate')
                    ->get();
    }

    public function find(int $id): Cart
    {
        return $this->cart::findOrFail($id);
    }

    public function create(CreateRequest $request): Cart
    {
        $cart = new $this->cart();
        $cart->product_id = $request->productId();
        $cart->quantity = $request->quantity();
        $cart->user_id = Auth::id();
        $cart->save();

        return $cart;
    }

    public function update(UpdateRequest $request): Cart
    {
        $cart = Auth::user()->carts->where('id', $request->id())->firstOrFail();
        $cart->quantity = $request->quantity();
        $cart->save();
        return $cart;
    }

    public function delete(int $id): void
    {
        $cart = Auth::user()->carts->where('id', $id)->firstOrFail();
        $cart->delete();
    }

    public function deleteAll(): void
    {
        $this->cart::where('user_id', Auth::id())->delete();
    }
}
