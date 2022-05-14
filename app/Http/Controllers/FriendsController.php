<?php

namespace App\Http\Controllers;

use App\User;

use App\Friend;

use Auth;

use App\Community;

use Illuminate\Http\Request;

class FriendsController extends Controller
{
    
     public function index()
    {
        
        
        
        
        
        
        
        
        
        
    }
    
    
    
     public function create()
    {
        
        // // view の呼び出し
        // return view('friends.create', compact());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
  {
        // dd($request);
        
        $friend = new Friend();
        //送る本人のID
        $friend->user_id = \Auth::id();
        //送る相手のID
        $friend->friend_id = $request->input('user_id');
        
        $friend->save();
        
        $community_id = $request->input('community_id');
        
        $user_id = $request->input('user_id');
        
        $community = Community::find($community_id);
        
        $user = User::find($user_id);
        
        // communities/{id}/users/{user} 
        
        // トップページへリダイレクト
        return redirect('/communities/' . $community->id . '/users/' . $user->id)->with('flash_message', 'フレンド申請を送りました。');
  }
    /**
     * Display the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // // dd($topic_id);
        // $community = Community::find($community_id);
        // $topic = Topic::find($topic_id);
        // $posts = $topic->posts()->get();
        // $participation = $community->participations()->where('user_id', \Auth::id())->where('status', 1)->first();
        
        
        // //if分岐
        // // もしまだ申請していなければ
        // if($participation === null){ 
        // $participation = new Participation();
        // $participation->status = 3; // 0, 1, 2 以外の適当な値
        // }
        
        // // view の呼び出し
        // return view('topics.show', compact('topic','posts', 'participation'));
    }
    
    public function update(Request $request, $id){
        $friend = Friend::find($id);
        $status = $request->input('status');
        $friend->status = $status;
        $friend->save();
        return redirect('/mypage')->with('flash_message', 'フレンド承認・非承認を行いました。');
    }
    
    
    
    
}
