<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateThreadRequest extends FormRequest
{

	// ログイン不要
    public function authorize()
    {
        return true;
    }

	// threadのtitleに文字数制限
    public function rules()
    {
        return [
            'title' => 'required|max:100'
        ];
    }



	// 入力されたtitleの値
	public function title(): string
	{
		return $this->input('title');
	}
}
