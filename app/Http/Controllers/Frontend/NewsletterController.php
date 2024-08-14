<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Output;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewsletterRequest;
use App\Models\Newsletter;
use Exception;

class NewsletterController extends Controller
{
    function subscribe(NewsletterRequest $request)
    {
        try {
            Newsletter::create($request->all());
            return Output::ok('Subscription successful');
        } catch (Exception $e) {
            return Output::fails('Something went wrong');
        }
    }
}
