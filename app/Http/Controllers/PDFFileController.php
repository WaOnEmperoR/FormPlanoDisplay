<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\PDFFile;

class PDFFileController extends Controller
{
    public function __construct()
    {
        // $this->middleware('ipaccess')->except('index');    
    }

    public function index()
    {
        $pdffiles = PDFFile::orderby('id', 'asc')->paginate(10);

        foreach ($pdffiles as $pdffile) {
            $pdffile->province_name = DB::table('master_provinces')->where('province_code', $pdffile->province_id)->first()->province_name;
            $pdffile->city_name = DB::table('master_cities')->where('city_code', $pdffile->regency_id)->first()->city_name;
            $pdffile->district_name = DB::table('master_districts')->where('district_code', $pdffile->district_id)->first()->district_name;
            $pdffile->subdistrict_name = DB::table('master_subdistricts')->where('subdistrict_code', $pdffile->subdistrict_id)->first()->subdistrict_name;
            
            $pdffile->c1plano_type_name = DB::table('c1plano')->where('id', $pdffile->c1_plano_type)->first()->c1plano_type_name;
            $pdffile->party_name = DB::table('party')->where('id', $pdffile->party_id)->first()->party_name;
        }

        return view('pdffiles.index', compact('pdffiles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'province_id' => 'required',
            'regency_id' => 'required',
            'district_id' => 'required',
            'subdistrict_id' => 'required',
            'tps_code' => 'required',
            'c1_plano_type' => 'required',
            'party_id' => 'required',
            'file_data' => 'mimes:pdf|max:5192',
        ]);

        $pdffile = new PDFFile();
        $pdffile->province_id = $request['province_id'];
        $pdffile->regency_id = $request['regency_id'];
        $pdffile->district_id = $request['district_id'];
        $pdffile->subdistrict_id = $request['subdistrict_id'];
        $pdffile->tps_code = $request['tps_code'];
        $pdffile->c1_plano_type = $request['c1_plano_type'];
        $pdffile->party_id = $request['party_id'];
        $pdffile->file_path = $request->file_data->getClientOriginalName();

        $request->file_data->storeAs('c1plano', $request->file_data->getClientOriginalName());

        if ($pdffile->save())
        {
            return response()->json(['success' => 'C1 Plano Saved'], 200);
        }
        else
        {
            return response()->json(['error' => 'C1 Plano Insertion Failed'], 401);    
        }
    }
}
