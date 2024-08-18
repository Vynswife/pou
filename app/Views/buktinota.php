<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bukti Nota</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h1 class="my-4">Bukti Nota</h1>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Bukti File</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($grouped_jel as $kode_transaksi => $transactions): ?>
					<tr>
						<td>
							<?php foreach ($transactions as $transaction): ?>
								<a href="<?= base_url('uploads/' . $transaction['bukti_file']) ?>" target="_blank">
									<?= $transaction['bukti_file'] ?>
								</a><br>
							<?php endforeach; ?>
						</td>

					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</body>
</html>