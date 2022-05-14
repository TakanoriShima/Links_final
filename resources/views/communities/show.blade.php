<!DOCTYPE html>
<html lang="ja">
 <head>
  <meta charset="UTF-8">
  <title>プロフィール登録</title>
  <link rel="stylesheet" href="{{ asset('/css/community_show.css')}}">
  </head>
<body>
  <div class="po">
    <nav>
      <ul class="nav">
        <li> <a href="/mypage">マイページ</a> <img class="top" src={{ asset("images/komyu.jpeg")}}> </li>
      </ul>
    </nav>
    <ul class="logout">
      <li> <a href="/logout">ログアウト</a> </li>
    </ul>
  </div>
  <div class="flex">
    <div class="e">コミュニティトップ</div>
    <div class="kn"><input placeholder="コミュニティを検索！"></div>
  </div>
  <div class="comyuicon"><img class="sample" src="{{ asset('/uploads')}}/{{$community->image}}"></div>
  <div class="pobutton">
    @if($community->user_id !== Auth::id() && Auth::user()->is_participate($community->id) === false)
    <div class="sanka">
      <a href="/communities/{{ $community->id }}/participations/create">コミュニティの参加申請のページへ</a>
    </div>
  </div>
  @endif
  <div class="gr">
    <div class="yellow">トップ</div>
    <div><a href="/communities/{{ $community->id }}/topics">トピックス</a></div>
    <div><a href="community_event.html">イベント</a></div>
    
    <div><a href="/communities/{{ $community->id }}/participations">承認・コミュニティ参加申請・フレンド申請</a></div>
    
  </div>
  <div class="bar"> </div>
  <div class="syosai"> </div>
  <div class="setumei"> </div>
  <div class="re">
    <div class="k"> 　管理人:{{$community->user->name}}</div>
    <div class="member"> 　参加メンバー </div>
    <div class="icon"> 　参加者アイコン </div>
    <div class="member_confirmation"><a href= "/communities/{{ $community->id }}/users">メンバーを見る</a></div>
    <div class="day"> 開設日 {{ $community->created_at }} </div>
  </div>
  <div class="grid">
    @foreach($participations as $participation)
    <div class="photoA"><img class="syoki" src="{{ asset('/uploads/' . $participation->user->profile->image)}}">
    </div>
    @endforeach
  </div>
  </div>
  <div class="grid2">
    <div class="photoB"> <img class="syoki" src="{{ asset('images/smiley.png')}}"> </div>
    <div class="photoB"> <img class="syoki" src="{{ asset('images/smiley.png')}}"> </div>
    <div class="photoB"> <img class="syoki" src="{{ asset('images/smiley.png')}}"> </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="profile.js"></script>
</body>
</html>