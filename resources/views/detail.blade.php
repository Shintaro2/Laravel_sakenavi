@extends('auth.list')
@section('title','日本酒一覧表')

@section('content')
          
<div class="formtitle">
  <h1>日本酒一覧</h1>
</div>

<table>
    <tr>
        <th>@sortablelink('sakename','銘柄名')</th>
        <th>@sortablelink('prefecturename','都道府県')</th>
        <th>@sortablelink('scent','香り')</th>
        <th>@sortablelink('acidity','酸味')</th>
        <th>@sortablelink('taste','味の濃さ')</th>
        <th>@sortablelink('sweetness','辛度')</th>
        <th>@sortablelink('score','総合評価')</th>
      </tr>
      @foreach($sakes as $sake)
      <tr>
        <td><a href="/edit/{{ $sake->id }}">{{ $sake->sakename }}</a><form method='POST' action="/delete/{{ $sake->id }}" onsubmit="return checkDelete()" id='delete-form'>
                @csrf
                <button class='p-0 mr-2' style='border:none;'><i id='delete-button' class="fas fa-trash"></i></button>
            </form>  </td>
        <td>{{ $sake->prefecturename }}</td>
        <td>{{ $sake->scent }}</td>
        <td>{{ $sake->acidity }}</td>
        <td>{{ $sake->taste }}</td>
        <td>{{ $sake->sweetness }}</td>
        <td>{{ $sake->score }}</td>
      </tr>
      @endforeach
</table>
<script>
function checkDelete(){
if(window.confirm('削除してよろしいですか？')){
    return true;
} else {
    return false;
}
}
</script>
@endsection