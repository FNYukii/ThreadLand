<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateThreadRequest;
use App\Models\Thread;

class CreateThreadController extends Controller
{

    public function __invoke(CreateThreadRequest $request)
    {
		// 新しいThreadを作成
        $thread = new Thread();
		$thread->title = $request->title();

		// データベースに保存
		$thread->save();
		return redirect('/');
    }
}
