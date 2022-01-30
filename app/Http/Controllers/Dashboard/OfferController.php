<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\OfferRequest;
use App\Models\Offer;
use App\Models\Test;
use Illuminate\Http\Request;
use View;

class OfferController extends Controller
{
    public function __construct(){
        $this->middleware(function($request, $next){
 
            $tests = Test::get();
            View::share('tests', $tests);
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::orderBy('id', 'DESC')->paginate(25);
        return view('dashboard.offers.index',compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.offers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfferRequest $request)
    {       
        $data =  $request->all();
        $data['tests'] = json_encode($data['tests']);
        if($data['target'] == 'age'){
            $data['value'] = $data['age'];
        }else{
            $data['value'] = $data['gender'];
        }
        if($request->hasFile('image'))
        {
            $data['image'] = upload_image($request->file('image'), 'image');
        }
        Offer::create($data);
        return redirect()->route('offers.index')
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
        $offer = Offer::find($id);
        return view('dashboard.offers.show',compact('offer'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $offer = Offer::find($id);
        if (!$offer)
        return redirect()->route('offers.index')
        ->with(['error' => trans('admin.coun_not_found')]);
        return view('dashboard.offers.edit', compact('offer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OfferRequest $request, $id)
    {
        $offer = Offer::find($id);
        $data = $request->all();
        if($request->hasFile('image'))
        {
            $data['image'] = upload_image($request->file('image'), 'image');
        }
        else
        {
        $data['image'] = $offer->image;
        }
        if($data['target'] == 'age'){
            $data['value'] = $data['age'];
        }else{
            $data['value'] = $data['gender'];
        }
                
        if($data['tests'] != null)
        {
            $data['tests'] = json_encode($data['tests']);
        }
        else
        {
            $data['tests'] =[];
        }
        $offer->fill($data)->save();
        return redirect()->route('offers.index')
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
            $offer = Offer::find($id);

            if (!$offer)
                return redirect()->route('offers.index')
                ->with(['error' => trans('admin.coun_not_found')]);

            $offer->delete();

            return redirect()->route('offers.index')
            ->with(['success' => trans('admin.detelted_sucess')]);

        } catch (\Exception $ex) {
            return redirect()->route('offers.index')
            ->with(['error' => trans('admin.try_again')]);
        }

    }
}
