<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{

    public $data = [];

    public function __construct()
    {
        $this->data['menu_active'] = "categories";
        $this->data['page_title'] = "Categories";
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Category::query();

            return DataTables::of($data)
                ->addColumn('status', function ($data) {
                    return get_status_button($data->status, $data->id, 'status', true);
                })
                ->addColumn('created_at', function ($data) {
                    return date_formatting($data->created_at);
                })
                ->rawColumns(['status'])
                ->make(true);
        }

        return view('admin.categories.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('dashboard.categories.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return redirect()->route('dashboard.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
