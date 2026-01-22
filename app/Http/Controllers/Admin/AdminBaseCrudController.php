<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\Exportable;
use App\Traits\Importable;
use App\Traits\Uploadable;
use Illuminate\Http\Request;

class AdminBaseCrudController extends Controller
{
    use Exportable, Importable, Uploadable;

    protected $permissionName;
    protected $model;
    protected $title;
    protected $exportClass;
    protected $importClass;
    protected $requestClass;
    protected $pdfView;
    protected $imageField;
    protected $imageFolder;

    // Handle middleware permissions
    public function __construct()
    {
        if ($this->permissionName) {

            $this->middleware("permission:view:{$this->permissionName}")
                ->only(['index']);

            $this->middleware("permission:create:{$this->permissionName}")
                ->only(['store']);

            $this->middleware("permission:edit:{$this->permissionName}")
                ->only(['update', 'toggleStatus']);

            $this->middleware("permission:delete:{$this->permissionName}")
                ->only(['destroy']);

            $this->middleware("permission:delete-all:{$this->permissionName}")
                ->only(['destroyAll']);

            $this->middleware("permission:soft-delete:{$this->permissionName}")
                ->only(['softDelete']);

            $this->middleware("permission:soft-delete-all:{$this->permissionName}")
                ->only(['softDeleteAll']);

            $this->middleware("permission:restore:{$this->permissionName}")
                ->only(['restore']);

            $this->middleware("permission:restore-all:{$this->permissionName}")
                ->only(['restoreAll']);

            $this->middleware("permission:import:{$this->permissionName}")
                ->only(['import']);

            $this->middleware("permission:export:{$this->permissionName}")
                ->only(['exportExcel', 'exportPDF']);
        }
    }

    // Handle toggle status
    public function toggleStatus($id)
    {
        $data = $this->model::withTrashed()->findOrFail($id);
        $data->status = !$data->status;
        $data->save();

        return back()->with('success', 'Successfully Change Status ' . $this->title);
    }

    // Handle export data to excel file
    public function exportExcel()
    {
        return $this->exportExcelFile(
            $this->exportClass,
            'Data ' . $this->title . '.xlsx'
        );
    }

    // Handle export data to pdf file
    public function exportPDF()
    {
        $data = $this->model::withTrashed()->get();

        if (!view()->exists($this->pdfView)) {
            return back()->with('error', 'PDF template not found!');
        }

        return $this->exportPdfFile(
            $this->pdfView,
            [
                'data' => $data,
                'title' => $this->title
            ],
            'Data ' . $this->title . '.pdf'
        );
    }

    // Handle import data
    public function import(Request $request)
    {
        return $this->importExcelFile(
            $request,
            $this->importClass
        );
    }

    // Handle store data
    public function store()
    {
        $request = app($this->requestClass);

        $data = $this->model::create($request->validated());

        if ($request->hasFile($this->imageField)) {

            $folder = $this->permissionName;

            $filename = $this->uploadImage(
                $request->file($this->imageField),
                $data->slug,
                $folder
            );

            $data->update([
                $this->imageField => $filename
            ]);
        }

        return back()->with('success', 'Successfully create ' . $this->title . '!');
    }

    // Handle update data
    public function update($id)
    {
        $request = app($this->requestClass);

        $data = $this->model::findOrFail($id);

        $validated = $request->validated();

        $data->fill($validated);

        if ($request->hasFile($this->imageField)) {

            $folder = $this->permissionName;

            $this->deleteImage(
                $data->{$this->imageField},
                $folder
            );

            $filename = $this->uploadImage(
                $request->file($this->imageField),
                $data->slug,
                $folder
            );

            $data->{$this->imageField} = $filename;
        }

        if ($data->isDirty()) {

            $data->save();

            return back()->with('success', 'Successfully update ' . $this->title . '!');
        }

        return back()->with('success', 'No data changes detected.');
    }

    // Handle hard delete data
    public function destroy($id)
    {
        $this->model::withTrashed()->findOrFail($id)->forceDelete();
        return back()->with('success', 'Successfully delete data ' . $this->title . '!');
    }

    // Handle hard delete all data
    public function destroyAll()
    {
        $this->model::truncate();
        return back()->with('success', 'Successfully delete all ' . $this->title . '!');
    }

    // Handle soft delete data
    public function softDelete($id)
    {
        $this->model::findOrFail($id)->delete();
        return back()->with('success', 'Successfully delete data ' . $this->title . '!');
    }

    // Handle soft delete all data
    public function softDeleteAll()
    {
        $this->model::query()->delete();
        return back()->with('success', 'Successfully delete all ' . $this->title . '!');
    }

    // Handle restore data
    public function restore($id)
    {
        $this->model::withTrashed()->findOrFail($id)->restore();
        return back()->with('success', 'Successfully restore ' . $this->title . '!');
    }

    // Handle restore all data
    public function restoreAll()
    {
        $this->model::onlyTrashed()->restore();
        return back()->with('success', 'Successfully restore all ' . $this->title . '!');
    }
}
