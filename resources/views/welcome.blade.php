@extends('auth.list')
@section('title','saketabi 日本一周')

@section('content')
<form>
    
    <div class="mainimg">
        <p1>酒ナビ</p1>
        <p2>飲んだ日本酒を記録できるサービスです<br>
            自分だけの日本酒評価を作ろう！
        </p2>
        <a href="{{ route('random') }}" class="btn-green">
            <div>　日本酒ガチャ　</div>
            
        </a><br>
        <a href="{{ route('create') }}" class="btn-green2">
            <div>日本酒を評価する</div>
            
        </a><br>
        <a href="{{ route('all') }}" class="btn-green3">
            <div>　日本酒一覧表　</div>
    
        </a>        
    </div>
</form>
@endsection