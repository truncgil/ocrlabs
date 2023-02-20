<?php

namespace Tests\Unit;

use Tests\TestCase;

class BitlyShortLinkControllerTest extends TestCase
{
    /**
     * Tiny url short link status
     */
    public function testCreateBitlyUrlShortLinkStatusOk(): void
    {
        $response = $this->call('POST', '/shortlinks', [
            'url' => 'https://truncgil.com.tr',
            'provider' => 'bitly'
        ]);

        $response->assertStatus($response->status(), 200);
    }
}
