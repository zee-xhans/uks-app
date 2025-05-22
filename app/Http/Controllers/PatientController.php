<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Medicine;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::with('medicines')->paginate(10); // Gunakan paginate, bukan get
        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medicines = Medicine::all();
        return view('patients.create', compact('medicines'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'complaint' => 'required|string',
            'visit_date' => 'required|date',
            'medicines' => 'array',
            'medicines.*' => 'exists:medicines,id',
        ]);

        $patient = Patient::create($request->only('name', 'class', 'complaint', 'visit_date'));
        if ($request->has('medicines')) {
            $patient->medicines()->attach($request->medicines);
        }
        return redirect()->route('patients.index')->with('success', 'Pasien berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $patient = Patient::with('medicines')->findOrFail($id);
        return view('patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $patient = Patient::with('medicines')->findOrFail($id);
        $medicines = Medicine::all();
        return view('patients.edit', compact('patient', 'medicines'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'complaint' => 'required|string',
            'visit_date' => 'required|date',
            'medicines' => 'array',
            'medicines.*' => 'exists:medicines,id',
        ]);

        $patient = Patient::findOrFail($id);
        $patient->update($request->only('name', 'class', 'complaint', 'visit_date'));
        $patient->medicines()->sync($request->medicines ?? []);
        return redirect()->route('patients.index')->with('success', 'Pasien berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $patient = Patient::findOrFail($id);
        $patient->medicines()->detach();
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Pasien berhasil dihapus.');
    }
}
