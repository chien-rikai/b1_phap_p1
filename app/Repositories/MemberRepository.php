<?php

namespace App\Repositories;

use App\Models\Member;

class MemberRepository extends AbstractRepository
{
    public function getModel()
    {
        return \App\Models\Member::class;
    }
    
    public function search($params)
    {
        $data = $this->model->select();

        return $data->orderBy('id', 'DESC')->paginate(parent::LIMIT);
    }
}