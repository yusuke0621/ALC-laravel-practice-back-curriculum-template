<?php

namespace App\Interfaces\Services;

use App\Http\Requests\Cart\CreateRequest;
use App\Http\Requests\Cart\UpdateRequest;

use Illuminate\Http\Request;

interface SubtotalPrice
{

}
interface CartServiceInterface extends BaseServiceInterface
{
    public function getAll();
    public function getPrices();
    public function getTotalPrice(array $subtotalPrices);
    public function create(CreateRequest $request);
    public function update(UpdateRequest $request);
    public function delete(Request $request);
    public function deleteAll();
}
