<?php

namespace App\Services;

class SubscriberService
{
    public function store($website, $data)
    {
        return $website->subscribers()->create($data);
    }
}
