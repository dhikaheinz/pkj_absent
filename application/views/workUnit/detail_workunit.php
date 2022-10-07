<?php $this->load->view('template/header'); ?>

    <div id="content" class="">
		<div class="lg:my-10 flex items-center justify-center md:h-screen -mt-14 -mb-14 transition-all">
			<!-- flex content -->
			<div class="dashboard flex items-center justify-center rounded-lg flex-col md:flex-row gap-3 transition-all mt-48 mb-20 md:my-0">
				
				<div class="profil-detail flex md:items-start md:justify-start flex-col w-96 lg:w-[1200px] md:w-[384px] p-6 shadow-lg rounded-lg bg-white transition-all">
					<div class="flex md:justify-start flex-col w-full transition-all">
	  					<div class="uppercase title border-b-2 border-sky-300 font-bold shadow-md text-slate-700 transition-all">
						  Daftar Kegiatan Work Unit
						</div>
						<?php
							echo $this->session->flashdata('success');
						?>
						
					</div>
					<div class="konten-profil mb-3 -mt-3 shadow-md py-5 transition-all w-full">
						<div class="flex flex-col w-full my-3">
							<div class="flex flex-row">
								<div class="w-20">Nama</div>
								<div class="">: 
                                    <?php 
                                        if (!empty($data_all_row->profile_name)) {
                                            echo "$data_all_row->profile_name";
                                        } else {
                                            echo "";
                                        } 
                                    ?>
                                </div>
							</div>
							<div class="flex flex-row">
								<div class="w-20">NIP</div>
								<div class="">:
                                <?php 
                                        if (!empty($data_all_row->job_nip)) {
                                            echo "$data_all_row->job_nip";
                                        } else {
                                            echo "";
                                        } 
                                    ?>
                                </div>
							</div>
						</div>
						<hr class="border-[1px] border-black mt-2">
						<div class="my-5">
							<a href="/workunit" class="p-2 rounded-md bg-[#64b3f4] mb-3 hover:bg-slate-500 text-white">Kembali</a>
						</div>
						<div class="flex flex-col">
						<div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
							<div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
							<div class="overflow-x-auto">
								<table class="min-w-full display nowrap row-border" id="dataTable" style="width:90%">
								<thead class="border-b">
									<tr>
									<th scope="col" class="w-20 text-sm font-bold text-gray-900 px-6 py-2 text-left">
									Tanggal
									</th>
									<th scope="col" class="w-20 text-sm font-bold text-gray-900 px-6 py-2 text-left">
									Rekam Masuk
									</th>
									<th scope="col" class="w-20 text-sm font-bold text-gray-900 px-6 py-2 text-left">
									Rekam Keluar
									</th>
									<th scope="col" class="text-sm font-bold text-gray-900 px-6 py-2 text-left">
									Deskripsi Kegiatan
									</th>
									<th scope="col" class="text-sm font-bold text-gray-900 px-6 py-2 text-left">
									Status Masuk
									</th>
									<th scope="col" class="text-sm font-bold text-gray-900 px-6 py-2 text-left">
									Status Keluar
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
									<?= $row->attendance_entry ?>
									</td>
									<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
									<?= $row->attendance_return ?>
									</td>
									<!-- <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
										<?php
										// if (!empty($row->location_entry)) {
										// 	echo '<a href="https://google.com/maps/place/'.$row->location_entry.'" target="_blank" class="p-1 m-2 bg-[#64b3f4] rounded-full text-white hover:bg-slate-400">Lokasi</a>';
										// } else {
										// 	echo '';
										// }
										?>
									</td>
									<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
									<?php
										// if (!empty($row->location_return)) {
										// 	echo '<a href="https://google.com/maps/place/'.$row->location_return.'" target="_blank" class="p-1 m-2 bg-[#64b3f4] rounded-full text-white hover:bg-slate-400">Lokasi</a>';
										// } else {
										// 	echo '';
										// }
										// ?>
									</td> -->
									<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
									<?= $row->job_desc ?>
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
												echo 'Masuk';
											} else if ($row->status_absen_keluar == "2") {
												echo 'Dinas Luar (Luar)';
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
											}
										?>
									</td>
									<td>
										<a href="/home/lihatfile/<?=$row->id_job?>"><i class="fa fa-file" aria-hidden="true"></i></a>
									</td>
									</tr>
									<?php } ?>
								</tbody>
								</table>
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- flex content -->
     	</div>
    </div>

	
	<script>
      $('#summernote').summernote({
		disableDragAndDrop: true,
        placeholder: 'Masukkan Kegiatan Harian',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['font', ['bold', 'underline', 'clear']],
        ]
      });
	  $(document).ready(function () {
                $('#dataTable').DataTable({
                    dom: 'Bfrtip',
					order: [[0, 'desc']],
                    scrollX: 200,
					buttons: [
						'excel', 'pdf'
					]
                });
            });
    </script>
	<?php $this->load->view('template/footer'); ?>
		<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
	</body>
</html>