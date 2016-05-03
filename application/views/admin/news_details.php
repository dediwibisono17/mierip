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
						<li><?php echo anchor('admin/news_add', 'Add News'); ?></li>
					</ul>
				</div>
				<?php echo ($sidebar != NULL) ? $sidebar : ''; ?>
			</div>
			<div class="col-md-9">
				<div class="page-header">
					<h2><?php echo $news_content->title; ?> <small><?php echo anchor('admin/news_edit/' . $news_content->id, 'Edit news'); ?></small></h2>
				</div>
				<div class="well well-sm">
					<small><?php echo $news_content->date; ?></small>
					<p><?php echo $news_content->content; ?></p>
				</div>
			</div>
		</div>
	</div>
<?php echo ($footer != NULL) ? $footer : 'footer not configured properly!'; ?>