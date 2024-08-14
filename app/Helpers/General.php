<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Request;

function date_formatting($time, $format = 'DD MMMM YYYY HH:mm', $type = null)
{
    Carbon::setLocale(config('app.locale'));
    $date = Carbon::parse($time);
    if ($date->isToday() && $type != "hour") {
        return  'Today ' . $date->isoFormat('HH:mm');
    }
    return $date->isoFormat($format);
}

function get_slug()
{
    return Request::segment(count(Request::segments()));
}


function get_status_button($data, $id, $column_to_update, $only_button = false, $page = null)
{
    switch ($data) {
        case 1:
            $name = 'Active';
            $color = 'success';
            break;
        case 0:
            $name = 'Deactive';
            $color = 'danger';
            break;
    }
    if ($only_button) {
        return '<div class="badge badge-light-' . $color . '">' . $name . '</div>';
    }
    return '<div class="change_status badge badge-light-' . $color . '" data-page="' . $page . '" data-id="' . $id . '" data-column="' . $column_to_update . '">' . $name . '</div>';
}

function get_action_buttons($id, $delete = true, $update = true, $show = false)
{
    $deleteBtn = '<a href="javascript:;" data-id="' . $id . '" data-url="' . route('dashboard.' . get_slug() . '.destroy', $id) . '" data-bs-custom-class="tooltip-dark" rel="tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" class="btn btn-sm btn-light-danger delete_item me-3"><i class="fas fa-trash fs-4"></i></a>';

    $updateBtn = '<a href="' . route('dashboard.' . get_slug() . '.edit', $id) . '"  data-bs-custom-class="tooltip-dark" rel="tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" class="btn btn-sm btn-light-primary me-3"><i class="fas fa-pencil-alt fs-4"></i></a>';

    $showBtn = '<a href="' . route('dashboard.' . get_slug() . '.show', $id) . '"  data-bs-custom-class="tooltip-dark" rel="tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Show" class="btn btn-sm btn-light-info"><i class="fa-solid fa-magnifying-glass"></i></a>';


    if (!$delete) $deleteBtn = '';
    if (!$update) $updateBtn = '';
    if (!$show) $showBtn = '';

    return $deleteBtn . $updateBtn . $showBtn;
}


function except_data()
{
    return ['_token', '_method', 'has_content', 'has_sub_title'];
}
