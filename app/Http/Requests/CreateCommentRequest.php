<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCommentRequest extends FormRequest
{
    // ログイン不要
    public function authorize()
    {
        return true;
    }


	
	// commentの各フィールドに文字数制限
    public function rules()
    {
        return [
			'threadId' => 'required',
            'userName' => 'required|max:100',
            'text' => 'required|max:300'
        ];
    }



	// 入力された値
	public function threadId(): string
	{
		return $this->input('threadId');
	}

	public function userName(): string
	{
		return $this->input('userName');
	}

	public function text(): string
	{
		return $this->input('text');
	}
}
