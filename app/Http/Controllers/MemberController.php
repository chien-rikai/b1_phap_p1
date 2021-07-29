<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\MemberRepository;
use App\Repositories\OrderRepository;
use App\Models\Member;

class MemberController extends Controller
{
    protected $memberRepo;
    protected $orderRepo;

    public function __construct(MemberRepository $memberRepo,
                                OrderRepository $orderRepo)
    {
        $this->memberRepo = $memberRepo;
        $this->orderRepo = $orderRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.members.index')->with([
            'members' => $this->memberRepo->search($request->all()),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function history(Member $member, Request $request)
    {
        if (blank($member)) {
            Session::flash('error', __('message.not_found'));
            return redirect()->route('members.index');
        }

        $request->flashOnly(flash_params($request->all()));
        
        return view('admin.members.history')->with([
            'orders' => $this->orderRepo->searchForMember($member->id, $request->all()),
            'member' => $member,
        ]);
    }
}
