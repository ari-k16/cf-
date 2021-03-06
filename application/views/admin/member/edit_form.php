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
					<a href="<?php echo site_url('admin/member/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
				</div>
				<div class="card-body">
					
					<form action="" method="post" enctype="multipart/form-data">
					<!-- Note atribut action dikosongkan, artinya actionnya akan di proses oleh controller tempat view ini digunakan. Yakni idex.php/admin/member/edit/ID-->

						<input type="hidden" name="id" value="<?php echo $members->id_member ?>">

						<div class="form-group">
							<label for="nama">*Nama Member</label>
							<input type="text" name="nama_member" value="<?php echo $members->nama_member ?>" class="form-control <?php echo form_error('nama_member') ? 'is-invailid':'' ?>">
							<div class="invalid-feedback">
								<?php echo form_error('nama_member') ?>
							</div>
						</div>

						<div class="form-group">
							<label for="photo">*Photo</label>
							<input type="file" name="photo" class="form-control-file <?php echo form_error('photo') ? 'is-invailid':'' ?>">
							<input type="hidden" name="old_image" value="<?php echo $members->photo ?>" />
							<div class="invalid-feedback">
								<?php echo form_error('photo') ?>
							</div>
						</div>

						<div class="form-group">
							<label for="deskripsi">*Deskripsi</label>
							<textarea style="resize: none; width: 1030px; height: 100px;" name="deskripsi" class="form-control <?php echo form_error('deskripsi') ? 'is-invailid':'' ?>"><?php echo $members->deskripsi ?></textarea>
							<div class="invalid-feedback">
								<?php echo form_error('deskripsi') ?>
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