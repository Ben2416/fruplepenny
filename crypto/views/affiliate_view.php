                
                <section class="wrapper hide" id="affiliate">
                    <div id="viewDownlines" class="modal fade in">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <!-- <a class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a> -->
                                    <h4 class="modal-title">Triple Penny Crypto</h4>
                                </div>
                                <div class="modal-body">
                                </div>
                                <div class="modal-footer">
                                    <div class="btn-group">
                                        <a class="btn btn-danger" data-dismiss="modal"><span class="fa fa-close"></span> Close</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="page-header"><i class="fa fa-sitemap"></i> Affiliate</h3>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-home"></i><a href="../">Home</a></li>
                                <li><i class="fa fa-user"></i>Affiliate</li>
                            </ol>
                        </div>
                    </div>

                    <div class="row" id="refer-someone">
                        <div class="col-sm-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <h3>Affiliate program</h3>
                                    <p>Want to earn some crypto? Give this URL to new investors and when they sign up you will earn a percentage of their deposits: </p>
                                    <br>
                                    <p><span class="phoenix-text">http://www.zillionpennycrypto.com/register.php?ref_id=<?php echo $_SESSION["email"]; ?></span></p>
                                    <br>
                                    <div class="clearBoth"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 col-xs-6">
                            <div class="info-box white-bg">
                                <div class="count">$0.00</div>
                                <div class="title">REWARDS EARNED <br>THIS WEEK</div>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <div class="info-box white-bg">
                                <div class="count">0</div>
                                <div class="title">REWARD POINTS</div>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <div class="info-box white-bg">
                                <div class="count">$0.00</div>
                                <div class="title">TOTAL EARNED <br>REWARDS</div>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <div class="info-box white-bg">
                                <div class="count">$0.00</div>
                                <div class="title">REWARDS BALANCE</div>
                            </div>
                        </div>
                    </div>

                     <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <form action="../xhr.php" method="post" id="refWithdrawal">
                                        <div class="col-md-12">
                                            <h4>Withdraw or Merge Reward with Investments</h4>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="amount" placeholder="Enter Amount">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select name="action" id="action" class="form-control">
                                                    <option value="merge">Merge with ongoing investment</option>
                                                    <option value="withdraw">Withdraw as payout</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <button class="btn btn-success" type="submit">Send</button>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="alert alert-info hide">Submitted for processing. You'll be contacted shortly.</div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <h3>Your affiliate downline</h3>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Level</th>
                                                    <th>Downlines</th>
                                                    <th>Active Downlines</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <h3>Transaction History</h3>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Amount($)</th>
                                                    <th>Date</th>
                                                    <th>Transaction Type</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody style="max-height:400px;">
                                                                                                    <tr><td colspan="5"><center>No Affiliate Transactions Yet</center></td></tr>
                                                                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
