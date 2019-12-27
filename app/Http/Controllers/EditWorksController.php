<?php

namespace App\Http\Controllers;

use App\UserInfo;
use App\Works;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditWorksController extends Controller
{
    public function index(Request $request, $account, $workID) {
        $work = Works::where('id', $workID)
                     ->where('account', $account)
                     ->with('images')
                     ->first();
        foreach($work['images'] as $image) {
            $image['image'] = base64_encode($image['image']);
        }
       
        return view('editWorks', ['work' => $work]);
    }

    public function update(Request $request)
    {
        $id = $request->input("id");
        $case = $request->input("select-work");
        if ($case == 0) { //$case=0做修改
            DB::update('update works set title = ? where id = ?', array($request->input("title"), $id));
            DB::update('update works set content = ? where id = ?', array($request->input("content"), $id));
            
            $images = $request->file('images');
            if ($request->hasFile('images')) {
                foreach ($images as $item){
                    $dataImg = file_get_contents($item);
                    DB::insert('insert into works_image (work_id, image) values (?, ?)', array($id, $dataImg));
                }
            }

            return redirect()->action('EditInfoController@index', ['account' => $request->input("account")]);
        }else if($case == 1){ //$case=1做刪除
            DB::table('works_image')
                ->where('work_id', $id)
                ->delete();
            DB::table('works')
                ->where('id', $id)
                ->delete();
            
            return redirect()->action('EditInfoController@index', ['account' => $request->input("account")]);
        }else{ //$case=2做file圖片上傳
            DB::update('update works set title = ? where id = ?', array($request->input("title"), $id));
            DB::update('update works set content = ? where id = ?', array($request->input("content"), $id));

            $images = $request->file('images');
            if ($request->hasFile('images')) {
                foreach ($images as $item){
                    $dataImg = file_get_contents($item);
                    DB::insert('insert into works_image (work_id, image) values (?, ?)', array($id, $dataImg));
                }
            }
            return redirect()->action('EditWorksController@index', ['account' => $request->input("account"), 'workID' => $id]);
        }
    }

    public function deleteImage(Request $request) {
        DB::table('works_image')
                ->where('id', $request->input("imageno"))
                ->delete();

        return redirect()->action('EditWorksController@index', ['account' => $request->input("account"), 'workID' => $request->input("id")]);
    }
}