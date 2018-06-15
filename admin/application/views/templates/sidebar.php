<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
	<style type="text/css">
		.sidebar ul.nav a{
			color: #c4c4c4;
		}
		.sidebar ul.nav a:hover, .sidebar ul.nav li.parent ul li a:hover {
	    text-decoration: none;
	    color:black;
	    background-color: #e9ecf2;
		}
	</style>

		<!-- edited by lijo -->
	<ul class="nav menu">
		<li class="<?php if ($active=='dashboard') { 
				echo 'active';
			 } ?>" ><a id="programs" href="<?php echo base_url(); ?>index.php/Home" ><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg>Dashboard</a>
		</li>
		<li id="click" class="<?php if($active == 'Programlist'){
				echo 'active';
				}?>"><a href="<?php echo base_url(); ?>index.php/Programlist" id="program_link" href="#" ><span class="glyphicon glyphicon-list-alt"></span><use xlink:href="#stroked-calendar"></use></svg>Program List</a>
		</li>
		<li id="click" class="<?php if($active == 'Aboutus'){
				echo 'active';
				}?>"><a href="<?php echo base_url(); ?>index.php/Aboutus" id="program_link" href="#" ><span class="glyphicon glyphicon-file"></span><use xlink:href="#stroked-calendar"></use></svg>About Us</a>
		</li>
		<li id="click" class="<?php if($active == 'Homescroll'){
				echo 'active';
				}?>"><a href="<?php echo base_url(); ?>index.php/Homescroll" id="program_link" href="#" ><span class="glyphicon glyphicon-film"></span><use xlink:href="#stroked-calendar"></use></svg>Home Scroll</a>
		</li>
		<li id="click" class="<?php if($active == 'Holymass'){
				echo 'active';
				}?>"><a href="<?php echo base_url(); ?>index.php/Holymass" id="program_link" href="#" ><span class="glyphicon glyphicon-film"></span><use xlink:href="#stroked-calendar"></use></svg>Holy Mass</a>
		</li>
		<li id="click" class="<?php if($active == 'Novena'){
				echo 'active';
				}?>"><a href="<?php echo base_url(); ?>index.php/Novena" id="program_link" href="#" ><span class="glyphicon glyphicon-film"></span><use xlink:href="#stroked-calendar"></use></svg>Novena</a>
		</li>

	</ul>
</div>