<?php

namespace App\Repositories;

use App\Models\Member;

class MemberRepository extends AbstractRepository
{
    public function getModel()
    {
        return \App\Models\Member::class;
    }
    
}