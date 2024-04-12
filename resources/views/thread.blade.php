<!DOCTYPE html>
<html lang="ja" class="h-full">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>スレッド - Thread Land</title>
	@vite('resources/css/app.css')
</head>

<body class="bg-purple-200 h-full">

	<x-header />



	<main class="mx-auto   w-full px-4 xl:w-[1200px] xl:px-0">

		<div class="mt-8   flex justify-between items-center">

			<h1 class="text-2xl font-bold">みんな今日は何食べた?</h1>

			<label for="open-modal" class="text-purple-500   -my-1 -mx-4   py-1 px-4 rounded-full cursor-pointer   hover:bg-purple-300 transition">新しいコメント</label>
		</div>

		<div class="mt-4   bg-white rounded-xl p-8   flex flex-col gap-4">

			<x-comment-row />
			<x-comment-row />
			<x-comment-row />
			<x-comment-row />
		</div>

	</main>



	<x-footer />



	<!-- コメント追加モーダル -->
	<input id="open-modal" type="checkbox" class="peer hidden">

	<div class="hidden peer-checked:block">

		<div class="fixed top-0 left-0 w-screen h-screen   flex justify-center items-center">

			<label for="open-modal" class="w-screen h-screen bg-black/30"></label>

			<div class="absolute    w-[400px]  bg-white p-8 rounded-xl">

				<p class="text-xl font-bold">新しいコメント</p>

				<input type="text" placeholder="ニックネーム" class="mt-4   w-full py-1   border-b border-neutral-300   focus:outline-none focus:border-purple-500">
				<input type="text" placeholder="コメント" class="mt-2   w-full py-1   border-b border-neutral-300   focus:outline-none focus:border-purple-500">

				<div class="mt-4 flex justify-end">
					<button class="text-purple-500   -my-1 -mx-4 py-1 px-4 rounded-full font-bold   hover:bg-purple-200 transition">追加</button>
				</div>
			</div>
		</div>
	</div>



</body>

</html>