<?php // Menghilangkan Error Notice
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>

<?php
// Fungsi Merubah Format Tanggal Indonesia
function tgl_indo($tgl)
{

   $date  = substr($tgl,8,2);
   $month = get_bulan(substr($tgl,5,2));
   $year  = substr($tgl,0,4);
   return $date.' '.$month.' '.$year;

}
// Fungsi Merubah Format Bulan
function get_bulan($bln) 
{
switch ($bln){
        case 1;
		  return "Jan";
		  break;
        case 2;
		  return "Feb";
		  break;
		case 3;
		  return "Mar";
		  break;
		case 4;
		  return "Apr";
		  break;
		case 5;
		  return "Mei";
		  break;
		case 6;
		  return "Jun";
		  break;
		case 7;
		  return "Jul";
		  break;
		case 8;
		  return "Agu";
		  break;
		case 9;
		  return "Sept";
		  break;
		case 10;
		  return "Okt";
		  break;
		case 11;
		  return "Nov";
		  break;
		case 12;
		  return "Des";
		  break;

}

}

     // Array Variable Nama Bulan dalam Versi Indonesia      
	$monthNames = Array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", 
                        "Agustus", "September", "Oktober", "November", "Desember");

    // Jika data bulan & tahun tidak kosong   
	if (!isset($_REQUEST["month"])) $_REQUEST["month"] = date("n");
    if (!isset($_REQUEST["year"])) $_REQUEST["year"] = date("Y");

	//Bulan Sekarang
    $cMonth = $_REQUEST["month"];
	 //Tahun Sekarang
     $cYear  = $_REQUEST["year"];
	//Hari  Sekarang
	 $dnow = date('d');
	 //Bulan Sekarang
	 $mnow = date('m');
	 //Tahun Sekarang
	 $ynow = date('Y');
 
        $prev_year  = $cYear;
        $next_year  = $cYear;
        $prev_month = $cMonth-1;
        $next_month = $cMonth+1;
 
        if($prev_month == 0 ) 
			  {
                 $prev_month = 12;
                 $prev_year = $cYear - 1;
              }

		if($next_month == 13 )
			  {
                 $next_month = 1;
                 $next_year = $cYear + 1;
              }
 ?>