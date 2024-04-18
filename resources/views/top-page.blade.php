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

			<label tabindex="0" for="open-modal" class="text-purple-500   -my-1 -mx-4   py-1 px-4 rounded-full cursor-pointer   hover:bg-purple-300 transition">新しいスレッド</label>
		</div>



		<!-- Threads Section -->
		<div class="mt-4   grid grid-cols-3 gap-6">

			@foreach($threads as $thread)
			<a href="/threads/{{ $thread->id }}" class="block rounded-xl bg-white p-6    flex flex-col gap-2   hover:bg-neutral-100 hover:scale-95 transition">

				<p class="font-bold">{{ $thread->title }}</p>
				<p>{{ $thread->firstCommentText }}</p>
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
	<input id="open-modal" type="checkbox" class="peer hidden">

	<form action="/new" method="post" class="hidden peer-checked:block">

		@csrf

		<div class="fixed top-0 left-0 w-screen h-screen   flex justify-center items-center">

			<label for="open-modal" class="w-screen h-screen bg-black/30"></label>

			<div class="absolute    w-[400px]  bg-white p-8 rounded-xl">

				<p class="text-xl font-bold">新しいスレッド</p>

				<input type="text" name="title" placeholder="タイトル" class="mt-4   w-full py-2   border-b border-neutral-300   focus:outline-none focus:border-purple-500">

				<div class="mt-4 flex justify-end">
					<button type="submit" class="text-purple-500   -my-1 -mx-4 py-1 px-4 rounded-full font-bold   hover:bg-purple-200 transition">作成</button>
				</div>
			</div>
		</div>
	</form>



</body>

</html>