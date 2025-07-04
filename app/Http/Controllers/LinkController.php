<?php

namespace App\Http\Controllers;

use App\Http\Requests\Link\LinkRequest;
use App\Models\Click;
use App\Models\Link;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;


class LinkController extends Controller
{
    public function createLink(LinkRequest $request): RedirectResponse
    {
        $link = $request->validated();
        $link['user_id'] = Auth::id();

        $link = Link::create($link);

        if ($link)
            return redirect()->route('lk');

        return back()->withErrors(['error' => 'Не удалось сохранить ссылку.']);
    }

    public function getLinks(): View
    {
        $links = Link::where('user_id', auth()->id())->get();

        return view('pages.user.lk', compact('links'));
    }

    public function getStatistic(Link $link): View
    {
        $user = auth()->user();

        if ($link->user_id !== $user->id) {
            abort(403);
        }

        $link->load('clicksRelation');

        return view('pages.user.statistic', compact('link'));
    }



    public function deleteLink(Link $link): RedirectResponse
    {
        if($link->user_id !== auth()->id())
            abort(403);
        $link->delete();
        return redirect()->route('lk');
    }
}
