<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;

class TopPageController extends Controller
{
	public function __invoke(Request $request)
	{
		// Threadモデルを通してデータを読み取り
		// $threads = Thread::all();
		$threads = Thread::orderBy('created_at', 'DESC')->get();

		// 変数threadsを渡したViewを表示
		return view('top-page')
			->with('threads', $threads);
	}
}
