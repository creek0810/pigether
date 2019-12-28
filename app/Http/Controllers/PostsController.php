<?php

namespace App\Http\Controllers;

use Auth;

use App\Post;
use App\User;
use App\UserInfo;
use App\Department;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* Get the post data */
        $postDatas = Post::get();
        foreach ($postDatas as $post) {
            $tarUser = User::where('account', $post->account)
                ->get();
            if ($tarUser[0]['propic']) {
                $tarUser[0]['propic'] = base64_encode($tarUser[0]['propic']);
            }
            $cp = strpos($post->content, "@課程資訊:@");
            $tAp = strpos($post->content, "@隊友條件:@");
            $course = substr($post->content, $cp + 15, $tAp - 15);
            $courseInfo = explode("\r\n", $course);
            $teamAbility = substr($post->content, $tAp + 15);
            $teamAbilityInfo = explode("\r\n", $teamAbility);

            $post['course'] = $courseInfo;
            $post['teamAbility'] = $teamAbilityInfo;
            $post['user'] = $tarUser;
        }

        /* Get the current user */
        $userId = mb_convert_encoding(Auth::id(), 'UTF-8', 'UTF-8');
        $user = UserInfo::where('account', $userId)
            ->with('skills')
            ->get();
        if (count($user)) {
            $user[0]['propic'] = ($user[0]['propic']) ? base64_encode($user[0]['propic']) : "";
        }

        return view('pigether', [
            "postDatas" => $postDatas,
            "departments" => Department::All(),
            "user" => $user
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPost()
    {
        /* Get the post data */
        $postDatas = Post::get();
        return $postDatas;
    }

    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getOwnerByPostId(Request $request)
    {
        $account = $request->input('account');
        /* Get the post data */
        $userDatas = UserInfo::select('account', 'name', 'phone', 'email', 'line_id', 'propic')
            ->where('account', $account)
            ->get();
        if (count($userDatas)) {
            $userDatas[0]['propic'] = ($userDatas[0]['propic']) ? base64_encode($userDatas[0]['propic']) : "";
        }
        return $userDatas;
    }


    /**
     * Show the form for creating a new resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $postAccount = Auth::id();
        $postTitle = $request->input('new-post-title', "");
        $postCourse = $request->input("new-post-course", "");
        $postTeam = $request->input("new-post-team-ability", "");
        $tmpPost = new Post;
        $tmpPost->account = $postAccount;
        $tmpPost->title = $postTitle;
        $tmpPost->content = "@課程條件:@" . $postCourse . "" . "@隊友條件:@" . $postTeam;
        $tmpPost->save();

        return redirect('/pigether');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $postId =  $request->input("edit-post-id", "");
        $postAccount = Auth::id();
        $postTitle = $request->input("edit-post-title", "");
        $postCourse = $request->input("edit-post-course", "");
        $postTeam = $request->input("edit-post-team-ability", "");

        $tarPost = Post::where('id', $postId)
            ->where('account', $postAccount);

        if (count($tarPost->get()) != 0) {
            $tarPost->update([
                'title' => $postTitle,
                'content' => "@課程條件:@" . $postCourse . "" . "@隊友條件:@" . $postTeam,
            ]);
        }
        return redirect()->action('PostsController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $postId =  $request->input("edit-post-id", "");
        $postAccount = Auth::id();
        $tarPost = Post::where('id', $postId)
            ->where('account', $postAccount)
            ->delete();
        return redirect()->action('PostsController@index');
    }
}
