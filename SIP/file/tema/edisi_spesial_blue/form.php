
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("formpsb");
			frmvalidator.addValidation("nama","req","Nama harus diisi");
			frmvalidator.addValidation("nama","maxlen=30","Nama maksimal 30 karakter");
			frmvalidator.addValidation("nama","minlen=3","Nama minimal 3 karakter");
	  
			frmvalidator.addValidation("nem","req","Nem harus diisi");
			frmvalidator.addValidation("nem","maxlen=5","Nem maksimal 5 karakter");
			frmvalidator.addValidation("nem","minlen=2","Nem minimal 2 karakter");
	  
			frmvalidator.addValidation("sekolah_asal","req","Sekolah asal harus diisi");
			frmvalidator.addValidation("no_sttb","req","Nomor STTB harus diisi");
			frmvalidator.addValidation("tanggal_sttb","req","Tanggal STTB harus diisi");
			frmvalidator.addValidation("tanggal_lahir","req","Tanggal lahir harus diisi");
			
			frmvalidator.addValidation("tempat_lahir","req","Tempat lahir harus diisi");
			frmvalidator.addValidation("tempat_lahir","minlen=3","Tempat minimal 3 karakter");
			frmvalidator.addValidation("tempat_lahir","maxlen=30","Tempat lahir maksimal 30 karakter");
			
			frmvalidator.addValidation("alamat","req","Alamat lengkap harus diisi");
			frmvalidator.addValidation("alamat","minlen=10","Alamat lengkap minimal 10 karakter");
			
			frmvalidator.addValidation("nama_ortu","req","Nama orang tua masuk harus diisi");
			
			frmvalidator.addValidation("pekerjaan_ortu","req","Pekerjaan orang tua harus diisi");
			
			frmvalidator.addValidation("email","email","Format email salah");
			frmvalidator.addValidation("jk","selone","Anda belum memilih jenis kelamin");
			frmvalidator.addValidation("polling","selone","Anda belum menjawab pertanyaan polling");

			//]]>
		</script>