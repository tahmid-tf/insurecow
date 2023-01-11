<?php

namespace App\Http\Controllers;

use App\Quotation;
use Illuminate\Http\Request;

class CompanyQuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Quotation::where('user_id',auth()->user()->id)->orderBy('id','desc')->first() == null){
//            return redirect()->route('quotation.index');
            return  view('company.quotation');
        }else{
            $quotation = Quotation::where('user_id',auth()->user()->id)->orderBy('id','desc')->first();
            return redirect()->route('quotation.edit',$quotation);
//            return view('company.edit_quotation',compact('quotation'));

        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = \request()->validate([

            'contents' => 'required',
            'signature' => 'required',

        ]);
//        if (request('logo')) {
//            $inputs['logo'] = \request('logo')->store('images');
//        }

        if (request('signature')) {
            $inputs['signature'] = \request('signature')->store('images');
        }


        $inputs['user_id'] = auth()->user()->id;


//        $policy= new Policy();
        Quotation::where('user_id', auth()->user()->id)->create($inputs);
        return  redirect()->back()->with('qts','Quotations set successfully');
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
        $quotation = Quotation::where('user_id',auth()->user()->id)->orderBy('id','desc')->first();
        return view('company.edit_quotation', compact('quotation'));
//        return  redirect()->route('quotation.edit',$quotation->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {



        $inputs = [

            'contents' => 'required',
            'signature' => 'mimes:jpeg,bmp,png,webp',

        ];



        $this->validate($request,$inputs);

        $quotation=Quotation::find($id);

        $quotation->contents=$request->contents;


        if (request('signature')) {
            $quotation['signature'] = \request('signature')->store('images');
        }else {
            $quotation['signature'] = $quotation->signature;
        }






        $quotation->save();
        return redirect()->route('company.index')->with('alt','Profile Edit successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
