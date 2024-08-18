<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="row mb-4">
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Generate Reports</h5>
                        </div>
                        <div class="card-body">
                            <form id="reportForm" method="post">
                                <div class="mb-3">
                                    <label for="start_date" class="form-label">Start Date:</label>
                                    <input type="date" id="start_date" name="start_date" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="end_date" class="form-label">End Date:</label>
                                    <input type="date" id="end_date" name="end_date" class="form-control" required>
                                </div>
                                <button type="button" class="btn btn-primary" onclick="submitForm('/generate_pdf')">Generate PDF</button>
                                <button type="button" class="btn btn-success" onclick="submitForm('/generate_excel')">Generate Excel</button>
                                <button type="button" class="btn btn-info" onclick="submitForm('/generate_window_result')">Generate Window</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
function submitForm(action) {
    var form = document.getElementById('reportForm');
    form.action = "<?= base_url('home/') ?>" + action;
    form.method = 'post';
    form.target = action === 'generate_window_result' ? '_self' : '_blank'; // Open PDF and Excel in a new tab, Window in the same tab
    form.submit();
}
</script>
