<?php

namespace App\Http\Controllers\Timetable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "123";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $timetable_id
     * @return \Illuminate\Http\Response
     */
    public function show($timetable_id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $timetable_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $timetable_id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $timetable_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($timetable_id)
    {
        //
    }
}

