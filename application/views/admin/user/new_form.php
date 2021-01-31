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
					<a href="<?php echo site_url('admin/user/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
				</div>
				<div class="card-body">
					
					<form action="<?php echo site_url('admin/user/add') ?>" method="post" enctype="multipart/form-data">

						<div class="form-group">
							<label for="nama">*Nama</label>
							<input type="text" name="nama_user" class="form-control <?php echo form_error('nama') ? 'is-invailid':'' ?>">
							<div class="invalid-feedback">
								<?php echo form_error('nama') ?>
							</div>
						</div>

						<div class="form-group">
							<label for="email">*Email</label>
							<input type="email" name="email_user" class="form-control <?php echo form_error('email') ? 'is-invailid':'' ?>">
							<div class="invalid-feedback">
								<?php echo form_error('email') ?>
							</div>
						</div>

						<div class="form-group">
							<label for="phone">*Username</label>
							<input type="text" name="username" class="form-control <?php echo form_error('phone') ? 'is-invailid':'' ?>">
							<div class="invalid-feedback">
								<?php echo form_error('phone') ?>
							</div>
						</div>

						<div class="form-group">
							<label for="password">*Password</label>
							<input type="password" name="password" class="form-control <?php echo form_error('password') ? 'is-invailid':'' ?>">
							<div class="invalid-feedback">
								<?php echo form_error('password') ?>
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