<!DOCTYPE html>
<html lang="ja">
 <head>
  <meta charset="UTF-8">
  <title>申請・承認一覧</title>
  <link rel="stylesheet" href="{{ asset('./css/community_approval.css')}}">
  </head>
<body>
  <div class="po">
    <nav>
      <ul class="nav">
        <li> <a href="/mypage">マイページ</a> <img class="top" src="{{ asset('images/komyu.jpeg')}}" alt="マイページ"> </li>
      </ul>
    </nav>
    <ul class="logout">
      <li> <a href="/logout">ログアウト</a> </li>
    </ul>
  </div>
  <div class="flex">
    <div class="e">コミュニティ承認ページ</div>
    <div class="kn"><input placeholder="コミュニティを検索！"></div>
  </div>
  <div class="comyuicon"><img class="comyu_img" src="{{ asset('uploads/' . $community->image)}}"></div>
  <div class="pobutton">
    <div class="sanka"> 参加する </div>
  </div>
  <div class="gr">
    <div><a href="/communities/{{ $community->id }}">トップ</a></div>
    <div><a href="/communities/{{ $community->id }}/topics">トピックス</a></div>
    <div><a href="community_event.html">イベント</a></div>
    <div class="yellow">承認・コミュニティ参加申請・フレンド申請</div>
  </div>
  <div class="bar"> </div>
  @if($community->user_id === Auth::id())
  <div class="gr2">
    <div>
      <table class="sinsei">
        <tr>
          <th colspan="3" class="orange">コミュニティ参加申請一覧</th>
        </tr>
        <tr>
          <th colspan="3">申請{{ count($participations) }}件</th>
        </tr>
        @foreach($participations as $participation)
        <tr>
          <form action="/communities/{{$participation->community->id }}/participations/{{ $participation->id }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="id" value="{{ $participation->id }}">
            <th class="grey">{{ $participation->created_at }}</th>
            <th>{{ $participation->user->name }}</th>
            <th><input type="radio" name="status" value="1" checked>承認する<input type="radio" name="status" value="2">承認しない</th>
            <th><input type="submit" value="決定"></th>
          </form>
        </tr>
        @endforeach
      </table>
    </div>
    @endif
    <div>
      <table class="sinsei">
        <tr>
          <th colspan="3" class="orange">フレンド申請一覧</th>
        </tr>
        <tr>
          <th colspan="3">申請{{ count($friends) }}件</th>
        </tr>
        @foreach($friends as $friend)
        <tr>
         <form action="/friends/{{ $friend->id }}" method="POST">
           <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <th class="grey">{{ $friend->created_at }}</th>
          <th>{{ $friend->user_id}}</th>
          <th>{{ $friend->user->name}}</th>
          <th><input type="radio" name="status" value="1" checked>承認する<input type="radio" name="status" value="2">承認しない</th>
        </tr>
        <th><input type="submit" value="決定"></th>
       </form>
       @endforeach
      </table>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="profile.js"></script>
</body>
</html>