<?php

namespace App\Http\Controllers;

use App\UserInfo;
use App\UserSkills;
use App\Personality;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditInfoController extends Controller
{
    public function index(Request $request, $account)
    {
        $info = UserInfo::with('skills', 'departmentDetail', 'works', 'personality')
                        ->where('account', $account)
                        ->first();
        // convert image
        $info->propic = base64_encode($info->propic);
        $info->department = $info->departmentDetail;
        if($info->gender == 'female') {
            $info->gender = "女";
        } else if($info->gender == 'male') {
            $info->gender = "男";
        } else {
            $info->gender = "未知";
        }
        foreach($info['personality'] as $personality){
            $personality['personality'] .= "\n";
        }
        foreach($info['skills'] as $skill){
            $skill['skill'] .= "\n";
        }
        return view('editInfo', ['info' => $info]);
    }
    
    public function update(Request $request) 
    {
        
        $info["skill"] = UserSkills::where('account', $request->input("account"))
                                    ->delete();

        $info["personality"] = Personality::where('account', $request->input("account"))
                                            ->delete();

        DB::update('update users set account = ? where account = ?', array($request->input("account"), $request->input("accountOld")));
        DB::update('update users set password = ? where account = ?', array($request->input("password"), $request->input("account")));
        DB::update('update users set name = ? where account = ?', array($request->input("name"), $request->input("account")));
        DB::update('update users set department = ? where account = ?', array($request->input("department"), $request->input("account")));
        DB::update('update users set grade = ? where account = ?', array($request->input("grade"), $request->input("account")));
        DB::update('update users set gender = ? where account = ?', array($request->input("gender"), $request->input("account")));
        DB::update('update users set email = ? where account = ?', array($request->input("email"), $request->input("account")));
        DB::update('update users set phone = ? where account = ?', array($request->input("phone"), $request->input("account")));
        DB::update('update users set line_id = ? where account = ?', array($request->input("line_id"), $request->input("account")));
        DB::update('update users set updated_at = ? where account = ?', array(new \DateTime("now"), $request->input("account")));

        $str = $request->input("skill");
        $str_skill = explode("\r\n", $str);
        $count = count($str_skill);
        for ($i=0;$i<$count;$i++){
            DB::insert('insert into skills (account, skill) values (?, ?)', array($request->input("account"), $str_skill[$i]));
        }

        $str1 = $request->input("personality");
        $str_personality = mb_split("\r\n", $str1);
        $count1 = count($str_personality);
        for ($j=0;$j<$count1;$j++){
            DB::insert('insert into personality (account, personality) values (?, ?)', array($request->input("account"), $str_personality[$j]));
        }

        if ( $request->hasFile('propic') ) {
            $uploadfile = $request->file('propic');
            $data = file_get_contents($uploadfile);
            DB::update('update users set propic = ? where account = ?', array($data, $request->input("account")));
        }
        
        return redirect()->action('EditInfoController@index', ['account' => $request->input("account")]);
    }

    public function newWork(Request $request)
    {
        $id = DB::table('works')->insertGetId([
           'account' => $request->input("account"),
            'title' => $request->input("title"),
            'content' => $request->input("content")
        ]);
        
        $images = $request->file('images');
        if ($request->hasFile('images')) {
            foreach ($images as $item){
                $dataImg = file_get_contents($item);
                DB::insert('insert into works_image (work_id, image) values (?, ?)', array($id, $dataImg));
            }
        }
        return redirect()->action('EditInfoController@index', ['account' => $request->input("account")]);
    }
}