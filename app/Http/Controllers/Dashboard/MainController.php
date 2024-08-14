<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MainController extends Controller
{
    public $data = [];

    public function __construct()
    {
        $this->data['menu_active'] = "admin_homepage";
        $this->data['page_title'] = 'Admin Homepage';
    }


    public function index(Request $request)
    {
        return view('admin.dashboard', $this->data);
    }

    public function change_status($page, $id, $column_to_update)
    {
        $replaced_page = Str::replace('-', '_', $page);
        $data = DB::table($replaced_page)->find($id);

        DB::table($replaced_page)->where('id', $id)->update([$column_to_update => !$data->$column_to_update]);
    }

    function logout()
    {
        Auth::logout();
        return redirect()->route('frontend.home.index');
    }
}
