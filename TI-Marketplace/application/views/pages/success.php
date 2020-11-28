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
<div class="page-content page-success">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
      <section class="section-success" data-aos="zoom-in">
        <div class="container">
          <div class="row align-items-center row-login justify-content-center">
            <div class="col-lg-6 text-center">
              <img src="<?= base_url(); ?>assets/images/success.svg" alt="" class="mb-4" />
              <h2>Transaction Processed!</h2>
              <p>
                Silahkan tunggu konfirmasi email dari kami dan kami akan
                menginformasikan resi secept mungkin!
              </p>
              <div>
                <a href="<?= base_url(); ?>product" class="btn btn-success w-50 mt-4">
                  Back to Home
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>