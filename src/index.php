<?php
	require("./bootstrap.php");
	require("./services/StatsService.php");
	require("./services/SteamApiService.php");

	$config = include('config.php');

	// Services
	$statsService = new StatsService($config['host'], $config['user'], $config['pass'], $config['db'], $config['charset']);
	$steamApiService = new SteamApiService($config['steamApiKey']);

	// Prepare data
	$players = $statsService->getPlayers($config['perPage']);

	foreach ($players as $player)
	{
		$steamApiService->addSteamId($player['steam_id']);
	}

	$steamApiService->loadPlayers();
?>
<!doctype html>
<html lang="en">
	<head>
		<title><?= $config['project'] ?> | Stats</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="L4D2 Stats">
		<meta name="keywords" content="L4D2,Stats">
		<link rel="stylesheet" href="css/tailwind.css"/>
		<!-- <script src="https://cdn.tailwindcss.com"></script> -->

		<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
		<link rel="manifest" href="/site.webmanifest">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="theme-color" content="#ffffff">
	</head>
	<body class="bg-white">
		<nav class="fixed top-0 left-0 z-20 w-full border-b border-gray-200 bg-white py-2.5 px-6 sm:px-4">
			<div class="container mx-auto flex max-w-6xl flex-wrap items-center justify-between">
				<a href="/" class="flex items-center">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-3 h-6 text-blue-500 sm:h-9">
						<path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
					</svg>
					<span class="self-center whitespace-nowrap text-xl font-semibold"><?= $config['project'] ?> | Stats</span>
				</a>
				<div class="mt-2 sm:mt-0 sm:flex">
					<button onclick="ToggleMenu()" type="button" class="inline-flex items-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 md:hidden" aria-controls="navbar-sticky" aria-expanded="false">
						<span class="sr-only">Open main menu</span>
						<svg class="h-6 w-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
					</button>
				</div>
				<div class="hidden w-full items-center justify-between md:flex md:w-auto" id="navbar-sticky">
					<ul class="mt-4 flex flex-col rounded-lg border border-gray-100 bg-gray-50 p-4 md:mt-0 md:flex-row md:space-x-8 md:border-0 md:bg-white md:text-sm md:font-medium">
						<li>
							<a href="#" class="block rounded py-2 pl-3 pr-4 text-gray-700 hover:bg-gray-100 md:p-0 md:hover:bg-transparent md:hover:text-blue-700">Link</a>
						</li>
						<li>
							<a href="#" class="block rounded py-2 pl-3 pr-4 text-gray-700 hover:bg-gray-100 md:p-0 md:hover:bg-transparent md:hover:text-blue-700">Link</a>
						</li>
						<li>
							<a href="#" class="block rounded py-2 pl-3 pr-4 text-gray-700 hover:bg-gray-100 md:p-0 md:hover:bg-transparent md:hover:text-blue-700">Link</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="pt-32 pb-16">
			<h1 class="text-center text-2xl font-bold text-gray-800">BEST PLAYERS:</h1>
		</div>
		<section class="py-10 bg-gray-100">
			<div class="mx-auto grid max-w-7xl grid-cols-1 gap-6 p-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">
			<?php foreach($players as $pos => $player) : ?>
				<article class="rounded-xl bg-white p-3 shadow-md hover:shadow-xl hover:transform hover:scale-105 duration-300">
					<a href="<?= $steamApiService->getPlayer($player['steam_id'])['profileurl'] ?>">
						<div class="relative flex items-end overflow-hidden rounded-xl">
							<img class="w-full" src="<?= $steamApiService->getPlayer($player['steam_id'])['avatarfull'] ?>" alt="Avatar" width="184" height="184" />
							<div class="absolute top-3 left-3 inline-flex items-center rounded-lg bg-white p-2 shadow-md">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
									<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
								</svg>
								<span class="ml-1 text-sm text-slate-500"><?= $pos+1 ?></span>
							</div>
						</div>

						<div class="mt-1 p-2">
							<h2 class="text-slate-700"><?= $steamApiService->getPlayer($player['steam_id'])['personaname'] ?></h2>
							<p class="mt-1 text-sm text-slate-500">
								<?= round($player['rating'], 1) ?>pts ∙ <?= round($player['played_time'] / 3600, 1) ?>ч
							</p>
						</div>
					</a>
				</article>
			<?php endforeach ?>
			</div>
		</section>
		<footer class="bg-gray-200 text-center lg:text-left">
			<div class="p-4 text-center text-gray-700">
				Created with ❤️ by TouchMe
			</div>
		</footer>
		<script>
			function ToggleMenu()
			{
				var navbar = document.getElementById("navbar-sticky");
				navbar.classList.contains("hidden") ? navbar.classList.remove("hidden") : navbar.classList.add("hidden");
			}
		</script>
	</body>
</html>