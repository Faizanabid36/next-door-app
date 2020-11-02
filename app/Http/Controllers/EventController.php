<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventCategory;
use App\EventInterest;
use App\Events\NewMessage;
use App\Http\Requests\ValidateEvent;
use Chatify\Facades\ChatifyMessenger as Chatify;
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
        if(!isset(auth()->user()->id)) abort(404);


        $categories = EventCategory::all();
        $events = Event::latest()->with('category')->get();
        $events = collect($events)->map(function ($event) {
            $interest = EventInterest::whereEventId($event->id)->get();
            $isGoing = $interest->where('user_id', auth()->user()->id)->where('interested_or_going', 1)->count();
            return collect($event)->merge(['isGoing' => $isGoing,
                'isMaybe' => $interest->where('user_id', auth()->user()->id)->where('interested_or_going', 2)->count(),
                'totalGoing' => $interest->where('interested_or_going', 1)->count(),
                'totalMaybe' => $interest->where('interested_or_going', 2)->count()]);
        });
        $page = 'all_events';
        return view('web.frontend.events.view_events', compact('page', 'categories', 'events'));
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($event)
    {
        //
        $event = Event::whereId($event)->with('category', 'creator')->firstOrFail();
        $interest = EventInterest::whereEventId($event->id)->with('users_going')->get();
        $isGoing = 0;
        $isMaybe = 0;
        if (isset(auth()->user()->id)) {
            $isGoing = $interest->where('user_id', auth()->user()->id)->where('interested_or_going', 1)->count();
            $isMaybe = $interest->where('user_id', auth()->user()->id)->where('interested_or_going', 2)->count();
        }
        $totalGoing = $interest->where('interested_or_going', 1)->count();
        $totalMaybe = $interest->where('interested_or_going', 2)->count();
        $usersGoing = collect($interest)->map(function ($int) {
            if (!is_null($int->interested_or_going))
                return $int->users_going;
        });
        $usersGoing = $usersGoing->filter(function ($value, $key) {
            return $value != null;
        })->values();
        $page = 'all_events';
        return view('web.frontend.events.single_event', compact('page', 'usersGoing', 'event', 'isGoing', 'isMaybe', 'totalGoing', 'totalMaybe'));
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

    public function remove($event_id)
    {
        $event = Event::find($event_id);
        if (($event->user_id == auth()->user()->id) || auth()->user()->admin)
            $event->delete();
        return redirect()->route('event.index')->withDeleted('Event Has Been Deleted');

    }

    public function going_to_event($event_id, $type)
    {
        $int = EventInterest::whereUserId(auth()->user()->id)->whereEventId($event_id)->first();
        if (!is_null($int) && $int->interested_or_going == $type) {
            EventInterest::updateOrCreate(
                ['event_id' => $event_id, 'user_id' => auth()->user()->id],
                ['event_id' => $event_id, 'user_id' => auth()->user()->id, 'interested_or_going' => null]);
            return $type == 2 ? ['notMaybe' => true] : ['notGoing' => true];
        } else {
            EventInterest::updateOrCreate(
                ['event_id' => $event_id, 'user_id' => auth()->user()->id],
                ['event_id' => $event_id, 'user_id' => auth()->user()->id, 'interested_or_going' => (int)$type]);
            return $type == 2 ? ['isMaybe' => true] : ['isGoing' => true];
        }
    }

    public function message(Request $request)
    {
        $messageID = mt_rand(9, 999999999) + time();

        Chatify::newMessage([
            'id' => $messageID,
            'type' => 'user',
            'from_id' => \auth()->user()->id,
            'to_id' => $request->to_user,
            'body' => trim(htmlentities($request->message_body)),
            'attachment' => null,
        ]);

        $messageData = Chatify::fetchMessage($messageID);

        Chatify::push('private-chatify', 'messaging', [
            'from_id' => auth()->user()->id,
            'to_id' => $request->to_id,
            'message' => Chatify::messageCard($messageData, 'default')
        ]);
        event(new NewMessage($messageData, \auth()->user()->id, $request->to_id));
        return back()->withSuccess('Message Send');
    }

    public function my_events()
    {
        $categories = EventCategory::all();
        $events = Event::with('category')->whereHas('creator', function ($q) {
            return $q->whereId(auth()->user()->id);
        })->get();
        $events = collect($events)->map(function ($event) {
            $interest = EventInterest::whereEventId($event->id)->get();
            return collect($event)->merge([
                'totalGoing' => $interest->where('interested_or_going', 1)->count(),
                'totalMaybe' => $interest->where('interested_or_going', 2)->count()]);
        });
        $page = 'myevents';
        return view('web.frontend.events.view_events', compact('categories', 'events', 'page'));
    }
}
