<?php

namespace App\Http\Controllers;

use App\Models\Disabled_day;
use App\Models\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('event.index');
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
        // request()->validate(Event::$rules);
        $event=Event::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {        
        $event = DB::table('users')      
            ->leftJoin('user_plans', 'user_plans.user_id', '=', 'users.id')
            ->leftJoin('reservations', 'reservations.users_plan_id', '=', 'user_plans.id')
            ->select('reservations.reservation_start as start','reservations.reservation_end as end','reservations.title as title')   
            ->where('users.id',Auth::user()->id)
            ->get();           
        return response()->json($event);        
    }
    public function showx(Event $event)
    {
        $eventx = DB::table('disabled_days')
                    ->select('day as start','title')
                    ->get();
                    return response()->json($eventx);       
    }
    public function shown(Event $event)
    {
        $eventn=Event::all();       
        return response()->json($eventn);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event,$id)
    {
        $event=Event::find($id);
        $event->start = Carbon::createFromFormat('Y-m-d H:i:s',$event->start)->format('Y-m-d');
        $event->end = Carbon::createFromFormat('Y-m-d H:i:s',$event->end)->getIsoFormats('Y-m-d');
        return response()->json($event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $event->update($request->all());
        return response()->json($event);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event,$id)
    {
        $event=Event::find($id)->delete();
        return response()->json($event);
    }
}
