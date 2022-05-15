<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriberRequest;
use App\Models\Subscriber;
use App\Models\Website;
use App\Services\SubscriberService;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function index(Website $website)
    {
        return $website->subscribers;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\SubscriberRequest  $request
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function store(SubscriberRequest $request, SubscriberService $subscriberService, Website $website)
    {
        $data = $request->validated();

        $subscriber = $subscriberService->store($website, $data);

        return $subscriber;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Website  $website
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function show(Website $website, Subscriber $subscriber)
    {
        return $subscriber;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Website  $website
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function destroy(Website $website, Subscriber $subscriber)
    {
        $subscriber->delete();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Website  $website
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function unsubscribe(Website $website, Subscriber $subscriber)
    {
        $subscriber->delete();

        return back();
    }
}
