<div class="row mb-7 align-items-center">
    <label class="required fs-6 fw-bold form-label mb-2 col-lg-2 text-end">Title</label>
    <div class="col-lg-10">
        <input type="text" class="form-control form-control-solid title" name="title" placeholder="Enter Title."
            value="@isset($data){{ old('sub_title', $data->title) }}@else{{ old('title') }}@endif">
    </div>
</div>
@if ($sub_title)
    <div class="row mb-7 align-items-center">
        <label class="required fs-6 fw-bold form-label mb-2 col-lg-2 text-end">Sub Title</label>
        <div class="col-lg-10">
            <input type="text" class="form-control form-control-solid" name="sub_title"
                placeholder="Enter Sub Title." value="@isset($data){{ old('sub_title', $data->sub_title) }}@else{{ old('sub_title') }}@endif">
        </div>
    </div>
@endif
@if ($content)
    <div class="row mb-7">
        <label class="required fs-6 fw-bold form-label mb-2 col-lg-2 text-end">Content</label>
        <div class="col-lg-10">
            <textarea name="content"
                class="tox-target tinymce">@isset($data){{ old('content', $data->content) }}@else{{ old('content') }}@endif</textarea>
        </div>
    </div>
@endif
<input type="hidden" class="d-none" name="has_content" value=" @if ($content) 1 @else 0 @endif">
<input type="hidden" class="d-none" name="has_sub_title" value="@if ($sub_title) 1 @else 0 @endif">
