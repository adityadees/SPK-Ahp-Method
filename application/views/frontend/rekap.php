       <section class="heading-page">
        <img src="<?= base_url()?>assets/frontend/images/bloggrid-heading-bg.jpg" alt="">
        <div class="container">
            <div class="heading-page-content">
                <div class="au-page-title">
                    <h1>Rekap Pembangunan</h1>
                </div>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Rekap Pembangunan</li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
    <section class="aboutus-skillls section-padding-large js-waypoint wow fadeIn" data-wow-delay="0.3s">
        <div class="container">
            <div class="our-skillls-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="list-skills">
                            <h2 class="title">Rekap Pembangunan</h2>
                            <p class="desc">
                                <table class="table table-bordered table-hovered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Jalan</th>
                                            <th>Nama Jalan</th>
                                            <th>Periode</th>
                                            <th>Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=0; foreach($print as $kk ): $no++;?>
                                        <tr>
                                            <td><?= $no;?> </td>
                                            <td><?= $kk->kode_jalan; ?></td>
                                            <td><?= $kk->nama_jalan; ?></td>
                                            <td><?= $kk->periode; ?></td>
                                            <td><?= $kk->nila_weigh; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>