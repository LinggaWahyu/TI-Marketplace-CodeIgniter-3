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
                  <li class="breadcrumb-item active">Transaction</li>
                </ol>
              </nav>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-12 mt-2">
              <h5 class="mb-3">Recent Transaction</h5>
              <a href="#" class="card card-list d-block">
                <div class="card-body">
                  <table class="table table-borderless table-cart">
                    <thead>
                      <tr>
                        <th>Tanggal Transaksi</th>
                        <th>Nama</th>
                        <th>Payment</th>
                        <th>Total</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($transactions as $transaction) : ?>
                      <tr>
                        <td style="width: 25%">
                          <div class="product-title"><?= date("d-m-Y", strtotime($transaction['date'])); ?></div>
                        </td>
                        <td style="width: 30%">
                          <div class="product-title"><?= $transaction['name_user']; ?></div>
                        </td>
                        <td style="width: 20%">
                          <div class="product-title"><?= $transaction['payment_method']; ?></div>
                        </td>
                        <td style="width: 45%">
                          <div class="product-title">Rp. <?= number_format($transaction['total_price'], 0, ".", "."); ?>,-</div>
                        </td>
                        <td style="width: 15%">
                          <a
                            href="<?= base_url(); ?>transaction/detail/<?= $transaction['id']; ?>"
                            class="btn btn-success text-white"
                            >Detail</a
                          >
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