<?php

namespace App\Http\Controllers;

use App\phone_number;
use Illuminate\Http\Request;

class PhoneNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Eager loading
        //$phoneNumber = phone_number::where('phone_number', '0123654789')->first();
        //$phoneNumber->user->name

        $phoneNumber = phone_number::get();

        return view('admin.phonenumber.index', compact('phoneNumber'));
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
        //$request->user()->phone_number();
        //$request->user()->phone_number()->get();



        //$request->user()->phone_number()->create([
        //    'phone_number' => '0123456789',
        //]);

        $phoneNumber = new phone_number();
        $phoneNumber->phone_number = $request->phone_number;
        $phoneNumber->user()->associate( $request->user() );
        $phoneNumber->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\phone_number  $phone_number
     * @return \Illuminate\Http\Response
     */
    public function show(phone_number $phone_number)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\phone_number  $phone_number
     * @return \Illuminate\Http\Response
     */
    public function edit(phone_number $phone_number)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\phone_number  $phone_number
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, phone_number $phone_number)
    {
        $PhoneNumber = phone_number::find(1);

        $PhoneNumber->update([

        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\phone_number  $phone_number
     * @return \Illuminate\Http\Response
     */
    public function destroy(phone_number $phone_number)
    {
        //
    }
}
