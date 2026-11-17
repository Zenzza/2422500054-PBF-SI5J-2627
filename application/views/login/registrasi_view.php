<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('<?php echo base_url(); ?>images/bg_1.jpg')">
    <div class="container">
      <div class="row align-items-end justify-content-center text-center">
        <div class="col-lg-7">
          <h2 class="mb-0">Register</h2>
          <p>Silakan Register Disini.</p>
        </div>
      </div>
    </div>
  </div> 

  <div class="custom-breadcrumns border-bottom">
    <div class="container">
      <a href="<?php echo base_url(); ?>">Home</a>
      <span class="mx-3 icon-keyboard_arrow_right"></span>
      <span class="current">Register</span>
    </div>
  </div>

  <div class="site-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <?php if (validation_errors()) : ?>
            <div class="alert alert-danger">
              <?php echo validation_errors(); ?>
            </div>
          <?php endif; ?>
          <?php if (isset($error) && !empty($error)) : ?>
            <div class="alert alert-danger">
              <?php echo $error; ?>
            </div>
          <?php endif; ?>

          <form name="form" method="post" action="<?php echo base_url('login/simpan_registrasi'); ?>">
            <div class="form-group">
              <label for="nmpeserta">Nama Peserta</label>
              <input type="text" id="nmpeserta" name="nmpeserta" value="<?php echo set_value('nmpeserta'); ?>" class="form-control form-control-lg" required>
            </div>
            <div class="form-group">
              <label for="jenkel">Jenis Kelamin</label>
              <select id="jenkel" name="jenkel" class="form-control form-control-lg" required>
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="Laki-laki" <?php echo set_select('jenkel', 'Laki-laki'); ?>>Laki-laki</option>
                <option value="Perempuan" <?php echo set_select('jenkel', 'Perempuan'); ?>>Perempuan</option>
              </select>
            </div>
            <div class="form-group">
              <label for="notelpon">Nomor Telepon</label>
              <input type="text" id="notelpon" name="notelpon" value="<?php echo set_value('notelpon'); ?>" class="form-control form-control-lg" required>
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <input type="text" id="alamat" name="alamat" value="<?php echo set_value('alamat'); ?>" class="form-control form-control-lg" required>
            </div>
            <div class="form-group">
              <label for="kota">Kota</label>
              <input type="text" id="kota" name="kota" value="<?php echo set_value('kota'); ?>" class="form-control form-control-lg" required>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" id="email" name="email" value="<?php echo set_value('email'); ?>" class="form-control form-control-lg" required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" id="password" name="password" class="form-control form-control-lg" required>
            </div>
            <div class="form-group mt-4">
              <button type="submit" value="Register" name="submit" class="btn btn-primary btn-lg px-5">REGISTER</button>
              <a href="<?php echo base_url('login'); ?>" class="btn btn-link">Sudah punya akun? Login</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>