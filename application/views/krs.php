<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5 class="m-0"><strong>Data KRS</strong></h5>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('pesan');?>
            <a href="<?= base_url('krs/tambahkrs');?>"><span class="btn btn-primary btn-sm">Tambah Data</span></a><br><br>
            <table id="tabel-akademik" class="table table-striped table-advance table-hover">
                <thead>
                    <tr bgcolor="white">
                        <th style="width:10px">No</th>
                        <th>Kode KRS</th>
                        <th>Tahun Ajaran</th>
                        <th>Semester</th>    
                        <th>Keterangan</th>      
                        <th bgcolor="white" style="color:black;"><center>Action</center></th>
                    </tr>
                </thead>
                <tbody bgcolor="white">
                    <?php $no=1;?>
                    <?php foreach ($data_krs as $hasil) :?>
                    <tr>
                        <td ><?= $no?></td>
                        <td><?= $hasil['kd_krs']?></td>
                        <td><?= $hasil['thn_ajaran']?></td>
                        <td><?= $hasil['semester']?></td>     
                        <td><?= $hasil['keterangan']?></td>     
                        <td><center>
                            <a href="<?= base_url('krs/editkrs/').$hasil['kd_krs'] ?>"><span class="badge bg-warning">Edit</span></a>
                            <a href="<?= base_url('krs/hapus/').$hasil['kd_krs'] ?>" ><span class="badge bg-danger" onclick="return confirm('Yakin?')">Hapus</span></a></center>
                        </td>
                    </tr>
                    <?php $no++?>
                    <?php endforeach ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
</div><!-- /.container-fluid -->
</div>