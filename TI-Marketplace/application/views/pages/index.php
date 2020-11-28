  
    <!-- Page Content -->
    <div class="page-content page-home">
      <section class="store-carousel">
        <div class="container">
          <div class="row">
            <div class="col-lg-12" data-aos="zoom-in">
              <div
                id="storeCarousel"
                class="carousel slide"
                data-ride="carousel"
              >
                <ol class="carousel-indicators">
                  <li
                    class="active"
                    data-target="#storeCarousel"
                    data-slide-to="0"
                  ></li>
                  <li data-target="#storeCarousel" data-slide-to="1"></li>
                  <li data-target="#storeCarousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img
                      src="<?= base_url(); ?>assets/images/banner.jpg"
                      alt="Carousel Image"
                      class="d-block w-100"
                    />
                  </div>
                  <div class="carousel-item">
                    <img
                      src="<?= base_url(); ?>assets/images/banner.jpg"
                      alt="Carousel Image"
                      class="d-block w-100"
                    />
                  </div>
                  <div class="carousel-item">
                    <img
                      src="<?= base_url(); ?>assets/images/banner.jpg"
                      alt="Carousel Image"
                      class="d-block w-100"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="store-trend-categories">
        <div class="container">
          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <h5>Trend Categories</h5>
            </div>
          </div>
          <div class="row">
            <div
              class="col-6 col-md-3 col-lg-2"
              data-aos="fade-up"
              data-aos-delay="100"
            >
              <a href="#" class="component-categories d-block">
                <div class="categories-image">
                  <img
                    src="<?= base_url(); ?>assets/images/categories-gadgets.svg"
                    alt=""
                    class="w-100"
                  />
                  <p class="categories-text">Gadgets</p>
                </div>
              </a>
            </div>
            <div
              class="col-6 col-md-3 col-lg-2"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <a href="#" class="component-categories d-block">
                <div class="categories-image">
                  <img
                    src="<?= base_url(); ?>assets/images/categories-furniture.svg"
                    alt=""
                    class="w-100"
                  />
                  <p class="categories-text">Furniture</p>
                </div>
              </a>
            </div>
            <div
              class="col-6 col-md-3 col-lg-2"
              data-aos="fade-up"
              data-aos-delay="300"
            >
              <a href="#" class="component-categories d-block">
                <div class="categories-image">
                  <img
                    src="<?= base_url(); ?>assets/images/categories-makeup.svg"
                    alt=""
                    class="w-100"
                  />
                  <p class="categories-text">Make Up</p>
                </div>
              </a>
            </div>
            <div
              class="col-6 col-md-3 col-lg-2"
              data-aos="fade-up"
              data-aos-delay="400"
            >
              <a href="#" class="component-categories d-block">
                <div class="categories-image">
                  <img
                    src="<?= base_url(); ?>assets/images/categories-sneaker.svg"
                    alt=""
                    class="w-100"
                  />
                  <p class="categories-text">Sneaker</p>
                </div>
              </a>
            </div>
            <div
              class="col-6 col-md-3 col-lg-2"
              data-aos="fade-up"
              data-aos-delay="500"
            >
              <a href="#" class="component-categories d-block">
                <div class="categories-image">
                  <img src="<?= base_url(); ?>assets/images/categories-tools.svg" alt="" class="w-100" />
                  <p class="categories-text">Tools</p>
                </div>
              </a>
            </div>
            <div
              class="col-6 col-md-3 col-lg-2"
              data-aos="fade-up"
              data-aos-delay="600"
            >
              <a href="#" class="component-categories d-block">
                <div class="categories-image">
                  <img src="<?= base_url(); ?>assets/images/categories-baby.svg" alt="" class="w-100" />
                  <p class="categories-text">Baby</p>
                </div>
              </a>
            </div>
          </div>
        </div>
      </section>

      <section class="store-new-products">
        <div class="container">
          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <h5>New Products</h5>
            </div>
          </div>
          <div class="row">
            <?php foreach ($products as $product) : ?>
            <div
              class="col-6 col-md-4 col-lg-3"
              data-aos="fade-up"
              data-aos-delay="100"
            >
              <a href="<?= base_url(); ?>product/detail/<?= $product['id']; ?>" class="component-products d-block">
                <div class="products-thumbnail">
                  <div
                    class="products-image"
                    style="
                      background-image: url('<?= $product['image']; ?>');
                    "
                  ></div>
                </div>
                <div class="products-text"><?= $product['name']; ?></div>
                <div class="products-price">Rp. <?= number_format($product['price'], 0, ".", "."); ?>,-</div>
              </a>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </section>
    </div>