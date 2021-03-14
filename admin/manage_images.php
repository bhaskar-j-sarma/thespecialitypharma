<?php
    include('header_top.php');    
?>
<?php 
    include_once("classes/fetch-data.php");
    $image_list=new fetch_data();
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-body">
                    <h3>Manage Media <button type="button" class="btn btn-danger btn-sm" id="delete_record">Delete Data</button></h3>                    
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
        	<div class="hpanel">              	
                <div class="panel-body">
                    <div class="table-responsive">              	
                    <table class="table" id="manage_blogs"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
						<thead>
							<tr>
                                <th><input type="checkbox" id="checkAll"></th>							
                                <th>Product Id</th>
                                <th>Product Name</th>
                                <th>Product Image</th>
                                <th>Created Date</th>
							</tr>
						</thead>
                            <?php
                                  $sql=$image_list->all_product_image_list();
                                  while($row=mysqli_fetch_array($sql))
                                  {
                            ?>
                            <tr>
                                <td><input class="checkbox" type="checkbox" name="id[]" id="<?php echo $row['id'] ?>"></td>
                                <td><?= $row['product_id'] ?></td>
                                <td><?= $row['product_name'] ?></td>
                                <td><a target="_blank" href="blogs_images/<?= $row['image'] ?>"><?= $row['image'] ?></a></td>
                                <td><?= $row['created_at'] ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
					</table>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
      $('#checkAll').click(function(){
        if(this.checked){
          $('.checkbox').each(function(){
            this.checked = true;
          });
        }else{
          $('.checkbox').each(function(){
            this.checked = false;
          });
        }
      });
    });
    $('#delete_record').click(function(){
      var dataArr = new Array();
      if($('input:checkbox:checked').length > 0){
        $('input:checkbox:checked').each(function(){
          dataArr.push($(this).attr('id'));
        });
        sendDeleteRequest(dataArr)
      }else{
        alert('No record selected');
      }
    });
    function sendDeleteRequest(dataArr){
      $.ajax({
        type    : 'post',
        url     : 'webservices/ajax_delete_image.php',
        data    : {'data' : dataArr},
        success : function(response){
                    location.reload();
                  },
        error   : function(errResponse){
                    alert(errResponse);
                  }
      });
    }
</script>
<script type="text/javascript">
    $(function(){
       $("#manage_blogs").DataTable();
    });
</script>
<?php
    include('footer.php');
?>