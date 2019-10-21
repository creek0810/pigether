<?php

namespace App\Http\Controllers;

use App\Works;

use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function index(Request $request, $account, $workID) {
        $work = Works::where('id', $workID)
                     ->where('account', $account)
                     ->with('images')
                     ->first();
        foreach($work['images'] as $image) {
            $image['image'] = base64_encode($image['image']);
        }
        return view('work', ['work' => $work]);
    }
}
