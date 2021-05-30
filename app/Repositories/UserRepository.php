<?php

namespace App\Repositories;

use App\Models\User;
use DB;
use App\Repositories\MoneyTransactionRepository;
use Session;
use Illuminate\Support\Facades\Hash;

class UserRepository extends AbstractRepository
{
    public function getModel()
    {
        return \App\Models\User::class;
    }

    public function search($params)
    {
        $data = $this->model->select();

        if (isset($params['name']))
        {
            $data->whereName($params['name']);
        }

        return $data->orderBy('id','DESC')
                    ->paginate(parent::LIMIT);
    }

    public function changePass($email, $password)
    {
        $updation = $this->model->whereEmail($email)->update(['password' => Hash::make($password)]);

        if (!$updation) {
            Session::flash('error_change_pass', __('message.error', ['action' => __('common.change_password')]));
            return 0;
        }

        return 1;
    }

    public function getByEmail($email)
    {
        return $this->model->select()->firstWhere([
            ['status', '=', 1],
            ['email', '=', $email]
        ]);
    }
}
