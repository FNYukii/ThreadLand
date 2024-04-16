<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Thread;

class ThreadPageController extends Controller
{
    public function __invoke(Request $request)
    {

		// URLからthreadのidを取得
		$threadId = $request->route('threadId');

		// idがthreadIdと一致するthreadを読み取る
		$thread = Thread::where('id', $threadId)->firstOrFail();

		// このスレッドのcommentsを読み取る
		$comments = Comment::where('thread_id', $threadId)->get();

		// 変数threadと変数commentsを渡したViewを表示
		return view('thread-page')
			->with('thread', $thread)
			->with('comments', $comments);
    }
}
