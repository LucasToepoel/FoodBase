<?php

namespace App\Http\Controllers;

use App\Models\Portion;
use Illuminate\Http\Request;

class PortionController extends Controller
{
    public function store(Request $request)
    {
        $portion = new Portion();
        $portion->unit = $request->input('unit');
        $portion->value = $request->input('value');
        $portion->created_at = now();
        $portion->updated_at = now();
        $portion->save();

        return $portion;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $portion = Portion::find($id);
        $portion->unit = $request->input('unit');
        $portion->value = $request->input('value');
        $portion->updated_at = now();
        $portion->save();
    }
}
