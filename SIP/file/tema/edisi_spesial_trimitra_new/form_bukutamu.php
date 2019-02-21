<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("formbuku");
			frmvalidator.addValidation("nama","req","Nama harus diisi");
			frmvalidator.addValidation("nama","maxlen=30","Nama maksimal 30 karakter");
			frmvalidator.addValidation("nama","minlen=3","Nama minimal 3 karakter");
	  
			frmvalidator.addValidation("email","req","Email harus diisi");
			frmvalidator.addValidation("email","email","Format email salah");
			
			frmvalidator.addValidation("subjek","req","Subjek harus diisi");
			frmvalidator.addValidation("subjek","maxlen=30","Subjek maksimal 30 karakter");
			frmvalidator.addValidation("subjek","minlen=3","Subjek minimal 3 karakter");
			
			frmvalidator.addValidation("kode","req","Kode verifikasi harus diisi");
			
			frmvalidator.addValidation("pesan","req","Pesan harus diisi");
			frmvalidator.addValidation("pesan","minlen=5","Pesan minimal 5 karakter");
			//]]>
		</script>