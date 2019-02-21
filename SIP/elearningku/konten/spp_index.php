<div class="panel panel-primary">
<div class="panel-heading"><h1 class="panel-title">Menu Data Biaya</h1></div>
	<div class="panel-body">
		<div id="menu_biaya" style="height:380px;">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<form class="form-horizontal" method="POST" action="<?php $_SERVER['PHP_SELF']?>">
			<select name="tahun" class="form-control">
			<option>- Pilih Tahun Ajaran -</option>
			<?php 
				$sql_ta=mysql_query("select distinct thn_ajaran from sh_spp order by thn_ajaran desc");
				while ($data_ta=mysql_fetch_array($sql_ta)){ echo "<option value=$data_ta[thn_ajaran]>$data_ta[thn_ajaran]</option>"; }
			?>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="btn-group form-horizontal">
				<button class="btn dropdown-toggle form-control" data-toggle="dropdown">
				Pilih Halaman
				<span class="caret"></span>
				</button>
				<ul class="dropdown-menu ">
				<li><a href="?p=spp">SPP<a/></li>
				<li><a href="?p=nonspp">Non-SPP<a/></li>
				</ul>
			</div>
		</div>
	</div>
		</div>	
	</div>
</div>