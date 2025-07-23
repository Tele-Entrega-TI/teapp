<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="pt-BR" data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Controle Interno - Tele Entrega</title>
  <link rel="icon" type="image/png" href="/teapp/src/assets/images/favicon.png" sizes="16x16">

  <!-- Remix Icon -->
  <link rel="stylesheet" href="/teapp/src/assets/css/remixicon.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="/teapp/src/assets/css/lib/bootstrap.min.css">
  <!-- ✅ Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <!-- ApexCharts -->
  <link rel="stylesheet" href="/teapp/src/assets/css/lib/apexcharts.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="/teapp/src/assets/css/lib/dataTables.min.css">
  <!-- Text Editors -->
  <link rel="stylesheet" href="/teapp/src/assets/css/lib/editor-katex.min.css">
  <link rel="stylesheet" href="/teapp/src/assets/css/lib/editor.atom-one-dark.min.css">
  <link rel="stylesheet" href="/teapp/src/assets/css/lib/editor.quill.snow.css">
  <!-- Flatpickr -->
  <link rel="stylesheet" href="/teapp/src/assets/css/lib/flatpickr.min.css">
  <!-- Full Calendar -->
  <link rel="stylesheet" href="/teapp/src/assets/css/lib/full-calendar.css">
  <!-- Vector Map -->
  <link rel="stylesheet" href="/teapp/src/assets/css/lib/jquery-jvectormap-2.0.5.css">
  <!-- Popup -->
  <link rel="stylesheet" href="/teapp/src/assets/css/lib/magnific-popup.css">
  <!-- Slick -->
  <link rel="stylesheet" href="/teapp/src/assets/css/lib/slick.css">
  <!-- Main CSS -->
  <link rel="stylesheet" href="/teapp/src/assets/css/style.css">
</head>
<body>
<aside class="sidebar">
  <button type="button" class="sidebar-close-btn">
    <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
  </button>
  <div>
    <a href="index.html" class="sidebar-logo">
      <img src="./src/assets/images/logo.jpg" alt="site logo" class="light-logo">
      <img src="./src/assets/images/logo-light.png" alt="site logo" class="dark-logo">
      <img src="./src/assets/images/logo-icon.png" alt="site logo" class="logo-icon">
    </a>
  </div>
  <div class="sidebar-menu-area">
    <ul class="sidebar-menu" id="sidebar-menu">
      <li class="dropdown">
        <a href="javascript:void(0)">
          <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
          <span>Dashboard</span>
        </a>
        <ul class="sidebar-submenu">
          <li>
            <a href="./"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Inicio</a>
          </li>
          <li>
            <a href="./operacional"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Operacional</a>
          </li>
          <li>
            <a href="./comercial"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Comercial</a>
          </li>
          <li>
            <a href="./financeiro"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i> Financeiro</a>
          </li>
          <li>
            <a href="./rh"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i> Recursos Humanos</a>
          </li>
          <li>
            <a href="./controladoria"><i class="ri-circle-fill circle-icon text-success-main w-auto"></i> Controladoria</a>
          </li>
        </ul>
      </li>
      <li class="sidebar-menu-group-title">Operacional</li>
      
      <li class="dropdown">
        <a href="javascript:void(0)">
          <iconify-icon icon="solar:document-text-outline" class="menu-icon"></iconify-icon>
          <span>Lançamentos</span> 
        </a>
        <ul class="sidebar-submenu">
          <li>
            <a href="invoice-list.html"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Substituições</a>
          </li>
          
          <li>
            <a href="./intercorrencias"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i> Intercorrencias</a>
          </li>
        </ul>
      </li>
      <li>
        <a href="chat-message.html">
          <iconify-icon icon="bi:chat-dots" class="menu-icon"></iconify-icon>
          <span>Mensagens Enviadas</span> 
        </a>
      </li>
      <li>
        <a href="calendar-main.html">
          <iconify-icon icon="solar:calendar-outline" class="menu-icon"></iconify-icon>
          <span>Locações</span> 
        </a>
      </li>
      <li class="dropdown">
        <a href="javascript:void(0)">
          <iconify-icon icon="solar:pie-chart-outline" class="menu-icon"></iconify-icon>
          <span>Relatórios</span> 
        </a>
        <ul class="sidebar-submenu">
          <li>
            <a href="./relatorios/custo-operacional"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i> Faltas</a>
          </li>
          <li>
            <a href="./relatorios/custo-operacional"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Intercorências</a>
          </li>
          <li>
            <a href="./relatorios/custo-operacional"><i class="ri-circle-fill circle-icon text-success-main w-auto"></i> Custo Operacional</a>
          </li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="javascript:void(0)">
          <iconify-icon icon="solar:lock-password-broken" class="menu-icon"></iconify-icon>
          <span>Acesso ao Sistema</span>
        </a>
        <ul class="sidebar-submenu">
          <li>
            <a href="/teapp/usuarios">
              <i class="ri-circle-fill circle-icon text-success-main w-auto"></i> Usuários
            </a>
          </li>
          <li>
            <a href="/teapp/permissoes">
              <i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Permissões
            </a>
          </li>
          <li>
            <a href="/teapp/modulos">
              <i class="ri-circle-fill circle-icon text-info-main w-auto"></i> Módulos de Sistema
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</aside>

<main class="dashboard-main">
  <div class="navbar-header">
  <div class="row align-items-center justify-content-between">
    <div class="col-auto">
      <div class="d-flex flex-wrap align-items-center gap-4">
        <button type="button" class="sidebar-toggle">
          <iconify-icon icon="heroicons:bars-3-solid" class="icon text-2xl non-active"></iconify-icon>
          <iconify-icon icon="iconoir:arrow-right" class="icon text-2xl active"></iconify-icon>
        </button>
        <button type="button" class="sidebar-mobile-toggle">
          <iconify-icon icon="heroicons:bars-3-solid" class="icon"></iconify-icon>
        </button>
        <form class="navbar-search">
          <input type="text" name="search" placeholder="Precisa achar alguma função?">
          <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
        </form>
      </div>
    </div>
    <div class="col-auto">
      <div class="d-flex flex-wrap align-items-center gap-3">
        <button type="button" data-theme-toggle class="w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center"></button>
        


        <div class="dropdown">
          <button class="has-indicator w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center" type="button" data-bs-toggle="dropdown">
            <iconify-icon icon="iconoir:bell" class="text-primary-light text-xl"></iconify-icon>
          </button>
          <div class="dropdown-menu to-top dropdown-menu-lg p-0">
            <div class="m-16 py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
              <div>
                <h6 class="text-lg text-primary-light fw-semibold mb-0">Notificações</h6>
              </div>
              <span class="text-primary-600 fw-semibold text-lg w-40-px h-40-px rounded-circle bg-base d-flex justify-content-center align-items-center">01</span>
            </div>
            
           <div class="max-h-400-px overflow-y-auto scroll-sm pe-4">
            <a href="javascript:void(0)" class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between">
              <div class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"> 
                <span class="w-44-px h-44-px bg-success-subtle text-success-main rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                  <iconify-icon icon="bitcoin-icons:verify-outline" class="icon text-xxl"></iconify-icon>
                </span> 
                <div>
                  <h6 class="text-md fw-semibold mb-4">Parabéns</h6>
                  <p class="mb-0 text-sm text-secondary-light text-w-200-px">Seu perfil foi verificado com sucesso!</p>
                </div>
              </div>
              <span class="text-sm text-secondary-light flex-shrink-0">23 min atrás</span>
            </a>
           
           </div>

            <div class="text-center py-12 px-16"> 
                <a href="javascript:void(0)" class="text-primary-600 fw-semibold text-md">See All Notification</a>
            </div>

          </div>
        </div>

        <div class="dropdown">
          <button class="d-flex justify-content-center align-items-center rounded-circle" type="button" data-bs-toggle="dropdown">
            <img src="./src/assets/images/user.png" alt="image" class="w-40-px h-40-px object-fit-cover rounded-circle">
          </button>
          <div class="dropdown-menu to-top dropdown-menu-sm">
            <div class="py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
              <div>
                <h6 class="text-lg text-primary-light fw-semibold mb-2">$usuário</h6>
                <span class="text-secondary-light fw-medium text-sm">Administrador</span>
              </div>
              <button type="button" class="hover-text-danger">
                <iconify-icon icon="radix-icons:cross-1" class="icon text-xl"></iconify-icon> 
              </button>
            </div>
            <ul class="to-top-list">
              <li>
                <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3" href="view-profile.html"> 
                <iconify-icon icon="solar:user-linear" class="icon text-xl"></iconify-icon>  Perfil</a>
              </li>
              <li>
                <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3" href="email.html"> 
                <iconify-icon icon="tabler:message-check" class="icon text-xl"></iconify-icon>  Tarefas</a>
              </li>
              <li>
                <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3" href="company.html"> 
                <iconify-icon icon="icon-park-outline:setting-two" class="icon text-xl"></iconify-icon>  Configurações</a>
              </li>
              <li>
                <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-danger d-flex align-items-center gap-3" href="javascript:void(0)"> 
                <iconify-icon icon="lucide:power" class="icon text-xl"></iconify-icon>  Sair do Sistema</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

