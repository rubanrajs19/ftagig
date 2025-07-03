<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://cdn.tiny.cloud/1/s4eii7o51r8djlictq4fpd7ybujd7btf25abfldvlj86qi3e/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.css" />  
   <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
 <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>



    <script>
    tinymce.init({
        selector: 'textarea.editor',
        height: 300,
        menubar: false,
        plugins: 'lists link image code preview',
        toolbar: 'undo redo | bold italic underline | bullist numlist | link code preview'
    });
    </script>
 <style>
  body {
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
    background-color: #f5f7fa;
    display: flex;
  }
  .sidebar {
    width: 220px;
    height: 100vh;
    background-color: #343a40;
    position: fixed;
    left: 0;
    top: 0;
    overflow-y: auto;
    padding: 1rem;
  }
  .content-wrapper {
    margin-left: 220px;
    width: calc(100% - 220px);
    padding: 2rem;
    overflow-y: auto;
  }
  .nav-link{
    color:#fff;
  }
</style>
</head>
<body>
  <div class="sidebar d-flex flex-column">
  <h5 class="text-white">FTA Admin</h5>
   <a href="<?= base_url('admin/categories') ?>" class="nav-link">Categories</a>
  <a href="<?= base_url('admin/services') ?>" class="nav-link">Services</a> 
  <a href="<?= base_url('admin/logout') ?>" class="nav-link mt-auto">Logout</a>
</div>

<div class="content-wrapper">
  <?= $this->renderSection('content') ?>
</div>
</body>
</html>