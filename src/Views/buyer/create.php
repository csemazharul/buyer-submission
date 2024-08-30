<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer Entry Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="container mt-10 w-50 p-3" >
        <div class="row">
            <div class="col-md-10">
                <h2>Buyer Entry Form</h2>
            </div>
            <div class="col-md-2 text-end">
                <a href="<?=getenv('APP_URL')?>" class="btn btn-primary mt-4">Buyer List</a>
            </div>

        </div>
        <form id="buyer-submission" method="post">
            <div class="form-group">
                <label for="amount">Amount *</label>
                <input type="number" class="form-control" id="amount" name="amount" required>

                <span class="text-danger" id="amount_error"></span>
            </div>

            <div class="form-group">
                <label for="buyer">Buyer *</label>
                <input type="text" class="form-control" id="buyer" name="buyer" maxlength="255" required>
                <span class="text-danger" id="buyer_error"></span>
            </div>

            <div class="form-group">
                <label for="receipt_id">Receipt ID *</label>
                <input type="text" class="form-control" id="receipt_id" name="receipt_id" maxlength="20" required>
                <span class="text-danger" id="receipt_id_error"></span>

            </div>

            <div class="form-group">
                <!-- <label for="items">Items *</label>
                <input type="text" class="form-control" id="items" name="items" maxlength="255" required>
                <span class="text-danger" id="items_error"></span> -->
                <div id="items-container" class="mb-3">
            <label class="form-label">Items</label>
            <div class="row mb-2 item-group">
                <div class="col-8">
                    <input type="text" name="items[]" class="form-control" placeholder="Item 1" required>
                </div>
                <div class="col-4 d-flex align-items-center">
                    <button type="button" class="btn btn-success add-item-btn">Add Item</button>
                </div>
            </div>
        </div>

            </div>

            <div class="form-group">
                <label for="buyer_email">Buyer Email *</label>
                <input type="email" class="form-control" id="buyer_email" name="buyer_email" maxlength="50" required>
                <span class="text-danger" id="buyer_email_error"></span>

            </div>

            <div class="form-group">
                <label for="note">Note *</label>
                <textarea class="form-control" id="note" name="note" rows="3" required></textarea>
                <span class="text-danger" id="note_error"></span>

            </div>

            <div class="form-group">
                <label for="city">City *</label>
                <input type="text" class="form-control" id="city" name="city" maxlength="20" required>
                <span class="text-danger" id="city_error"></span>

            </div>

            <div class="form-group">
                <label for="phone">Phone *</label>
                <input type="text" class="form-control" id="phone" name="phone" maxlength="20" required>
                <span class="text-danger" id="phone_error"></span>
            </div>


            <div class="form-group">
                <label for="entry_by">Entry By *</label>
                <input type="number" class="form-control" id="entry_by" name="entry_by" required>
            </div>

            <!-- Submit button -->
            <button type="submit"  class="btn btn-primary">Submit</button>
        </form>
    </div>



    <!-- Bootstrap JS and dependencies (Popper.js and jQuery) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script>

      function checkPhoneNumberStartWith(phone) {
        //start not with 880 then add 880

        if(phone.startsWith('880')){
            return phone;
        }else{
            return '880'+phone;
        }
      }

       $(document).ready(function() {


        $(document).on('click', '.add-item-btn', function() {
            const filedCount= $('.item-group').length+1;
            const itemField = `
                <div class="row mb-2 item-group">
                    <div class="col-8">
                        <input type="text" name="items[]" class="form-control" placeholder="Item ${filedCount}" required>
                    </div>
                    <div class="col-4 d-flex align-items-center">
                        <button type="button" class="btn btn-danger remove-item-btn">Remove</button>
                    </div>
                </div>
            `;
            $('#items-container').append(itemField);
        });

        // Remove item field
        $(document).on('click', '.remove-item-btn', function() {
            $(this).closest('.item-group').remove();
        });


    const url = "<?=getenv('APP_URL') . '/buyer/store'?>";

    const form = $('#buyer-submission');

    form.on('submit', function(e) {
        console.log('Form submitted');
        e.preventDefault();
        const formData = new FormData(this);

        formData.set('phone', checkPhoneNumberStartWith(formData.get('phone')));

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                const parseData = JSON.parse(data);
                if (parseData.success) {

                    alert(parseData.message);
                    window.location.href = '<?=getenv('APP_URL') . '/buyer/create'?>';
                } else {
                    if (parseData.errors) {
                        console.log('Validation failed!');
                        $.each(parseData.errors, function(key, error) {
                            const element = $('#' + key + '_error');
                            element.text(error[0]);
                        });
                    } else {
                        console.log('Failed to create buyer!');
                        alert(parseData.message);
                    }
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });
});

    </script>
</body>
</html>
