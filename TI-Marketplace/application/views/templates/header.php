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
    <nav
      class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top"
      data-aos="fade-down"
    >
      <div class="container">
        <a href="<?= base_url(); ?>product" class="navbar-brand">
          <img src="<?= base_url(); ?>assets/images/logo.svg" alt="Logo" />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarResponsive"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a href="<?= base_url(); ?>product" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url(); ?>cart" class="nav-link">Cart</a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url(); ?>transaction" class="nav-link">Transaction</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>