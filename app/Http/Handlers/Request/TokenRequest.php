<?php

namespace App\Http\Handlers\Request;

use Illuminate\Http\Request;
use Spotify\Payload\TokenPayload;

class TokenRequest implements TokenPayload
{
    public const CLIENT_ID = 'clientId';
    public const CLIENT_SECRET = 'clientSecret';

    private Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function clientId(): string
    {
        return $this->request->input(self::CLIENT_ID);
    }

    public function clientSecret(): string
    {
        return $this->request->input(self::CLIENT_SECRET);
    }

    public function validate()
    {
        $this->request->validate([
            self::CLIENT_ID => 'required',
            self::CLIENT_SECRET => 'required',
        ]);
    }
}
