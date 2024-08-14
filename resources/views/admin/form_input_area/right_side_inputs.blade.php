<div class="row">
    @if ($status)
        <div class="col-lg-12">
            <div class="fv-row mb-7 fv-plugins-icon-container">
                <label class="required fs-6 fw-bold form-label mb-2">Status</label>
                <select class="form-select form-select-solid fw-bolder" name="status" data-control="select2"
                    data-placeholder="Select" data-hide-search="true">
                    @php $status_value = isset($data) ? old('category_id', $data->status) : old('status') @endphp
                    <option value="0" @if ($status_value == 0) selected @endif>Deactive</option>
                    <option value="1" @if ($status_value == 1) selected @endif>Active</option>
                </select>
            </div>
        </div>
    @endif
    @if ($category)
        <div class="col-lg-12">
            <div class="fv-row mb-7 fv-plugins-icon-container">
                <label class="required fs-6 fw-bold form-label mb-2">Categories</label>
                <select class="form-select form-select-solid fw-bolder" name="category_id" data-control="select2"
                    data-placeholder="Select" data-hide-search="false">
                    @php $category_id = isset($data) ? old('category_id', $data->category_id) : old('category_id') @endphp
                    <option></option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if ($category->id == $category_id) selected @endif>
                            {{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif
</div>
