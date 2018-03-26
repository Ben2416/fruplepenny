<section class="wrapper hide" id="transactions">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="page-header"><i class="fa fa-btc"></i> Transactions</h3>
                        </div>
                    </div>
                    <!-- deposits -->
                    <div class="row">
                        <img src="../images/qrcodes/bitcoin.png" alt="walletqr" hidden>
                        <img src="../images/qrcodes/ethereum.png" alt="walletqr" hidden>
                        <img src="../images/qrcodes/ethereum-classic.png" alt="walletqr" hidden>
                        <img src="../images/qrcodes/litecoin.png" alt="walletqr" hidden>
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="panel">
                                    <div class="panel-body">
                                        <form class="form-horizontal" id="cryptoFormDiv">
                                            <h3>Buy A Contract</h3>
                                            <h3 class="rateDisplay"></h3>
                                            <div class="report"></div>
                                            <br>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label for="contractAmount">Contract Amount</label>
                                                    <input class="form-control input-lg m-bot15" type="text" placeholder="Amount ($)" id="contractAmount" required>
                                                    <label for="duration">Contract Period</label>
                                                    <select class="form-control input-lg m-bot15" id="duration" required>
                                                        <option value="360">1 Year</option>
                                                    </select>
                                                    <label for="contract">Currency</label>
                                                    <select class="form-control input-lg m-bot15" id="contract" required>
                                                        <option value="bitcoin">Bitcoin</option>
                                                        <option value="litecoin">Litecoin</option>
                                                        <option value="ethereum">Ethereum</option>
                                                        <option value="zcash">Zcash</option>
                                                        <option value="bitcoin cash">Bitcoin Cash</option>
                                                        <option value="ripple">Ripple</option>
                                                        <option value="ethereum classic">Ethereum Classic</option>
                                                    </select>
                                                    <label for="payWith">Pay With</label>
                                                    <select class="form-control input-lg m-bot15" id="payWith" required>
                                                        <option value="bitcoin">Bitcoin</option>
                                                        <option value="litecoin">Litecoin</option>
                                                        <option value="ethereum">Ethereum</option>
                                                        <option value="ethereum classic">Ethereum Classic</option>
                                                    </select>
                                                    <button class="btn btn-success btn-lg" type="button" id="buyContractBtn" title="Invest now">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                            <div id="confirmPurchase" class="modal fade in">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <!-- <a class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a> -->
                                                            <h4 class="modal-title">Triple Penny Crypto</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h2 style="color:green; font-weight:700;">COMFIRM PURCHASE</h2>
                                                            <h3>Contract Details</h3>
                                                            <ul id="contractSpecs">
                                                                <li>Principal: <span></span></li>
                                                                <li>Plan: <span></span></li>
                                                                <li>Monthly Returns: <span></span></li>
                                                                <li>Contract Period: <span></span></li>
                                                                <li>Payment Method: <span></span></li>
                                                            </ul>
                                                            <p style="line-height:40px; font-size: 18pt;">
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="btn-group">
                                                                <a class="btn btn-danger" data-dismiss="modal"><span class="fa fa-close"></span> Close</a>
                                                                <a href="#" id="confirmContract" class="btn btn-success"><span class="fa fa-check"></span> Confirm</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="copyAddress" class="modal fade in">
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
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="panel panel-dark scroll-panel fixed-480">
                                    <header class="panel-heading">
                                        All Contracts
                                    </header>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Date</th>
                                                <th>Principal</th>
                                                <th>Period</th>
                                                <th>Currency</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="activeContract">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- withdrawals -->
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="panel">
                                    <div class="panel-body">
                                        <form method="POST" action="../xhr.php" class="form-horizontal " id="walletForm">
                                            <h3>Withdraw From Account</h3>
                                            <br>
                                            <div class="report"></div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label for="contract">Amount</label>
                                                    <input class="form-control input-lg m-bot15" type="text" placeholder="Amount ($)" name="withdrawalAmount" id="withdrawalAmount">
                                                    <label for="withdraw">Withdraw Currency</label>
                                                    <select class="form-control input-lg m-bot15" id="withdraw" name="withdrawalPaymentOption" required>
                                                        <option value="bitcoin">Bitcoin</option>
                                                        <option value="litecoin">Litecoin</option>
                                                        <option value="ethereum">Ethereum</option>
                                                        <option value="zcash">Zcash</option>
                                                        <option value="bitcoin cash">Bitcoin Cash</option>
                                                        <option value="ripple">Ripple</option>
                                                        <option value="ethereum classic">Ethereum Classic</option>
                                                    </select>
                                                    <button class="btn btn-success btn-lg" type="submit" title="Withdraw">Withdraw from balance</button>
                                                    <img src="img/loader.gif" alt="loading" width="50px" id="wLoading" hidden>
                                                </div>
                                            </div>
                                            <input type="hidden" name="withdrawFunds" value="true">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="panel panel-dark scroll-panel fixed-480">
                                    <header class="panel-heading">
                                        Withdrawal History
                                    </header>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Date</th>
                                                <th>Amount</th>
                                                <th>Payment Method</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="withdrawalHistory">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>