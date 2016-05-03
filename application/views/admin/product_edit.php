<?php echo ($header != NULL) ? $header : 'header not configured properly!'; ?>
					<li class="active"><?php echo anchor('admin', 'Products'); ?></li>
					<li><?php echo anchor('admin/news', 'News'); ?></li>
					<li><?php echo anchor('admin/testimonials', 'Testimonials'); ?></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="well well-sm">
					<ul class="nav nav-pills nav-stacked">
						<li><?php echo anchor('admin', 'Product List'); ?></li>
						<li><?php echo anchor('admin/products_add', 'Add Product'); ?></li>
					</ul>
				</div>
				<?php echo ($sidebar != NULL) ? $sidebar : ''; ?>
			</div>
			<div class="col-md-9">
				<?php if($this->session->flashdata('error')) : ?>
				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<?php echo $this->session->flashdata('error'); ?>
				</div>
				<?php endif; ?>
				<?php echo form_open_multipart('admin/product_edit_post', array('class' => 'form-horizontal', 'role' => 'form')); ?>
					<?php echo form_hidden('id', $product->id); ?>
					<div class="form-group">
						<?php echo form_label('Product Name', 'name', array('class' => 'col-md-2 control-label')); ?>
						<div class="col-md-10">
							<?php echo form_input(array('name' => 'name', 'id' => 'name', 'class' => 'form-control', 'value' => $product->name, 'placeholder' => 'Product Name')); ?>
						</div>
					</div>
					<div class="form-group">
						<?php echo form_label('Product Description', 'description', array('class' => 'col-md-2 control-label')); ?>
						<div class="col-md-10">
							<?php echo form_textarea(array('name' => 'description', 'id' => 'description', 'class' => 'form-control', 'value' => $product->description, 'placeholder' => 'Product Description')); ?>
						</div>
					</div>
					<div class="form-group">
						<?php echo form_label('Price', 'price', array('class' => 'col-md-2 control-label')); ?>
						<div class="col-md-10">
							<?php echo form_input(array('name' => 'price', 'id' => 'price', 'class' => 'form-control', 'value' => $product->price, 'placeholder' => 'Price')); ?>
						</div>
					</div>
					<div class="form-group">
						<?php echo form_label('Image', 'image', array('class' => 'col-md-2 control-label')); ?>
						<div class="col-md-10">
							<?php echo form_upload(array('name' => 'image', 'id' => 'image', 'class' => 'form-control')); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-10">
							<?php echo form_submit(array('name' => 'submit', 'value' => 'Publish', 'class' => 'btn btn-primary')); ?>
						</div>
					</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
<?php echo ($footer != NULL) ? $footer : 'footer not configured properly!'; ?>