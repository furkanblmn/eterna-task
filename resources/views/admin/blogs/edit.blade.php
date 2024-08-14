@extends('admin.layouts.master')
@section('menu', $menu_active)
@section('title', $page_title)
@section('content')

    @include('admin.layouts.success')
    @include('admin.layouts.error')

    <form id="form" action="{{ route('dashboard.' . $menu_active . '.update', $data) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                @include('admin.form_input_area.left_side_inputs', [
                                    'sub_title' => true,
                                    'content' => true,
                                ])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="sticky">
                    <div class="card">
                        <div class="card-body">
                            @include('admin.form_input_area.right_side_inputs', [
                                'status' => true,
                                'category' => true
                            ])
                        </div>
                    </div>
                    @include('admin.layouts.save_button', [
                        'menu_active' => $menu_active,
                    ])
                </div>
            </div>
        </div>
    </form>
@endsection
