<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Requests\LinkStoreRequest;

class ShortLinkController extends Controller
{
    public function index()
    {
        return view('indexlinks');
    }

    public function store(LinkStoreRequest $request)
    {
        if (!isset($request->link)) {
            return redirect('/')->withSuccess('Введите ссылку');
        } else {
            $shortCode = str_shuffle(rand(0, 9) . str_random(5));
            if (ShortLink::where('shortcode', $shortCode)->exists()) {
                $shortCode = str_shuffle(rand(0, 9) . str_random(5));
            }
            $shortLink = new ShortLink;
            $shortLink->link = $request->link;
            $shortLink->shortcode = $shortCode;
            $shortLink->save();

            return view('short_link', compact('shortLink'));
        }
    }

    public function redirectLink($code)
    {
        if (ShortLink::where('shortcode', $code)->exists()) {
            $redirectLink = ShortLink::where('shortcode', $code)->first();
            return redirect($redirectLink->link);
        } else {
            return redirect('/')->withSuccess('Такой ссылки не существует');
        }
    }


}
