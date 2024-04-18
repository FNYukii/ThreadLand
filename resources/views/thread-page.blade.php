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

			<label tabindex="0" for="open-modal" class="text-purple-500   -my-1 -mx-4   py-1 px-4 rounded-full cursor-pointer   hover:bg-purple-300 transition">新しいコメント</label>
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
	<input id="open-modal" type="checkbox" class="peer hidden">

	<form action="/threads/new" method="post" onsubmit="return false;" class="hidden peer-checked:block">

		@csrf

		<div class="fixed top-0 left-0 w-screen h-screen   flex justify-center items-center">

			<label for="open-modal" class="w-screen h-screen bg-black/30"></label>

			<div class="absolute    w-[400px]  bg-white p-8 rounded-xl">

				<p class="text-xl font-bold">新しいコメント</p>

				<input type="text" name="threadId" value=" {{ $thread->id }}" hidden>
				<input type="text" name="userName" placeholder="ユーザーネーム" class="mt-4   w-full py-2   border-b border-neutral-300   focus:outline-none focus:border-purple-500">
				<input type="text" name="text" placeholder="コメント" class="mt-2   w-full py-2   border-b border-neutral-300   focus:outline-none focus:border-purple-500">

				<div class="mt-4 flex justify-end">
					<button type="submit" class="text-purple-500   -my-1 -mx-4 py-1 px-4 rounded-full font-bold   hover:bg-purple-200 transition">追加</button>
				</div>
			</div>
		</div>
	</form>



</body>

</html>