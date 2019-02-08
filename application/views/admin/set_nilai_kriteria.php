<?php
$count_kriteria = $kriteria->num_rows();
$all_kriteria   = $kriteria->result();
$count_jalan    = $jalan->num_rows();
$all_jalan		= $jalan->result();
?>
<form name="form-kriteria" id="form-kriteria">
	<table class="table table-bordered table-condensed table-hover table-responsive table-striped" id="kriteria">
		<thead>
			<tr>
				<?php if( $count_kriteria ): ?>
					<th>Nama Kriteria</th>
					<?php foreach ($all_kriteria as $key => $value): ?>
						<th><?php echo $value->nama_kriteria; ?></th>
					<?php endforeach; ?>
				<?php endif; ?>
			</tr>
		</thead>
		<tbody>
			<?php 
			if( $count_kriteria ): 
				$i=0;
				foreach ($all_kriteria as $key_all => $val_all):
					echo '<tr><th>'. $val_all->nama_kriteria .'</th>';
					$x=0;
					foreach ($all_kriteria as $key_input => $val_input):
						if( $x<$i ):
							echo '<td>&nbsp;</td>';
						elseif($x==$i):
							echo '<td>1</td>';
						else:
							echo '<td style="text-align:center!important;">
							<select name="val_kriteria['.$val_all->id_kriteria.']['.$val_input->id_kriteria.']">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							</select>
							</td>';
						endif;
						$x++;
					endforeach;
					echo '</tr>';
					$i++;
				endforeach;
			endif;
			?>
		</tbody>
	</table>
	<hr />
	<div class="table-responsive">
		<table class="table table-bordered table-condensed table-hover table-striped" id="jalan">
			<thead>
				<?php
				if( $count_kriteria ):
					echo '<tr><th>Nama Jalan</th>';
					foreach ($all_kriteria as $key_header_jalan => $valhjalan)
						echo '<th>'.$valhjalan->nama_kriteria.'</th>';
					echo '</tr>';
				endif;
				?>
			</thead>
			<tbody>
				<?php
				if($count_jalan):
					foreach ($all_jalan as $key_jalan => $val_jalan):
						echo '<tr><th>'.$val_jalan->nama_jalan.'</th>';
						$nilai = $this->Mymod->ViewDataWhere('penilaian',['kode_jalan' => $val_jalan->kode_jalan])->result_array();
						foreach ($nilai as $sk) : 
							echo '<td><input type="number" name="jalan['.$val_jalan->kode_jalan.'][]" value='.$sk["penilaian_nilai"].' style="width: 90px;" readonly></td>';
						endforeach; 
						echo '</tr>';
					endforeach;
				endif;
				?>
			</tbody>
		</table>
	</div>
	<div class="form-horizontal">
		<a href="javascript: void(0);" id="reset-form" class="btn btn-danger">Hitung Ulang</a>
		<a href="javascript: void(0);" class="btn btn-primary" id="hasil">Hasil</a>
		<button type="submit" name="hitung" class="btn btn-info pull-right">Hitung</button>
	</div>
	<div class="clearfix"></div>
</form>
<script type="text/javascript">
	$(document).ready(function(){
		var form_awal = $("#form-kriteria table#kriteria").html();
		var form_jalan_awal = $("#form-kriteria table#jalan").html();
		
		$("#form-kriteria").submit(function(e){
			e.preventDefault();
			$.ajax({
				"url": "<?php echo base_url(); ?>home/set_kriteria_proc",
				"type": "post",
				"dataType": "json",
				"data": $(this).serialize(),
				"success": function( res ){
					//Table Kriteria
					var title = [];
					$("#form-kriteria table#kriteria > tbody").find("tr").each(function(idx, data){
						title.push($(data).find("th").text());
					});
					$("#form-kriteria table#kriteria > tbody").html(res.kriteria);
					$("#form-kriteria table#kriteria > tbody").find("tr").each(function(idx, data){
						$(this).find("td:eq(0)").before("<th>"+title[idx]+"</th>");
					});

					// Table Jalan
					var title_jalan = [];
					$("#form-kriteria table#jalan > tbody").find("tr").each(function(idx, data){
						title_jalan.push( $(data).find("th").text() );
					});
					$("#form-kriteria table#jalan > tbody").html(res.jalan);
					$("#form-kriteria table#jalan > tbody").find("tr").each(function(idx, data){
						$(this).find("td:eq(0)").before("<th>"+title_jalan[idx]+"</th>");
					});

					// Nonaktifkan Tombol Hitung
					$("button[name=hitung]").prop('disabled', true);
				}
			});
		});

		$("#reset-form").click(function(){
			$("#form-kriteria table#kriteria").html( form_awal );
			$("#form-kriteria table#jalan").html(form_jalan_awal);
			$("button[name=hitung]").prop("disabled", false);
			if( $("#hasil-akhir") )
				$("#hasil-akhir").remove();
		});

		$("#hasil").click(function(){
			$.get("<?php echo base_url(); ?>home/hasil", function(res){
				if( $("#hasil-akhir") )
					$("#hasil-akhir").remove();
				$("#form-kriteria .form-horizontal").before(res);
			});
		});
	});
</script>