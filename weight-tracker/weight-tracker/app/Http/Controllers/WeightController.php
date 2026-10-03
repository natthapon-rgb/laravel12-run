<?php

namespace App\Http\Controllers;

use App\Models\Weight;
use Illuminate\Http\Request;

class WeightController extends Controller
{
    public function index()
    {
        $weights = Weight::all();
        return view('weights.index', compact('weights'));
    }

    public function create()
    {
        return view('weights.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'weight' => 'required|numeric',
            'recorded_at' => 'required|date',
        ]);

        Weight::create($request->all());

        return redirect()->route('weights.index')
            ->with('success', 'บันทึกน้ำหนักเรียบร้อยแล้ว');
    }

    public function edit(Weight $weight)
    {
        return view('weights.edit', compact('weight'));
    }

    public function update(Request $request, Weight $weight)
    {
        $request->validate([
            'weight' => 'required|numeric',
            'recorded_at' => 'required|date',
        ]);

        $weight->update($request->all());

        return redirect()->route('weights.index')
            ->with('success', 'อัปเดตข้อมูลเรียบร้อยแล้ว');
    }

    public function destroy(Weight $weight)
    {
        $weight->delete();

        return redirect()->route('weights.index')
            ->with('success', 'ลบข้อมูลเรียบร้อยแล้ว');
    }
}