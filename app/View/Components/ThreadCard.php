<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ThreadCard extends Component
{

	public $thread; //　プロパティを宣言

	public function __construct($thread) // 引数を受け取るようにする
	{
		$this->thread = $thread; // プロパティに変数を格納
	}

	public function render()
	{
		return view('components.thread-card');
	}
}
