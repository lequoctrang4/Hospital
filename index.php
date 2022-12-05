<!-- Thanh điều hướng -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="?controller=home&action=index">Hệ thống quản lý Bệnh viện</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="?controller=patient&action=index">Bệnh nhân</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?controller=doctor&action=index">Bác sĩ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Y tá</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<?php
session_start();
include('./Publics/library/message.php');
require './Core/Database.php';
require './Models/BaseModel.php';
require './Controllers/BaseController.php';

$controllerName = ucfirst((strtolower($_REQUEST['controller']) ?? 'Welcome') . 'Controller');
require "./Controllers/${controllerName}.php";
$actionName = $_REQUEST['action'] ?? 'index';

$controllerObject = new $controllerName;
$controllerObject->$actionName();
?>

