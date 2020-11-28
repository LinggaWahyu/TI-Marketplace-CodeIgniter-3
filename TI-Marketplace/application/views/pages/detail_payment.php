<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Store - Your Best Marketplace</title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/style/main.css" rel="stylesheet" />
  </head>

  <body>
<div class="page-content page-auth">
      <section class="section-store-auth" data-aos="fade-up">
        <div class="container">
          <div class="row align-items-center justify-content-center row-login">
            <div class="col-lg-4">
              <h4>Selesaikan pembayaranmu</h4>
              <form action="" method="POST" class="mt-3">
                <div class="card w-75 mt-2">
                  <div class="card-body">
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="radio"
                        name="payment_id"
                        id="payment_id"
                        value="<?= $payment_details['id'] ?>"
                        checked
                      />
                      <small class="form-text text-danger"><?= form_error('payment_id'); ?></small>
                      <label class="form-check-label ml-2" for="exampleRadios1">
                        <img
                          src="<?= $payment_details['logo'] ?>"
                          alt=""
                          class="w-50"
                        />
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Description</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" disabled><?= $payment_details['description'] ?></textarea>
                </div>
                <form class="mt-3">
                  <div class="form-group">
                  <label for="code">Kode Pembayaran / Virtual Account</label>
                  <input
                    type="text"
                    name="code"
                    id="code"
                    class="form-control"
                    value="<? echo rand(000000000000,999999999999); ?>"
                    readonly
                  />
                  <small class="form-text text-danger"><?= form_error('code'); ?></small>
                </div>
                <div class="form-group">
                  <label for="name">Nama</label>
                  <input
                    type="text"
                    name="name"
                    id="name"
                    class="form-control is-valid"
                    autofocus
                  />
                  <small class="form-text text-danger"><?= form_error('name'); ?></small>
                </div>
                <div class="form-group">
                  <label for="number_account">No. Akun / No. Rekening</label>
                  <input
                    type="text"
                    name="number_account"
                    id="number_account"
                    class="form-control is-valid"
                  />
                  <small class="form-text text-danger"><?= form_error('number_account'); ?></small>
                </div>
                <div class="form-group">
                  <label for="total_price">Total Pembayaran</label>
                  <input
                    type="text"
                    name="total_price"
                    id="total_price"
                    class="form-control is-valid"
                    value="<?= $total; ?>"
                    readonly
                  />
                  <small class="form-text text-danger"><?= form_error('total_price'); ?></small>
                </div>
                <button type="submit" name="detail" class="btn btn-success mt-4 px-4 btn-block">
                  Pay Now
              </button>
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>