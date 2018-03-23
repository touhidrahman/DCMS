<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation" style="border-radius: 0px;">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo site_url();?>"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;DCMS</a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<?php echo (isset($_SESSION['name']))? $_SESSION['name'] : "<span class='glyphicon glyphicon-cog'></span>"; ?> <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo site_url('account/changePassword');?>">Change Password</a></li>
						<li><a href="#">Settings</a></li>
						<li class="divider"></li>
						<li><a href="<?php echo site_url('account/logout');?>">Logout</a></li>
					</ul></li>
			</ul>

			<form class="navbar-form navbar-right" method="post" role="search" action="<?php echo site_url('view/patient');?>">
				<div class="form-group">
					<input type="text" class="form-control" name="view" placeholder="Quick Search by ID">
				</div>
				<button type="submit" class="btn btn-default">Search</button>
			</form>

		</div>
		<!--/.nav-collapse -->
	</div>
</div>