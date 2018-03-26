var xss = document.getElementById("xss").innerHTML.trim();
var loader = '<img src="img/loader.gif" width="100px">';
var overlay = document.getElementById("loaderOverlay");
var globalRates = {};
var container = $("#container");
$(document).ready(function() {
    // mini routing
    link = window.location.href;
    if (link.split('#!/').length == 2) {
        destination = link.split('#!/')[1];
        $("#" + destination).siblings().addClass("hide");
        $("#" + destination).removeClass("hide");
        $("[data-menu='" + destination + "']").siblings().removeClass('active');
        $("[data-menu='" + destination + "']").addClass('active');
		if (destination == "logout") {
            window.location.href = 'dashboard.php/?logout';//'./logout';
        }
    }

    // loader. Place after mini routing
    $("#domLoader").toggle();
    $("#container").toggle();


    $("#sidebar").click(function(e) {
        e.preventDefault();
        e.target.parentElement.nodeName == "LI" ? menu = $(e.target).parent() : menu = $(e.target).parent().parent();
        $("#" + menu.attr("data-menu")).siblings().addClass("hide");
        $("#" + menu.attr("data-menu")).removeClass("hide");
        state = { addr: "#!/" + menu.attr("data-menu") };
        history.replaceState(state, "user account", "#!/" + menu.attr("data-menu"));
        menu.siblings().removeClass("active");
        menu.addClass("active");
        $(".report").html("");
        // report.html('');
        if (menu.attr("data-menu") == "logout") {
            window.location.href = 'dashboard.php/?logout';//'./logout';
        }
    });
    $("#myProfile, #myInbox, #myLogout").click(function(e) {
        window.location.reload("true");
    });

    // reports
    var report = $(".report");


    // Support form submittion
    supportForm = $("#supportForm");
    supportForm.submit(function(e) {
        e.preventDefault();
        form = new FormData(this);
        form.append('xss', xss);
        $.ajax({
            url: supportForm.attr("action"),
            data: form,
            type: "POST",
            contentType: false,
            processData: false,
            success: function(data) {
                data = JSON.parse(data);
                report.html('<div class="alert alert-info">' + data.res + '</div>');
                supportForm.trigger('reset');
                $("#refreshTickets").trigger('click');
            }
        });
    });

    // ticket fetch
    fetchTickets();
    $("#refreshTickets").click(function(e) {
        $("#refreshTickets").prop("disabled", true);
        $("#replyAlert").addClass("hide");
        fetchTickets();
    });

    // tickets operations
    $("#tickets").click(function(e) {
        clickTarget = e.target;
        if (clickTarget.nodeName == "SPAN") {
            // toggle action
            if ($(clickTarget).parent().parent().attr("class").trim() === "unread") {
                toggle = "read";
                $(clickTarget).parent().parent().prop("class", "");
                $(clickTarget).prop("class", "fa fa-circle-o");
            } else {
                toggle = "unread";
                $(clickTarget).parent().parent().prop("class", "unread");
                $(clickTarget).prop("class", "fa fa-circle");
            }

            data = { "xss": xss, "thread": $(clickTarget).parent().parent().attr("id").trim(), "toggle": toggle }
            $.post('../xhr.php', data, null);
        } else {
            // hide the tickets, show the loaded message, close button and loader then hide any alert if any
            $("#tickets").parent().toggle();
            $(".messages").toggle();
            $("#refreshTickets").addClass('hide');
            $("#closeThread").removeClass('hide');
            $(".messages").html('<center>' + loader + '</center>');
            $("#replyAlert").addClass("hide");


            // Mark it as read
            $(clickTarget).parent().prop("class", "");
            $(clickTarget).siblings().first().children().first().prop("class", "fa fa-circle-o");

            // open the message
            thread = $(clickTarget).parent().attr('id').trim();
            data = { "xss": xss, "thread": thread, "openMessage": true }
            $.post('../xhr.php', data, function(data) {
                conversation = '';
                data = JSON.parse(data);
                // title and category
                conversation = conversation + '<div class="messages-head dark-bg">' + data.title + ' (' + data.category + ')</div>';
                // newest message
                message = data.message;
                tree = JSON.parse(message);
                // No need to build thread if 1 
                if (Object.keys(tree).length == 1) {
                    tree[0].sender == "client" ? textColor = "text-info" : textColor = "text-success";
                    tree[0].sender == "client" ? display = "Me" : display = "Support";
                    conversation = conversation + `<ul class="newest"><li><span class="message-bar"><strong>Time:` + timeConverter(tree[0].time) + `</strong><p class="` + textColor + ` from"><i class="fa fa-circle"></i> From: ` + display + `</p></span>`;
                    conversation = conversation + `<span class="message-body">` + tree[0].message + `</span><hr></li></ul>`;
                    conversation = conversation + `<form action="../xhr.php" method="POST" id="replyTicketForm"><input type="hidden" name="replyTicket" value="true"><input type="hidden" name="thread" value="` + data.thread + `"><div class="form-group"><br><textarea placeholder="&lt; Click to reply &gt;" class="form-control" id="replyContent" name="message" rows="7" required></textarea></div><div class="form-group"><button type="button" class="btn btn-primary">Send</button></div></form>`;
                } else {
                    //build the newest and thread
                    newest = Object.keys(tree).length - 1;
                    tree[newest].sender == "client" ? textColor = "text-info" : textColor = "text-success";
                    tree[newest].sender == "client" ? display = "Me" : display = "Support";
                    conversation = conversation + `<ul class="newest"><li><span class="message-bar"><strong>Time:` + timeConverter(tree[newest].time) + `</strong><p class="` + textColor + ` from"><i class="fa fa-circle"></i> From: ` + display + `</p></span>`;
                    conversation = conversation + `<span class="message-body">` + tree[newest].message + `</span><hr></li></ul>`;
                    // build the thread
                    conversation = conversation + `<span><a href="#" id="revealThread">view full thread</a></span><ul id="thread" hidden>`;
                    while (newest > 0) {
                        newest = newest - 1;
                        tree[newest].sender == "client" ? textColor = "text-info" : textColor = "text-success";
                        tree[newest].sender == "client" ? display = "Me" : display = "Support";
                        conversation = conversation + `<li><span class="message-bar"><strong>Time:` + timeConverter(tree[newest].time) + `</strong><p class="` + textColor + ` from"><i class="fa fa-circle"></i> From: ` + display + `</p></span>`;
                        conversation = conversation + `<span class="message-body">` + tree[newest].message + `</span><hr></li>`;
                    }
                    conversation = conversation + `</ul>`;
                    conversation = conversation + `<form action="../xhr.php" method="POST" id="replyTicketForm"><input type="hidden" name="replyTicket" value="true"><input type="hidden" name="thread" value="` + data.thread + `"><div class="form-group"><br><textarea placeholder="&lt; Click to reply &gt;" class="form-control" id="replyContent" name="message" rows="7" required></textarea></div><div class="form-group"><button type="button" class="btn btn-primary">Send</button></div></form>`;
                }
                $(".messages").html(conversation);
                ticketCount();
            });
        }
    });

    // used to toggle threads and push replies
    $("#supportTicket").click(function(e) {
        e.preventDefault();
        if (e.target.id == "revealThread") {
            $("#thread").toggle();
        }
        if (e.target.nodeName == "BUTTON") {
            if ($("#replyContent").val() == '') {
                $("#replyAlert").removeClass("hide");
                $("#rAm").html('Enter a message to send.');
                return;
            }
            replyInit();
            $(e.target).prop("disabled", true);
            $("#replyTicketForm").trigger('submit');
            $(".messages").html('<center>' + loader + '</center>');
        }
    });

    $("#closeThread").click(function(e) {
        $("#tickets").parent().toggle();
        $(".messages").toggle();
        $("#refreshTickets").removeClass('hide');
        $("#closeThread").addClass('hide');
    });

    var paymentOptions = [{
            currency: "bitcoin",
            address: "16JL8g7QQthYorTCkjJNE7Yhm7M3DyVyNZ",
            qrcode: "../images/qrcodes/bitcoin.png"
        },
        {
            currency: "bitcoin cash",
            address: ""
        },
        {
            currency: "ethereum",
            address: "0x2CE68Ac93eE3741c0740C4F0412e2693A21b0bCB",
            qrcode: "../images/qrcodes/ethereum.png"
        },
        {
            currency: "ethereum classic",
            address: "0xED4a6a13C9d2b19C86298b59e476375117278424",
            qrcode: "../images/qrcodes/ethereum-classic.png"
        },
        {
            currency: "litecoin",
            address: "LLVhou9DvrfzZbq2X7QMQ8zPackFMPe2TQ",
            qrcode: "../images/qrcodes/litecoin.png"
        },
        {
            currency: "ripple",
            address: ""
        },
        {
            currency: "zcash",
            address: ""
        }
    ];

    var config = {
        "bitcoin": {
            "code": "BTC",
            "plain": {
                "rate": 30,
                "min": 5000,
                "max": 19999.99
            },
            "classic": {
                "rate": 40,
                "min": 20000,
                "max": 99999.99
            },
            "pro": {
                "rate": 55,
                "min": 100000,
                "max": 999999.99
            },
            "apex": {
                "rate": 70,
                "min": 1000000,
                "max": 10000000.99
            },
        },
        "bitcoin cash": {
            "code": "BCH",
            "ruby": {
                "rate": 20,
                "min": 2000,
                "max": 9999.99
            },
            "Emerald": {
                "rate": 30,
                "min": 10000,
                "max": 49999.99
            },
            "diamond": {
                "rate": 50,
                "min": 50000,
                "max": 200000.00
            }
        },
        "ethereum": {
            "code": "ETH",
            "bronze": {
                "rate": 20,
                "min": 3000,
                "max": 9999.99
            },
            "silver": {
                "rate": 30,
                "min": 10000,
                "max": 99999.99
            },
            "gold": {
                "rate": 50,
                "min": 100000,
                "max": 1000000.00
            }
        },
        "ethereum classic": {
            "code": "ETC",
            "flat": {
                "rate": 20,
                "min": 1000,
                "max": 4999.99
            },
            "mass": {
                "rate": 30,
                "min": 5000,
                "max": 9999.99
            },
            "elite": {
                "rate": 50,
                "min": 10000,
                "max": 100000
            }
        },
        "litecoin": {
            "code": "LTC",
            "basic": {
                "rate": 20,
                "min": 3000,
                "max": 9999.99
            },
            "standard": {
                "rate": 30,
                "min": 10000,
                "max": 49999.99
            },
            "premium": {
                "rate": 50,
                "min": 50000,
                "max": 500000.00
            }
        },
        "zcash": {
            "code": "ZEC",
            "premium": {
                "rate": 20,
                "min": 2000,
                "max": 25000.00
            }
        }
    };


    // exchangeRates
    $.get("https://api.coinmarketcap.com/v1/ticker/?limit=30", null, function(res) {
        res.forEach(function(xChange) {
            for (var key in config) {
                if (config.hasOwnProperty(key)) {
                    element = config[key];
                    if (element.code == xChange.symbol) {
                        globalRates[String(xChange.name).toLowerCase().replace(/[^a-z\.-]+/g, "")] = xChange.price_usd;
                        $("#xRates").append(`
                            <div class="col-md-2 col-sm-6 col-xs-6">
                                <div class="info-box white-bg" id="xRates">
                                    <div class="count">` + format(Number(unformat(xChange['price_usd'])), "$") + `</div>
                                    <div>(` + xChange['percent_change_24h'] + `%)</div>
                                    <div class="title">` + element.code + `/USD Exchange</div>
                                </div>
                            </div>
                        `);
                    }
                }
            }
        });
        // call the triple penny object here
        tripennyObj();
    });

    $("#contractAmount, #withdrawalAmount").keydown(function(e) {
        var allowedKeys = [48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 37, 39, 8, 9, 17, 18, 46, 190];
        var passed = false;
        allowedKeys.forEach(function(val) {
            if (val == e.which) {
                passed = true
            }
        });
        if (!passed) {
            e.preventDefault();
            return;
        }
    });

    $("#contractAmount").keyup(function(e) {
        // calculate the returns here
        var amount = $("#contractAmount").val();
        var selectedCoin = $("#contract").val();
        var selectecCoinConfig = config[selectedCoin];
        for (var key in selectecCoinConfig) {
            if (selectecCoinConfig.hasOwnProperty(key)) {
                var element = selectecCoinConfig[key];
                if (element.min <= amount && element.max >= amount) {
                    monthlyReturns = element.rate / 100 * amount;
                    $(".rateDisplay").html('plan: <span class="phoenix-text">' + selectedCoin + " " + key + '</span> | rate: <span class="phoenix-text">' + element.rate + '%</span> | roi: <span class="phoenix-text">' + format(monthlyReturns, "$") + '</span>');
                    $("#contractSpecs li:nth-child(1) span").html(format(Number(amount), "$"));
                    $("#contractSpecs li:nth-child(2) span").html(selectedCoin + " " + key);
                    $("#contractSpecs li:nth-child(3) span").html(format(monthlyReturns, "$"));
                    $("#contractSpecs li:nth-child(4) span").html("1 Year");
                    $("#contractSpecs li:nth-child(5) span").html($("#payWith").val());
                    return;
                } else {
                    $(".rateDisplay").html('');
                }
            }
        }
    });

    // just incase the payment method is changed
    $("#payWith").change(function(e) {
        $("#contractSpecs li:nth-child(5) span").html($("#payWith").val());
    });

    $("#contract").change(function(e) {
        $("#contractAmount").trigger("keyup");
    });

    $("#buyContractBtn").click(function(e) {
        e.preventDefault();
        var amount = $("#contractAmount").val();
        var selectedCoin = $("#contract").val();
        var selectecCoinConfig = config[selectedCoin];
        for (var key in selectecCoinConfig) {
            if (selectecCoinConfig.hasOwnProperty(key)) {
                // find a min that is bigger than the amount and permit the pop up
                if (selectecCoinConfig[key].min <= Number(amount)) {
                    $("#confirmPurchase").modal("show");
                    return;
                }
            }
        }

    });

    $("#confirmContract").click(function(e) {
        var report = $("#purchaseForm .report");
        var amount = $("#contractAmount").val();
        var payWith = $("#payWith").val();
        var selectedCoin = $("#contract").val();
        paymentOptions.forEach(function(option) {
            if (option.currency == payWith) {
                //if this is the right wallet, get the address
                $("#copyAddress .modal-body").html('<h2 style="color:green; font-weight:700;">Pay to complete</h2><h4>Send ' + format(Number(amount), "$") + ' to the following <strong>' + option.currency + '</strong> address to complete the contract purchase.</h4><span class="sendAddr">' + option.address + '</span><br><img src="'+option.qrcode+'" alt="walletqr" width="250" style="width:250px; display:block; margin-top: 20px;">');
                $("#confirmPurchase").modal("hide");
                //show the copyAddress
                $("#copyAddress").modal({ show: true, backdrop: false });
                // post the request here
                var form = new FormData();
                form.append("amount", amount);
                form.append("paywith", payWith);
                form.append("selectedCoin", selectedCoin);
                form.append('xss', xss);
                $.ajax({
                    url: "../xhr",
                    data: form,
                    type: "POST",
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $("#purchaseForm").trigger('reset');
                    }
                })
            }
        })
    });

    //end of contract purchase

    // withdraw
    $("#walletForm").submit(function(e) {
        var report = $("#walletForm .report");
        e.preventDefault();
        $('#withdrawForm button[type="submit"]').prop("disabled", true);
        $("#wLoading").show();
        form = new FormData(this);
        form.append('xss', xss);
        $.ajax({
            url: $(this).attr('action'),
            data: form,
            type: "POST",
            contentType: false,
            processData: false,
            success: function(data) {
                data = JSON.parse(data);
                $("#withdrawForm").trigger('reset');
                $("#wLoading").hide();
                $('#withdrawForm button[type="submit"]').prop("disabled", false);
                data.status ? report.html('<div class="alert alert-info">' + data.res + '</div>') : report.html('<div class="alert alert-success">' + data.res + '</div>');
            }
        });
    });

    // affiliate action
    $("#refWithdrawal").submit(function (e) {
        if($("#refWithdrawal input[name=amount]").val() == ""){
            return false;
        }
        e.preventDefault();
        form = new FormData(this);
        form.append('xss', xss);
        $("#refWithdrawal .alert").removeClass("hide");
        $("#refWithdrawal").trigger('reset');
        $.ajax({
            url: $(this).attr('action'),
            data: form,
            type: "POST",
            contentType: false,
            processData: false,
            success: function() {
                setTimeout(function () {
                    $('#refWithdrawal .alert').addClass("hide");
                }, 3000);
                // data.status ? report.html('<div class="alert alert-info">' + data.res + '</div>') : report.html('<div class="alert alert-success">' + data.res + '</div>');
            }
        });
    });

    // viewing downlines
    $(".view-downlines").click(function (e) {
        var downlines = JSON.parse($(this).parents("td").attr("data-refs"));
        var noOfDownlines = $(this).attr("data-value");
        var container = "<h3>"+noOfDownlines+" DOWNLINES</h3>";
        container += "<ul>";
        downlines.forEach(function (downline) {
            container+="<li style='line-height:25px; font-size: 18px;'>"+String(downline["first_name"]).toLocaleUpperCase()+" "+String(downline["last_name"].toLocaleUpperCase())+"</li>";
        });
        container+="</ul>";
        $("#viewDownlines .modal-body").html(container);
        $("#viewDownlines").modal("show");
    });

    $("#mpwBtn").click(function(e) {
        $("#changePasswordForm").show();
        $("#manageAccountForm").hide();
        report.html('');
    });

    $("#mppBtn").click(function(e) {
        $("#manageAccountForm").show();
        $("#changePasswordForm").hide();
        report.html('');
    });

    $("#manageAccountForm").submit(function(e) {
        $("#mpLoading").show();
        e.preventDefault();
        form = new FormData(this);
        form.append("xss", xss);
        $.ajax({
            url: $("#manageAccountForm").attr("action"),
            type: "POST",
            data: form,
            processData: false,
            contentType: false,
            success: function(data) {
                data = JSON.parse(data);
                data.status ? report.html('<div class="alert alert-info">' + data.res + '</div>') : report.html('<div class="alert alert-danger">' + data.res + '</div>');
                $("#mpLoading").hide();
                $("#saveProfile").prop("disabled", false);
            }
        })
    });

    $("#changePasswordForm").submit(function(e) {
        $("#cpLoading").show();
        e.preventDefault();
        form = new FormData(this);
        form.append("xss", xss);
        $.ajax({
            url: $("#changePasswordForm").attr("action"),
            type: "POST",
            data: form,
            processData: false,
            contentType: false,
            success: function(data) {
                data = JSON.parse(data);
                data.status ? report.html('<div class="alert alert-info">' + data.res + '</div>') : report.html('<div class="alert alert-danger">' + data.res + '</div>');
                $("#cpLoading").hide();
                $("#savePassword").prop("disabled", false);
            }
        })
    });

});


function fetchTickets() {
    $("#tickets tbody").html('<tr><td colspan="4"><center>' + loader + '</center></td></tr>');
    data = {
        "xss": xss,
        "fetchTickets": true
    }
    $.post('../xhr.php', data, function(data) {
        $("#tickets tbody").html(JSON.parse(data).res);
        $("#refreshTickets").prop("disabled", false);
    });
    ticketCount();
}

function timeConverter(UNIX_timestamp) {
    var a = new Date(UNIX_timestamp * 1000);
    var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    var year = a.getFullYear();
    var month = months[a.getMonth()];
    var date = a.getDate();
    var hour = String(a.getHours());
    hour.length == 1 ? hour = 0 + hour : null;
    var min = a.getMinutes();
    var sec = a.getSeconds();
    var time = month + ' ' + date + ', ' + hour + ':' + min + ':' + sec;
    return time;
}

function replyInit() {
    // replying ticket
    $("#replyTicketForm").submit(function(e) {
        e.preventDefault();
        form = new FormData(this);
        form.append('xss', xss);
        $.ajax({
            url: $("#replyTicketForm").attr("action"),
            data: form,
            type: "POST",
            contentType: false,
            processData: false,
            success: function(data) {
                data = JSON.parse(data);
                $("#replyAlert").removeClass("hide");
                $("#rAm").html(data.res);
                $("#closeThread").trigger('click');
            }
        });
    });

}

function format(n, currency) {
    return currency + "" + n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
}

function psuedo(n, suffix) {
    return n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,") + suffix;
}

function tripennyObj() {
    prefetch = { "xss": xss, "serverFetch": true };
    $.post("../xhr.php", prefetch, function(data) {
        tp = JSON.parse(data);

        curCodes = { bitcoin: "BTC", ethereum: "ETH", litecoin: "LTC", bitcoincash: "BCH", ethereumclassic: "ETC", zcash: "ZEC" };
        for (var prop in tp) {
            if (prop === 'bitcoin' || prop === 'ethereum' || prop === 'litecoin' || prop === 'bitcoincash' || prop === 'ethereumclassic' || prop === 'zcash') {
                if (Number(tp[prop]) > 0) {
                    $("#" + prop + " .coinTitle span").html(" (active contract)");
                    $("#" + prop + " .coinTitle span").addClass("active-contract");
                    $("#" + prop + " .count").html(format(tp[prop] * 1, "$"));
                    $("#" + prop + " .incoin").html(psuedo(Number(tp[prop]) / Number(globalRates[prop]), curCodes[prop]));
                } else {
                    $("#" + prop + " .coinTitle span").html(" (inactive contract)");
                    $("#" + prop + " .coinTitle span").addClass("inactive-contract");
                    $("#" + prop + " .count").html(format(tp[prop] * 1, "$"));
                }
                continue
            }
            $("#" + prop).html(tp[prop]);

            if (prop === 'totalBalance' && Number(unformat(tp[prop])) < 999) {
                $('#walletForm button[type="submit"]').prop("disabled", true);
                $('#walletForm button[type="submit"]').html("CANNOT WITHDRAW NOW");
                $('#walletForm button[type="submit"]').removeClass("btn-success");
                $('#walletForm button[type="submit"]').addClass("btn-danger");
            }
        }
    });
    ticketCount();
}

function unformat(currency) {
    return Number(currency.replace(/[^0-9\.-]+/g, ""));
}

function ticketCount() {
    fetch = { "xss": xss, "ticketCount": true };
    $.post("../xhr.php", fetch, function(data) {
        data = JSON.parse(data);
        $("#unreadInbox").html(data.unreadInbox);
    });
}