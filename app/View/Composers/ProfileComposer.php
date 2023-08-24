<?php

namespace App\View\Composers;

use App\Repositories\UserRepository;
use Illuminate\View\View;

class ProfileComposer
{
    /**
     * userリポジトリの実装
     *
     * @var UserRepository
     */
    protected $user;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

}
