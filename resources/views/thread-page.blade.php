<!DOCTYPE html>
<html lang="ja" class="h-full">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{ $thread->title }} - Thread Land</title>
	@vite('resources/css/app.css')
</head>

<body class="bg-purple-200 h-full">

	<x-header />

	<main class="mx-auto   w-full px-4 xl:w-[1200px] xl:px-0">

		<!-- Title Bar -->
		<div class="mt-8   flex justify-between items-center">

			<h1 class="text-2xl font-bold">{{ $thread->title }}</h1>

			<button id="open-modal-button" class="text-purple-500   -my-1 -mx-4   py-1 px-4 rounded-full cursor-pointer   hover:bg-purple-300 transition">新しいコメント</button>
		</div>


		<!-- Comments Section -->
		<div class="mt-4   bg-white rounded-xl p-8   flex flex-col gap-4">

			@foreach($comments as $comment)
			<div>
				<div class="flex gap-2">
					<p class="font-bold">{{ $comment->user_name }}</p>
					<p class="text-neutral-500">{{ $comment->created_at }}</p>
				</div>

				<p class="mt-1">{{ $comment->text }}</p>
			</div>
			@endforeach



			@if (count($comments) === 0)
			<div class="py-8">
				<p class="text-neutral-500 text-center">コメントはまだありません</p>
			</div>
			@endif
		</div>

	</main>



	<x-footer />



	<!-- コメント追加モーダル -->
	<form id="modal" action="/threads/new" method="post" class="hidden">

		@csrf

		<div class="fixed top-0 left-0 w-screen h-screen   flex justify-center items-center">

			<button id="close-modal-button" type="button" class="w-screen h-screen bg-black/30   cursor-default"></button>

			<div class="absolute    w-[400px]  bg-white p-8 rounded-xl">

				<p class="text-xl font-bold">新しいコメント</p>

				<input type="text" name="threadId" value=" {{ $thread->id }}" hidden>

				<input id="user-name-input" type="text" name="userName" placeholder="ユーザーネーム" autocomplete="off" class="mt-4   w-full py-2   border-b border-neutral-300   focus:outline-none focus:border-purple-500">
				<textarea id="text-input" name="text" placeholder="コメント" rows="3" class="mt-2   w-full py-2   border-b border-neutral-300   resize-none   focus:outline-none focus:border-purple-500"></textarea>

				<div class="mt-4 flex justify-end">
					<button id="submit-button" type="submit" disabled class="text-purple-500   -my-1 -mx-4 py-1 px-4 rounded-full font-bold   disabled:text-neutral-400   enabled:hover:bg-purple-200 transition">追加</button>
				</div>
			</div>
		</div>
	</form>



	<script>
		
		// モーダルを開く
		document.getElementById('open-modal-button').addEventListener("click", () => {

			document.getElementById('modal').className = "block"
			document.getElementById('user-name-input').focus()
		})

		// モーダルを閉じる
		document.getElementById('close-modal-button').addEventListener("click", () => {

			document.getElementById('modal').className = "hidden"
		})



		// 入力値チェック
		const userNameInput = document.getElementById('user-name-input')
		const textInput = document.getElementById('text-input')
		const submitButton = document.getElementById('submit-button')

		function onInput() {

			const userName = userNameInput.value
			const text = textInput.value

			if (userName !== "" && userName.length <= 100 && text !== "" && text.length <= 300) {

				submitButton.disabled = false
				return
			}

			submitButton.disabled = true
		}

		userNameInput.addEventListener("input", onInput)
		textInput.addEventListener("input", onInput)

	</script>


</body>

</html>