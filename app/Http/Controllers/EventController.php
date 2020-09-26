<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventCategory;
use App\EventInterest;
use App\Http\Requests\ValidateEvent;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //
//        $user = auth()->user()->whereHas('going_to_events', function ($q) {
//            return $q->where('interested_or_going', 1);
////        })->get();
//        $interests = auth()->user()->going_to_events->whereNotNull('interested_or_going')->get('');
//        return compact('interests');
        $categories = EventCategory::all();
        $events = Event::with('category')->get();
        $events = collect($events)->map(function ($event) {
            $interest = EventInterest::whereEventId($event->id)->get();
            $totalGoing = $interest->where('interested_or_going', 1)->count();
            $totalMaybe = $interest->where('interested_or_going', 2)->count();
            $isGoing = $interest->where('user_id', auth()->user()->id)->where('interested_or_going', 1)->count();
            $isMaybe = $interest->where('user_id', auth()->user()->id)->where('interested_or_going', 2)->count();
            return collect($event)->merge(['isGoing' => $isGoing, 'isMaybe' => $isMaybe, 'totalGoing' => $totalGoing, 'totalMaybe' => $totalMaybe]);
        });
//        return compact('events');
        return view('web.frontend.events.view_events', compact('categories', 'events'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateEvent $request)
    {
        $path = storeImage($request->file('banner_2'), 'events/' . auth()->user()->id);
        $addr = get_address($request->get('event_postal_code'));
        if (isset($addr['error']))
            $request->merge(['event_location' => null]);
        else
            $request->merge(['event_location' => $addr]);
        $data = $request->merge(['event_cover_photo' => $path,'user_id'=>auth()->user()->id])->except('banner_2');
        Event::create($data);
        return back()->withSuccess('Event Posted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Event $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Event $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Event $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Event $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }

    public function event_interest($event_id)
    {
        $int = EventInterest::whereUserId(auth()->user()->id)->whereEventId($event_id)->first();
        if (is_null($int) || is_null($int->interested_or_going)) {
            EventInterest::updateOrCreate(
                ['event_id' => $event_id, 'user_id' => auth()->user()->id],
                ['event_id' => $event_id, 'user_id' => auth()->user()->id, 'interested_or_going' => 1]);
            return ['isGoing' => true];
        } else {
            EventInterest::updateOrCreate(
                ['event_id' => $event_id, 'user_id' => auth()->user()->id],
                ['event_id' => $event_id, 'user_id' => auth()->user()->id, 'interested_or_going' => null]);
            return ['notGoing' => true];
        }
    }
}
