
<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<h4>Onboarding Submissions</h4>


  <table id="onboardingTable" class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>First</th>
        <th>Last</th>
        <th>Email</th>
        <th>Phone</th>
        <th>URL</th>
        <th>Choice</th>
        <th>Traffic</th>
        <th>Territory</th>
        <th>Challenges</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($submissions as $s): ?>
      <tr>
        <td><?= esc($s['id']) ?></td>
        <td><?= esc($s['first_name']) ?></td>
        <td><?= esc($s['last_name']) ?></td>
        <td><?= esc($s['email']) ?></td>
        <td><?= esc($s['phone']) ?></td>
        <td><?= esc($s['tracked_url_hidden']) ?></td>
        <td><?= esc($s['implementation_choice']) ?></td>
        <td><?= esc($s['monthly_traffic']) ?></td>
        <td><?= esc($s['business_territory']) ?></td>
        <td><?= esc($s['challenges']) ?></td>
        <td><?= esc($s['created_at']) ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>


  <script>
    $(document).ready(function() {
      $('#onboardingTable').DataTable();
    });
</script>
<?= $this->endSection() ?>
 