<?php

namespace App\Repositories;

use App\Models\DetailOrder;

class DetailOrderRepository extends AbstractRepository
{
    public function getModel()
    {
        return \App\Models\DetailOrder::class;
    }
}