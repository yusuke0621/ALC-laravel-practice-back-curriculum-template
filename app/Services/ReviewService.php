<?php

namespace App\Services;

use App\Interfaces\Repositories\ReviewRepositoryInterface;
use App\Interfaces\Services\ReviewServiceInterface;

class ReviewService implements ReviewServiceInterface
{

    protected ReviewRepositoryInterface $reviewRepository;

    public function __construct(ReviewRepositoryInterface $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    public function getAll()
    {
        return $this->reviewRepository->all()->paginate($this->reviewRepository->getPerPage());
    }
}
