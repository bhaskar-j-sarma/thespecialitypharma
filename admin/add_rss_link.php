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
                    <h3>ADD RSS</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="hpanel">
                <div class="panel-body">
                    <form id="rssForm">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label>Title</label>
                                <input type="text" value="" id="rss_link_title" class="form-control" name="rss_link_title" placeholder="Enter Title for the RSS feeds">
                            </div>
                            <div class="form-group col-lg-12">
                                <label>RSS URL</label>
                                <input type="text" value="" id="rss_link" class="form-control" name="rss_link" placeholder="Rss url link(http://)">
                                 <input type="hidden" value="add_rss" id="action" class="form-control" name="action">
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="button" id="rss_submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                   
                   
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="hpanel">
                <div class="panel-body">
                    <form id="rssFormUpdate">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label>Select Title(RSS) to update</label>
                                <select class="form-control m-b" name="rss_feeds" id="rss_feeds" onchange="getRssTitle(this.value)">
                                    <option value="">Select an RSS-feed:</option>
                                    <option value="BBC">BBC Top Stories</option>
                                    <option value="NBC">NBC News</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-12">
                                <label>RSS URL</label>
                                <input type="text" value="" readonly="" id="rss_link_update" class="form-control" name="rss_link_update" placeholder="Rss url link(http://)">
                                <input type="hidden" value="update_rss" id="action" class="form-control" name="action">
                                <input type="hidden" value="" id="rss_link_name" class="form-control" name="rss_link_name">

                            </div>
                        </div>
                        <div class="text-center">
                            <button type="button" id="rss_submit_update" class="btn btn-success">Update Feeds</button>
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
                 <div id="rssOutputtext">RSS-feed will be listed here...</div>
                    <div id="rssOutput"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include('footer.php');
    ?>