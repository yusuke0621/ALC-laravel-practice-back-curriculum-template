<?php

namespace App\Services;

use App\Interfaces\Repositories\TaxRateRepositoryInterface;
use App\Interfaces\Services\TaxRateServiceInterface;

class TaxRateService implements TaxRateServiceInterface
{

    protected TaxRateRepositoryInterface $taxRateRepository;

    public function __construct(TaxRateRepositoryInterface $taxRateRepository)
    {
        $this->taxRateRepository = $taxRateRepository;
    }

    public function getAll()
    {
        return $this->taxRateRepository->all();
    }
}
