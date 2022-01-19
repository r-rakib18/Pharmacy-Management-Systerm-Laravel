<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Handle\GroupHandler\DeleteGroup;
use App\Http\Handle\GroupHandler\SaveGroup;
use App\Http\Requests\GroupRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GroupController extends Controller
{
    public function index()
    {
        $data['groups'] = Group::paginate(5);
        return view('group.list', $data);
    }

    public function create()
    {
        $data['group'] = null;
        return view('group.create_update', $data);
    }

    public function store(GroupRequest $groupRequest)
    {
        if ((new SaveGroup($groupRequest))->save())
        {
            Session::flash('alert-success', 'Data Stored Successfully!!');
            return redirect('group/list');
        }
        Session::flash('alert-danger', 'Data Store failed!!');
        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $group_id = $request->id;
        $data['group'] = Group::find($group_id);
        return view('group.create_update', $data);
    }

    public function delete(Request $request)
    {
        if ((new DeleteGroup($request))->delete())
        {
            Session::flash('alert-danger', 'Data Deleted Successfully!!');
            return redirect('group/list');
        }
        Session::flash('alert-danger', 'Data Delete failed!!');
        return redirect()->back();
    }
}
