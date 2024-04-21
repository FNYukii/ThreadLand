<!DOCTYPE html>
<html lang="ja" class="h-full">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Thread Land</title>
	@vite('resources/css/app.css')
</head>

<body class="bg-purple-200 h-full">

	<x-header />



	<main class="mx-auto   w-full px-4 xl:w-[1200px] xl:px-0">

		<!-- Title Bar -->
		<div class="mt-8   flex justify-between items-center">

			<h1 class="text-2xl font-bold">スレッド</h1>

			<button id="open-modal-button" class="text-purple-500   -my-1 -mx-4   py-1 px-4 rounded-full cursor-pointer   hover:bg-purple-300 transition">新しいスレッド</button>
		</div>



		<!-- Threads Section -->
		<div class="mt-4   grid grid-cols-3 gap-6">

			@foreach($threads as $thread)
			<a href="/threads/{{ $thread->id }}" class="block rounded-xl bg-white p-6    flex flex-col gap-2   hover:bg-neutral-100 hover:scale-95 transition">

				<p class="font-bold">{{ $thread->title }}</p>

				@if ($thread->firstCommentText !== "")
				<p>{{ $thread->firstCommentText }}</p>
				@endif

				<p class="text-neutral-500">{{ $thread->commentCount }} コメント</p>
			</a>
			@endforeach
		</div>

		@if (count($threads) === 0)
		<p class="text-neutral-500 text-center">スレッドはまだありません</p>
		@endif

	</main>



	<x-footer />



	<!-- スレッド追加モーダル -->
	<form id="modal" action="/new" method="post" class="hidden">

		@csrf

		<div class="fixed top-0 left-0 w-screen h-screen   flex justify-center items-center">

			<button type="button" id="close-modal-button" class="w-screen h-screen bg-black/30"></button>

			<div class="absolute    w-[400px]  bg-white p-8 rounded-xl">

				<p class="text-xl font-bold">新しいスレッド</p>

				<input id="title-input" type="text" name="title" placeholder="タイトル" class="mt-4   w-full py-2   border-b border-neutral-300   focus:outline-none focus:border-purple-500">

				<div class="mt-4 flex justify-end">
					<button id="submit-button" type="submit" disabled class="text-purple-500   -my-1 -mx-4 py-1 px-4 rounded-full font-bold   disabled:text-neutral-400   enabled:hover:bg-purple-200 transition">作成</button>
				</div>
			</div>
		</div>
	</form>



	<script>

		// モーダルを開く
		document.getElementById('open-modal-button').addEventListener("click", () => {

			document.getElementById('modal').className = "block"
			document.getElementById('title-input').focus()
		})

		// モーダルを閉じる
		document.getElementById('close-modal-button').addEventListener("click", () => {

			document.getElementById('modal').className = "hidden"
		})



		// 入力値チェック
		const titleInput = document.getElementById('title-input')
		const submitButton = document.getElementById('submit-button')

		titleInput.addEventListener("input", () => {

			const title = titleInput.value

			// 値が空or100文字以上ならdisabledに
			if (title === "" || title.length >= 100) {
				submitButton.disabled = true
			}

			// 適切な値ならenabledに
			if (title !== "" && title.length < 100) {
				submitButton.disabled = false
			}
		})
	</script>

</body>

</html>