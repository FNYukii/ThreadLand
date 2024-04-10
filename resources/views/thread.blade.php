<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>スレッド - Thread Land</title>
	@vite('resources/css/app.css')
</head>

<body class="bg-purple-200">

	<x-header />

	<main class="mx-auto   w-full px-4 xl:w-[1200px] xl:px-0">

		<h1 class="mt-8 text-2xl font-bold">みんな今日は何食べた?</h1>

		<div class="mt-4   bg-white rounded-xl p-8   flex flex-col gap-4">

			<x-comment-row/>
			<x-comment-row/>
			<x-comment-row/>
			<x-comment-row/>
		</div>

	</main>

</body>

</html>