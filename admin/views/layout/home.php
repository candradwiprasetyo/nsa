

               

                <!-- Main content -->
                <section class="content">
                    
                    
                     <div class="row">
                     
                     <div class="col-md-6">
                    
                    <img src="../img/banner.png" style="width:100%;" />
                    
                             <div class="box">
                           
                             
                                <div class="box-body2 table-responsive" style="padding:20px; text-align:center;">
                                  <h2>Selamat Datang</h2>
                                  <h4> Di website administrator Nation Star Academy </h4><br>
                                  <br />
									<div style="font-size:11px; color:#ccc;">Copyright © 2015, Nation Star Academy. All rights reserved. Powered by Webtocrat Motion</div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                       
                        </div>
                        
                         <div class="col-md-6">
                            <!-- general form elements disabled -->

                <?php
                if(isset($_GET['did']) && $_GET['did'] == 1){
                ?>
                
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Simpan Berhasil
                </div>
           
               <br />
                <?php
                }
				?>
                          
                            

                             <form  class="cmxform" id="createForm" action="<?= $action?>" method="post" enctype="multipart/form-data" role="form">

                            <div class="box box-cokelat">
                                
                               
                                <div class="box-body">
                                    
                      
                                       
                                        <div class="col-md-12">
                                      
                                      
 										<div class="form-group">
                                            <label>School Name</label>
                                            <input required type="text" name="i_name" class="form-control" placeholder="" value="<?= $row->page_info_name ?>" title="Nama harus diisi" />
                                        </div>
                                        <div class="form-group">
                                            <label>School Address</label>
                                            <input required type="text" name="i_address" class="form-control" placeholder="" value="<?= $row->page_info_address ?>" title="Alamat harus diisi" />
                                        </div>
                                        
                                       <div class="form-group">
                                            <label>Facebook</label>
                                            <input required type="text" name="i_facebook" class="form-control" placeholder="" value="<?= $row->page_info_facebook ?>" title="Facebook harus diisi" />
                                        </div>
                                        <div class="form-group">
                                            <label>Twitter</label>
                                            <input required type="text" name="i_twitter" class="form-control" placeholder="" value="<?= $row->page_info_twitter ?>" title="Twitter harus diisi" />
                                        </div>
                              			<div class="form-group">
                                            <label>Youtube</label>
                                            <input required type="text" name="i_youtube" class="form-control" placeholder="" value="<?= $row->page_info_youtube ?>" title="Youtube harus diisi"/>
                                        </div>

                                      
                                        </div>
                                      
 									
                                        <div style="clear:both;"></div>
                                     
                                </div><!-- /.box-body -->
                                
                                  <div class="box-footer">
                                <input class="btn btn-success" type="submit" value="Save"/>
                                <a href="<?= $close_button?>" class="btn btn-success" >Close</a>
                             
                             </div>
                            
                            </div><!-- /.box -->
                       </form>
                        </div><!--/.col (right) -->
                        
                    </div>

					 <div class="row">
                      
                        <!-- right column -->
                       
                    </div>   <!-- /.row -->


                </section><!-- /.content -->