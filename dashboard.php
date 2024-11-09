<?php
include('header.php');
checkUser();  // function called
userArea();
?>
<script>
    document.title="Dashboard";
    document.getElementById("dashboard_link").classList.add('active');
</script>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <!-- Overview Boxes Row -->
            <div class="row m-t-25">
                <!-- Today's Expense -->
                <div class="col-6 col-md-4 col-lg-3 mb-3">
                    <div class="overview-item overview-item--c1" style="background-color: #4CAF50;">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="zmdi zmdi-money"></i>
                                </div>
                                <div class="text">
                                    <h2><?php echo getDasboardDetails('today')?></h2>
                                    <span>Today's Expense</span>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Yesterday's Expense -->
                <div class="col-6 col-md-4 col-lg-3 mb-3">
                    <div class="overview-item overview-item--c2" style="background-color: #FF5722;">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="zmdi zmdi-time-restore"></i>
                                </div>
                                <div class="text">
                                    <h2><?php echo getDasboardDetails('yesterday'); ?></h2>
                                    <span>Yesterday's Expense</span>
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- This Week's Expense -->
                <div class="col-6 col-md-4 col-lg-3 mb-3">
                    <div class="overview-item overview-item--c3" style="background-color: #03A9F4;">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="zmdi zmdi-calendar-check"></i>
                                </div>
                                <div class="text">
                                    <h2><?php echo getDasboardDetails('week'); ?></h2>
                                    <span>This Week's Expense</span>
                                    <?php
                                    $startOfWeek = date('Y-m-d', strtotime('monday this week'));
                                    $endOfWeek = date('Y-m-d', strtotime('sunday this week'));
                                    ?>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- This Month's Expense -->
                <div class="col-6 col-md-4 col-lg-3 mb-3">
                    <div class="overview-item overview-item--c4" style="background-color: #FF9800;">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="zmdi zmdi-calendar-note"></i>
                                </div>
                                <div class="text">
                                    <h2><?php echo getDasboardDetails('month'); ?></h2>
                                    <span>This Month's Expense</span>
                                    <?php
                                    $startOfMonth = date('Y-m-01');
                                    $endOfMonth = date('Y-m-t');
                                    ?>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- This Year's Expense -->
                <div class="col-6 col-md-4 col-lg-3 mb-3">
                    <div class="overview-item overview-item--c5" style="background-color: #9C27B0;">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="zmdi zmdi-calendar-alt"></i>
                                </div>
                                <div class="text">
                                    <h2><?php echo getDasboardDetails('year'); ?></h2>
                                    <span>This Year's Expense</span>
                                    <?php
                                    $startOfYear = date('Y-01-01');
                                    $endOfYear = date('Y-12-31');
                                    ?>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Expense -->
                <div class="col-6 col-md-4 col-lg-3 mb-3">
                    <div class="overview-item overview-item--c6" style="background-color: #607D8B;">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="zmdi zmdi-money-box"></i>
                                </div>
                                <div class="text">
                                    <h2><?php echo getDasboardDetails('total'); ?></h2>
                                    <span>Total Expense</span>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Overview Boxes Row -->

        </div>
    </div>
</div>
<?php
include('footer.php');
?>
