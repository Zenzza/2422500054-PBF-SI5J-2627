<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="m-0"><strong>Lihat Peserta</strong></h5>
                </div>
                <div class="card-body">
                    <?= $this->session->flashdata('pesan');?>

                    <table id="tabel-akademik" class="table table-striped table-advance table-hover">
                        <thead>
                            <tr bgcolor="white">
                                <th style="width:10px">No</th>
                                <th>Nomor Peserta</th>
                                <th>Nama Peserta</th>
                                <th>Jenkel</th>
                                <th>Telpon</th>
                                <th>Alamat</th>
                                <th>Kota</th>
                                <th bgcolor="white" style="color:black;"><center>Action</center></th>
                            </tr>
                        </thead>
                        <tbody bgcolor="white">
                            <?php $no=1;?>
                            <?php foreach ($data_peserta as $hasil) :?>
                            <tr>
                                <td ><?= $no?></td>
                                <td><?= $hasil['nopeserta']?></td>
                                <td><?= $hasil['nmpeserta']?></td>
                                <td><?= $hasil['jenkel']?></td>
                                <td><?= $hasil['notelpon']?></td>
                                <td><?= $hasil['alamat']?></td>
                                <td><?= $hasil['kota']?></td>
                                <td><center>
                                    
                                    <a href="<?= base_url('peserta/hapus/').$hasil['nopeserta'] ?>" ><span class="badge bg-danger" onclick="return confirm('Yakin?')">Hapus</span></a></center>
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