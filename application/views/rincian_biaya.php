<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5 class="m-0"><strong>Data Rincian Biaya</strong></h5>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('pesan');?>
            <a href="<?= base_url('rincian_biaya/tambahrincian_biaya');?>"><span class="btn btn-primary btn-sm">Tambah Data</span></a><br><br>
            <table id="tabel-akademik" class="table table-striped table-advance table-hover">
                <thead>
                    <tr bgcolor="white">
                        <th style="width:10px">No</th>
                        <th>ID Rincian Biaya</th>
                        <th>Nama Rincian Biaya</th>
                        <th bgcolor="white" style="color:black;"><center>Action</center></th>
                    </tr>
                </thead>
                <tbody bgcolor="white">
                    <?php $no=1;?>
                    <?php foreach ($data_rincian_biaya as $hasil) :?>
                    <tr>
                        <td ><?= $no?></td>
                        <td><?= $hasil['idrincian']?></td>
                        <td><?= $hasil['nmrincian']?></td>
                        <td><center>
                            <a href="<?= base_url('rincian_biaya/editrincian_biaya/').$hasil['idrincian'] ?>"><span class="badge bg-warning">Edit</span></a>
                            <a href="<?= base_url('rincian_biaya/hapus/').$hasil['idrincian'] ?>" ><span class="badge bg-danger" onclick="return confirm('Yakin?')">Hapus</span></a></center>
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