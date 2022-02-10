<script language="javascript">
		function getSelected(no_va, nama, nhub_keluarga){	
			
			var args = new Array();
			
			for (var i = 0; i < arguments.length; i++)
				window.parent.my_variable[i+1] = arguments[i];
				
			window.parent.passingToParent();
		}

  </script>

<?php

if (empty($_POST["cari"]))
    $_POST["cari"] = "";

$mysqli = new mysqli("localhost", "root", "", "test");

 $ssql = "SELECT * FROM bpjs_mandiri 
 WHERE no_va like '%$_POST[cari]%'
 or nama like '%$_POST[cari]%'";
 $query = $mysqli->query($ssql);

?>


<table bgcolor="#000000" cellspacing="1" cellpadding="3">	
	<tr bgcolor="#DDDDDD">
		<th>NIK</th>
		<th>Nama</th>
		<th>HUB keluarga</th>
		<th>Kelas</th>
	</tr>
	<?php while($row = $query->fetch_object()): ?>
	
	<tr bgcolor="#FFFFFF">
		<!-- fungsi selectPegawai di deklarasikan di index.html dan file ini bisa memanggilnya selama file ini
			 dipanggil oleh thickbox dari index.html, fungsi dari selectPegawai adalah untuk memasukan nilai
			 NIP dan nama pegawai dari masing-masing baris di daftar pegawai ini -->
		<td align="center">
			<a href="javascript:getSelected('<?=$row->no_va?>','<?=$row->nama?>','<?=$row->hub_keluarga?>')">
				<?=$row->nik?>
			</a>
		</td>
		<td><?=$row->nama?></td>
		<td align="center"><?=$row->hub_keluarga?></td>
		<td><?=$row->kelas?></td>
	</tr>
	<?php endwhile; ?>
</table>