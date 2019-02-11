       <section class="heading-page">
        <img src="<?= base_url()?>assets/frontend/images/bloggrid-heading-bg.jpg" alt="">
        <div class="container">
            <div class="heading-page-content">
                <div class="au-page-title">
                    <h1>Gallery</h1>
                </div>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
    <section class="gallery-page section-padding-large">
        <div class="container">
            <div class="gallery-page-content gallery-hover">
                <div class="row">
                    <?php foreach($gallery as $akk) :?>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                            <div class="item">
                                <figure>
                                    <a href="<?= base_url()?>assets/images/<?= $akk['filefoto']; ?>" class="group-grid" data-fancybox="gallery">
                                        <img src="<?= base_url()?>assets/images/<?= $akk['filefoto']; ?>" alt="">
                                    </a>
                                </figure>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>