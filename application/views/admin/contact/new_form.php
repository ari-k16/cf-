<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar") ?>
	<div id="wrapper">
		
		<!-- <?php $this->load->view("admin/_partials/sidebar") ?> -->

		<div id="content-wrapper">

			<div class="container-fluid">
			
			<?php $this->load->view("admin/_partials/breadcrumb") ?>

			<?php if ($this->session->flashdata('success')): ?>
			<div class="alert alert-success" role="alert">
				<?php echo $this->session->flashdata('success'); ?>
			</div>
			<?php endif; ?>

			<div class="card mb-3">
				<div class="card-header">
					<a href="<?php echo site_url('admin/contact/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
				</div>
				<div class="card-body">
					
					<form action="<?php echo site_url('admin/contact/add') ?>" method="post" enctype="multipart/form-data">

						<div class="form-group">
							<label for="nama">*Nama</label>
							<input type="text" name="nama" class="form-control <?php echo form_error('nama') ? 'is-invailid':'' ?>">
							<div class="invalid-feedback">
								<?php echo form_error('nama') ?>
							</div>
						</div>

						<div class="form-group">
							<label for="email">*Email</label>
							<input type="email" name="email" class="form-control <?php echo form_error('email') ? 'is-invailid':'' ?>">
							<div class="invalid-feedback">
								<?php echo form_error('email') ?>
							</div>
						</div>

						<div class="form-group">
							<label for="phone">*Phone</label>
							<input type="number" name="phone" class="form-control <?php echo form_error('phone') ? 'is-invailid':'' ?>">
							<div class="invalid-feedback">
								<?php echo form_error('phone') ?>
							</div>
						</div>

						<div class="form-group">
							<label for="isi">*Isi</label>
							<textarea style="resize: none; width: 1030px; height: 100px;" name="isi" class="form-control <?php echo form_error('isi') ? 'is-invailid':'' ?>"></textarea>
							<div class="invalid-feedback">
								<?php echo form_error('isi') ?>
							</div>
						</div>

						<input class="btn btn-success" type="submit" name="btn" value="Save">
					</form>
				</div>

				<div class="card-footer small text-muted">
					*required fields
				</div>

			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			<?php $this->load->view("admin/_partials/footer") ?>
		</div>
		<!-- /.content-wrapper -->
	</div>

	</div>
	<!-- /#wrapper -->

	<?php $this->load->view("admin/_partials/scrolltop") ?>
	<?php $this->load->view("admin/_partials/js") ?>

</body>
</html>