<!DOCTYPE html>
<html>
<head>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <br>
    <h4>Menampilkan Data pada Tabel berdasarkan pilihan Combo Box di PHP</h4>

    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="get">
    <div class="form-group">
        <label for="sel1">Select list:</label>
        <select class="form-control" name="jurusan" onchange="this.form.submit()">
            <?php
            include "koneksi.php";
            //Perintah sql untuk menampilkan semua data pada tabel jurusan
            $sql="select * from jurusan";

            $hasil=mysqli_query($kon,$sql);
            $no=0;
            while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            $ket="";
            if (isset($_GET['jurusan'])) {
                $jurusan = trim($_GET['jurusan']);

                if ($jurusan==$data['kode_jurusan'])
                {
                    $ket="selected";
                }
            }
            ?>
            <option <?php echo $ket; ?> value="<?php echo $data['kode_jurusan'];?>"><?php echo $data['nama_jurusan'];?></option>
            <?php
	}
  ?>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-info" value="Pilih">
    </div>
    </form>

    <table class="table table-bordered table-hover">
        <br>
        <thead>
        <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>Jurusan</th>
            <th>Umur</th>

        </tr>
        </thead>
        <?php


        if (isset($_GET['jurusan'])) {
            $jurusan=trim($_GET['jurusan']);
            $sql="select * from mahasiswa where jurusan='$jurusan' order by nik asc";
        }else {
            $sql="select * from mahasiswa order by nik asc";
        }


        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["nik"]; ?></td>
                <td><?php echo $data["nama"];   ?></td>
                <td><?php echo $data["jk"];   ?></td>
                <td><?php echo $data["tanggal_lhr"];   ?></td>
                <td><?php echo $data["jurusan"];   ?></td>
                <td><?php echo $data["umur"];   ?></td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>


</div>

</body>
</html>