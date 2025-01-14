<?php
session_start();

//Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
  // Si no ha iniciado sesión, redirigir al login
  header("Location: index.php");
  exit();
}
// Usar el nombre del usuario
$user_name = $_SESSION['user_name'];

include 'componentes/header.php';
include 'componentes/sidebar.php';
include 'querys/qdashboard.php';
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-3d"></script>





<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="row ">
      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
          <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
              <div class="row align-items-center">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 pr-0 pt-3">
                  <div class="card-content">
                    <h5 class="font-15">Cantidad Agencias</h5>
                    <h2 class="mb-3 font-18"><?php echo $agenciasCount; ?></h2>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pl-0">
                  <div class="banner-img">
                    <i class="fas fa-sort-numeric-up-alt"></i>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
          <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
              <div class="row align-items-center">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 pr-0 pt-3">
                  <div class="card-content">
                    <h5 class="font-15">Cantidad de Clientes</h5>
                    <h2 class="mb-3 font-18"><?php echo $clientesCount; ?></h2>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pl-0">
                  <div class="banner-img">
                    <i class="fas fa-users"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
          <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
              <div class="row align-items-center">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 pr-0 pt-3">
                  <div class="card-content">
                    <h5 class="font-15">Total campañas</h5>
                    <h2 class="mb-3 font-18"><?php echo $campaignsCount; ?></h2>
                
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pl-0">
                  <div class="banner-img">
                    <i class="fas fa-chart-bar"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
          <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
              <div class="row align-items-center">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 pr-0 pt-3">
                  <div class="card-content">
                    <h5 class="font-15">Cantidad de medios</h5>
                    <h2 class="mb-3 font-18"><?php echo $mediosCount; ?></h2>
          
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pl-0">
                  <div class="banner-img">
                    <i class="fa-solid fa-photo-film"></i>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-6 col-sm-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <h4>Clientes Productos</h4>
          </div>
          <div class="card-body">
            <canvas id="myPieChart"></canvas>
          </div>
        </div>
      </div>
      <div class="col-6 col-sm-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <h4>Medios</h4>
          </div>
          <div class="card-body">

            <div class="table-responsive">
              <table class="table table-striped" id="tableBuscar">
                <thead>
                  <tr>
                    <th>COD</th>
                    <th>Nombre del Medio</th>
                    <th>Estado</th>
              
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($medios as $medio): ?>
                  <tr>
                  <td><?php echo $medio['codigo']; ?></td>
                 <td><?php  echo $medio['NombredelMedio']?></td>
                 <td><?php  echo $medio['Estado']?></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
    </div>

    

  </section>
  <div class="settingSidebar">
    <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
    </a>
    <div class="settingSidebar-body ps-container ps-theme-default">
      <div class=" fade show active">
        <div class="setting-panel-header">Setting Panel
        </div>
        <div class="p-15 border-bottom">
          <h6 class="font-medium m-b-10">Select Layout</h6>
          <div class="selectgroup layout-color w-50">
            <label class="selectgroup-item">
              <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
              <span class="selectgroup-button">Light</span>
            </label>
            <label class="selectgroup-item">
              <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
              <span class="selectgroup-button">Dark</span>
            </label>
          </div>
        </div>
        <div class="p-15 border-bottom">
          <h6 class="font-medium m-b-10">Sidebar Color</h6>
          <div class="selectgroup selectgroup-pills sidebar-color">
            <label class="selectgroup-item">
              <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
              <span class="selectgroup-button selectgroup-button-icon" data-bs-toggle="tooltip"
                data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
            </label>
            <label class="selectgroup-item">
              <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
              <span class="selectgroup-button selectgroup-button-icon" data-bs-toggle="tooltip"
                data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
            </label>
          </div>
        </div>
        <div class="p-15 border-bottom">
          <h6 class="font-medium m-b-10">Color Theme</h6>
          <div class="theme-setting-options">
            <ul class="choose-theme list-unstyled mb-0">
              <li title="white" class="active">
                <div class="white"></div>
              </li>
              <li title="cyan">
                <div class="cyan"></div>
              </li>
              <li title="black">
                <div class="black"></div>
              </li>
              <li title="purple">
                <div class="purple"></div>
              </li>
              <li title="orange">
                <div class="orange"></div>
              </li>
              <li title="green">
                <div class="green"></div>
              </li>
              <li title="red">
                <div class="red"></div>
              </li>
            </ul>
          </div>
        </div>
        <div class="p-15 border-bottom">
          <div class="theme-setting-options">
            <label class="m-b-0">
              <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                id="mini_sidebar_setting">
              <span class="custom-switch-indicator"></span>
              <span class="control-label p-l-10">Mini Sidebar</span>
            </label>
          </div>
        </div>
        <div class="p-15 border-bottom">
          <div class="theme-setting-options">
            <label class="m-b-0">
              <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                id="sticky_header_setting">
              <span class="custom-switch-indicator"></span>
              <span class="control-label p-l-10">Sticky Header</span>
            </label>
          </div>
        </div>
        <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
          <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
            <i class="fas fa-undo"></i> Restore Default
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
</div>

<script>
  // Datos para el gráfico
  const labels = <?php echo json_encode($labels); ?>;
  const data = <?php echo json_encode($data); ?>;

  const ctx = document.getElementById('myPieChart').getContext('2d');
  const myPieChart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: labels, // Aquí los nombres de los clientes
      datasets: [{
        data: data, // Aquí la cantidad de productos por cliente
        backgroundColor: [
          'rgba(255, 99, 132)',
          'rgba(54, 162, 235)',
          'rgba(255, 206, 86)',
          'rgba(75, 192, 192)',
          'rgba(153, 102, 255)',
          'rgba(255, 159, 64)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'left',
        },

        tooltip: {
          callbacks: {
            label: function(context) {
              let label = context.label || '';
              let value = context.raw;
              let sum = context.dataset.data.reduce((a, b) => a + b, 0);
              let percentage = (value * 100 / sum).toFixed(2) + "%";
              return `${label}: ${value} productos (${percentage})`;
            }
          }
        },
        datalabels: {
          formatter: (value, ctx) => {
            let sum = ctx.dataset.data.reduce((a, b) => a + b, 0);
            let percentage = (value * 100 / sum).toFixed(2) + "%";
            return percentage;
          },
          color: '#fff',
        },
        // Opciones para el 3D
        '3d': {
          enabled: true,
          effect: '3d',
          depth: 20,
          alphaAngle: 45
        }
      }
    },
    plugins: [ChartDataLabels]
  });
</script>


<?php include 'componentes/footer.php'; ?>
