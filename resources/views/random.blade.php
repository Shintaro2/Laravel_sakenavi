@extends('auth.list')
@section('title','日本酒ガチャ')

@section('content')
<form>
    <div class="gacha">
        <p2>日本酒ガチャ</p2><br>
        <p3>自分が評価した日本酒でガチャが引けます<br>
            今日飲む一杯をガチャろう！！
        </p3>
        
        <a href="{{ route('randomresult') }}" class="random-btn">ガチャを引く</a> 
    </div>
</form>
@endsection
