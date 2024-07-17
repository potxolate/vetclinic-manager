<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clinic;
use App\Models\Worker;
use App\Http\Requests\WorkerRequest;

class WorkerController extends Controller
{
    public function index()
    {
        $workers = Worker::with('clinic')->paginate(10);
        return view('workers.index', compact('workers'));
    }

    public function create()
    {
        $clinics = Clinic::all();
        return view('workers.create', compact('clinics'));
    }

    public function store(WorkerRequest $request)
    {
        Worker::create($request->validated());
        return redirect()->route('workers.index')->with('success', 'WOrker created succesfully.');
    }

    public function show(Worker $worker)
    {
        return view('workers.show', compact('worker'));
    }

    public function edit(Worker $worker)
    {
        $clinics = Clinic::all();
        return view('workers.edit', compact('worker', 'clinics'));
    }

    public function update(WorkerRequest $request, Worker $worker)
    {
        var_dump($request);
        $worker->update($request->validated());
        return redirect()->route('worker.index')->with('success', 'Empleado actualizado correctamente.');
    }

    public function destroy(Worker $worker)
    {
        $worker->delete();
        return redirect()->route('workers.index')->with('success', 'Empleado eliminado correctamente.');
    }
}
