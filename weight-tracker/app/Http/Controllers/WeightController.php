<?php

namespace App\Http\Controllers;

use App\Models\Weight;
use Illuminate\Http\Request;
use Carbon\Carbon;

class WeightController extends Controller
{
public function index()
    {
        $weights = Weight::orderBy('recorded_date', 'asc')->get();

        $chartData = $weights->filter(function ($w) {
            return !empty($w->recorded_date) && !empty($w->weight_kg);
        })->map(function ($w) {
            return [
                \Carbon\Carbon::parse($w->recorded_date)->format('d/m/Y'),
                (float) $w->weight_kg,
            ];
        })->values();

        return view('weights.index', compact('weights', 'chartData'));
    }
    public function create()
    {
        return view('weights.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'recorded_date' => 'required|date',
            'weight_kg' => 'required|numeric',
        ]);

        Weight::create($request->all());

        return redirect()->route('weights.index')->with('success', 'บันทึกข้อมูลสำเร็จ');
    }

    public function edit(Weight $weight)
    {
        return view('weights.edit', compact('weight'));
    }

    public function update(Request $request, Weight $weight)
    {
        $request->validate([
            'recorded_date' => 'required|date',
            'weight_kg' => 'required|numeric',
        ]);

        $weight->update($request->all());

        return redirect()->route('weights.index')->with('success', 'อัปเดตข้อมูลสำเร็จ');
    }

    public function destroy(Weight $weight)
    {
        $weight->delete();

        return redirect()->route('weights.index')->with('success', 'ลบข้อมูลสำเร็จ');
    }
}