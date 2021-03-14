<?php
    include('header_top.php');
?>
<?php 
    include_once("classes/fetch-data.php");
    $review_list=new fetch_data();

?>
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-body">
                    <h3>View Orders</h3> 
                    <button type="button" id="delete_orders" class="btn btn-danger">Delete Orders</button>    
                   
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
        	<div class="hpanel">               	
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered able-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead style="font-size: 13px;">
                            <tr>
                                <th><input type="checkbox" id="checkAll"></th>
                                <th>Sr No</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Product Ordered</th>
                                <th>Address</th>
                                <th>Ordered Time</th>

                            </tr>
                        </thead>
                        <tbody style="font-size: 14px;">
                            <?php
                            $sql=$review_list->all_orders_list();
                            $c = 0;
                            while($row=mysqli_fetch_array($sql))
                            {
                            ?>
                            <tr>
                            <td><input class="checkbox" type="checkbox" name="id[]" id="<?php echo $row['	review_id'] ?>"></td>
                            <td><?php echo ++$c; ?></td>
                           
                            <td><?php echo $row['email_id'] ?></td>                      
                            <td><?php echo $row['phone_number'] ?></td>  
                            <td><?php echo $row['product'] ?></td>  
                            <td><?php echo $row['address'] ?></td> 
                            <td><?php echo $row['created'] ?></td>                      
                    
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
<?php
    include('footer.php');
?>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('table').DataTable();
	});
</script>
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
    $('#delete_images').click(function(){
      var dataArr = new Array();
      if($('input:checkbox:checked').length > 0){
        $('input:checkbox:checked').each(function(){
          dataArr.push($(this).attr('id'));
        });
        sendApprovel(dataArr)
      }else{
        alert('No record selected');
      }
    });
    function sendApprovel(dataArr){
      $.ajax({
        type    : 'post',
        url     : 'webservices/ajax_images_deleted.php',
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