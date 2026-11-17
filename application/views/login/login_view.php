    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('<?php echo base_url(); ?>images/bg_1.jpg')">
        <div class="container">
          <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
              <h2 class="mb-0">Login</h2>
              <p>Silahkan Masukkan Email dan Password Anda!</p>
            </div>
          </div>
        </div>
      </div> 
    

    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="<?php echo base_url(); ?>">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Login</span>
      </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <?php if (isset($error) && !empty($error)) : ?>
                        <div class="alert alert-danger">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('sukses')) : ?>
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('sukses'); ?>
                        </div>
                    <?php endif; ?>

                    <form name="form" method="post" action="<?php echo base_url('login/authentication'); ?>">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" value="<?php echo set_value('email'); ?>" class="form-control form-control-lg" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control form-control-lg" required>
                        </div>
                        <div class="form-group mt-4">
                            <button type="submit" value="Login" name="submit" class="btn btn-primary btn-lg px-5">Login</button>
                            <a href="<?php echo base_url('login/registrasi'); ?>" class="btn btn-link">Belum punya akun? Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>