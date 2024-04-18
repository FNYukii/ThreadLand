<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Models\Comment;

class CreateCommentController extends Controller
{

    public function __invoke(CreateCommentRequest $request)
    {
        
		// 新しいcommentを作成
		$comment = new Comment();
		$comment->thread_id = $request->threadId();
		$comment->user_name = $request->userName();
		$comment->text = $request->text();

		// データベースに保存
		$comment->save();

		// スレッドページに戻る
		return redirect("/threads/{$request->threadId()}");
    }
}
