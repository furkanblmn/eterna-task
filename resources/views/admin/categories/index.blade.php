@extends('admin.layouts.master')
@section('menu', $menu_active)
@section('title', $page_title)
@section('add_new', true)
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom example example-compact gutter-b">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="datatable" class="datatable table table-row-bordered gy-5 loading">
                                <thead class="thead-light">
                                    <tr class="fw-bold fs-6 text-muted">
                                        <th data-column="id">#</th>
                                        <th data-column="title">Title</th>
                                        <th data-column="status">Status</th>
                                        <th data-column="created_at">Created at</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
