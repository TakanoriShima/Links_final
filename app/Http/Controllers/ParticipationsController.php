<?php

namespace App\Http\Controllers;

use App\Participation;//追加
use Illuminate\Http\Request;
use App\Community;//追加
use App\Friend;//追加
use App\User;

class ParticipationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function index($id)
    {
        // $user = \Auth::user();
        // $friends = $user->friends()->where('status', 0)->get();
        // dd($friends);
         // URLから取得したコミュニティ番号
        $community = Community::find($id);
        
        //そのコミュニティに参加申請・承認・却下しているユーザー一覧
        $participations = $community->participations()->where('status', 0)->get();
        
        $user  = \Auth::user();
        
        // $friends = $user->friends()->where('status', 0)->get();
        $friends = Friend::where('friend_id', \Auth::id())->where('status', 0)->get();
        // SELECT * friends WHERE friend_id=2 AND status = 0;
        
        // $user = User::find(2);
        // $friends = $user->friends()->where('status', 0)->get();
        
        // dd($friends);
        
        return view("participations.index", compact('participations','community', 'user', 'friends'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // コミュニティインスタンスを取得
        $community = Community::find($id);
        //空の申請インスタンスの作成
        $participation = new Participation();
        //viewの呼び出し
        return view("participations.create", compact('participation','community'));
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
        
        $community_id = $request->input('community_id');
        
        $participation = new Participation();
        
        $participation->community_id = $community_id;
        
        $participation->user_id = \Auth::id();
        
        $participation->save();
        
        // トップページへリダイレクト
         return redirect('/communities/' . $community_id)->with('flash_message', '参加申請しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Participation  $participation
     * @return \Illuminate\Http\Response
     */
    public function show(Participation $participation)
    {
        
        
        
        
    //
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Participation  $participation
     * @return \Illuminate\Http\Response
     */
    public function edit(Participation $participation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Participation  $participation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request);
        $participation_id = $request->input('id');
        $participation = Participation::find($participation_id);
        $status = $request->input('status');
        $participation->status = $status;
        $participation->save();

        // トップページへリダイレクト
        return redirect('/communities/' . $participation->community_id)->with('flash_message', '参加承認・非承認しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Participation  $participation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participation $participation)
    {
        //
    }
}
