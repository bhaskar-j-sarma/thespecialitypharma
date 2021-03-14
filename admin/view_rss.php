<?php
    include('header_top.php');    
    ?>
<script type="text/javascript" src="js/add_blogs.js"></script>
<script type="text/javascript" src="js/rss.js"></script>
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-body">
                    <h3>VIEW RSS</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
       
        <div class="col-lg-12">
        <div class="hpanel">
        <div class="panel-heading">
           
           List All Feeds Of Selected RSS Url Title
        </div>
        <div class="panel-body">
            <form method="get" class="form-horizontal">
              
               
                <div class="form-group"><label class="col-sm-2 control-label">Select</label>

                    <div class="col-sm-4">
                    <select class="form-control m-b" name="rss_feeds" id="rss_feeds" onchange="showRSS(this.value)">
                        <option value="">Select an RSS-feed:</option>
                        <option value="BBC">BBC Top Stories</option>
                        <option value="NBC">NBC News</option>
                    </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-2">
                        <button style="display:none;" class="btn btn-primary" id="delete" onclick="delete_all_feeds(this.value)" type="button">Delete All Feeds</button>
                    </div>
                </div>
            </form>
        </div>
        </div>
        </div>
    </div>
     <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">                
                <div class="panel-body">                    
                    <table id="manage_blogs"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                        <thead>
                            <tr>                                
                                <th>Sr No.</th>
                                <th>Title</th>
                                <th>Feed Link</th>
                                <th>feed_title</th>
                                <th>feed_img</th>
                                <th>feed_description</th>
                                <th>pub_date</th>
                                <th>Status</th>
                                <th>Action&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody id="manage_blogs_body">
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
/*$(function(){
    get_rss();
});*/


</script>
<?php
    include('footer.php');
?>