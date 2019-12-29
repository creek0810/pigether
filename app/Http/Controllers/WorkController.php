<?php

namespace App\Http\Controllers;

use App\Works;
use App\Department;

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
        $line = array("\r\n", "\n", "\r");
        $work->content = str_replace($line, '<br>', $work->content);
        return view('work', ['work' => $work, "departments" => Department::All()]);
    }
}
