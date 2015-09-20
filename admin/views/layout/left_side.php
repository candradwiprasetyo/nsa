 <aside class="left-side sidebar-offcanvas">                
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="image" style="text-align:center; margin-bottom:10px; margin-top:10px;">
                        	<?php
                             $user_data = get_user_data();
							if($user_data[2]==""){
								$img = "../img/user/default.jpg";
							}else{
								$img = "../img/user/".$user_data[2];
							}
							?>
                            <img src="<?= $img ?>" class="img-circle" alt="User Image" />
                        </div>
                        <div class="info" style="text-align:center;">
                            <p style="color:#a0acbf; ">
                                        <?php
                                       
                                        echo "Welcome, ".$user_data[0];
                                        ?>
                                </p>

                            <a style="color:#a0acbf;  "><?= $user_data[1]?></a>
                        </div>
                    </div>
                   
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                   <?php //if(isset($_SESSION['menu_active'])) { echo $_SESSION['menu_active']; }?>
                    <ul class="sidebar-menu">
                     
                          <li class="treeview <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 1){ echo "active"; }?>">
                            <a href="#">
                                <i class="fa fa-circle"></i>
                                <span>Home </span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
          
                                <li><a href="slider.php?page=list"><i class="fa fa-chevron-circle-right"></i>Slider</a></li>
                                <li><a href="welcome_page.php?page=list"><i class="fa fa-chevron-circle-right"></i>Welcome Page</a></li>	
                                <li><a href="gallery.php?page=list"><i class="fa fa-chevron-circle-right"></i>Gallery</a></li>
                                 <li><a href="partnership.php?page=list"><i class="fa fa-chevron-circle-right"></i>Partnership</a></li>
                                  <li><a href="home.php"><i class="fa fa-chevron-circle-right"></i>Page Info</a></li>
                                
                              
                               
                             	
                            </ul>
                  </li>
                  
                    <li <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 2){ echo "class='active'"; } ?>>
                            <a href="manual_page.php?id=1">
                                <i class="fa fa-circle"></i>
                                <span>Career</span>
                               
                            </a>
                            
                  </li>
                   
                 
                  
                        <li <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 4){ echo "class='active'"; } ?>>
                            <a href="manual_page.php?id=2">
                                <i class="fa  fa-circle"></i>
                                <span>Contact Us</span>
                               
                            </a>
                            
                  </li>
                  
                  
                  <li class="treeview <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 5){ echo "active"; }?>">
                            <a href="#">
                                <i class="fa fa-circle"></i>
                                <span>Profile </span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                            <?php
                            $query_menu = mysql_query("select * from menus where menu_level = '2' and menu_parent_id = '5' and menu_active_status = '1' limit 4");
                            while($row_menu = mysql_fetch_array($query_menu)){
                            ?>
                                <li><a href="profile.php?type_id=<?= $row_menu['menu_id']?>"><i class="fa fa-chevron-circle-right"></i><?= $row_menu['menu_name']?></a></li>
                               <?php
                            }
                            ?>
                              
                               
                             	
                            </ul>
                  </li>
                 
                  <li <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 6){ echo "class='active'"; } ?>>
                            <a href="achievement.php">
                                <i class="fa  fa-circle"></i>
                                <span>Achievement</span>
                               
                            </a>
                            
                  </li>
                  
                   	<li <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 7){ echo "class='active'"; } ?>>
                            <a href="academic.php">
                                <i class="fa fa-circle"></i>
                                <span>Academic</span>
                            </a>     
                 	 </li>
                     <li <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 8){ echo "class='active'"; } ?>>
                            <a href="news.php">
                                <i class="fa  fa-circle"></i>
                                <span>News & Events</span>
                            </a>     
                 	 </li>
                     <li <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 11){ echo "class='active'"; } ?>>
                            <a href="admission.php">
                                <i class="fa  fa-circle"></i>
                                <span>Admissions</span>
                            </a>     
                 	 </li>
                     
                     <li <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 12){ echo "class='active'"; } ?>>
                            <a href="parents_corner.php">
                                <i class="fa  fa-circle"></i>
                                <span>Parents Corner</span>
                            </a>     
                 	 </li>

                    <li <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 12){ echo "class='active'"; } ?>>
                            <a href="newsletter.php">
                                <i class="fa  fa-circle"></i>
                                <span>Newsletter</span>
                            </a>     
                   </li>
                        
                    <?php
                    if($_SESSION['user_type_id'] == 1){
					?>
                 
                  
                  <li <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 9){ echo "class='active'"; } ?>>
                            <a href="user.php">
                                <i class="fa fa-users"></i>
                                <span>User</span>
                               
                            </a>
                            
                  </li>
                 <?php
					}
				 ?>

            <li <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 10){ echo "class='active'"; } ?>>
                            <a href="menu.php">
                                <i class="fa fa-circle"></i>
                                <span>Menu</span>
                               
                            </a>
                            
                  </li>
              
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>