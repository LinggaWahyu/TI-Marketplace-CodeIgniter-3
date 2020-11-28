<!-- Page Content -->
    <div class="page-content page-cart">
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
                  <li class="breadcrumb-item active">Cart</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>

      <section class="store-cart">
        <div class="container">
          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-12 table-responsive">
              <table class="table table-borderless table-cart">
                <thead>
                  <tr>
                    <td>Image</td>
                    <td>Name Product</td>
                    <td>Count</td>
                    <td>Price</td>
                    <td>Menu</td>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    if(!$products) {
                      echo "<tr class='text-center text-danger'><td colspan='5'>Tidak ada barang dalam keranjang !</td></tr>";
                    } else {
                      foreach ($products as $product) : 
                  ?>
                  <tr>
                    <td style="width: 35%">
                      <img
                        src="<?= $product['image']; ?>"
                        alt=""
                        class="cart-image w-100"
                      />
                    </td>
                    <td style="width: 35%">
                      <div class="product-title"><?= $product['name']; ?></div>
                    </td>
                    <td style="width: 10%">
                      <div class="product-title"><?= ($product['count']); ?> x</div>
                    </td>
                    <td style="width: 40%">
                      <div class="product-title">Rp. <?= number_format($product['count'] * $product['price'], 0, ".", "."); ?>,-</div>
                    </td>
                    <td style="width: 15%">
                      <a href="<?= base_url(); ?>cart/hapus/<?= $product['products_id']; ?>" class="btn btn-remove-cart">Remove</a>
                    </td>
                  </tr>
                  <?php endforeach; } ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-12">
              <hr />
            </div>
            <div class="col-12">
              <h2 class="mb-4">Transaction Details</h2>
            </div>
          </div>
          <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
            <div class="col-md-3">
              <form action="" method="POST">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="name"
                    name="name"
                    value="Lingga Wahyu Rochim"
                  />
                  <small class="form-text text-danger"><?= form_error('name'); ?></small>
                </div>
              </div>
              <div class="col-md-9">
                <div class="form-group">
                  <label for="address">Address</label>
                  <input
                    type="text"
                    class="form-control"
                    id="address"
                    name="address"
                    value="Blitar, Jawa Timur"
                  />
                  <small class="form-text text-danger"><?= form_error('address'); ?></small>
                </div>
              </div>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-12">
              <hr />
            </div>
            <div class="col-12">
              <h2 class="mb-1">Payment Informations</h2>
            </div>
          </div>
          <div class="row mt-3" data-aos="fade-up" data-aos-delay="200">
            <div class="col-4 col-md-2">
              <?php 
                $total;
                if(!$products) {
                  $total = '';
                } else {
                  $total = 0;
                  for ($i=0; $i < count($products); $i++) { 
                    $total += ($products[$i]['count'] * $products[$i]['price']);
                  }  
                }
              ?>
              <div class="form-group">
                <label for="total">Total</label>
                  <input
                    type="text"
                    class="form-control text-success"
                    id="total"
                    name="total"
                    value="<?=$total?>"
                    readonly
                  />
                  
                  <small class="form-text text-danger"><?= form_error('total'); ?></small>
                </div>
            </div>
            <div class="col-8 col-md-3 mt-2">
              <button type="submit" name="tambah" class="btn btn-success mt-4 px-4 btn-block">
                  Checkout Now
              </button>
            </form>
            </div>
          </div>
        </div>
      </section>
    </div>