<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WaterQuality;

class WaterQualityController extends Controller
{
    public function index()
    {
        $districts = WaterQuality::all();
        return view('water_quality', compact('districts'));
    }


    public function getDistrictData(Request $request)
    {
        $districtName = $request->query('district');
        $district = WaterQuality::where('district_name', $districtName)->first();

        if ($district) {
            return response()->json($district);
        }

        return response()->json(['error' => 'Không tìm thấy dữ liệu'], 404);
    }
}
