<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sake;
use App\Http\Requests\SakeRequest;

class SakenaviController extends Controller
{
     /**
     * 日本酒一覧を表示する
     * 
     * @return view
     */
    public function  showDetail()
    {
        //ログインしているユーザー情報をViewへ渡す
        $user = \Auth::user();
        //ログインユーザーごとに日本酒を一覧表示
        $sakes = Sake::where('user_id',$user['id'])->sortable()->get();
        return view('detail',['sakes' => $sakes]);
    }

    /**
     * 日本酒登録画面を表示する
     * 
     * @return view
     */
    public function showCreate() 
    {
        //ログインしているユーザー情報をViewへ渡す
        $user = \Auth::user();
        return view('form', compact('user'));
        
        
    }


    /**
     * 日本酒を登録する
     * 
     * @return view
     */
    public function exeStore(SakeRequest $request) {
        //日本酒のデータを受け取る
        $inputs = $request->all();

        \DB::beginTransaction();
        try {
            //日本酒を登録
            Sake::create($inputs);
            \DB::commit();
         } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
            }

        \Session::flash('flash_message', '日本酒登録しました');
        return redirect(route('all'));
    }


    /**
     * 日本酒ガチャ画面を表示する
     * 
     * @return view
     */
    public function showRandom() 
    {
        $user = \Auth::user();
        return view('random', compact('user'));
    }
    
    
     /**
     * 日本酒ガチャ結果を表示する
     * 
     * @return view
     */
    public function  showRandomresult()
    {
        $user = \Auth::user();
        $randomsakes = Sake::where('user_id',$user['id'])->inRandomOrder()->first();

        if (is_null($randomsakes)) {
            \Session::flash('err_msg', 'データがありません');
            return redirect(route('create'));
        }
        return view('randomresult',['randomsakes' => $randomsakes]);

    }

    /**
     * 日本酒編集画面を表示する
     * 
     * @return view
     */
    public function showEdit($id) 
    {
        //ログインしているユーザー情報をViewへ渡す
        $user = \Auth::user();
        $sake = Sake::where('id', $id)->where('user_id', $user['id'])->first();

        return view('edit',compact('sake','user'));
    }

    
    /**
     * 日本酒を更新する
     * 
     * @return view
     */
    public function exeUpdate(SakeRequest $request, $id)
    {
        $inputs = $request->all();
        // dd($inputs);
        Sake::where('id', $id)->update(['sakename' => $inputs['sakename'], 
                                        'prefecturename' => $inputs['prefecturename'],
                                        'scent' => $inputs['scent'],
                                        'acidity' => $inputs['acidity'],
                                        'taste' => $inputs['taste'],
                                        'sweetness' => $inputs['sweetness'],
                                        'score' => $inputs['score'],]);
        return redirect()->route('all');

    }

    /**
     * 日本酒を削除する
     * 
     * @return view
     */
    public function exeDelete($id)
    {
        
        Sake::where('id', $id)->delete();

        return redirect(route('all'));

    }


    
  
}
