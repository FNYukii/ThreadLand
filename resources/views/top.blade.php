<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Thread Land</title>
	@vite('resources/css/app.css')
</head>

<body class="bg-purple-200">

	<x-header/>

	<main class="mx-auto   w-full px-4 xl:w-[1200px] xl:px-0">

		<h1 class="mt-8 text-2xl font-bold">スレッド</h1>

		<div class="mt-4   grid grid-cols-3 gap-6">

			<x-thread-card/>
			<x-thread-card/>
			<x-thread-card/>
			<x-thread-card/>
		</div>

	</main>

</body>

</html>