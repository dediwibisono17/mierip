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
						<li class="active"><?php echo anchor('admin/news', 'News List'); ?></li>
						<li><?php echo anchor('admin/news_add', 'Add News'); ?></li>
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
			<?php foreach($news_list->result() as $news) : ?>
				<div class="well well-sm">
					<div class="media">
						<div class="media-body">
							<h4 class="media-heading">
								<?php echo anchor('admin/news_details/' . $news->id, $news->title); ?> 
								<small><?php echo anchor('admin/news_delete/' . $news->id, 'Delete', array('class' => 'btn btn-link', "onClick" => "return confirm('Are you sure you want to delete this item? This action cannot be undone.')")); ?></small>
							</h4>
							<p><?php echo substr($news->content, 0, 140) . ' [...]'; ?></p>
							<small><i>Published on <?php echo date('D, j F Y H:i:s', strtotime($news->date)); ?></i></small>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
			<?php unset($news); ?>
			<?php echo $this->pagination->create_links(); ?>
			</div>
		</div>
	</div>
<?php echo ($footer != NULL) ? $footer : 'footer not configured properly!'; ?>