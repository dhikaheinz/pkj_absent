<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/logo.png') ?>" />
		<title>Klinik Ortotik Prostetik | Poltekkes Jakarta I</title>
		<!-- css tailwind -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
		<!-- font -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
		<script src="https://cdn.tailwindcss.com"></script>
		<script
				type="module"
				src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
			></script>
			<script
				nomodule
				src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
			></script>

		<style>
		body{
			font-family: 'Rubik', sans-serif;
		}
		</style>
	</head>
	<body class="bg-gradient-to-t from-[#f3e7e9] to-[#e3eeff]">
    <!-- nav -->
  <nav
			class="fixed left-0 top-0 w-full p-3 bg-gradient-to-r from-[#64b3f4] to-[#c2e59c] shadow md:shadow-md md:flex md:items-center md:justify-between md:px-[100px] transition-all"
		>
			<div class="flex justify-between items-center">
				<span class="text-lg md:text-2xl uppercase font-bold text-white">
					<img
						class="w-10 inline mr-3 hover:scale-110"
						src="https://akupintar.id/documents/20143/0/Poltekkes+Jakarta+I.jpg"
					/>
					<span>Poltekkes Jakarta I</span>
				</span>

				<span class="text-3xl cursor-pointer md:hidden block mx-2">
					<ion-icon
						class="text-white"
						name="menu"
						onclick="Menu(this)"
					></ion-icon>
				</span>
			</div>

			<ul
				class="md:flex md:items-center md:bg-transparent bg-[#b5d691] z-[10] md:z-auto md:static absolute w-full left-0 md:w-auto md:py-0 py-2 px-2 md:pl-0 md:opacity-100 opacity-0 top-[-400px] transition-all"
			>
			<a href="<?= base_url() ?>" class="text-xl text-white font-semibold hover:text-black">
				<li class="px-4 py-3 md:my-0 hover:bg-[#c2e59c] h-full rounded-md">
				Home
				</li>
			</a>
			<a href="<?= base_url('user/kritiksaran') ?>" class="text-xl text-white font-semibold hover:text-black">
				<li class="px-4 py-3 md:my-0 hover:bg-[#c2e59c] h-full rounded-md">
				Kritik Dan Saran
				</li>
			</a>

            <?php 
                if ($this->session->userdata('status') != "login") {
                    echo '<a href="'.base_url().'" class="text-xl text-white font-semibold hover:text-black">
                    <li class="px-4 py-3 md:my-0 hover:bg-[#c2e59c] h-full rounded-md">
                    Login
                    </li>
                    </a>';
                }else {
                    echo '<a href="'.base_url('user/logout').'" class="text-xl text-white font-semibold hover:text-black">
                    <li class="px-4 py-3 md:my-0 hover:bg-[#c2e59c] h-full rounded-md">
                    Logout
                    </li>
                    </a>';
                }
            ?>
			
			</ul>
		</nav>
    <!-- close nav -->