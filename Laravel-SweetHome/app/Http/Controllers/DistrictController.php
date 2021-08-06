<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DistrictController extends Controller
{


    protected $district;

    public function __construct(District $district)
    {
        $this->district = $district;
    }

    public function getDataByCitiesId(Request $request)
    {
        $id = $request->get('id');
        $data = $this->district->where('province_id', $id)->get();

        if ($data->isEmpty()) {
            return response()->json([
                'erros' => true,
                'message' => 'Không tìm thấy dữ liệu tương ứng',
                'data' => []
            ]);
        }

        return response()->json([
            'erros' => false,
            'message' => 'success',
            'data' => $data
        ]);
    }

    function index()
    {
        $district = District::all();
        return response()->json($district, 200);
    }

    function districtOfProvince($id)
    {
        $data = DB::table('districts')
            ->JOIN('provinces', 'districts.provinces_id', '=', 'provinces.id')
            ->WHERE('provinces.id', '=', "$id")
            ->get();
        return response()->json($data, 200);
    }

    function show($id)
    {
        $district = District::findOrFail($id);
        $statusCode = 200;
        if (!$district)
            $statusCode = 404;
        return response()->json($district, $statusCode);
    }
}
