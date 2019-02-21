<link rel="stylesheet" type="text/css" href="css/style.css"/>
<style>
  .wraplogin{
    text-align: center;
    background: #6FB7FF;
    width: 400px;
    height: 200px;
    margin-top: 15%;
    margin-left: 35%;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 1px 0 #bbb, 0 2px 0 #bbb, 0 3px 0 #aaa, 0 4px 0 #aaa, 0 5px 0 #999, 0 6px 1px #000, 0 0px 3px #000, 0 1px 3px #000, 0 3px 5px #000, 0 5px 10px #000, 0 5px 20px #000;    
  }
  .leftbar{
    float: left;
    text-align: justify;
    margin-top: 40px;
    margin-left: 15px;
  }
  .rightbar{
    float: left;
    margin-top: 30px;
  }
</style>
<div class="wraplogin">
<div class="leftbar">
  <img src="css/img/login.png" width="100" height="100px"/>
</div>
<div class="rightbar">
<table>
	<form method="POST" action="../../../elearningku/validasi.php" name="login" id="login">
	<tr class="form"><td><b>Username</b></td><td><input type="text" class="panjang" style="width: 85%" name="username" title="Masukkan NIP atau NIS anda"></td></tr>
	<tr class="form"><td><b>Password</b></td><td><input type="password" class="panjang" style="width: 85%" name="password" title="Masukkan password anda"></td></tr>
	<tr class="form"><td><b>Status</b></td><td>
							<select name="status">
								<option value="" selected>Pilih status...</option>
								<option value="guru">Guru</option>
								<option value="siswa">Siswa</option>
								<option value="ortu">Orang Tua</option>
							</select>
	</td></tr>
	<tr class="form"><td></td><td><input type="submit" class="tombol"value="Login"></td></tr>
	</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("login");
			
			frmvalidator.addValidation("username","req","Anda belum memasukkan Username");
			frmvalidator.addValidation("password","req","Anda belum memasukkan Password");
			frmvalidator.addValidation("status","req","Anda belum memilih status");
			//]]>
		</script>
</table>
</div>
</div> 