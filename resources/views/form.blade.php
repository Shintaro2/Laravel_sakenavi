@extends('auth.list')
@section('title','日本酒一覧')

@section('content')
@if (session('err_msg'))
    <div class="alert alert-danger">
        {{ session('err_msg') }}
    </div>
@endif
<div class="formtitle">
    <p1>日本酒を評価する</p1>
</div>

<div class="box_con04">
    <form method="POST" action="{{ route('store') }}" onsubmit="return checkSubmit()">
    @csrf
    <input type='hidden' name='user_id' value="{{ $user['id'] }}">
    <ul class="formTable">
   
    <li>
        <p class="title"><em>銘柄名<span>必須</span></em></p>
        <div class="box_det"><input size="20" type="text" class="wide" name="sakename"/>
           @if ($errors->has('sakename'))
            <div class="texst-danger">
                {{ $errors->first('sakename') }}
            </div>
            @endif
        </div>
    </li>
    
    <li>
        <p class="title"><em>都道府県</em></p>
        <div class="box_det"><select name="prefecturename">
            <option value="">選択してください</option>
            <option value="北海道">北海道</option>
            <option value="青森県">青森県</option>
            <option value="秋田県">秋田県</option>
            <option value="岩手県">岩手県</option>
            <option value="山形県">山形県</option>
            <option value="宮城県">宮城県</option>
            <option value="福島県">福島県</option>
            <option value="茨城県">茨城県</option>
            <option value="栃木県">栃木県</option>
            <option value="群馬県">群馬県</option>
            <option value="埼玉県">埼玉県</option>
            <option value="千葉県">千葉県</option>
            <option value="東京都">東京都</option>
            <option value="神奈川県">神奈川県</option>
            <option value="新潟県">新潟県</option>
            <option value="富山県">富山県</option>
            <option value="石川県">石川県</option>
            <option value="福井県">福井県</option>
            <option value="山梨県">山梨県</option>
            <option value="長野県">長野県</option>
            <option value="岐阜県">岐阜県</option>
            <option value="静岡県">静岡県</option>
            <option value="愛知県">愛知県</option>
            <option value="三重県">三重県</option>
            <option value="滋賀県">滋賀県</option>
            <option value="京都府">京都府</option>
            <option value="大阪府">大阪府</option>
            <option value="兵庫県">兵庫県</option>
            <option value="奈良県">奈良県</option>
            <option value="和歌山県">和歌山県</option>
            <option value="鳥取県">鳥取県</option>
            <option value="島根県">島根県</option>
            <option value="岡山県">岡山県</option>
            <option value="広島県">広島県</option>
            <option value="山口県">山口県</option>
            <option value="徳島県">徳島県</option>
            <option value="香川県">香川県</option>
            <option value="愛媛県">愛媛県</option>
            <option value="高知県">高知県</option>
            <option value="福岡県">福岡県</option>
            <option value="佐賀県">佐賀県</option>
            <option value="長崎県">長崎県</option>
            <option value="熊本県">熊本県</option>
            <option value="大分県">大分県</option>
            <option value="宮崎県">宮崎県</option>
            <option value="鹿児島県">鹿児島県</option>
            <option value="沖縄県">沖縄県</option>
          </select>
          @if ($errors->has('prefecturename'))
            <div class="texst-danger">
                {{ $errors->first('prefecturename') }}
            </div>
            @endif
        </div>
      </li>
      <li>
        <p class="title"><em>香り<br>(10点満点)</em></p>
        <div class="box_det"><select name="scent">
            <option value="">選択してください</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
          </select>
          @if ($errors->has('scent'))
            <div class="texst-danger">
                {{ $errors->first('scent') }}
            </div>
            @endif
        </div>
      </li>
      <li>
         <p class="title"><em>酸味<br>(10段階評価)</em></p>
         <div class="box_det"><select name="acidity">
            <option value="">選択してください 1=弱い 10=強い</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
           </select>
           @if ($errors->has('acidity'))
            <div class="texst-danger">
                {{ $errors->first('acidity') }}
            </div>
            @endif
          </div>
       </li>
      <li>
        <p class="title"><em>味の濃さ<br>(10段階評価)</em></p>
        <div class="box_det"><select name="taste">
            <option value="">選択してください 1=弱い 10=強い</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
          </select>
          @if ($errors->has('taste'))
            <div class="texst-danger">
                {{ $errors->first('taste') }}
            </div>
            @endif
        </div>
      </li>
      <li>
        <p class="title"><em>辛さ<br>(10段階評価)</em></p>
        <div class="box_det"><select name="sweetness">
            <option value="">選択してください 1=甘い 10=辛い</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
          </select>
          @if ($errors->has('sweetness'))
            <div class="texst-danger">
                {{ $errors->first('sweetness') }}
            </div>
            @endif
        </div>
      </li>
      <li>
          
        <p class="title"><em>総合評価<br>(10点満点）</em></p>
        <div class="box_det"><select name="score">
            <option value="">選択してください</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
          </select>
          @if ($errors->has('score'))
            <div class="texst-danger">
                {{ $errors->first('score') }}
            </div>
            @endif
        </div>
      </li>
    </ul>
    
    <p class="btn">
        <span><input type="submit" value=" 登録する " /></span>
    </p>
    
  </form>
</div>
<script>
function checkSubmit(){
if(window.confirm('送信してよろしいですか？')){
    return true;
} else {
    return false;
}
}
</script>
@endsection