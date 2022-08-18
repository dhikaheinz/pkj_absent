<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/logo.png') ?>" />
		<title>Klinik Ortotik Prostetik | Poltekkes Jakarta I</title>
    <!-- font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- font -->
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
	<body class="bg-[#f4fdff]">
    <!-- nav -->
  <nav
			class="fixed left-0 top-0 w-full p-3 bg-gradient-to-r from-[#3BACB6] to-[#82DBD8] shadow md:shadow-md md:flex md:items-center md:justify-between md:px-[100px] transition-all"
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
				class="md:flex md:items-center md:bg-transparent bg-[#3BACB6] z-[10] md:z-auto md:static absolute w-full left-0 md:w-auto md:py-0 py-2 px-2 md:pl-0 md:opacity-100 opacity-0 top-[-400px] transition-all"
			>
			<a href="<?= base_url() ?>" class="text-xl text-white font-semibold hover:text-black">
				<li class="px-4 py-3 md:my-0 hover:bg-[#32929b] h-full rounded-md">
				Home
				</li>
			</a>
			<a href="<?= base_url('user/kritiksaran') ?>" class="text-xl text-white font-semibold hover:text-black">
				<li class="px-4 py-3 md:my-0 hover:bg-[#32929b] h-full rounded-md">
				Kritik Dan Saran
				</li>
			</a>
			<a href="<?= base_url('user/logout') ?>" class="text-xl text-white font-semibold hover:text-black">
				<li class="px-4 py-3 md:my-0 hover:bg-[#32929b] h-full rounded-md">
				Logout
				</li>
			</a>
			</ul>
		</nav>
    <!-- close nav -->

    <div id="content" class="">
		<div class="flex justify-center min-h-screen transition-all flex-col">
        <!-- Login Form -->
			<div class="dashboard flex items-center justify-center rounded-lg flex-col md:flex-row gap-3 transition-all ">
			<h3 class="md:-mt-[300px] md:-mr-52 font-bold text-2xl text-slate-700">Dashboard Admin</h3>
				<div class="profil-detail flex items-center justify-center flex-col w-96 md:w-96 p-6 shadow-lg rounded-lg bg-white">
					<div class="foto-profil h-30 w-30 rounded-full bg-slate-100">
						<img src="https://icon-library.com/images/person-image-icon/person-image-icon-2.jpg" alt="" class="rounded-full w-28 h-28">
					</div>
	  				<div class="nama-profil mt-2">
					  	<p class="font-bold"><?= $detail_admin->nm_user ?></p>
					</div>
	  				<div class="nomor-profil">
						  
					</div>
					<div class="social-media">
						<a href="#" class="hover:text-slate-500"><span><ion-icon name="logo-twitter"></ion-icon></span></a>
						<a href="#" class="hover:text-slate-500"><span><ion-icon name="logo-facebook"></ion-icon></span></a>
						<a href="#" class="hover:text-slate-500"><span><ion-icon name="logo-instagram"></ion-icon></span></a>
						<a href="#" class="hover:text-slate-500"><span><ion-icon name="logo-linkedin"></ion-icon></span></a>
					</div>
					<div class="lihat-admin mt-5">
					<?php
							if ($detail_admin->level != "1") {
								"";
							}else {
								echo '<a href="'.base_url('admin/daftarAdmin').'" class="p-2 bg-[#41b4be] rounded-lg text-white hover:bg-slate-600 transition-all">Daftar Admin</a>';
							}
						?>
					</div>
				</div>
				<div class="profil-detail flex md:items-start md:justify-start flex-col w-96 lg:w-[800px] md:w-[384px] p-6 shadow-lg rounded-lg bg-white transition-all">
					<div class="flex md:justify-start flex-col w-full transition-all">
	  					<div class="title border-b-2 border-sky-300 font-bold shadow-md text-slate-700 transition-all">
	  						Kunjungan
						</div>
						<div class="konten flex items-center justify-center md:items-start md:justify-start flex-col mt-5 shadow-md w-full p-3 transition-all">
                            <p class="font-bold">Daftar Kunjungan</p>
                            <table id="data_table" class="table-fixed w-full mt-5">
                                <thead>
                                    <tr>
                                    <th>No RM</th>
                                    <th>Tgl Kunjungan</th>
                                    <th>Waktu</th>
                                    <th>Status</th>
                                    <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php foreach($data_riwayat->result_array() as $row) {?>
                                    <tr class="p-5 bg-slate-200 rounded-md h-9">
                                    <td><?= $row["no_rm"] ?></td>
                                    <td><?= $row["tgl_kunjungan"] ?></td>
                                    <td><?= $row["waktu_kunjungan"] ?></td>
                                    <td>
										<?php 
									if ($row["status"] == "Sukses") {
										echo '<span class="bg-green-800 text-white p-1 rounded-md">Sukses</span>';
									}elseif($row["status"] == "Proses"){
										echo '<span class="bg-yellow-400 text-white p-1 rounded-md">Proses</span>';
									}elseif($row["status"] == "Batal"){
										echo '<span class="bg-red-500 text-white p-1 rounded-md">Batal</span>';
									} ?>	
									</td>
									<td><a href="<?= base_url('admin/riwayat_kunjungan_detail/'.$row["id_kunjungan"].'/'.$row["no_rm"].'') ?>" 
									class="p-1 bg-[#41b4be] rounded-lg text-white hover:bg-slate-600 transition-all">Detail <ion-icon name="information-circle-outline"></ion-icon></a>
									<a href="<?= base_url('admin/delete_kunjungan/'.$row["id_kunjungan"].'') ?>" 
									class="p-1 bg-[#e06b6b] rounded-lg text-white hover:bg-slate-600 transition-all" onclick="return confirm('Apakah Anda ingin Menghapusnya?')"><ion-icon name="trash"></ion-icon></a></td>
                                    </tr>
									<?php } ?>
									
                                </tbody>
                            </table>
						</div>
					</div>
				</div>
			</div>
        <!-- Login Form -->
     	</div>
    </div>

    <!-- Footer -->
		<footer
			class="bottom-0 left-0 transition-all mt-20 lg:mt-40 flex justify-center items-center h-14 absolute w-full bg-gradient-to-r from-[#3BACB6] to-[#82DBD8] shadow"
		>
			<div class="container mx-auto flex justify-center items-center">
				<div>
					<p class="text-white">
						Copyright © 2022
						<span class="font-semibold sm:inline-block hidden"
							>POLTEKKES KEMENKES JAKARTA I</span
						>
					</p>
					<p class="text-white">
						<span class="font-semibold block sm:hidden"
							>POLTEKKES KEMENKES JAKARTA I</span
						>
					</p>
				</div>
			</div>
		</footer>
		<!-- Footer Close -->
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
      <script>
			function Menu(e) {
				let list = document.querySelector("ul");
				e.name === "menu"
					? ((e.name = "close"),
					  list.classList.add("top-[70px]"),
					  list.classList.add("opacity-100"))
					: ((e.name = "menu"),
					  list.classList.remove("top-[70px]"),
					  list.classList.remove("opacity-100"));
			}

			$('#data_table').dataTable( {
				"ordering": false,
				"dom": 'ftip'
			} );
		</script>
	</body>
</html>
