<?php

namespace App\Http\Controllers;

use App\Models\Click;
use App\Models\Link;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ClickController extends Controller
{
    public function clickOnLink($short_link): RedirectResponse
    {
        $link = Link::where('short_link', $short_link)->firstOrFail();

        Click::create([
            'link_id' => $link->id,
            'user_ip' => request()->ip(),
            'created_at' => now(),
        ]);

        $link->increment('clicks');

        return redirect()->away($link->original_link);
    }
}
