<!DOCTYPE html>
<html lang="id">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

		<!-- Bootstrap CSS -->
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
		<link href="css/select2.min.css" rel="stylesheet">

	</head>
	<body>
		<div class="container">
			<select name="nama" id="mySelect2" class="form-control select2 js-data-example-ajax" required="required">
				
			</select>
		</div>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<script src="js/select2.min.js"></script>
	</body>
</html>
<script type="text/javascript">
	$(function() {
		
		$('#mySelect2').select2({
		  ajax: {
		    url: 'kecamatan.php',
		    data: function (params) {
		      var query = {
		        search: params.term,
		        page: params.page || 1
		      }

		      // Query parameters will be ?search=[term]&page=[page]
		      return query;
		      $("#mySelect2").html(query);
		    }
		  }
		});
	});
	
</script>