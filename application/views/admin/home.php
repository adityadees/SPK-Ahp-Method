<div class="row top_tiles">
	<?php 
	if($_SESSION['level']==='desa'){
		?>
		<div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="tile-stats">
				<div class="icon"><i class="fa fa-road"></i></div>
				<p>Anda Memiliki :</p>
				<div class="count"><?= $countJalan; ?></div>
				<h3><a href="<?= base_url();?>jalan">Data Jalan</a></h3>
			</div>
		</div>
		<div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="tile-stats">
				<p>Anda Memiliki :</p>
				<div class="icon"><i class="fa fa-info"></i></div>
				<div class="count"><?= $countPesan;?></div>
				<h3><a href="<?= base_url();?>inbox">Pesan</a></h3>
			</div>
		</div>
		<?php 
	} else if($_SESSION['level']==='camat'){
		?>
		<div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<div class="tile-stats">
				<div class="icon"><i class="fa fa-home"></i></div>
				<p>Anda Memiliki :</p>
				<div class="count"><?= $countDesa; ?></div>
				<h3>Data Desa</h3>
			</div>
		</div>
		<div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<div class="tile-stats">
				<div class="icon"><i class="fa fa-road"></i></div>
				<p>Anda Memiliki :</p>
				<div class="count"><?= $countJalan; ?></div>
				<h3><a href="<?= base_url();?>jalan">Data Jalan</a></h3>
			</div>
		</div>

		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Info Desa<small>Jalan</small></h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="table-responsive">
						<table class="table table-striped jambo_table bulk_action">
							<thead>
								<tr class="headings">
									<th class="column-title">Desa </th>
									<th class="column-title">Jumlah Jalan </th>
									<th class="column-title no-link last"><span class="nobr">Action</span></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($g_camat as $i):?>
									<tr class="even pointer">
										<td class=" "><?= $i['nama_desa']; ?></td>
										<?php $ck = $this->Mymod->ViewDataWhere('jalan',['kode_desa' => $i['kode_desa']])->result_array(); ?>
										<td class=" "><?= count($ck); ?></td>
										<td class=" last">
											<a href="#">
												<?php if(count($ck) == 0) { ?>
													<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg<?= $i['kode_desa']; ?>">
														Kirim Pesan
													</button>
												<?php } else { echo "-";}?>
											</a>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<?php foreach($g_camat as $i):?>
			<div class="modal fade bs-example-modal-lg<?= $i['kode_desa']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
							<h4 class="modal-title" id="myModalLabel">Pesan untuk <?= $i['nama_desa']; ?></h4>
						</div>
						<form data-parsley-validate class="form-horizontal form-label-left" method="POST" action="<?= base_url();?>home/send_pesan">
							<div class="modal-body">
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Judul <span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="hidden" name="kode_desa" value="<?= $i['kode_desa']; ?>" required="required" class="form-control col-md-7 col-xs-12">
										<input type="text" name="judul" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>
								<div class="form-group">
									<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Pesan</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<textarea class="form-control" name="pesan"></textarea>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<input type="submit" value="Send" class="btn btn-primary">
							</div>
						</form>
					</div>
				</div>
			</div>
		<?php endforeach; ?>


		<?php 
	} else if($_SESSION['level']==='admin'){
		?>

		<div class="animated flipInY col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<div class="tile-stats">
				<div class="icon"><i class="fa fa-road"></i></div>
				<div class="count"><?= $countCamat?></div>
				<h3>Kecamatan</h3>
			</div>
		</div>
		<div class="animated flipInY col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<div class="tile-stats">
				<div class="icon"><i class="fa fa-home"></i></div>
				<div class="count"><?= $countDesa?></div>
				<h3>Desa</h3>
			</div>
		</div>
		<div class="animated flipInY col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<div class="tile-stats">
				<div class="icon"><i class="fa fa-user"></i></div>
				<div class="count"><?= $countUser?></div>
				<h3>User</h3>
			</div>
		</div>
		<div class="animated flipInY col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<div class="tile-stats">
				<div class="icon"><i class="fa fa-road"></i></div>
				<div class="count"><?= $countJalan?></div>
				<h3>Jalan</h3>
			</div>
		</div>

	<?php } ?>
</div>

