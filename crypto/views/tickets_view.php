
                <section class="wrapper hide" id="messageTickets">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="page-header"><i class="fa fa-user"></i> Account</h3>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-home"></i><a href="../">Home</a></li>
                                <li><i class="fa fa-user"></i>Support Ticket</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 portlets">
                            <div class="panel panel-dark">
                                <div class="panel-heading">
                                    <div class="pull-left">New Support Ticket</div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="panel-body">
                                    <div class="padd">
                                        <div class="form quick-post">
                                            <!-- Edit profile form (not working)-->
                                            <form class="form-horizontal" action="../xhr.php" method="POST" id="supportForm">
                                                <div class="report col-lg-offset-2">
                                                </div>
                                                <!-- Title -->
                                                <div class="form-group">
                                                    <label class="control-label col-lg-2" for="title">Title</label>
                                                    <div class="col-lg-10">
                                                        <input type="text" class="form-control" id="title" name="title" required>
                                                    </div>
                                                </div>
                                                <!-- Cateogry -->
                                                <div class="form-group">
                                                    <label class="control-label col-lg-2" for="category">Category</label>
                                                    <div class="col-lg-10">
                                                        <select class="form-control" id="category" name="category" required>
                                                            <option value="" selected disabled>- Choose Category -</option>
                                                            <option value="cypto">Cryptocurrency</option>
                                                            <option value="S&amp;F">Stocks &amp; Forex</option>
                                                            <option value="Binary Options">Binary Options Trading</option>
                                                            <option value="Retirement">Retirement</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- Content -->
                                                <div class="form-group">
                                                    <label class="control-label col-lg-2" for="content">Message</label>
                                                    <div class="col-lg-10">
                                                        <textarea class="form-control" id="content" name="message" rows="10" required></textarea>
                                                    </div>
                                                </div>
                                                <!-- Buttons -->
                                                <div class="form-group">
                                                    <!-- Buttons -->
                                                    <div class="col-lg-offset-2 col-lg-9">
                                                        <button type="submit" class="btn btn-primary">Send</button>
                                                        <button type="button" class="btn btn-default">Reset</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- Open a new ticket -->

                        <div class="col-md-6 portlets">
                            <div class="panel panel-dark">
                                <div class="panel-heading">
                                    <div class="pull-left">Support Tickets </div>
                                    <div class="pull-right"><button type="button" class="btn btn-refresh" id="refreshTickets"><span class="fa fa-refresh"></span></button><button type="button" class="btn btn-refresh hide" id="closeThread"><span class="fa fa-close"></span></button></div>
                                    <div class="clearfix"></div>
                                    <div class="div"></div>
                                    <div class="alert alert-info alert-dismissible hide" role="alert" id="replyAlert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <span id="rAm"></span>
                                    </div>
                                </div>
                                <div class="panel-body scroll-panel" id="supportTicket">
                                    <div class="padd">
                                        <div class="table-responsive">
                                            <table class="table table-hover" id="tickets">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Date</th>
                                                        <th>Title</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="messages" hidden>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Tickets -->

                    </div>
                </section>
                
