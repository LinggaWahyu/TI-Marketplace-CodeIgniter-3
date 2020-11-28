<!-- Page Content -->
    <div class="page-content page-details">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
      <section
        class="store-breadcrumbs"
        data-aos="fade-down"
        data-aos-delay="100"
      >
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="<?= base_url(); ?>product">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Product Details</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>

      <section class="store-gallery" id="gallery">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8" data-aos="zoom-in">
              <img
                src="<?= $product_details['image']; ?>"
                class="w-100 main-image"
                alt=""
              />
            </div>
          </div>
        </div>
      </section>

      <div class="store-details-container mt-3" data-aos="fade-up">
        <section class="store-heading">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-6">
                <h1><?= $product_details['name']; ?></h1>
                <div class="owner">By TI-Store</div>
                <div class="stock">Stock (<?= $product_details['stock']; ?>)</div>
                <div class="price">Rp. <?= number_format($product_details['price'], 0, ".", "."); ?>,-</div>
              </div>
              <div class="col-lg-2" data-aos="zoom-in">
                <a
                  href="<?= base_url(); ?>cart/tambah/<?= $product_details['id']; ?>"
                  class="btn btn-success px-4 text-white btn-block mb-3"
                >
                  Add to Cart
                </a>
              </div>
            </div>
          </div>
        </section>

        <section class="store-description">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-12 col-lg-8">
                <p>
                  <?= $product_details['description']; ?>
                </p>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>