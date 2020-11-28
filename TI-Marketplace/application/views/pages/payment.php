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
            <div class="row align-items-center row-login">
              <div class="col-lg-6 text-center">
                <img
                  src="<?= base_url(); ?>assets/images/login-placeholder.png"
                  alt=""
                  class="w-50 mb-4 mb-lg-none"
                />
              </div>
              <div class="col-lg-5">
                <h2>Pilih metode pembayaranmu</h2>
                <form action="" class="mt-3">
                  <?php foreach ($payments as $payment) : ?>  
                  <div class="card w-75">
                    <div class="card-body">
                      <div class="form-check">
                        <input
                          class="form-check-input"
                          type="radio"
                          disabled
                        />
                        <label class="form-check-label ml-2" for="exampleRadios1">
                          <a
                            href="<?= base_url(); ?>payment/detail/<?= $payment['id']; ?>?total=<?= $total; ?>"
                          >
                            <img
                              src="<?= $payment['logo']; ?>"
                              alt=""
                              class="w-25"
                            />
                          </a>  
                        </label>
                      </div>
                    </div>
                  </div>
                  <?php endforeach; ?>
                </form>
              </div>
            </div>
          </div>
        </section>
      </div>