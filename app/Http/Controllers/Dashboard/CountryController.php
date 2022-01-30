<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Http\Requests\Dashboard\CountryRequest;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::orderBy('id', 'DESC')->paginate(25);
        return view('dashboard.country.index',compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryRequest $request)
    {
        Country::create($request->all());
        return redirect()->route('countries.index')
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
        $country = Country::find($id);

        if (!$country)
        return redirect()->route('countries.index')
        ->with(['error' => trans('admin.coun_not_found')]);
        return view('dashboard.country.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CountryRequest $request, $id)
    {
        $country = Country::find($id);
        $country->fill($request->all())->save();
        return redirect()->route('countries.index')
        ->with(['success' => trans('admin.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            //get specific categories and its translations
            $country = Country::find($id);

            if (!$country)
                return redirect()->route('countries.index')
                ->with(['error' => trans('admin.coun_not_found')]);

            $country->delete();

            return redirect()->route('countries.index')
            ->with(['success' => trans('admin.detelted_sucess')]);

        } catch (\Exception $ex) {
            return redirect()->route('countries.index')
            ->with(['error' => trans('admin.try_again')]);
        }

    }

}
