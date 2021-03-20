<!DOCTYPE html>
<html lang="en">

<head>
  <?php
include 'includes/header.php';
?>
  <link href="assets/css/vendor/dropify.min.css" rel="stylesheet"><!-- App css -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">

</head>

<body data-layout="horizontal">
  <!-- Top Bar Start -->
  <div class="topbar">
    <?php
      include 'includes/headernav.php';
    ?>
    <!--topbar-inner-->
    <?php include 'includes/menu.php';?>
  </div><!-- Top Bar End -->
  <div class="page-wrapper">
    <!-- Page Content-->
    <div class="page-content">
      <div class="container-fluid">
        <!-- Page-Title -->
        <!-- Formulario Carro -->
        <div class="row" id="form-xml">
          <div class="col-sm-12">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="mt-0 header-title">Importação do XML</h4>
                  <p class="text-muted mb-3"></p>
                  <form id="form-cadastro-xml" method="post" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group row">
                          <input type="file" id="xml" name="xml" class="dropify">
                    </div>
                    <div class="form-group row">
                            <div class="col-sm-12 text-right">
                              <a style="color: #1761fd" id="btn-voltar" class="btn btn-outline-primary">Voltar</a>
                              <button type="submit" id="btn-submit" class="btn btn-outline-success">Cadastrar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- END Formulario Carro -->
        <!-- LISTA Carros -->
        <div class="row" id="lista-carro">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="btn-toolbar float-right">
                  <div class="btn-group focus-btn-group">
                    <button type="button" class="btn btn-outline-primary waves-effect waves-light" id="novo-xml" style="margin-bottom: 32px;">
                      <span class="fas fa-folder-plus"></span> Cadastrar XML
                    </button>
                  </div>
                </div>
                <h4 class="mt-0 header-title">Nota Fiscal</h4>
                <div class="table-responsive">
                <table id="datatable" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                  <thead>
                    <tr>
                      <th >ID</th>
                      <th >Nota Fiscal Nº</th>
                      <th >Data Emissão</th>
                      <th >Destinatário</th>
                      <th >Valor Total</th>
                    </tr>
                  </thead>
                  <tbody id="dados-nota">
                  </tbody>
                </table>
              </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End lista Carro -->
      </div>
      <?php include 'includes/footer.php'?>
      <script src="js/vendor/dropify.min.js"></script>

      <script src="js/index.js"></script>
</body>

</html>
