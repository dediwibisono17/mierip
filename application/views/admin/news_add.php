<?php echo ($header != NULL) ? $header : 'header not configured properly!'; ?>
					<li><?php echo anchor('admin', 'Products'); ?></li>
					<li class="active"><?php echo anchor('admin/news', 'News'); ?></li>
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
						<li><?php echo anchor('admin/news', 'News List'); ?></li>
						<li class="active"><?php echo anchor('admin/news_add', 'Add News'); ?></li>
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
				<?php echo form_open('admin/news_post', array('class' => 'form-horizontal', 'role' => 'form')); ?>
					<div class="form-group">
						<?php echo form_label('Title', 'title', array('class' => 'col-md-2 control-label')); ?>
						<div class="col-md-10">
							<?php echo form_input(array('name' => 'title', 'id' => 'title', 'class' => 'form-control', 'placeholder' => 'News Title')); ?>
						</div>
					</div>
					<div class="form-group">
						<?php echo form_label('Content', 'content', array('class' => 'col-md-2 control-label')); ?>
						<div class="col-md-10">
							<?php echo form_textarea(array('name' => 'content', 'id' => 'content', 'class' => 'form-control', 'placeholder' => 'News Content')); ?>
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