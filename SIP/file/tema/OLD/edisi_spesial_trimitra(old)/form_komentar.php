<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("formkomentar");
			frmvalidator.addValidation("nama","req","Nama harus diisi");
			frmvalidator.addValidation("nama","maxlen=30","Nama maksimal 30 karakter");
			frmvalidator.addValidation("nama","minlen=3","Nama minimal 3 karakter");
	  
			frmvalidator.addValidation("email","req","Email harus diisi");
			frmvalidator.addValidation("email","email","Format email salah");
			
			frmvalidator.addValidation("kode","req","Kode verifikasi harus diisi");
			
			frmvalidator.addValidation("komentar","req","Komentar harus diisi");
			frmvalidator.addValidation("komentar","minlen=5","Komentar minimal 5 karakter");
			//]]>
		</script>