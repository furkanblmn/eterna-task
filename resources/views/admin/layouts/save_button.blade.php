<div class="card mt-5">
    <div class="card-body p-4">
        <div class="d-block text-center">
            <a href="{{ route('dashboard.' . $menu_active . '.index') }}" class="btn btn-light me-3"><i
                    class="fas fa-arrow-left"></i> Go Back</a>
            <button form="form" type="submit" class="btn btn-light-success">
                <i class="far fa-save"></i>
                <span class="indicator-label">Save</span>
            </button>
        </div>
    </div>
</div>