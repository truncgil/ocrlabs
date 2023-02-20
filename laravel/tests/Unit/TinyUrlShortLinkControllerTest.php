<?php

namespace Tests\Unit;

use Tests\TestCase;

class TinyUrlShortLinkControllerTest extends TestCase
{
    /**
     * Tiny url short link status
     */
    public function testCreateTinyUrlShortLinkStatusOk(): void
    {
        $response = $this->call('POST', '/shortlinks', [
            'url' => 'https://truncgil.com.tr',
            'provider' => 'tinyurl'
        ]);

        $response->assertStatus($response->status(), 200);
    }
}
