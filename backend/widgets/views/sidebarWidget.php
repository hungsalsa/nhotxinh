<div class="sidebar" data-color="purple" data-image="<?= Yii::$app->homeUrl ?>plugin/img/sidebar-5.jpg">
    <div class="sidebar-wrapper">
    	<div class="logo">
    		<a href="###" class="simple-text">
                <?php 
        			if (!Yii::$app->user->isGuest){
                        echo Yii::$app->user->identity->fullname;
                    }
                ?>
    		</a>
    	</div>

    	<ul class="nav">
    		<li class="active">
    			<a href="<?= Yii::$app->homeUrl ?>">
    				<i class="pe-7s-graph"></i>
    				<p>Dashboard</p>
    			</a>
    		</li>
    		<li>
    			<a href="user.html">
    				<i class="pe-7s-user"></i>
    				<p>User Profile</p>
    			</a>
    		</li>
            <li class="list-group">
                    <a href="#menu1" class="list-group-item menudropdown collapsed" data-toggle="collapse" data-parent="#sidebar" aria-expanded="false"><i class="fa fa-dashboard"></i> <span class="hidden-sm-down">Quản lý sản phẩm</span> </a>
                <div class="collapse" id="menu1">
                    <a href="<?= Yii::$app->homeUrl ?>quantri/productcategory" class="list-group-item menudropdown" data-parent="#menu1">Danh mục sản phẩm</a>
                    <a href="<?= Yii::$app->homeUrl ?>quantri/product" class="list-group-item menudropdown" data-parent="#menu1">Sản phẩm</a>
                    <a href="#menu1sub1" class="list-group-item menudropdown" data-toggle="collapse" aria-expanded="false">Thuộc tính </a>
                    <div class="collapse" id="menu1sub1">
                        <a href="<?= Yii::$app->homeUrl ?>quantri/producttype" class="list-group-item menudropdown" data-parent="#menu1sub1">Loại sản phẩm</a>
                        <a href="#" class="list-group-item menudropdown" data-parent="#menu1sub1">Subitem 2 b</a>
                        <a href="#menu1sub1sub1" class="list-group-item menudropdown" data-toggle="collapse" aria-expanded="false">Subitem 3 c </a>
                        <div class="collapse" id="menu1sub1sub1">
                            <a href="#" class="list-group-item menudropdown" data-parent="#menu1sub1sub1">Subitem 3 c.1</a>
                            <a href="#" class="list-group-item menudropdown" data-parent="#menu1sub1sub1">Subitem 3 c.2</a>
                        </div>
                        <a href="#" class="list-group-item menudropdown" data-parent="#menu1sub1">Subitem 4 d</a>
                        <a href="#menu1sub1sub2" class="list-group-item menudropdown" data-toggle="collapse"  aria-expanded="false">Subitem 5 e </a>
                        <div class="collapse" id="menu1sub1sub2">
                            <a href="#" class="list-group-item menudropdown" data-parent="#menu1sub1sub2">Subitem 5 e.1</a>
                            <a href="#" class="list-group-item menudropdown" data-parent="#menu1sub1sub2">Subitem 5 e.2</a>
                        </div>
                    </div>
                    
                </div>
            </li>

            <li class="list-group">
                <a href="#menu2" class="list-group-item menudropdown collapsed" data-toggle="collapse" data-parent="#sidebar" aria-expanded="false"><i class="fa fa-dashboard"></i> <span class="hidden-sm-down">Quản lý khác</span> </a>
                <div class="collapse" id="menu2">
                    
                    <a href="<?= Yii::$app->homeUrl ?>quantri/models" class="list-group-item menudropdown" data-parent="#menu2">Danh sách xe</a>
                    <a href="<?= Yii::$app->homeUrl ?>quantri/manufactures" class="list-group-item menudropdown" data-parent="#menu2">Nhà sản xuất</a>
                    <a href="<?= Yii::$app->homeUrl ?>quantri/pages" class="list-group-item menudropdown" data-parent="#menu2">Trang nội dung</a>

                    <a href="#menu2sub2" class="list-group-item menudropdown" data-toggle="collapse" aria-expanded="false">Tin tức </a>
                    <div class="collapse" id="menu2sub2">
                        <a href="<?= Yii::$app->homeUrl ?>quantri/group" class="list-group-item menudropdown" data-parent="#menu2sub2">Nhóm danh mục</a>
                        <a href="<?= Yii::$app->homeUrl ?>quantri/categories" class="list-group-item menudropdown" data-parent="#menu2sub2">Danh mục tin tức</a>
                        <a href="<?= Yii::$app->homeUrl ?>quantri/news" class="list-group-item menudropdown" data-parent="#menu2sub2">Tin tức</a>
                        <a href="#menu2sub2sub1" class="list-group-item menudropdown" data-toggle="collapse" aria-expanded="false">Subitem 3 c </a>
                        <div class="collapse" id="menu2sub2sub1">
                            <a href="#" class="list-group-item menudropdown" data-parent="#menu2sub2sub1">Subitem 3 c.1</a>
                            <a href="#" class="list-group-item menudropdown" data-parent="#menu2sub2sub1">Subitem 3 c.2</a>
                        </div>
                        <a href="#menu2sub2sub2" class="list-group-item menudropdown" data-toggle="collapse"  aria-expanded="false">Subitem 5 e </a>
                        <div class="collapse" id="menu2sub2sub2">
                            <a href="#" class="list-group-item menudropdown" data-parent="#menu2sub2sub2">Subitem 5 e.1</a>
                            <a href="#" class="list-group-item menudropdown" data-parent="#menu2sub2sub2">Subitem 5 e.2</a>
                        </div>
                    </div>
                </div>
            </li>
            <li class="list-group">
                <a href="#setting" class="list-group-item menudropdown collapsed" data-toggle="collapse" data-parent="#sidebar" aria-expanded="false"><i class="fa fa-dashboard"></i> <span class="hidden-sm-down">Setting</span> </a>
                <div class="collapse" id="setting">
                    
                    <a href="<?= Yii::$app->homeUrl ?>setting/menus" class="list-group-item menudropdown" data-parent="#setting">Menus</a>
                    <a href="<?= Yii::$app->homeUrl ?>setting/" class="list-group-item menudropdown" data-parent="#setting">Nhà sản xuất</a>
                    <a href="#" class="list-group-item menudropdown" data-parent="#setting">########</a>
                     <a href="#menu2sub3" class="list-group-item menudropdown" data-toggle="collapse" aria-expanded="false">Phân quyền </a>
                    <div class="collapse" id="menu2sub3">
                        <a href="<?= Yii::$app->homeUrl ?>auth/authitem" class="list-group-item menudropdown" data-parent="#menu2sub3">Các quyền</a>
                        <a href="<?= Yii::$app->homeUrl ?>auth/authitemchild" class="list-group-item menudropdown" data-parent="#menu2sub3">Gán quyền</a>
                        <a href="<?= Yii::$app->homeUrl ?>quantri/news" class="list-group-item menudropdown" data-parent="#menu2sub3">Tin tức</a>
                        <a href="#menu2sub2sub1" class="list-group-item menudropdown" data-toggle="collapse" aria-expanded="false">Subitem 3 c </a>
                    </div>
                </div>
            </li>
            <li>
    			<a href="<?= Yii::$app->homeUrl ?>filemanager">
    				<i class="pe-7s-note2"></i>
    				<p>Quản lý ảnh</p>
    			</a>
    		</li>

    		<li>
    			<a href="typography.html">
    				<i class="pe-7s-news-paper"></i>
    				<p>Typography</p>
    			</a>
    		</li>
    		<li>
    			<a href="<?= Yii::$app->homeUrl ?>setting/menus">
    				<i class="pe-7s-science"></i>
    				<p>Icons</p>
    			</a>
    		</li>
    		<li>
    			<a href="maps.html">
    				<i class="pe-7s-map-marker"></i>
    				<p>Maps</p>
    			</a>
    		</li>
    		<li>
    			<a href="notifications.html">
    				<i class="pe-7s-bell"></i>
    				<p>Notifications</p>
    			</a>
    		</li>
    		<li class="active-pro">
    			<a href="upgrade.html">
    				<i class="pe-7s-rocket"></i>
    				<p>Upgrade to PRO</p>
    			</a>
    		</li>
    	</ul>
    </div>
</div>