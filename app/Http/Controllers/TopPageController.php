<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Thread;

class TopPageController extends Controller
{
	public function __invoke(Request $request)
	{
		// Threadモデルを通してデータを読み取り
		// $threads = Thread::all();
		$threads = Thread::orderBy('created_at', 'DESC')->get();



		// 最初のコメントの内容やコメント数の情報も含んだthreadの配列
		$expandedThreads = array();

		foreach($threads as $thread) {

			// 最初のコメントのtext
			$firstComment = Comment::where('thread_id', $thread->id)->orderBy('created_at', 'ASC')->first();
			$firstCommentText = $firstComment->text ?? "";

			// コメント数
			$commentCount = Comment::where('thread_id', $thread->id)->count();

			// 変数expandedThreadを宣言し、thread, firstCommentText, commentCountを格納していく
			$expandedThread = $thread;
			$expandedThread->firstCommentText = $firstCommentText;
			$expandedThread->commentCount = $commentCount;

			// 変数expandedThreadを配列expandedThreadsに追加
			array_push($expandedThreads, $expandedThread);
		}

		// 変数threadsを渡したViewを表示
		return view('top-page')
			->with('threads', $threads);
	}
}
