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
					<a href="<?php echo site_url('admin/company/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
				</div>
				<div class="card-body">
					
					<form action="" method="post" enctype="multipart/form-data">

						<input type="hidden" name="id" value="<?php echo $company->id_company ?>">

						<div class="form-group">
							<label for="visi">*Visi</label>
							<textarea style="resize: none; width: 1030px; height: 100px;" name="visi" class="form-control <?php echo form_error('visi') ? 'is-invailid':'' ?>"><?php echo $company->visi ?></textarea>
							<div class="invalid-feedback">
								<?php echo form_error('visi') ?>
							</div>
						</div>

						<div class="form-group">
							<label for="misi">*Misi</label>
							<textarea style="resize: none; width: 1030px; height: 100px;" name="misi" class="form-control <?php echo form_error('misi') ? 'is-invailid':'' ?>"><?php echo $company->misi ?></textarea>
							<div class="invalid-feedback">
								<?php echo form_error('misi') ?>
							</div>
						</div>

						<div class="form-group">
							<label for="umum">*Umum</label>
							<textarea style="resize: none; width: 1030px; height: 100px;" name="umum" class="form-control <?php echo form_error('umum') ? 'is-invailid':'' ?>"><?php echo $company->umum ?></textarea>
							<div class="invalid-feedback">
								<?php echo form_error('umum') ?>
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