HASALE.filter('num_to_words', function () {
    function isInteger(x) {
        return x % 1 === 0;
    }


    return function (value) {
        if (value && isInteger(value))
            return  toWords(value) + " only";
        return value;
    };
});


angular.module('HASALE').directive('ngEnter', function () {
    return function (scope, element, attrs) {
        element.bind("keydown keypress", function (event) {
            if (event.which === 13) {
                scope.$apply(function () {
                    scope.$eval(attrs.ngEnter, {'event': event});
                });

                event.preventDefault();
            }
        });
    };
});


var th = ['', 'thousand', 'million', 'billion', 'trillion'];
var dg = ['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];
var tn = ['ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'];
var tw = ['twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];
function toWords(s)
{
    s = s.toString();
    s = s.replace(/[\, ]/g, '');
    if (s != parseFloat(s))
        return 'not a number';
    var x = s.indexOf('.');
    if (x == -1)
        x = s.length;
    if (x > 15)
        return 'too big';
    var n = s.split('');
    var str = '';
    var sk = 0;
    for (var i = 0; i < x; i++)
    {
        if ((x - i) % 3 == 2)
        {
            if (n[i] == '1')
            {
                str += tn[Number(n[i + 1])] + ' ';
                i++;
                sk = 1;
            }
            else if (n[i] != 0)
            {
                str += tw[n[i] - 2] + ' ';
                sk = 1;
            }
        }
        else if (n[i] != 0)
        {
            str += dg[n[i]] + ' ';
            if ((x - i) % 3 == 0)
                str += 'hundred ';
            sk = 1;
        }


        if ((x - i) % 3 == 1)
        {
            if (sk)
                str += th[(x - i - 1) / 3] + ' ';
            sk = 0;
        }
    }
    if (x != s.length)
    {
        var y = s.length;
        str += 'point ';
        for (var i = x + 1; i < y; i++)
            str += dg[n[i]] + ' ';
    }
    return str.replace(/\s+/g, ' ');
}



HASALE.controller('POS_Controller', function ($scope, $http, $timeout) {
    $scope.ear = {right_ear: false, left_ear: false};
    $scope.invoice_data = {
        'invoice_date': invoice_date,
        'patient': {'name': '', 'contact_no': '', 'address': '', 'id': ''},
        'receipt_no': receipt_no,
        'refdoctor_id': '',
        'payable_amount': 0,
        'total_amount': 0,
        'payment': {
            'payment_date': invoice_date,
            'paid_amount': 0,
            'balance_amount': 0,
            'payment_mode': 'Cash',
            'payment_detail': '',
            'next_visit_date': invoice_date,
            'remark': ''},
        'right_ear': {},
        'left_ear': {},
        'accessories':[]
    };
    $scope.hearing_aid = [];
    $scope.selectedAid = {};
    $scope.earSelect = "";
    $scope.selectedEar = function (ear) {
        $scope.earSelect = ear;
    }

    $scope.set_payment = function () {
        $scope.invoice_data.total_amount = Number($scope.invoice_data.left_ear.amount_payable | 0) + Number($scope.invoice_data.right_ear.amount_payable | 0);
        $scope.invoice_data.payable_amount = angular.copy($scope.invoice_data.total_amount);
        $scope.invoice_data.payment.balance_amount = angular.copy($scope.invoice_data.payable_amount) - $scope.invoice_data.payment.paid_amount;
    }

    $scope.applyDiscount = function (earobject) {

        earobject.discount_percent_amount = ((earobject.mrp * earobject.discount_percent) / 100);

        earobject.amount_payable = earobject.mrp - ((earobject.mrp * earobject.discount_percent) / 100);
        $scope.set_payment();
    }

    $scope.applyDiscountAmt = function (earobject) {
//        earobject.discount_percent_amount = ((earobject.mrp*earobject.discount_percent)/100);

        earobject.amount_payable = earobject.mrp - earobject.discount_percent_amount;
        $scope.set_payment();
    }

    $scope.submitInvoiceData = function () {

        $scope.invoice_data['invoice_html'] = document.getElementById("printDiv").innerHTML;
        loading_show("Saving Data");
        $http.post(submit_url, $scope.invoice_data).then(function (rdata) {
            loading_hide();

            window.location.pathname = invoice_detail_path + "/" + rdata.data.invoice_id
//            $http.get(invoice_list_invoice_print + ).then(function (rdata) {
//                $scope.invoice_data_print = rdata.data;
//            })
//            $("#print_invoice").show().attr("disabled", false);
        })
    }

    //search using serial no (Barcode)
    $scope.searchHearingAid = function (earobject, eartype) {
        console.log(earobject)
        $http.post(searchSerialNoUrl, {'serial_no': earobject.serial_no}).then(function (res) {
            if (eartype == 'right') {
                $scope.invoice_data.right_ear = res.data;
            }
            if (eartype == 'left') {
                $scope.invoice_data.left_ear = res.data;
            }
            
            if(eartype == 'accessories'){
                $scope.invoice_data.accessories.push(res.data);
            }

            $scope.set_payment();
        })
    }



    //hearing aid api call
    $http.post(hrurl).then(function (rdata) {
        $scope.hearing_aid = rdata.data;
        $timeout(function () {
            $(".dataTable_hearing_aid").DataTable();
            adjustDataTable();
        }, 1000);
    });

    $scope.selectAid = function (aidobj) {
        if ($scope.earSelect == 'Right') {

            $scope.invoice_data.right_ear = angular.copy(aidobj);
        }
        if ($scope.earSelect == 'Left') {
            $scope.invoice_data.left_ear = angular.copy(aidobj);
            ;
        }
        $("#hearing_aid_modal").modal("hide");
        $scope.set_payment();
    }


    $scope.cancelAid = function (aidobj) {
        if (aidobj == 'Right') {
            $scope.invoice_data.right_ear = {};
        }
        if (aidobj == 'Left') {
            $scope.invoice_data.left_ear = {};
        }
        $scope.set_payment();
    }



    //hearing aid api call
    $http.post(ptnurl).then(function (rdata) {
        $scope.patient_list = rdata.data;

        $timeout(function () {
            $(".dataTable_patient").DataTable();
            adjustDataTable();
        }, 1000);
    });
    $scope.selectPatient = function (ptnobj) {
        $scope.selectedPatient = ptnobj;
        $scope.invoice_data.patient = ptnobj;
        $("#patient_modal").modal("hide");
    }



//calculate balance
    $scope.calculate_balance = function () {
        $scope.invoice_data.payment.balance_amount = ($scope.invoice_data.payable_amount) - ($scope.invoice_data.payment.paid_amount);
    }

//Ref Doctor Calling
    $scope.reference_doc = [];
    $scope.selectedRefDoc = {};
    $scope.selectRefDr = function (drobj) {
        $scope.selectedRefDoc = drobj;
        $scope.selectedRefDoc['drname'] = "Dr. " + drobj.name + " (" + drobj.specialist + ")";
        $scope.invoice_data.refdoctor_id = drobj.id;
        $("#ref_doc_modal").modal("hide");
    }
    $http.post(drurl).then(function (rdata) {
        $scope.reference_doc = rdata.data;
        $timeout(function () {
            $(".dataTable_doctor_ref").DataTable();
            adjustDataTable();
        }, 1000);
    });
})


HASALE.controller('InvoiceList_Controller', function ($scope, $http, $timeout) {
    $scope.daterange = {'daterange': incoice_list_daterange};
    console.log($scope.daterange);
    $scope.invoice_list = [];
    $http.post(invoice_list_url, $scope.daterange).then(function (invlist) {
        $scope.invoice_list = invlist.data;
        $timeout(function () {

            $(".dataTable_invoice_list").DataTable();
            adjustDataTable();
        }, 1000);
    });
    $scope.printInvoice = function (invoice_id) {
        $("#invoice_print_model").modal({
            "show": true,
            "backdrop": true
        });
        $http.get(invoice_list_invoice_print + "/" + invoice_id).then(function (rdata) {
            $scope.invoice_data_print = rdata.data;
        })
    }

})




function getFormattedDate(date) {
    var year = date.getFullYear();
    var month = (1 + date.getMonth()).toString();
    month = month.length > 1 ? month : '0' + month;
    var day = date.getDate().toString();
    day = day.length > 1 ? day : '0' + day;
    return year + '-' + month + '-' + day;
}


HASALE.directive("datepicker", function () {
    return {
        restrict: "A",
        require: "ngModel",
        link: function (scope, elem, attrs, ngModelCtrl) {
            var updateModel = function (dateTextR) {
                scope.$apply(function () {
//                    console.log(elem, attrs, ngModelCtrl);
                    ngModelCtrl.$setViewValue(getFormattedDate(dateTextR));
                });
            };
            var options = {
                format: "yyyy-mm-dd",
                autoclose: true,
            };
            $(elem).datepicker(options).on('changeDate', function (dateText) {
                updateModel(dateText.date);
            });
        }
    }
});
HASALE.controller('Dashboard_controller', function ($scope, $http, $timeout) {


    $scope.daterange = {'limit': 10};
    console.log($scope.daterange);
    $scope.invoice_list_front = [];
    $http.post(invoice_list_url, $scope.daterange).then(function (invlist) {
        $scope.invoice_list_front = invlist.data;

    });


    //Customer name search
    var searchobj = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('receipt_no'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: searchurl,
    });
    $scope.invoice_list = [];
    searchobj.initialize(); // customer name search init
    $scope.loading_text = "";
    //// Search Customer type ahead //////////////////////////////////////////////////
    $('#search_box').typeahead({
        highlight: true,
        onselect: function (obj) {
            console.log(obj);
        },
    },
            {
                name: 'searchobj',
                displayKey: 'receipt_no',
                source: searchobj.ttAdapter(),
                templates: {
                    header: '',
                    empty: [
                        '<div class="empty-message">',
                        '<h5 style="margin-left:10px"> No Match Found In Database.</h5>',
                        '</div>'
                    ].join('\n'),
                    suggestion: Handlebars.compile('<div><strong>{{name}}</strong> | Rec.:{{receipt_no}} |  Inv.:{{invoice_number}} </div>')
                },
            })
            .bind('typeahead:selected', function (obj, datum) {
                $scope.loading_text = "Loading..."
                $http.post(invoice_list_url, datum).then(function (rdata) {
                    $scope.invoice_list = rdata.data.data;
                    $scope.invoice_data = angular.copy($scope.invoice_list[0]);
                    console.log($scope.invoice_data);
                }, function () {
                    $scope.loading_text = "Error: 404, System error check your connection."
                })

            });
    /////////////////////////////////////////////////////////////////////////////

})

HASALE.controller('Invoice_detail_controller', function ($scope, $http, $timeout) {
    loading_show();

    $scope.getInvoiceData = function (invoice_id) {

        $http.post(invoiceurl, {invoice_id: invoice_id}).then(function (rdata) {
            $scope.invoice_list = rdata.data.data;
            $scope.invoice_data = angular.copy($scope.invoice_list[0]);

            $scope.payment_dict = {balance_amount: 0,
                invoice_id: invoice_id,
                next_visit_date: payment_date,
                paid_amount: $scope.invoice_data.payments.total_balance,
                payment_date: payment_date,
                payment_detail: "",
                payment_mode: "Cash",
                remark: "",
            };
            loading_hide();

        }, function () {
            loading_hide();
            $scope.loading_text = "Error: 404, System error check your connection."
        });
    }
    $scope.getInvoiceData(invoice_id);


    $scope.barcodeSerial = function () {
        for (i in $scope.hearing_aid_stock) {
            var stockobj = $scope.hearing_aid_stock[i];
            if (stockobj.serial_no == $scope.search_serial) {
                $scope.selectSerialNo(angular.copy(stockobj));
            }
        }
    }



//   edit payment

    $scope.selectPaymentEdit = function (payobj) {
        $scope.payment_selected = payobj;
        $("#payment_edit_model").modal("show")
    }

    $scope.editPyament = function () {
        $http.post(payment_edit_api, $scope.payment_selected).then(function () {
            $scope.getInvoiceData(invoice_id);
            window.location.reload();
        })
    }


//end of edit payment




    $scope.selectSerialNo = function (serial_no_obj) {
        $scope.selectedAid['serial_no'] = serial_no_obj.serial_no;
        $scope.selectedAid['stock_id'] = serial_no_obj.id;
        console.log(exp_date)
        $scope.selectedAid.warranty_exp_date = angular.copy(exp_date);
        $("#stock_modal").modal("hide")
    }


    //get stock detail
    $scope.stock_loading = 0;
    $scope.getStock = function (hearing_aid) {
        $scope.stock_loading = 1;
        $scope.selectedAid = hearing_aid;
        $scope.hearing_aid_stock = [];
        var hearing_aid = {'id': hearing_aid.hearing_aid_id};
        $http.post(hearing_aid_stock_api, hearing_aid).then(function (res) {
            $scope.hearing_aid_stock = res.data;
            if (res.data.length) {
                $scope.stock_loading = 0;
            }
            else {
                $scope.stock_loading = 2;
            }
        })
    }
    //



    //calculate balance
    $scope.calculate_balance = function () {
        $scope.payment_dict.balance_amount = ($scope.invoice_data.payments.total_balance) - ($scope.payment_dict.paid_amount);
    }

    $scope.submitPayment = function () {
        disable_all_input();
        loading_show("Saving Data");
        $http.post(payment_url, $scope.payment_dict).then(function () {

            //loading_hide();

        });

        $http.post(update_haid_url, $scope.invoice_data).then(function () {
            console.log("asdf asdfsdaf");
            window.location.reload();
        })

        if ($scope.check_delivery) {
            console.log($scope.invoice_data.hearing_aid)

        }
    }


    $scope.printInvoice = function (invoice_id) {
        $("#invoice_print_model").modal({
            "show": true,
            "backdrop": true
        });
        $http.get(invoice_list_invoice_print + "/" + invoice_id).then(function (rdata) {
            $scope.invoice_data_print = rdata.data;
            $timeout(function () {
                $("#" + $scope.invoice_data_print.receipt_no).JsBarcode($scope.invoice_data_print.receipt_no, {
//                 width:4,
                    height: 20,
                });
            }, 1000)

        })
    }



    //Customer name search
    var searchobj = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('receipt_no'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: searchurl,
    });
    $scope.invoice_list = [];
    searchobj.initialize(); // customer name search init
    $scope.loading_text = "";
    //// Search Customer type ahead //////////////////////////////////////////////////
    $('#search_box').typeahead({
        highlight: true,
        onselect: function (obj) {
            console.log(obj);
        },
    },
            {
                name: 'searchobj',
                displayKey: 'receipt_no',
                source: searchobj.ttAdapter(),
                templates: {
                    header: '',
                    empty: [
                        '<div class="empty-message">',
                        'unable to find any Best Picture winners that match the current query',
                        '</div>'
                    ].join('\n'),
                    suggestion: Handlebars.compile('<div><strong>{{name}}</strong> | Rec.:{{receipt_no}} |  Inv.:{{invoice_number}} </div>')
                },
            })
            .bind('typeahead:selected', function (obj, datum) {
                $scope.loading_text = "Loading..."
                $http.post(invoiceurl, datum).then(function (rdata) {
                    $scope.invoice_list = rdata.data;
                    $scope.invoice_data = angular.copy($scope.invoice_list[0]);
                    console.log($scope.invoice_data);
                }, function () {
                    $scope.loading_text = "Error: 404, System error check your connection."
                })

            });
    /////////////////////////////////////////////////////////////////////////////

})



HASALE.controller('Haid_doct_allData', function ($scope, $http, $timeout) {

//   all_datas_url

    $http.post(all_datas_url).then(function (response) {
        $scope.all_data = response.data;

        $timeout(function () {

            $(".finalData").DataTable();
            adjustDataTable();
        }, 1000)
    })


})
HASALE.controller('Haid_paymentData', function ($scope, $http, $timeout) {


    $http.post(payment_url).then(function (response) {
        $scope.all_datas = response.data;

        $timeout(function () {

            $(".finalpaymentData").DataTable();
            adjustDataTable();
        }, 1000)
    })


})
HASALE.controller('Haid_report', function ($scope, $http, $timeout) {


    $http.post(final_data).then(function (response) {
        $scope.final_datas = response.data.data;
        $scope.mrp = response.data.total.sum_mrp;
        $scope.deler = response.data.total.sum_deler;

        console.log($scope.mrp)
        $timeout(function () {

            $(".finalaidData").DataTable();
            adjustDataTable();
        }, 1000)
    })
})



HASALE.directive("barcode", function () {
    return {
        restrict: "A",
        require: "ngModel",
        link: function (scope, elem, attrs, ngModelCtrl) {
            var updateModel = function (dateTextR) {
                scope.$apply(function () {
//                    console.log(elem, attrs, ngModelCtrl);
                    ngModelCtrl.$setViewValue(getFormattedDate(dateTextR));
                });
            };

            console.log(scope.sn.serial_no);
            var barcode = scope.sn.serial_no;
            $(elem).JsBarcode(barcode, {
//                 width:4,
                height: 40,
            });

        }
    }
});





HASALE.controller('StockContoller', function ($scope, $http, $timeout) {
    //hearing aid api call
    $scope.selectedAid = {};
    $scope.heading_stock = {'inward_date': inward_date, 'serial_no': ''};
    $http.post(hrurl).then(function (rdata) {
        $scope.hearing_aid = rdata.data;
        $timeout(function () {
            $(".dataTable_hearing_aid").DataTable();
            adjustDataTable();
        }, 1000);
    });

    $scope.statusdict = {'status': 'Add Stock', 'disabled': false};
    $scope.submitStockData = function () {
        $scope.statusdict = {'status': 'Saving...', 'disabled': true};
        $http.post(stock_url, $scope.heading_stock).then(function (rdata) {
            $scope.statusdict = {'status': 'Add Stock', 'disabled': false};
            $scope.heading_stock['serial_no'] = '';
            $scope.selectAid($scope.selectedAid);
        })
    }



    $scope.barcodeGenerate = function (stock_data) {

        for (i in stock_data) {
            var barcode = stock_data[i]['serial_no'];
            console.log(barcode);
        }

    }

    $scope.stock_data = [];
    $scope.stock_state = {'message': ''}



    $scope.selectAid = function (aidobj) {
        $scope.stock_state.message = "Loading...";
        $scope.stock_data = [];
        $scope.selectedAid = angular.copy(aidobj);
        $scope.heading_stock.hearing_aid_id = aidobj.id;
        $http.post(get_aid_stock, $scope.selectedAid).then(function (resdata) {
            $scope.stock_data = resdata.data;

            if (resdata.data.length == 0) {
                $scope.stock_state.message = "No Data Found"
            }
            else {
                $scope.stock_state.message = "";
            }
        });
    }

})


HASALE.controller('StockSearch', function ($scope, $http, $timeout) {
    //hearing aid api call
    $scope.selectedAid = {};
    $scope.heading_stock = {'inward_date': inward_date, 'serial_no': ''};
    $http.post(hrurl).then(function (rdata) {
        $scope.hearing_aid = rdata.data;
        $timeout(function () {
            $(".dataTable_hearing_aid").DataTable();
            adjustDataTable();
        }, 1000);
    });

    $scope.search_stock = {'company': '0', 'model': '0'};

    $scope.statusdict = {'status': 'Add Stock', 'disabled': false};


    $http.get(company_url).then(function (data) {
        $scope.aid_company = data.data;
    })

    $scope.getHearingAid = function () {
        var company_id = $scope.search_stock.company;
        $http.get(aid_url+"/"+company_id).then(function (data) {
            $scope.aid_by_company = data.data;
        })

    }



    $scope.stock_data = [];
    $scope.stock_state = {'message': ''}



    $scope.selectAid = function () {
        $scope.stock_state.message = "Loading...";
        $scope.stock_data = [];
        $scope.selectedAid = angular.copy($scope.search_stock.model);
        $scope.heading_stock.hearing_aid_id = $scope.search_stock.model.id;
        $http.post(get_aid_stock, $scope.selectedAid).then(function (resdata) {
            $scope.stock_data = resdata.data;

            if (resdata.data.length == 0) {
                $scope.stock_state.message = "No Data Found"
            }
            else {
                $scope.stock_state.message = "";
            }
        });
    }

})


$(function () {
    $(".datepicker").datepicker({format: 'yyyy-mm-dd', autoclose: true});
})
