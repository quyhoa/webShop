<nav class="navbar navbar-default">
			  <div class="container-fluid">
			    <div class="navbar-header">
			      <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			        <span class="icon-bar">adsadsaa</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>                        
			      </button> -->
			      <a class="navbar-brand" href="#" style="background-color: #00EE00;color:#FFFFFF">BÁN SÁCH ONLINE</a>
			    </div>
			    <div class="collapse navbar-collapse " id="myNavbar">
			    <?php if($this->Session->check('info_user')): ?>
			    <?php $user_name = $this->Session->read('info_user'); ?>		 
			      <ul class="nav navbar-nav div-header">
			      <li>

			      	<a href="">Xin chào: <?php echo $user_name[0]['User']['name']; ?></a>
			      </li>
			        <li><a href="/web/logout" class='div-header'>LogOut</a></li>
			      </ul>
			  <?php endif; ?>
			    </div>
			  </div>
			</nav>
<style type="text/css">
	.div-header{
		
		float: right;
	}
	.navbar-default .navbar-nav>li>a{
		color: #3300CC;
		font-weight: 18px;
	}
</style>