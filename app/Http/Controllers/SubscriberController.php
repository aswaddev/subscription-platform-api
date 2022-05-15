<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Models\Website;
use App\Services\SubscriberService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, SubscriberService $subscriberService, Website $website)
    {
        $data = $request->validate([
            'email' => ['required', 'email', Rule::unique('subscribers', 'email')->where(function ($query) use ($website) {
                $query->where('website_id', $website->id);
            })]
        ]);

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
