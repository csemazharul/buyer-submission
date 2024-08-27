<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Entry Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-10">
        <h2>Data Entry Form</h2>
        <form action="https://simple-php-mvc-starter.site/buyer-store" method="POST">
            <!-- amount (int 10) -->
            <div class="form-group">
                <label for="amount">Amount *</label>
                <input type="number" class="form-control" id="amount" name="amount" required>
            </div>

            <!-- buyer (varchar 255) -->
            <div class="form-group">
                <label for="buyer">Buyer *</label>
                <input type="text" class="form-control" id="buyer" name="buyer" maxlength="255" required>
            </div>

            <!-- receipt_id (varchar 20) -->
            <div class="form-group">
                <label for="receipt_id">Receipt ID *</label>
                <input type="text" class="form-control" id="receipt_id" name="receipt_id" maxlength="20" required>
            </div>

            <!-- items (varchar 255) -->
            <div class="form-group">
                <label for="items">Items *</label>
                <input type="text" class="form-control" id="items" name="items" maxlength="255" required>
            </div>

            <!-- buyer_email (varchar 50) -->
            <div class="form-group">
                <label for="buyer_email">Buyer Email *</label>
                <input type="email" class="form-control" id="buyer_email" name="buyer_email" maxlength="50" required>
            </div>

            <!-- buyer_ip (varchar 20) -->
            <div class="form-group">
                <label for="buyer_ip">Buyer IP</label>
                <input type="text" class="form-control" id="buyer_ip" name="buyer_ip" maxlength="20">
            </div>

            <!-- note (text) -->
            <div class="form-group">
                <label for="note">Note *</label>
                <textarea class="form-control" id="note" name="note" rows="3" required></textarea>
            </div>

            <!-- city (varchar 20) -->
            <div class="form-group">
                <label for="city">City *</label>
                <input type="text" class="form-control" id="city" name="city" maxlength="20" required>
            </div>

            <!-- phone (varchar 20) -->
            <div class="form-group">
                <label for="phone">Phone *</label>
                <input type="text" class="form-control" id="phone" name="phone" maxlength="20" required>
            </div>

            <!-- hash_key (varchar 255) -->
            <div class="form-group">
                <label for="hash_key">Hash Key</label>
                <input type="text" class="form-control" id="hash_key" name="hash_key" maxlength="255">
            </div>

            <!-- entry_at (date) -->
            <div class="form-group">
                <label for="entry_at">Entry Date</label>
                <input type="date" class="form-control" id="entry_at" name="entry_at">
            </div>

            <!-- entry_by (int 10) -->
            <div class="form-group">
                <label for="entry_by">Entry By *</label>
                <input type="number" class="form-control" id="entry_by" name="entry_by" required>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies (Popper.js and jQuery) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
