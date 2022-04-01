<?php 
$cur_year=date('Y');
?>
<!-- partial:partials/_footer.html -->
        <footer class="footer">
            <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <?php echo $cur_year;?> <a href="javascript:void(0)" class="text-muted" target="_blank">{{ env('MY_SITE_NAME') }}</a>. All rights reserved.</span>
                        <!--<span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center text-muted">Free <a href="javascript:void(0)" class="text-muted" target="_blank">Bootstrap dashboard</a> templates from {{ env('MY_SITE_NAME') }}</span>-->
                    </div>
                </div>    
            </div>        
        </footer>
        <!-- partial -->