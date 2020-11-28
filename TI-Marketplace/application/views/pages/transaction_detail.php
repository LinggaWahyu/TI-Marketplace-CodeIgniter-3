<!-- Page Content -->
    <div class="page-content page-cart">
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
                  <li class="breadcrumb-item">
                    <a href="<?= base_url(); ?>transaction">Transaction</a>
                  </li>
                  <li class="breadcrumb-item active">Transaction Details</li>
                </ol>
              </nav>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-12 mt-2">
              <h5 class="mb-3">Detail Transaction</h5>
              <a href="#" class="card card-list d-block">
                <div class="card-body">
                  <table class="table table-borderless table-cart">
                    <thead>
                      <tr>
                        <th>Image</th>
                        <th>Name Product</th>
                        <th>Count</th>
                        <th>Total Price</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($transaction_detail as $transaction) : ?>
                      <tr>
                        <td style="width: 30%">
                        <img
                            src="<?= $transaction['image']; ?>"
                            alt=""
                            class="w-50"
                        />
                        </td>
                        <td style="width: 30%">
                          <div class="product-title"><?= $transaction['name']; ?></div>
                        </td>
                        <td style="width: 20%">
                          <div class="product-title"><?= $transaction['count']; ?> x</div>
                        </td>
                        <td style="width: 45%">
                          <div class="product-title">Rp. <?= number_format($transaction['price'] * $transaction['count'], 0, ".", "."); ?>,-</div>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>                  
                </div>
              </a>
            </div>
          </div>
        </div>
      </section>
    </div>