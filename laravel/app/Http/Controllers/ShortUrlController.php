<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShortUrlRequest;
use App\Http\Requests\UpdateShortUrlRequest;
use App\Models\ShortUrl;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class ShortUrlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
    }

    /**
     * Show the form for creating a new shortten url.
     * 
     * @param Request $request
     * 
     * 
     */
    public function create(Request $request)
    {

        $longUrl  = $request->url; 

        if($request->provider == 'tinyurl') {

            $response = Http::withToken(env('TINY_TOKEN'))->post('http://api.tinyurl.com/create', [
                'url' => $longUrl
            ]);
        } elseif($request->provider == 'bitly') {

            $response = Http::withToken(env('BITLY_TOKEN'))->post('https://api-ssl.bitly.com/v4/shorten', [
                'domain' => env('BITLY_DOMAIN'),
                'long_url' => $longUrl
            ]);
        }
        
        return  view('welcome', ['response', $response]);
        //redirect()->back()->with('response', $response);;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShortUrlRequest $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ShortUrl $shortUrl): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShortUrl $shortUrl): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShortUrlRequest $request, ShortUrl $shortUrl): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShortUrl $shortUrl): RedirectResponse
    {
        //
    }
}
