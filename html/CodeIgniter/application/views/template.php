<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('parts/header'); ?>
</head>

<body>
	<div>
		<?php $this->load->view('parts/navigation'); ?>

		<header class="bg-white shadow">
			<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
				<h1 class="text-3xl font-bold text-gray-900">
					<?php echo $title; ?>
				</h1>
			</div>
		</header>
		<main>
			<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
				<?php
					$this->load->view('parts/flashes');
					$this->load->view($content);
				?>
			</div>
		</main>
	</div>
	<script>
		// User Menu
		let userOpen = false;
		let userMenu = document.getElementById('user-menu');
		let userButton = document.getElementById('user-button');

		if (userButton) {
			userButton.addEventListener('click', () => {
				userOpen = !userOpen;
				if (userOpen) {
					userMenu.classList.remove('hidden');
				} else {
					userMenu.classList.add('hidden');
				}
			});
		}



		// Mobile menu
		let menuOpen = false;
		let menu = document.getElementById('mobile-menu');
		let menuButton = document.getElementById('menu-button');

		if (menuButton) {
			menuButton.addEventListener('click', () => {
				menuOpen = !menuOpen;
				if (menuOpen) {
					menu.classList.remove('hidden');
				} else {
					menu.classList.add('hidden');
				}
			});
		}
	</script>
</body>

</html>