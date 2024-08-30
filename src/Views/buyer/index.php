
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-10">
           <form action="<?=getenv('APP_URL')?>" method="GET" >
           <label for="start-date" class="form-label">Start Date:</label>
            <input type="date" name="start_date" class="form-control" placeholder="Start Date">

            <label for="end-date" class="form-label mt-2">End Date:</label>
            <input type="date" name="end_date" class="form-control" placeholder="End Date">

            <button id="filter-btn" class="btn btn-primary mt-3">Filter</button>
           </form>
        </div>
        <div class="col-md-2 text-end">
            <a href="<?=getenv('APP_URL') . '/buyer/create'?>" class="btn btn-primary mt-4">New Buyer Create</a>
        </div>
    </div>

    <!-- Table List -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Sl No</th>
                <th>Receipt ID</th>
                <th>Buyer</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Items</th>
                <th>Note</th>
                <th>Amount</th>
                <th>City</th>
                <th>IP Address</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody id="table-body">

            <?php
if (count($buyers) > 0) {
    foreach ($buyers as $index => $buyer): ?>
                <tr>
                    <td><?=$index + 1?></td>
                    <td><?=$buyer['receipt_id']?></td>
                    <td><?=$buyer['buyer']?></td>
                    <td><?=$buyer['buyer_email']?></td>
                    <td><?=$buyer['phone']?></td>
                    <td><?=$buyer['items']?></td>
                    <td><?=$buyer['note']?></td>
                    <td><?=$buyer['amount']?></td>
                    <td><?=$buyer['city']?></td>
                    <td><?=$buyer['buyer_ip']?></td>
                    <td><?=$buyer['entry_at']?></td>
                </tr>

            <?php endforeach;?>
            <?php
} else {?>
                <tr>
                    <td colspan="10" class="text-center">No data found!</td>
                </tr>
            <?php }?>
        </tbody>
    </table>


</div>


</body>
</html>
