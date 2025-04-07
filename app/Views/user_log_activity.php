<header class="site-header d-flex flex-column justify-content-center align-items-center bg-primary text-white py-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 text-center">
                <h2 class="mb-0">Log Activities</h2>
            </div>
        </div>
    </div>
</header>

<section class="latest-podcast-section d-flex align-items-center justify-content-center pb-5" id="section_2">
    <div class="container">
        <div class="col-lg-12 col-12 mt-5 mb-4">
            <div class="card shadow-lg border-0">
                
                </div>
                <div class="card-body">
                    <table id="logTable" class="table table-striped table-hover text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" width="3%">No</th>
                                <th>Time</th>
                                <th>Activity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($child as $log) : ?>
                                <tr>
                                    <th scope="row"><?= $ms++ ?></th>
                                    <td><?= $log->happens_at ?></td>
                                    <td><?= $log->what_happens ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>  
</section>

    


<!-- DataTables CSS -->
<!-- jQuery (Load First) -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

<!-- DataTables JS (Must be after jQuery) -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
        var table = $('#logTable').DataTable({
            "pageLength": 5, // Show only 5 rows at a time
            "lengthMenu": [5, 10, 25, 50], // Allow user to change row limit
            "ordering": true, // Enable column sorting
            "searching": true // Enable global search
        });

        // Add individual column search
        $('#logTable thead th').each(function () {
            var title = $(this).text();
            $(this).html(title + '<br><input type="text" class="form-control form-control-sm column-search" placeholder="Search ' + title + '">');
        });

        // Apply column search
        table.columns().every(function () {
            var that = this;
            $('input', this.header()).on('keyup change', function () {
                if (that.search() !== this.value) {
                    that.search(this.value).draw();
                }
            });
        });
    });
</script>

</body>

</html>