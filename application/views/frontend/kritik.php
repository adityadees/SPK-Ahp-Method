       <section class="heading-page">
        <img src="<?= base_url()?>assets/frontend/images/bloggrid-heading-bg.jpg" alt="">
        <div class="container">
            <div class="heading-page-content">
                <div class="au-page-title">
                    <h1>Kritik & Saran</h1>
                </div>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kritik & Saran</li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
    <section class="contact-us section-padding-large">
        <div class="container">
            <div class="contact-us-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="contact-form">
                            <p>
                                <?php if($this->session->flashdata('success')){ ?>
                                    <div class="alert alert-success">
                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                        <strong>Sukses!</strong> <?php echo $this->session->flashdata('success'); ?>
                                    </div>
                                <?php } else if($this->session->flashdata('error')){?>
                                    <div class="alert alert-warning">
                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                        <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
                                    </div>
                                <?php }?>
                            </p>
                            <h3 class="contact-title">
                                Kritik & Saran
                            </h3>
                            <form method="POST" action="<?= base_url()?>frontendc/save_kritik" class="">
                                <div class="form-input">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="wrap-group">
                                                <input type="text" name="name" placeholder="Nama*" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="wrap-group">
                                                <input type="email" name="email" placeholder="Email*" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="wrap-group">
                                                <input type="text" name="tel" placeholder="Telepon" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wrap-group">
                                    <textarea name="comment" placeholder="Pesan*" required></textarea>
                                </div>
                                <div class="wrap-group">
                                    <input type="submit" class="btn-submit"  value="Submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>