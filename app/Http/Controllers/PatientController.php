<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Patient;
use App\Http\Requests\PatientRequest;

class PatientController extends Controller
{
    public function show()
    {
        //refactoring -> getConfig()
        $email = session()->get('email', 'error');
        return view('guardTeamUser.patient.show', compact('email'));
    }

    public function getAll()
    {
        $patients = Patient::orderBy('id', 'DESC')->get();
        return response()->json($patients, 200);
    }

    public function delete (Request $request)
    {
        $this->validate($request, [
            'clinical_history_number' => 'required'
        ]);
        Patient::where('clinical_history_number', '=', $request->clinical_history_number)->delete();
        return response()->json('se ha borrado exitosamente', 200);
    }

    public function store (PatientRequest $request)
    {
        $p = Patient::where('clinical_history_number', '=', $request->clinical_history_number)->get()->count();
        if ($p == 0){
            Patient::create($request->all());
            return response()->json('se ha creado exitosamente', 200);
        }else{
            return response()->json(['errors'=>['store'=>['El número de historia clínica está en uso']]], 422);
        }
    }
    
    public function update(PatientRequest $request)
    {
        $p = Patient::where('clinical_history_number', '=', $request->clinical_history_number)->update($request->all());
        return response()->json('se ha actualizado exitosamente', 200);
    }

}
