<?php echo ($header != NULL) ? $header : 'header not configured properly!'; ?>
					<li><?php echo anchor('admin', 'Products'); ?></li>
					<li><?php echo anchor('admin/news', 'News'); ?></li>
					<li class="active"><?php echo anchor('admin/testimonials', 'Testimonials'); ?></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="row">
		<?php if($sidebar != NULL) : ?>
			<div class="col-md-3">
				<?php echo $sidebar; ?>
			</div>
			<div class="col-md-9">
				<?php if($this->session->flashdata('succeess')) : ?>
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<?php echo $this->session->flashdata('success'); ?>
					</div>
				<?php endif; ?>
				<?php foreach($testi_list->result() as $testimonials) : ?>
					<div class="well well-sm">
						<div class="media">
							<div class="media-body">
								<h4 class="media-heading">
									<?php echo $testimonials->name; ?>
									<small>
										<?php echo anchor('admin/testimonials_delete/' . $testimonials->id, 'Delete', array('class' => 'btn btn-link', "onClick" => "return confirm('Are you sure you want to delete this item? This action cannot be undone.')")); ?>
									</small>
								</h4>
								<p><?php echo $testimonials->comment; ?></p>
								<small><i>Sent on <?php echo date('D, j F Y H:i:s', strtotime($testimonials->date)); ?></i></small>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
				<?php unset($testimonials); ?>
				<?php echo $this->pagination->create_links(); ?>
			</div>
		<?php else : ?>
			<?php if($this->session->flashdata('succeess')) : ?>
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<?php echo $this->session->flashdata('success'); ?>
				</div>
			<?php endif; ?>
			<?php foreach($testi_list->result() as $testimonials) : ?>
				<div class="well well-sm">
					<div class="media">
						<div class="media-body">
							<h4 class="media-heading">
								<?php echo $testimonials->name; ?>
								<small>
									<?php echo anchor('admin/testimonials_delete/' . $testimonials->id, 'Delete', array('class' => 'btn btn-link', "onClick" => "return confirm('Are you sure you want to delete this item? This action cannot be undone.')")); ?>
								</small>
							</h4>
							<p><?php echo $testimonials->comment; ?></p>
							<small><i>Sent on <?php echo date('D, j F Y H:i:s', strtotime($testimonials->date)); ?></i></small>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
			<?php unset($testimonials); ?>
			<?php echo $this->pagination->create_links(); ?>
		<?php endif; ?>
		</div>
	</div>
<?php echo ($footer != NULL) ? $footer : 'footer not configured properly!'; ?>