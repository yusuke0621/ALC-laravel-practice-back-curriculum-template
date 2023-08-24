<?php

namespace App\Services;

use App\Http\Requests\Cart\CreateRequest;
use App\Http\Requests\Cart\UpdateRequest;
use App\Interfaces\Repositories\CartRepositoryInterface;
use App\Interfaces\Services\CartServiceInterface;

use Illuminate\Http\Request;

class CartService implements CartServiceInterface
{

    protected CartRepositoryInterface $cartRepository;

    public function __construct(CartRepositoryInterface $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function getAll()
    {
        return $this->cartRepository->all();
    }

    public function getPrices()
    {
        $subtotalPrices = [];
        foreach($this->cartRepository->getSubtotalPrices() as $t) {
            $subtotalPrices[] = [
                'subtotal_price' => (int) $t->subtotal_price,
                'rate' => (float) $t->rate,
                'tax_amount' => floor($t->subtotal_price * $t->rate),
            ];
        }


        return [
            'subtotal_prices' => $subtotalPrices,
            'total_price' => $this->getTotalPrice($subtotalPrices),
        ];
    }

    /**
     * 合計金額を取得
     *
     * $subtotalPrices {
     *  int   subtotal_price 小計
     *  float rate           税率
     *  int   tax_amount     税額
     * }
     */
    public function getTotalPrice(array $subtotalPrices) {
        $totalPrice = 0;
        foreach ($subtotalPrices as $s) {
            // 消費税は税率毎に端数切捨てらしい(財務省曰く)
            $totalPrice += $s['subtotal_price'] + $s['tax_amount'];
        }

        return $totalPrice;
    }

    public function create(CreateRequest $request)
    {
        return $this->cartRepository->create($request);
    }

    public function update(UpdateRequest $request)
    {
        return $this->cartRepository->update($request);
    }

    public function delete(Request $request)
    {
        return $this->cartRepository->delete($request->route('id'));
    }

    public function deleteAll()
    {
        $this->cartRepository->deleteAll();
    }
}
