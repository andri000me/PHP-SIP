		<div class="judulbox">Polling PSB</div>
		
		<table class="isian" style="margin:10px;">
		<tr><td>
		Berikut adalah data polling dari total pendaftar online, data berikut merupakan hasil dari pertanyaan <b>Darimanakah anda mengetahui PSB ONLINE <?php echo "$ns[isi_pengaturan]";?> ?</b>
		</td></tr></table>
		
		<table class="isian" style="margin:10px; font-weight: bold;">
		<?php
			//Menghitung jumlah data polling Media Cetak//
			$media=mysql_query("SELECT * FROM sh_psb WHERE polling_psb='Media Cetak'");
			$mc=mysql_num_rows($media);
			
			
			//Menghitung jumlah data polling Internet//
			$internet=mysql_query("SELECT * FROM sh_psb WHERE polling_psb='Internet'");
			$in=mysql_num_rows($internet);
			
			
			//Menghitung jumlah data polling Teman//
			$teman=mysql_query("SELECT * FROM sh_psb WHERE polling_psb='Teman'");
			$tmn=mysql_num_rows($teman);
			
			
			//Menghitung jumlah data polling Kerabat//
			$kerabat=mysql_query("SELECT * FROM sh_psb WHERE polling_psb='Kerabat'");
			$krb=mysql_num_rows($kerabat);
			
			
			
		?>
			<tr><td class="isiankanan" style="width: 10px;"><?php echo "$mc"; ?></td><td class="isian"><a href="">Media Cetak</td></tr>
			<tr><td class="isiankanan" style="width: 10px;"><?php echo "$in"; ?></td><td class="isian"><a href="">Internet</td></tr>
			<tr><td class="isiankanan" style="width: 10px;"><?php echo "$tmn"; ?></td><td class="isian"><a href="">Teman</td></tr>
			<tr><td class="isiankanan" style="width: 10px;"><?php echo "$krb"; ?></td><td class="isian"><a href="">Kerabat</td></tr>
			
		</table>