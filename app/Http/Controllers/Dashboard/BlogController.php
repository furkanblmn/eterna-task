<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\CreateRequest;
use App\Http\Requests\Blog\DeleteRequest;
use App\Http\Requests\Blog\EditRequest;
use App\Http\Requests\Blog\StoreRequest;
use App\Http\Requests\Blog\UpdateRequest;
use App\Mail\BlogNotification;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Newsletter;
use App\Traits\StoreUpdateTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;

class BlogController extends Controller
{

    public $data = [];

    public function __construct()
    {
        $this->data['menu_active'] = "blogs";
        $this->data['page_title'] = "Blogs";
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Blog::where('user_id', Auth::id());

            return DataTables::of($data)
                ->addColumn('status', function ($data) {
                    return get_status_button($data->status, $data->id, 'status');
                })
                ->addColumn('created_at', function ($data) {
                    return date_formatting($data->created_at);
                })
                ->addColumn('action', function ($data) {
                    return get_action_buttons($data->id, true, true, false);
                })
                ->filter(function ($query) use ($request) {
                    if ($keyword = $request->input('search.value')) {
                        return $query->searchFields($keyword);
                    }
                    return $query;
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }

        return view('admin.blogs.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CreateRequest $request)
    {
        $this->data['page_title'] = 'Add New Blog';
        $this->data['categories'] = Category::get();
        return view('admin.blogs.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $inputs = $request->except(except_data());
            $inputs['user_id'] = Auth::id();
            $blog = Blog::create($inputs);

            $this->sendBlogNotification($blog);

            DB::commit();
            session()->flash('success', 'The addition process was completed successfully.');
            return redirect()->back();
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('error', 'An error occurred during the insertion process. Error: ' . $e->getMessage());
            return redirect()->back()->withInput($request->all());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EditRequest $request, Blog $blog)
    {
        $this->data['data'] = $blog;
        $this->data['categories'] = Category::get();
        $this->data['page_title'] = 'Update Blog';
        return view('admin.blogs.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Blog $blog)
    {
        $inputs = $request->except(except_data());

        DB::beginTransaction();
        try {
            $blog->update($inputs);
            DB::commit();
            session()->flash('success', 'The update process was completed successfully.');
            return redirect()->back();
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('error', 'An error occurred during the update process. Error: ' . $e->getMessage());
            return redirect()->back()->withInput($request->all());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteRequest $request, string $id)
    {
        DB::beginTransaction();
        try {
            $data = Blog::findOrFail($id);
            $data->delete();
            DB::commit();
            return 1;
        } catch (Exception $e) {
            DB::rollBack();
            return $e;
        }
    }

    /**
     * Send notification emails to all subscribers about the new blog post.
     */
    private function sendBlogNotification(Blog $blog)
    {
        $subscribers = Newsletter::pluck('email');

        foreach ($subscribers as $index => $email) {
            Mail::to($email)->queue(new BlogNotification($blog));
        }
    }
}
