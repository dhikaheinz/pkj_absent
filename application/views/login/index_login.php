<?php $this->load->view('template/header'); ?>

    <div id="content" class="">
		<div class="flex items-center justify-center h-screen -mb-14 transition-all">
        <!-- Login Form -->
			<div class="logo flex items-center justify-center flex-col">
				<div class="h-10 mb-14">
					<img class="w-56" src="<?= base_url('assets/img/bigdata_polkesjasa.png'); ?>" alt="">
					<p class="text-center">Poltekkes Kemenkes Jakarta I</p>
				</div>
				<div class="px-8 py-6 text-left bg-white shadow-lg rounded-lg">
					<h3 class="text-2xl font-bold text-center text-sky-700">Presensi Online Pegawai Poltekkes</h3>
					<p class="text-center text-slate-600">Masukkan Data NIP dan Password</p>
					<?php
					echo $this->session->flashdata('success'); 
					?>
					<form action="<?php echo site_url('User/aksi_login'); ?>" method="post">
						<div class="mt-4">
							<div>
								<label class="block text-slate-600" for="username">NIP<label>
										<input name="user_nip" type="text" placeholder="NIP Anda"
											class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 shadow-sm">
							</div>
							<div class="mt-4">
								<label class="block text-slate-600">Password<label>
										<input name="pass" type="password" placeholder="Password Anda"
											class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 shadow-sm">
							</div>
							<div>
								<button type="submit" class="w-full py-2 mt-4 text-white bg-blue-600 rounded-md hover:bg-blue-900 shadow-md">Login</button>
							</div>
						</div>
					</form>
				</div>
			</div>
        <!-- Login Form -->
     	</div>
    </div>

	<?php $this->load->view('template/footer'); ?>
		<!-- Footer Close -->

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
		</script>

<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
	</body>
</html>
