<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Http\Resources\PatientResource;
use App\Models\Status;

class PatientController extends Controller
{
    public function index()
    {
        // $patients = Patient::with('status')->select('name','phone','address','status','date_in','date_out')->get();
        $patients = Patient::with('status')->get();
        return response()->json($patients, 200);
        // $patients->status;
        // return PatientResource::collection(Patient::with('status')->paginate(5));

    }

    public function create(Request $request)
    {
        $name = $request->name;
        $phone = $request->phone;
        $address = $request->address;
        $id_status = $request->id_status;
        $date_in = date("Y-m-d");
        $date_out = date("Y-m-d", strtotime("+14 days"));

        $patient = Patient::create(
            [
                'name' => $name,
                'phone' => $phone,
                'address' => $address,
                'id_status' => $id_status,
                'date_in' => $date_in,
                'date_out' => $date_out
            ]
        );
        $data = [
            "message" => "data patient is created",
            "data" => $patient,
        ];
        return response()->json($data, 201);
    }
    public function update(Request $request, $id)
    {
        $patient = Patient::find($id);
        $name = $request->name;
        $phone = $request->phone;
        $address = $request->address;
        $id_status = $request->id_status;
        $date_in = $request->date_in;
        $date_out = $request->date_in;

        $patient->update(
            [
                'name' => ($name ? $name : $patient->name),
                'phone' => ($phone ? $phone : $patient->phone),
                'address' => ($address ? $address : $patient->address),
                'id_status' => ($id_status ? $id_status : $patient->id_status),
                'date_in' => ($date_in ? $date_in : $patient->date_in),
                'date_out' => ($date_out ? $date_out : $patient->date_out),
            ]
        );
        $patient = Patient::with('status')->find($id);
        $data = [
            "message" => "data student is Updated",
            "data" => $patient,
        ];
        return response()->json($data, 200);
    }
    public function destroy($id)
    {
        $patient =  Patient::find($id);
        if ($patient) {
            $patient->delete();
            $data = [
                "message" => "data Patient is delete",
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                "message" => "data not found",
            ];
            return response()->json($data, 404);
        }
    }
    public function name($name)
    {
        if ($name == null) {
            $data = [
                "message" => "data tidak tersedia",
            ];
            return response()->json($data, 404);
        }
        $patients = Patient::with('status')->where("name", "like", "%" . $name . "%")->get();
        return response()->json($patients, 200);
    }

    public function positive($status = 'positive')
    {
        $data_status = Status::where('status', $status)->first();
        if ($data_status != '') {
            $data_patient = Patient::with('status')->where('id_status', $data_status->id)->get();
            if ($data_patient->count() > 0) {
                $response = [
                    'total' => $data_patient->count() . " Patient",
                    'data'  => $data_patient,
                ];

                return response()->json($response, 200);
            }

            $data = [
                "message" => "data tidak tersedia"
            ];
            return response()->json($data, 404);
        }
    }
    public function recovery($status = 'recovery')
    {
        $data_status = Status::where('status', $status)->first();
        if ($data_status != '') {
            $data_patient = Patient::with('status')->where('id_status', $data_status->id)->get();
            if ($data_patient->count() > 0) {
                $response = [
                    'total' => $data_patient->count() . " Patient",
                    'data'  => $data_patient,
                ];

                return response()->json($response, 200);
            }

            $data = [
                "message" => "data tidak tersedia"
            ];
            return response()->json($data, 404);
        }
    }
    public function death($status = 'death')
    {
        $data_status = Status::where('status', $status)->first();
        if ($data_status != '') {
            $data_patient = Patient::with('status')->where('id_status', $data_status->id)->get();
            if ($data_patient->count() > 0) {
                $response = [
                    'total' => $data_patient->count() . " Patient",
                    'data'  => $data_patient,
                ];

                return response()->json($response, 200);
            }

            $data = [
                "message" => "data tidak tersedia"
            ];
            return response()->json($data, 404);
        }
    }
}
