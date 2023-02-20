<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShortUrlRequest;
use App\Http\Requests\UpdateShortUrlRequest;
use App\Models\ShortUrl;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

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
    public function create(Request $request): Response
    {
        if($request->type == 'tinyurl') {
            $response = Http::post('http://api.tinyurl.com/create', [
                'url' => $request->url,
                "domain" => env('TINY_DOMAIN'),
                "alias" => env('TINY_ALIAS'),
                "tags" => "example,link",
                "expires_at" => "2024-10-25 10:11:12"
            ]);
        }
        

        return $response;
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
