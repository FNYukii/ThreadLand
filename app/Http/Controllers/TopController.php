<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;

class TopController extends Controller
{
	public function __invoke(Request $request)
	{
		// Threadモデルを通してデータを読み取り
		$threads = Thread::all();

		// 変数threadsを渡したViewを表示
		return view('top')
			->with('threads', $threads);
	}
}
