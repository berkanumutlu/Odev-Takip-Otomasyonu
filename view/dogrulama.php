<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>
	<!-- The Modal -->
	<div class="modal fade" id="myModal">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Ödevi Sil<button type="button" class="close" data-dismiss="modal">&times;</button></h4>
				</div>
				<!-- Modal body -->
				<div class="modal-body">
					<p>Bu ödevi silmek istediğinize emin misiniz?</p>
				</div>
				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal" id="silme_tusu">Sil</button>
				</div>
				<script src="js/confirm.js"></script>
			</div>
		</div>
	</div>
</body>