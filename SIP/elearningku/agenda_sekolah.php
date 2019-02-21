				<?php
				$materiterpopuler=mysql_query("SELECT * FROM sh_agenda ORDER BY id_agenda DESC LIMIT 5");
				$hitungmtp=mysql_num_rows($materiterpopuler);
				
				if ($hitungmtp > '0'){
				while ($mtp=mysql_fetch_array($materiterpopuler)){
				?>
                <div class="panel panel-primary">
                <div class="panel-heading"><h3 class="panel-title">Jadwal Agenda Sekolah</h3></div>
                <div class="panel-body">
                <div class="table-responsive">
                <table class="table text-justify">
				<tr>
                  <td width="40">Kegiatan</td>
                  <td width="10">:</td>
		          <td width="40"><?php echo $mtp[judul_agenda]?></td>
                </tr>
                <tr>
                    <td width="40">Tanggal Pelaksanaan</td>
                    <td width="10">:</td>
                    <td width="40"><?php echo $mtp[tanggal_agenda]?></td>
                </tr>
                <tr>
                    <td width="40">Lokasi Pelaksanaan</td>
                    <td width="10">:</td>
                    <td width="40"><?php echo $mtp[tempat_agenda]?></td>
                </tr>
                <tr>
                    <td width="40">Keterangan</td>
                    <td width="10">:</td>
                    <td width="40"><?php echo $mtp[keterangan_agenda]?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
</table>
</div>
</div>
</div>
				<?php }}
				else {?>
				<tr><td class="garis"><a href=""><b>Belum ada materi yang diupload</b></td></tr>
				<?php } ?>