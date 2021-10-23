<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;
use Illuminate\Support\Facades\Auth;

class AdController extends Controller
{
    public function index()
    {
      $ads = Ad::orderBy('id', 'desc')->paginate(5);

        return view('ads.index', compact('ads'));
    }

    public function show($id)
    {
        $ad = Ad::find($id);

        return view('ads.show', compact('ad'));
    }

    public function create(Ad $ad = null)
    {
        if(isset($ad) && $ad->user_id !==Auth::id()) {
            return redirect()->route('home');
        }

        return view('ads.form', compact('ad'));
    }

    public function save(Request $request, Ad $ad = null)
    {
        if(isset($ad) && $ad->user_id !==Auth::id()) {
            return redirect()->route('home');
        }

        $data = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
        ]);

        $data['user_id'] = Auth::id();

        Ad::updateOrCreate(['id' => $ad->id ?? null], $data);

        return redirect()->route('home');
    }

    public function delete(Ad $ad)
    {
        if($ad->user_id !==Auth::id()) {
            return redirect()->route('home');
        }

        $ad->delete();

        return redirect()->route('home');
    }
}
