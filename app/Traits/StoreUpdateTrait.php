<?php

namespace App\Traits;

use App\Http\Requests\GeneralRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Exception;

trait StoreUpdateTrait
{
    public function store(GeneralRequest $request)
    {
        $inputs = $request->except(except_data());
        $model_class = $this->getModelClass();
        $model = app("App\Models\\{$model_class}");

        DB::beginTransaction();
        try {
            $data = $model::create($inputs);

            DB::commit();
            session()->flash('success', 'The addition process was completed successfully.');
            return redirect()->back();
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('error', 'An error occurred during the insertion process. Error:' . $e->getMessage());
            return redirect()->back()->withInput($request->all());
        }
    }

    public function update(GeneralRequest $request, $id)
    {
        $inputs = $request->except(except_data());
        $model_class = $this->getModelClass();
        $model = app("App\Models\\{$model_class}");

        DB::beginTransaction();
        try {
            $item = $model::find($id);
            $item->update($inputs);
            DB::commit();
            session()->flash('success', 'The update process was completed successfully.');
            return redirect()->back();
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('error', 'An error occurred during the update process. Error:' . $e->getMessage());
            return redirect()->back()->withInput($request->all());
        }
    }

    protected function getModelClass()
    {
        $model_class = Str::before(Str::afterLast(self::class, "\\"), 'Controller');
        return $model_class;
    }

}
