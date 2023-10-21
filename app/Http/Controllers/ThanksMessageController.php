<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreThanksMessageRequest;
use App\Http\Requests\UpdateThanksMessageRequest;
use App\Models\ThanksMessage;
use App\Models\User;

class ThanksMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('thanks-message.index', ['users' => User::all(),]);
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
     * @param  \App\Http\Requests\StoreThanksMessageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreThanksMessageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ThanksMessage  $thanksMessage
     * @return \Illuminate\Http\Response
     */
    public function show(ThanksMessage $thanksMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ThanksMessage  $thanksMessage
     * @return \Illuminate\Http\Response
     */
    public function edit(ThanksMessage $thanksMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateThanksMessageRequest  $request
     * @param  \App\Models\ThanksMessage  $thanksMessage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateThanksMessageRequest $request, ThanksMessage $thanksMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ThanksMessage  $thanksMessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ThanksMessage $thanksMessage)
    {
        //
    }
}