<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="m-0"><strong>Lihat Pendaftaran Peserta</strong></h5>
                </div>
                <div class="card-body">
                    <?= $this->session->flashdata('pesan');?>
                    <table id="tabel-akademik" class="table table-striped table-advance table-hover">
                        <thead>
                            <tr bgcolor="white">
                                <th style="width:10px">No</th>
                                <th>Nomor Pendaftaran</th>
                                <th>Tanggal Registrasi</th>
                                <th>Nama Peserta</th>
                                <th>Nama Program Kursus</th>
                                <th bgcolor="white" style="color:black;"><center>Action</center></th>
                            </tr>
                        </thead>
                        <tbody bgcolor="white">
                            <?php $no=1;?>
                            <?php foreach ($data_pendaftaran as $hasil) :?>
                            <tr>
                                <td><?= $no?></td>
                                <td><?= $hasil['nopendaftaran']?></td>
                                <td><?= $hasil['tglregistrasi']?></td>
                                <td><?= $hasil['nmpeserta']?></td>
                                <td><?= $hasil['nmprogramkursus']?></td>
                                <td><center>
                                    <a href="<?= base_url('pendaftaran/hapus/').$hasil['nopendaftaran'] ?>" ><span class="badge bg-danger" onclick="return confirm('Yakin?')">Hapus</span></a></center>
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