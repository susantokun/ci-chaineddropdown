<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Tutorial ChainedDropDown | Susantokun</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="<?=base_url('assets')?>/vendor/semantic/semantic.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<style media="screen">
	.ui.center.header {
		padding-top: 50px;
	}

</style>

<body>
	<div class="ui container">
		<h1 class="ui center aligned header">Tutorial ChainedDropDown | Susantokun</h1>
		<div class="ui center aligned raised very padded text container segment">

			<div class="ui selection dropdown" name="province" id="province">
				<input type="hidden" id="selected_province" name="selected_province">
				<i class="dropdown icon"></i>
				<div class="default text">- Select Province -</div>
				<div class="menu">
					<?php foreach ($data->result() as $row) : ?>
					<div class="item" data-value="<?= $row->id ?>"><?= $row->name; ?></div>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="ui selection dropdown" id="cities">
				<input type="hidden" id="selected_city" name="selected_city">
				<i class="dropdown icon"></i>
				<div class="default text" id="default_text">- Select City -</div>
				<div class="menu" id="city_content"></div>
			</div>

		</div>
	</div>

	<script type="text/javascript" src="<?=base_url('assets')?>/vendor/semantic/semantic.min.js"></script>
	<script>
		$('#cities')
			.dropdown();
		$(document).ready(function () {
			$('#province').dropdown().change(function () {
				$('#default_text').text("- Select City -").addClass('default');;
				
				var id = $(this).find('#selected_province').attr("value");
				$.ajax({
					url: "<?= base_url(); ?>/province/get_city",
					method: "POST",
					dataType: "JSON",
					data: {
						id: id
					},
					success: function (array) {
						var html = '';
						for (let index = 0; index < array.length; index++) {
							html += '<div class="item" data-value=' + array[index].id + '">'+ array[index].name +'</div>'
						}
						$('#city_content').html(html);
						
						for (let index = 0; index < array.length; index++) {
                            html += "<option>" + array[index].name + "</option>"

                        }
                        $('#city').html(html);
					}
				})
			})
		})

	</script>
</body>

</html>
