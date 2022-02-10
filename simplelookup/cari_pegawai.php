	<script language="javascript">
		function getSelected(no_int, id, nama){	
			
			var args = new Array();
			
			for (var i = 0; i < arguments.length; i++)
				window.parent.my_variable[i+1] = arguments[i];
				
			window.parent.passingToParent();
		}

  </script>
	<style>
	table {
	 border-collapse: collapse;
	 width: 100%;
	}
	th, td {
	 text-align: left;
	 padding: 8px;
	}
	tr:nth-child(even){background-color: #f2f2f2}
	th {
	 background-color: #4CAF50;
	 color: white;
	}
	</style>

<?php

	if (empty($_POST["cari"]))
		$_POST["cari"] = "";
	
	$mysqli = new mysqli("localhost", "root", "", "test");
	
	 $ssql = "SELECT * FROM pegawai 
	 WHERE nip like '%$_POST[cari]%'
	 or nama like '%$_POST[cari]%'";
	 $query = $mysqli->query($ssql);
 
?>
<table bgcolor="#000000" cellspacing="1" cellpadding="3">	
	<tr bgcolor="#DDDDDD">
		<th>No. Peg</th>
		<th>Nama</th>
		<th>Umur</th>
		<th>Alamat</th>
	</tr>
	<?php while($row = $query->fetch_object()): ?>
	
	<tr bgcolor="#FFFFFF">
		<!-- fungsi selectPegawai di deklarasikan di index.html dan file ini bisa memanggilnya selama file ini
			 dipanggil oleh thickbox dari index.html, fungsi dari selectPegawai adalah untuk memasukan nilai
			 NIP dan nama pegawai dari masing-masing baris di daftar pegawai ini -->
		<td align="center">
			<a href="javascript:getSelected('<?=$row->no_int?>','<?=$row->NIP?>','<?=$row->nama?>')">
				<?=$row->NIP?>
			</a>
		</td>
		<td><?=$row->nama?></td>
		<td align="center"><?=$row->umur?></td>
		<td><?=$row->alamat?></td>
	</tr>
	<?php endwhile; ?>
</table>