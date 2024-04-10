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

		<div class="mt-8   flex justify-between items-center">

			<h1 class="text-2xl font-bold">スレッド</h1>

			<button class="text-purple-500   -my-1 -mx-4   py-1 px-4 rounded-full   hover:bg-purple-300 transition">新しいスレッド</button>
		</div>

		<div class="mt-4   grid grid-cols-3 gap-6">

			<x-thread-card />
			<x-thread-card />
			<x-thread-card />
			<x-thread-card />
		</div>

	</main>

	<x-footer />

</body>

</html>