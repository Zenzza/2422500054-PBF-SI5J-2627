<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="m-0"><strong>Edit Data Program Kursus</strong></h5>
                </div>
                <div class="card-body">
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="idprogramkursus">ID Program Kursus</label>
                            <input type="text" class="form-control" id="idprogramkursus" name="idprogramkursus"
                            placeholder=" Masukkan idprogramkursus" value="<?= $edit['idprogramkursus']?>"
                            readonly>
                        </div>

                        <div class="form-group">
                            <label for="nmprogramkursus">Nama Program Kursus</label>
                            <input type="text" class="form-control" id="nmprogramkursus" name="nmprogramkursus"
                            placeholder=" Masukkan Nama Guru" value="<?= $edit['nmprogramkursus']?>">
                        </div>

                        <button type="submit" name="submit" id="submit" class="btn btn-primary">Ubah Data</button>
                        <a href="<?= base_url('program_kursus');?>"><button type="button" class="btn btn-danger">Batal</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><!-- /.container-fluid -->