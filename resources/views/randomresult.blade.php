@extends('auth.list')
@section('title','ガチャ結果')

@section('content')
<div class="formtitle">
  <h1>ガチャ結果</h1>
</div>
<table>
    <tr>
        <th>銘柄名</th>
        <th>都道府県</th>
        <th>香り</th>
        <th>酸味</th>
        <th>味の濃さ</th>
        <th>辛度</th>
        <th>総合評価</th>
      </tr>
      
      <tr>
        <td>{{ $randomsakes->sakename }}</td>
        <td>{{ $randomsakes->prefecturename }}</td>
        <td>{{ $randomsakes->scent }}</td>
        <td>{{ $randomsakes->acidity }}</td>
        <td>{{ $randomsakes->taste }}</td>
        <td>{{ $randomsakes->sweetness }}</td>
        <td>{{ $randomsakes->score }}</td>
      </tr>
</table>


<a href="{{ route('random') }}" class="random-adain">
  <div>もう一度引く</div>
        </a> 
@endsection