<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\MemberRepository;
use App\Repositories\OrderRepository;
use App\Repositories\AnalyticRevenueRepository;


class AdminController extends Controller
{
    protected $orderRepo;
    protected $memberRepo;
    protected $revenueRepo;

    public function __construct(OrderRepository $orderRepo,
                                MemberRepository $memberRepo,
                                AnalyticRevenueRepository $revenueRepo)
    {
        $this->orderRepo = $orderRepo;
        $this->memberRepo = $memberRepo;
        $this->revenueRepo = $revenueRepo;
    }

    public function dashboard()
    {  
        return view('admin.dashboard')->with([
            'numOrders' => $this->orderRepo->countNewToday(),
            'numMembers' => $this->memberRepo->countNewToday(),
            'statusOrders' => $this->orderRepo->analyticsStatusOrders(),
            'revenueEachMonth' => $this->revenueRepo->revenueEachMonth(),
        ]);
    }
}
