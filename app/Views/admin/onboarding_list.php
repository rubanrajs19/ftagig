
<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<h4>Onboarding Submissions</h4>
<div class="d-flex justify-content-end mb-3" id="csv-export-wrap" style="float:right;"></div>
<div class="table-responsive mt-4">
  <table id="onboardingTable" class="table table-striped table-bordered"  style="width:100%">
    <thead>
      <tr>
        <th>ID</th>
        <th>Website URL</th>
        <th>Implementation Choice</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Business Territory</th>
        <th>Team Size</th>
        <th>Monthly Organic Traffic</th>        
        <th>Challenges</th>
        <th>Lead Page URL</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($submissions as $s): ?>
      <tr>
        <td><?= esc($s['id']) ?></td>
        <td><?= esc($s['tracked_url_hidden']) ?></td>
        <td><?= esc($s['implementation_choice']) ?></td>
        <td><?= esc($s['first_name']) ?></td>
        <td><?= esc($s['last_name']) ?></td>
        <td><?= esc($s['email']) ?></td>
        <td><?= esc($s['phone']) ?></td>
        <td><?= esc($s['business_territory']) ?></td>
        <td><?= esc($s['marketing_team_size']) ?></td>
        <td><?= esc($s['monthly_traffic']) ?></td>
        <td><?= esc($s['challenges']) ?></td>
        <td><?= esc($s['page_url']) ?></td>
        <td><?= esc($s['created_at']) ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

  <script>
$(document).ready(function () {
  const table = $('#onboardingTable').DataTable({
    dom: "<'row mb-3'<'col-md-6'f><'col-md-6 text-end'B>>" +  // search + export
         "<'row'<'col-sm-12'tr>>" +
         "<'row mt-3'<'col-sm-6'i><'col-sm-6'p>>",
    buttons: [
      {
        extend: 'csv',
        text: 'CSV Export',
        className: 'btn btn-success'
      }
    ],
    responsive: true
  });
});


</script>
<?= $this->endSection() ?>
 