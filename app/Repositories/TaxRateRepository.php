<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;

use App\Interfaces\Repositories\TaxRateRepositoryInterface;
use App\Models\TaxRate;

class TaxRateRepository extends BaseRepository implements TaxRateRepositoryInterface
{
    protected TaxRate $taxRate;

    public function __construct(TaxRate $taxRate)
    {
        $this->taxRate = $taxRate;
    }

    public function all()
    {
        return $this->taxRate::all();
    }

    public function find(int $id): TaxRate
    {
        return $this->taxRate::findOrFail($id);
    }

    public function create(array $detail): TaxRate
    {
        return $this->taxRate::create($detail);
    }

    public function update(int $id, array $detail): TaxRate
    {
        return $this->taxRate::where('id', $id)->update($detail);
    }

    public function delete(int $id): void
    {
        $this->taxRate::destroy($id);
    }
}
