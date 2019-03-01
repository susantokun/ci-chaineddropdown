<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Susantokun ChainDropDown</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <select name="province" id="province">
        <option value="0">Select Province</option>
        <?php foreach ($data->result() as $row) : ?>
        <option value="<?= $row->province_id; ?>">
            <?= $row->province_name; ?>
        </option>
        <?php endforeach; ?>
    </select>
    <br><br>
    <select name="city" id="city">
        <option value="0">Select City</option>
    </select>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#province').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "<?= base_url(); ?>/province/get_city",
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        id: id
                    },
                    success: function(array) {
                        var html = '';
                        for (let index = 0; index < array.length; index++) {
                            html += "<option>" + array[index].city_name + "</option>"

                        }
                        $('#city').html(html);
                    }
                })
            })
        })
    </script>
</body>

</html> 