<!DOCTYPE html>
<html lang="ja">
 <head>
  <meta charset="UTF-8">
    <title>マイプロフィール</title>
    <link rel="stylesheet" href="{{ asset('/css/myprofile.css')}}">
  </head>
  <body>
    <div class="po">
      <nav>
        <ul class="nav">
          <li>
            <a href="/mypage">マイページ</a>
            <img class="top" src="{{ asset('/images/komyu.jpeg')}}" alt="マイページ">
          </li>
        </ul>
      </nav>
      <ul class="logout">
        <li>
          <a href="/logout">ログアウト</a>
        </li>
      </ul>
    </div>
    <div class="image">
      <img class="sample" src="{{ asset('/uploads')}}/{{ $profile->image }}">
    </div>
    <div class="friend">
      <ul>
        <li>フレンド一覧</li>
      </ul>
    </div>
    <div class="photogr">
        @foreach($friends as $friend)
        <div class="photoA"><img class="syoki" src="{{ asset('/uploads/' . App\User::find($friend->friend_id)->profile->image)}}">
        </div>
        @endforeach
    <!--  <div class="photoA">-->
    <!--    <img class="syoki" src="{{ asset('/images/smiley.png') }}" alt="フレンド">-->
    <!--  </div>-->
    <!--  <div class="photoA">-->
    <!--    <img class="syoki" src="{{ asset('/images/smiley.png') }}" alt="フレンド">-->
    <!--  </div>-->
    <!--  <div class="photoA">-->
    <!--    <img class="syoki" src="{{ asset('/images/smiley.png') }}" alt="フレンド">-->
    <!--  </div>-->
    <!--</div>-->
    <!--<div class="photogr2">-->
    <!--  <div class="photoB">-->
    <!--    <img class="syoki" src="{{ asset('/images/smiley.png') }}" alt="フレンド">-->
    <!--  </div>-->
    <!--  <div class="photoB">-->
    <!--    <img class="syoki" src="{{ asset('/images/smiley.png') }}" alt="フレンド">-->
    <!--  </div>-->
    <!--  <div class="photoB">-->
    <!--    <img class="syoki" src="{{ asset('/images/smiley.png') }}" alt="フレンド">-->
    <!--  </div>-->
    </div>
      <table class="example">
        <tr>
          <th colspan="2">プロフィール
          </th>
        </tr>
        <tr>
          <th>名前
          </th>
          <th>
              {{ \Auth::user()->name }}
          </th>
        </tr>
        <tr>
          <th>性別
          </th>
          <th>
            {{ $profile->gender == 'man' ? '男性' : '女性' }}
          </th>
        <tr>
          <th>住んでいる場所
          </th>
          <th>
            {{ $profile->address }}
          </th>
        <tr>
          <th>趣味
          </th>
          <th>
            {{ $profile->hobby }}
          </th>
        <tr>
          <th>自己紹介
          </th>
          <th>
              {{ $profile->introduction }}
          </th>
        </tr>
      </table>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('/js/profile.js') }}"></script>
  </body>
</html>




