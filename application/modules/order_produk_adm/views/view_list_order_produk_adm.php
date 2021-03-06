    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Order Produk Ke Vendor/Supplier
      </h1>

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Data Transaksi</a></li>
        <li class="active">Order Produk</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-s12">
          <div class="box">
            <div class="box-header">
              <button class="btn btn-success" onclick="addOrderProduk()"><i class="glyphicon glyphicon-plus"></i> Tambah Order</button>
              <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="tableOrderProduk" class="table table-bordered table-hover" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>ID Transaksi</th>
                      <th>Nama User</th>
                      <th>Nama Supplier</th>
                      <th>Tanggal</th>
                      <th style="width: 240px;">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>  
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>    
    </section>
    <!-- /.content -->