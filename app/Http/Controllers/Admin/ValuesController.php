<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Value;
use App\Models\Variation;
use Illuminate\Http\Request;

class ValuesController extends Controller
{
    public function valueDelete($variation_id, $value_id)
    {
        Variation::find($variation_id)->values()->detach($value_id);
        Value::destroy($value_id);

        return redirect()->back()->with('message', 'Value was deleted');
    }
    public function getEditValue($id)
    {
        $value =Value::find($id);

        return view('dashboard.valueEdit', compact('value'));
    }
    public function editValue(Request $request, $id)
    {
        $value = Value::find($id);

        $value->name = $request->input('value_name');
        $value->price = $request->input('price');
        $value->save();

        return redirect()->back()->with('value', 'Value was updated');
    }
}
