<!-- Page content -->
<div id="page-content">
    <!-- Dashboard 2 Header -->
    <div class="content-header">
        <ul class="nav-horizontal text-center">
            <li class="active">
                <a href="javascript:void(0)"><i class="fa fa-home"></i> Home</a>
            </li>
            <li>
                <a href="javascript:void(0)"><i class="gi gi-charts"></i> Sales</a>
            </li>
            <li>
                <a href="javascript:void(0)"><i class="gi gi-briefcase"></i> Projects</a>
            </li>
            <li>
                <a href="javascript:void(0)"><i class="gi gi-video_hd"></i> Movies</a>
            </li>
            <li>
                <a href="javascript:void(0)"><i class="gi gi-music"></i> Music</a>
            </li>
            <li>
                <a href="javascript:void(0)"><i class="fa fa-cubes"></i> Apps</a>
            </li>
            <li>
                <a href="javascript:void(0)"><i class="fa fa-pencil"></i> Profile</a>
            </li>
            <li>
                <a href="javascript:void(0)"><i class="fa fa-cogs"></i> Settings</a>
            </li>
        </ul>
    </div>
    <!-- END Dashboard 2 Header -->

    <!-- Dashboard 2 Content -->
    <div class="row">
        <div class="col-md-6">
            <!-- Web Server Block -->
            <div class="block full">
                <!-- Web Server Title -->
                <div class="block-title">
                    <div class="block-options pull-right">
                        <span id="dash-chart-live-info" class="label label-primary">%</span>
                        <span class="label label-danger animation-pulse">CPU Load</span>
                    </div>
                    <h2><strong>Web</strong> Server #1</h2>
                </div>
                <!-- END Web Server Title -->

                <!-- Web Server Content -->
                <!-- Flot Charts (initialized in js/pages/index2.js), for more examples you can check out http://www.flotcharts.org/ -->
                <div id="dash-chart-live" class="chart"></div>
                <!-- END Web Server Content -->
            </div>
            <!-- END Web Server Block -->

            <!-- Mini Sales Charts Block -->
            <!-- Jquery Sparkline (initialized in js/pages/index2.js), for more examples you can check out http://omnipotent.net/jquery.sparkline/#s-about -->
            <div class="block full">
                <!-- Mini Sales Charts Title -->
                <div class="block-title">
                    <div class="block-options pull-right">
                        <div class="btn-group btn-group-sm">
                            <a href="javascript:void(0)" class="btn btn-alt btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                <li>
                                    <a href="javascript:void(0)"><i class="fa fa-check pull-right"></i> This Week</a>
                                    <a href="javascript:void(0)">This Month</a>
                                    <a href="javascript:void(0)">This Year</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <h2><strong>Sales</strong> This Week</h2>
                </div>
                <!-- END Mini Sales Charts Title -->

                <!-- Mini Sales Charts Content -->
                <div class="row text-center">
                    <div class="col-sm-4">
                        <span id="mini-sales1">2,5,6,7,10,16,18</span>
                        <h4>WP Theme</h4>
                    </div>
                    <div class="col-sm-4">
                        <span id="mini-sales2">5,6,8,3,11,15,35</span>
                        <h4>Web App</h4>
                    </div>
                    <div class="col-sm-4">
                        <span id="mini-sales3">7,8,9,8,8,10,12</span>
                        <h4>Icon Set</h4>
                    </div>
                </div>
                <!-- END Mini Sales Charts Content -->
            </div>
            <!-- END Mini Sales Charts Block -->

            <!-- Mini Earnings Charts Block -->
            <!-- Jquery Sparkline (initialized in js/pages/index2.js), for more examples you can check out http://omnipotent.net/jquery.sparkline/#s-about -->
            <div class="block full">
                <!-- Mini Earnings Charts Title -->
                <div class="block-title">
                    <div class="block-options pull-right">
                        <div class="btn-group btn-group-sm">
                            <a href="javascript:void(0)" class="btn btn-alt btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                <li>
                                    <a href="javascript:void(0)"><i class="fa fa-check pull-right"></i> This Week</a>
                                    <a href="javascript:void(0)">This Month</a>
                                    <a href="javascript:void(0)">This Year</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <h2><strong>Earnings</strong> This Week</h2>
                </div>
                <!-- END Mini Earnings Charts Title -->

                <!-- Mini Earnings Charts Content -->
                <div class="row text-center">
                    <div class="col-sm-4">
                        <span id="mini-earnings1">200,500,600,700,1000,1600,1800</span>
                        <h4>WP Theme</h4>
                    </div>
                    <div class="col-sm-4">
                        <span id="mini-earnings2">500,600,800,300,1100,1500,3500</span>
                        <h4>Web App</h4>
                    </div>
                    <div class="col-sm-4">
                        <span id="mini-earnings3">700,800,900,800,800,1000,1200</span>
                        <h4>Icon Set</h4>
                    </div>
                </div>
                <!-- END Mini Earnings Charts Content -->
            </div>
            <!-- END Mini Earnings Charts Block -->
        </div>
        <div class="col-md-6">
            <!-- Timeline Block -->
            <div class="block">
                <!-- Timeline Title -->
                <div class="block-title">
                    <div class="block-options pull-right">
                        <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
                    </div>
                    <h2><strong>Latest</strong> News</h2>
                </div>
                <!-- END Timeline Title -->

                <!-- Timeline Content -->
                <div class="block-content-full">
                    <div class="timeline">
                        <ul class="timeline-list">
                            <li class="active">
                                <div class="timeline-icon"><i class="gi gi-airplane"></i></div>
                                <div class="timeline-time"><small>just now</small></div>
                                <div class="timeline-content">
                                    <p class="push-bit"><a href="page_ready_user_profile.html"><strong>Jordan Carter</strong></a></p>
                                    <p class="push-bit">The trip was an amazing and a life changing experience!!</p>
                                    <p class="push-bit"><a href="page_ready_article.html" class="btn btn-xs btn-primary"><i class="fa fa-file"></i> Read the article</a></p>
                                    <div class="row push">
                                        <div class="col-sm-6 col-md-4">
                                            <a href="<?= base_url(); ?>assets/templates/proui/img/placeholders/photos/photo1.jpg" data-toggle="lightbox-image">
                                                <img src="<?= base_url(); ?>assets/templates/proui/img/placeholders/photos/photo1.jpg" alt="image">
                                            </a>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <a href="<?= base_url(); ?>assets/templates/proui/img/placeholders/photos/photo22.jpg" data-toggle="lightbox-image">
                                                <img src="<?= base_url(); ?>assets/templates/proui/img/placeholders/photos/photo22.jpg" alt="image">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="active">
                                <div class="timeline-icon"><i class="fa fa-file-text"></i></div>
                                <div class="timeline-time"><small>5 min ago</small></div>
                                <div class="timeline-content">
                                    <p class="push-bit"><a href="page_ready_user_profile.html"><strong>Administrator</strong></a></p>
                                    <strong>Free courses</strong> for all our customers at A1 Conference Room - 9:00 <strong>am</strong> tomorrow!
                                </div>
                            </li>
                            <li class="active">
                                <div class="timeline-icon"><i class="gi gi-drink"></i></div>
                                <div class="timeline-time"><small>3 hours ago</small></div>
                                <div class="timeline-content">
                                    <p class="push-bit"><a href="page_ready_user_profile.html"><strong>Ella Winter</strong></a></p>
                                    <p class="push-bit"><strong>Happy Hour!</strong> Free drinks at <a href="javascript:void(0)">Cafe-Bar</a> all day long!</p>
                                    <div id="gmap-timeline-dash2" class="gmap" style="height: 220px;"></div>
                                </div>
                            </li>
                            <li class="active">
                                <div class="timeline-icon"><i class="fa fa-cutlery"></i></div>
                                <div class="timeline-time"><small>yesterday</small></div>
                                <div class="timeline-content">
                                    <p class="push-bit"><a href="page_ready_user_profile.html"><strong>Patricia Woods</strong></a></p>
                                    <p class="push-bit">Today I had the lunch of my life! It was delicious!</p>
                                    <div class="row push">
                                        <div class="col-sm-6 col-md-4">
                                            <a href="<?= base_url(); ?>assets/templates/proui/img/placeholders/photos/photo23.jpg" data-toggle="lightbox-image">
                                                <img src="<?= base_url(); ?>assets/templates/proui/img/placeholders/photos/photo23.jpg" alt="image">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="text-center">
                                <a href="javascript:void(0)" class="btn btn-xs btn-default">View more..</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END Timeline Content -->
            </div>
            <!-- END Timeline Block -->
        </div>
    </div>
    <!-- END Dashboard 2 Content -->
</div>
<!-- END Page Content -->