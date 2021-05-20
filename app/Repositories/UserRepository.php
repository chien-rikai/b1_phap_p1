<?php

namespace App\Repositories;

use App\Models\User;
use DB;
use App\Repositories\MoneyTransactionRepository;

class UserRepository extends AbstractRepository
{
    public function getModel()
    {
        return \App\Models\User::class;
    }

}
