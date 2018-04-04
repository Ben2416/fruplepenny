$(document).ready(function() {
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

    $("#invAmount").keydown(function(e) {
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

    $("#invAmount").keyup(function(e) {
        // calculate the returns here
        var amount = $("#invAmount").val();
        var selectedCoin = $("#coin").val();
        var selectecCoinConfig = config[selectedCoin];
        for (var key in selectecCoinConfig) {
            if (selectecCoinConfig.hasOwnProperty(key)) {
                var element = selectecCoinConfig[key];
                if (element.min <= amount && element.max >= amount) {
                    $("#planName").html(selectedCoin + " " + key);
                    $("#monthlyRoi").html(formatCurrency(element.rate / 100 * amount, "$"));
                    $("#currencyCode").html(selectecCoinConfig["code"]);
                }
            }
        }
    });

    $("#coin").change(function(e) {
        $("#invAmount").trigger("keyup");
    });
    // form validator
    if($.validate){
	    $.validate({
	        forms: "#registerForm, #loginForm, #resetForm, #setForm, #contactus"
	    });
	}
	
    // to steamline maintenance
    if ($("#invAmount").val() !== undefined) $("#invAmount").trigger("keyup");

    // contacts us submission
    $("#contactus").submit(function(e) {
        e.preventDefault();
        var form = new FormData(this);
        $("#contactus button").addClass("disabled");
        $.ajax({
            url: $("#contactus").attr("action"),
            data: form,
            method: "POST",
            processData: false,
            contentType: false,
            success: function(res) {
                res = JSON.parse(res);
                $("#contactus button").addClass("disabled");
                $(".contactRes").removeClass("hide");
                $(".contactRes").html(res.res);
                $("#contactus button").removeClass("disabled");
                $("#contactus").trigger("reset");
            }
        });
    });

    // newsletter
    $("#newsLetter").submit(function(e) {
        e.preventDefault();
        $("#newsLetterBtn").removeClass("hide");
        var form = new FormData(this);
        $.ajax({
            url: $(this).attr("action"),
            method: "POST",
            data: form,
            processData: false,
            contentType: false,
            success: function() {
                $("#newsLetterBtn").addClass("hide");
                $("#nMsg").removeClass("hide");
                $("#newsLetter").trigger("reset");
            }
        })
    });
    
    // crypto charts
    var portfolio = ["BTC", "BCH", "ETH", "LTC", "ETC", "ZEC"];
    $.get("https://api.coinmarketcap.com/v1/ticker/?limit=30", null, function(res) {
        // var imgs = { "BTC": "1.png", "ETH": "2.png", "LTC": "8.png", "XRP": "4.png" };
        // <img src="images/coins/` + imgs[element] + `" class="currency-icon" alt="">
        res.forEach(function(xChange) {
            portfolio.forEach(element => {
                if (element == xChange.symbol) {
                    xChange['percent_change_24h'] < 0 ? color = "text-danger" : color = "text-success";
                    $("#cryptos").append(
                        `<tr><td>` + xChange.name + '</td>' +
                        `<td>` + formatCurrency(Number(xChange['price_usd']), '$') + `</td>` +
                        `<td class=` + color + `>` + formatCurrencyCode(Number(xChange['percent_change_24h']), '%', 2) + `</td>` +
                        `<td>` + formatCurrency(Number(xChange['24h_volume_usd']), '$') + `</td>` +
                        `<td>` + formatCurrencyCode(Number(xChange['total_supply']), element) + `</td></tr>`
                    );
                }
            });
        });
    });

});

function formatCurrency(n, currency) {
    return currency + "" + n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
}

function formatCurrencyCode(n, code, size = 4) {
    return n.toFixed(size).replace(/(\d)(?=(\d{3})+\.)/g, "$1,") + code;
}

function unformatCurrency(amount) {
    return Number(amount.replace(/[^0-9\.-]+/g, ""));
}