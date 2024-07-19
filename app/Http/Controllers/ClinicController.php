<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clinic;
use App\Http\Requests\ClinicRequest;
use App\Notifications\NewClinicNotification;
use Illuminate\Support\Facades\Notification;
use Yajra\DataTables\Facades\DataTables;

class ClinicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clinics = Clinic::paginate(10);
        return view('clinics.index', compact('clinics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clinics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClinicRequest $request)
    {
        $clinic = Clinic::create($request->validated());
        // send notification
            Notification::route('mail', 'rubengs@gmail.com')
                ->notify(new NewClinicNotification($clinic));

        return redirect()->route('clinics.index')->with('success', 'Clinic created succesfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Clinic $clinic)
    {
        return view('clinics.show', compact('clinic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Clinic $clinic)
    {
        return view('clinics.edit', compact('clinic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClinicRequest $request, Clinic $clinic)
    {
        $clinic->update($request->validated());
        return redirect()->route('clinics.index')->with('success', 'Clinic succesfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Clinic $clinic)
    {
        $clinic->delete();
        return redirect()->route('clinics.index')->with('success', 'Clinic succesfully deleted.');
    }

    public function data(Request $request)
    {
        $data = Clinic::latest()->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('name', function ($clinic) {
                $btn = '<a href="'.route('clinics.show', $clinic->id).'">'.$clinic->name.'</a>';
                return $btn;
            })
            ->addColumn('action', function ($row) {
                $btn = '<a href="' . route('clinics.edit', $row->id) . '" class="edit btn btn-primary btn-sm">Edit</a>';
                $btn .= ' <form action="' . route('clinics.destroy', $row->id) . '" method="POST" style="display:inline;">
                              ' . csrf_field() . '
                              ' . method_field("DELETE") . '
                              <button type="submit" class="delete btn btn-danger btn-sm">Delete</button>
                          </form>';
                return $btn;
            })
            ->rawColumns(['name', 'action'])
            ->make(true);
    }
}
