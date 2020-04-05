<?php

namespace App\Http\Controllers;

use App\Models\RegisterUser;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * update admin data
     *
     * @param -
     * @return void
     */
    public function adminList()
    {
        $adminData = RegisterUser::get();
        return view('admin.adminList')->with(['data' => $adminData]);
    }

    /**
     * delete admin account
     *
     * @param [integer] $id
     * @return void
     */
    public function deleteAdminAccount($id)
    {
        $data = RegisterUser::findOrFail($id)->delete();
        return back()->with(["status" => "Delete Success!"]);
    }

    /**
     * update admin account page
     *
     * @param [integer] $id
     * @return void
     */
    public function updatePage($id)
    {
        $adminData = RegisterUser::findOrFail($id);

        return view('admin.adminListUpdate')->with(['data' => $adminData]);
    }

    /**
     * update admin account
     *
     * @param [integer] $request,$id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $update = RegisterUser::findOrFail($id)->update($request->all());
        return redirect('adminList')->with(['success' => "Update Success!"]);
    }
}
