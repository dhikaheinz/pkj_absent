<?php $this->load->view('template/header'); ?>

    <div id="content" class="mt-10 pl-48 pr-48">
		<div class="flex items-center justify-center min-h-screen h-auto transition-all">
			<!-- flex content -->
			<div class="dashboard flex items-center justify-center rounded-lg flex-col md:flex-row gap-3 transition-all my-24 md:my-0">
				<div class="profil-detail flex md:items-start md:justify-start flex-col w-96 lg:w-[auto] md:w-[384px] p-6 shadow-lg rounded-lg bg-white transition-all">
					<div class="flex md:justify-start flex-col w-full transition-all">
	  					<div class="title border-b-2 border-sky-300 font-bold shadow-md text-slate-700 transition-all">
							Administrator Data Rekam Pegawai
						</div>
					</div>
                    <div class="flex flex-col">
						<div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
							<div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
							<div class="overflow-x-auto">
								<table class="min-w-full display nowrap row-border" id="dataTable" style="width:100%">
								<thead class="border-b">
									<tr>
									<th scope="col" class="text-sm font-bold text-gray-900 px-6 py-2 text-left">
									Tanggal
									</th>
									<th scope="col" class="text-sm font-bold text-gray-900 px-6 py-2 text-left">
									NIP
									</th>
									<th scope="col" class="text-sm font-bold text-gray-900 px-6 py-2 text-left">
									Nama
									</th>
									<th scope="col" class="text-sm font-bold text-gray-900 px-6 py-2 text-left">
									Rekam Masuk
									</th>
									<th scope="col" class="text-sm font-bold text-gray-900 px-6 py-2 text-left">
									Rekam Keluar
									</th>
									<th scope="col" class="text-sm font-bold text-gray-900 px-6 py-2 text-left">
									Masuk
									</th>
									<th scope="col" class="text-sm font-bold text-gray-900 px-6 py-2 text-left">
									Keluar
									</th>
									<th scope="col" class="text-sm font-bold text-gray-900 px-6 py-2 text-left">
									Status Masuk
									</th>
									<th scope="col" class="text-sm font-bold text-gray-900 px-6 py-2 text-left">
									Status Keluar
									</th>
									<th scope="col" class="text-sm font-bold text-gray-900 px-6 py-2 text-left">
									Status
									</th>
									<th scope="col" class="text-sm font-bold text-gray-900 px-6 py-2 text-left">
									Deskripsi Kegiatan
									</th>
									<th scope="col" class="text-sm font-bold text-gray-900 px-6 py-2 text-left">
									File
									</th>
									</tr>
								</thead>
								<tbody>
								<?php foreach ($data_all as $row) { ?>
									<tr class="border-b">
									<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
									<?php
									$dateIndo = $row->tanggal;
									$ex = explode("-",$dateIndo);
							
									$tgl = $ex[2].'-'.$ex[1].'-'.$ex[0];
									echo $tgl;
									?>
									</td>
									<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
									&apos;<?= $row->job_nip ?>
									</td>
									<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
									<?= $row->profile_name ?>
									</td>
									<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
									<?= $row->attendance_entry ?>
									</td>
									<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
									<?= $row->attendance_return ?>
									</td>
									<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
										<?php
										if (!empty($row->location_entry)) {
											echo '<a href="https://google.com/maps/place/'.$row->location_entry.'" target="_blank" class="-ml-1 p-1 m-2 bg-[#64b3f4] rounded-full text-white hover:bg-slate-400">Lokasi</a>';
										} else {
											echo '';
										}
										?>
									</td>
									<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
									<?php
										if (!empty($row->location_return)) {
											echo '<a href="https://google.com/maps/place/'.$row->location_return.'" target="_blank" class="-ml-1 p-1 m-2 bg-[#64b3f4] rounded-full text-white hover:bg-slate-400">Lokasi</a>';
										} else {
											echo '';
										}
										?>
									</td>
									<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
										<?php 
											if ($row->status_absen_masuk == "1") {
												echo 'Masuk (Dalam)';
											} else if ($row->status_absen_masuk == "2") {
												echo 'Dinas Luar';
											} else if ($row->status_absen_masuk == "3") {
												echo 'Izin';
											}else if ($row->status_absen_masuk == "4") {
												echo 'Sakit';
											}else if ($row->status_absen_masuk == "5") {
												echo 'Bimbingan';
											}else if ($row->status_absen_masuk == "6") {
												echo 'Penelitian';
											}else if ($row->status_absen_masuk == "7") {
												echo 'Pengabdian Masyarakat';
											}
											?>
									</td>
									<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
										<?php 
											if ($row->status_absen_keluar == "1") {
												echo 'Masuk (Dalam)';
											} else if ($row->status_absen_keluar == "2") {
												echo 'Dinas Luar';
											} else if ($row->status_absen_keluar == "3") {
												echo 'Izin';
											}else if ($row->status_absen_keluar == "4") {
												echo 'Sakit';
											}else if ($row->status_absen_keluar == "5") {
												echo 'Bimbingan';
											}else if ($row->status_absen_keluar == "6") {
												echo 'Penelitian';
											}else if ($row->status_absen_keluar == "7") {
												echo 'Pengabdian Masyarakat';
											}else if ($row->status_absen_keluar == "10") {
												echo 'Belum Absen';
											}else if ($row->status_absen_keluar == "20") {
												echo 'Masuk (Luar)';
											}
											?>
									</td>
									<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
									<?php 
											if ($row->absen_ket == "1") {
												echo '<span class="p-1 bg-teal-600 text-white rounded-md">OnTime</span>';
											} else if ($row->absen_ket == "2") {
												echo '<span class="p-1 bg-yellow-600 text-white rounded-md">Kompensasi</span>';
											} else if ($row->absen_ket == "3") {
												echo '<span class="p-1 bg-orange-600 text-white rounded-md">Terlambat</span>';
											}
											?>
									</td>
									<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
									<?= $row->job_desc ?>
									</td>
									<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
										<?php 
										if ($row->id_job) {
											echo '<a href="'.base_url('home/lihatfile/'.$row->id_job).'"><i class="fa fa-file" aria-hidden="true"></i></a>';
										} else {
											# code...
										}
										?>
									</td>
									</tr>
									<?php } ?>
								</tbody>
								</table>
							</div>
							</div>
						</div>
					</div>
					<div class="flex items-center justify-center flex-row mt-2 gap-1 transition-all">
						<a href="<?= base_url('admin/dataAbsen') ?>" class="bg-[#a2c082] text-white p-5 rounded-lg hover:bg-slate-400 transition-all">Data Rekam Pegawai</a>
						<a href="<?= base_url('admin/akunPegawai') ?>" class="bg-[#a2c082] text-white p-5 rounded-lg hover:bg-slate-400 transition-all">Data Akun Pegawai</a>
					</div>
				</div>
			</div>
			<!-- flex content -->
     	</div>
    </div>
	<?php $this->load->view('template/footer'); ?>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
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
			$(document).ready(function () {
                $('#dataTable').DataTable({
                    dom: 'Bfrtip',
					order: [[0, 'desc']],
					"ordering" : false,
                    scrollX: 200,
					buttons: [
						'excel', 'pdf'
					]
                });
            });
		</script>

<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
	</body>
</html>
