<?php

namespace App\Http\Controllers;

use App\Http\Requests\Link\LinkRequest;
use App\Models\Link;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;


class LinkController extends Controller
{
    public function createLink(LinkRequest $request): RedirectResponse
    {
        $link = Link::create($request->validated());

        if ($link)
            return redirect()->route('dashboard');

        return back()->withErrors(['error' => 'Не удалось сохранить ссылку.']);
    }
}
