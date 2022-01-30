<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AppointmentRequest;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::orderBy('id', 'DESC')->paginate(25);
        return view('dashboard.appointments.index',compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.appointments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AppointmentRequest $request)
    {
        Appointment::create($request->all());
        return redirect()->route('appointments.index')
        ->with(['success' => trans('admin.added')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $appointment = Appointment::find($id);
        if (!$appointment)
        return redirect()->route('countries.index')
        ->with(['error' => trans('admin.coun_not_found')]);
        return view('dashboard.appointments.edit', compact('appointment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AppointmentRequest $request, $id)
    {
        $appointment = Appointment::find($id);
        $appointment->fill($request->all())->save();
        return redirect()->route('appointments.index')
        ->with(['success' => trans('admin.updated')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        try {
            //get specific categories and its translations
            $appointment = Appointment::find($id);

            if (!$appointment)
                return redirect()->route('appointments.index')
                ->with(['error' => trans('admin.coun_not_found')]);

            $appointment->delete();

            return redirect()->route('appointments.index')
            ->with(['success' => trans('admin.detelted_sucess')]);

        } catch (\Exception $ex) {
            return redirect()->route('appointments.index')
            ->with(['error' => trans('admin.try_again')]);
        }
    }
}
