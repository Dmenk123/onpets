<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<div id="footer" data-animate="fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <h4>Sitemap</h4>

                        <ul>
                            <li><a href="<?= base_url('register'); ?>">Login / Register</a>
                            </li>
                            <li><a href="<?= base_url('faq'); ?>">FAQ</a>
                            </li>
                            <li><a href="<?= base_url('kontak'); ?>">Kontak Kami</a>
                            </li>
                        </ul>

                        <hr>

                        <h4>User section</h4>

                        <ul>
                            <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                            </li>
                            <li><a href="<?= base_url('register'); ?>">Register</a>
                            </li>
                        </ul>

                        <hr class="hidden-md hidden-lg hidden-sm">

                    </div>
                    <!-- /.col-md-3 -->

                    <div class="col-md-9 col-sm-9">
                        <h4 style="text-align: center;">Produk-produk di OnPets E-Marketplace</h4>
                        <?php foreach ($menu_navbar as $val) { ?>
                        <div class="col-sm-3">
                            <h5><?php echo $val->nama_kategori; ?></h5>
                            <?php for ($i=1; $i <=$count_kategori; $i++) { ?>
                                <?php if ($val->id_kategori == $i) { ?>
                                    <ul>
                                        <?php foreach ($submenu[$i] as $result) { ?>
                                            <li>
                                                <a href='<?php echo site_url("produk/sub_kategori/$result->id_sub_kategori"); ?>'><?php echo $result->nama_sub_kategori; ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            <?php } ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </div>