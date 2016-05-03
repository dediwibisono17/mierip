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
						<li class="active"><?php echo anchor('admin', 'Product List'); ?></li>
						<li><?php echo anchor('admin/products_add', 'Add Product'); ?></li>
					</ul>
				</div>
				<?php echo ($sidebar != NULL) ? $sidebar : ''; ?>
			</div>
			<div class="col-md-9">
			<?php if($this->session->flashdata('succeess')) : ?>
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<?php echo $this->session->flashdata('success'); ?>
				</div>
			<?php endif; ?>
				<div class="row">
				<?php foreach($products_list->result() as $products) : ?>
					<div class="col-sm-6 col-md-3">
						<div class="thumbnail">
							<img src="<?php echo base_url(); ?>assets/products/<?php echo $products->image; ?>" alt="image">
							<div class="caption">
								<h3><?php echo $products->name; ?></h3>
								<small><?php echo $products->price; ?></small>
								<p><?php echo $products->description; ?></p>
								<p>
									<?php echo anchor('admin/product_edit/' . $products->id, 'Edit', array('class' => 'btn btn-primary')); ?> 
									<?php echo anchor('admin/product_delete/' . $products->id, 'Delete', array('class' => 'btn btn-danger', "onClick" => "return confirm('Are you sure you want to delete this item? This action cannot be undone.')")); ?>
								</p>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
				<?php unset($products); ?>
				</div>
			</div>
		</div>
	</div>
<?php echo ($footer != NULL) ? $footer : 'footer not configured properly!'; ?>