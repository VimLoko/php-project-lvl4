<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLabelRequest;
use App\Http\Requests\UpdateLabelRequest;
use App\Models\Label;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LabelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')
            ->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    public function index()
    {
        $labels = Label::paginate(10);
        return view('labels.index', compact('labels'));
    }

    public function create()
    {
        $label = new Label();
        return view('labels.create', compact('label'));
    }

    public function store(StoreLabelRequest $request)
    {
        try {
            $validatedData = $request->only(['name', 'description']);
            $label = new Label();
            $label->fill($validatedData);
            DB::transaction(function () use ($label) {
                $label->save();
            }, 3);
            flash(__('ui.messages.add_label_form_success'))->success();
        } catch (\Exception $e) {
            flash(__('ui.messages.add_label_form_error'))->error();
        } finally {
            return redirect()->route('labels.index');
        }
    }

    public function edit(Label $label)
    {
        return view('labels.edit', compact('label'));
    }

    public function update(UpdateLabelRequest $request, Label $label)
    {
        try {
            $validatedData = $request->only(['name', 'description']);
            $label->fill($validatedData);
            DB::transaction(function () use ($label) {
                $label->save();
            }, 3);
            flash(__('ui.messages.edit_label_form_success'))->success();
        } catch (\Exception $e) {
            flash(__('ui.messages.edit_label_form_error'))->error();
        } finally {
            return redirect()->route('labels.index');
        }
    }

    public function destroy(Label $label)
    {
        try {
            $this->authorize('delete', $label);
            $label->delete();
            flash(__('ui.messages.delete_label_form_success'))->success();
        } catch (\Exception $e) {
            flash(__('ui.messages.delete_label_form_error'))->error();
        } finally {
            return redirect()->route('labels.index');
        }
    }
}
