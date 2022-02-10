<title> Mengambil data dengna Ajax</title>
<link rel="stylesheet" href="css/colorbox.css" />
<script src="js/jquery.min.js"></script>
		<script src="js/jquery.colorbox.js"></script>
		<script>
			$(document).ready(function(){
				//Examples of how to assign the ColorBox event to elements

				$(".ajax").colorbox({width:'650px',height:'450px'});
 
				
			});
		</script>
         <style>
   body,table,input{
   	font-size:12px
   }
 </style>

<script language="javascript">
var my_variable = new Array(); // for example
function passingToParent(){
    arrayOfStrings = my_variable[0].split(',');    
    for (var i=1; i < my_variable.length; i++) {
        $('#' + arrayOfStrings[i-1]).val(my_variable[i]);
    }
    // single form
    //parent.$.fn.colorbox.close();

    // framework form
    jQuery.colorbox.close();;
}
</script>	

<body>
    Pilih Pegawai :  <a href="daftar_bpjs.php" class="ajax" onClick="my_variable[0]='no_va,nama,hub_keluarga'"> <img src="button_search.png" border="0" /></a> <br>
    <input type="text" id="no_va" name="no_va" size="20" placeholder="NO VA"> <br>
    <input type="text" id="nama" name="nama" size="30" placeholder="Nama Lengkap"><br>
    <input type="text" id="hub_keluarga" name="hub_keluarga" size="30" placeholder="hubungan keluarga">
   

 <small id="divAlertPegawai"></small>
 <body>