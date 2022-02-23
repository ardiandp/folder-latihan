<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <td>No</td>
            <td>Nama Mahasiswa</td>
            <td>Alamat</td>
            <td>Jurusan</td>
            <td>Jenis Kelamin</td>
            <td>Tanggal Masuk</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        <?php
            include 'koneksi.php';
            $no = 1;
            $query = "SELECT * FROM tbl_mahasiswa ORDER BY id DESC";
            $dewan1 = $db1->prepare($query);
            $dewan1->execute();
            $res1 = $dewan1->get_result();

            if ($res1->num_rows > 0) {
                while ($row = $res1->fetch_assoc()) {
                    $id = $row['id'];
                    $nama_mahasiswa = $row['nama_mahasiswa'];
                    $alamat = $row['alamat'];
                    $jurusan = $row['jurusan'];
                    $jenis_kelamin = $row['jenis_kelamin'];
                    $tgl_masuk = $row['tgl_masuk'];
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $nama_mahasiswa; ?></td>
                <td><?php echo $alamat; ?></td>
                <td><?php echo $jurusan; ?></td>
                <td><?php echo $jenis_kelamin; ?></td>
                <td><?php echo $tgl_masuk; ?></td>
                <td>
                    <button id="<?php echo $id; ?>" class="btn btn-success btn-sm edit_data"> <i class="fa fa-edit"></i> Edit </button>
                    <button id="<?php echo $id; ?>" class="btn btn-danger btn-sm hapus_data"> <i class="fa fa-trash"></i> Hapus </button>
                </td>
            </tr>
        <?php } } else { ?> 
            <tr>
                <td colspan='7'>Tidak ada data ditemukan</td>
            </tr>
        <?php } ?>
    </tbody>
</table>


<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>