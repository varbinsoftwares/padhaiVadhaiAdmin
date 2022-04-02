HASALE.controller('POS_Controller_bulk', function ($scope, $http, $timeout) {
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
        'hearing_aid': []
    };
    $scope.hearing_aid = [];
    $scope.selectedAid = {};
    $scope.earSelect = "";
    $scope.selectedEar = function (ear) {
        $scope.earSelect = ear;
    }

    $scope.set_payment = function () {
        var total = 0;
        for(i in $scope.invoice_data.hearing_aid){
            var obj = $scope.invoice_data.hearing_aid[i];
            total += Number(obj.amount_payable);
        }
        $scope.invoice_data.total_amount = total;// Number($scope.invoice_data.left_ear.amount_payable | 0) + Number($scope.invoice_data.right_ear.amount_payable | 0);
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

    $scope.serial_selected = [];
    $scope.search = {'serial_no':''};

    //search using serial no (Barcode)
    $scope.searchHearingAid = function () {

        $http.post(searchSerialNoUrl, {'serial_no': $scope.search.serial_no}).then(function (res) {
            console.log(res.data)
            $("#hearing_aid_modal").modal("hide");
            if (res.data.serial_no) {
                if ($scope.serial_selected.indexOf(res.data.serial_no) == -1) {
                    $scope.invoice_data.hearing_aid.push(res.data);
                    $scope.serial_selected.push(res.data.serial_no);

                }
                else{
                     alert("Serial No. Already Added.")
                }
            }
            else{
                alert("Serial No. Not Found.")
            }
            $scope.search.serial_no = "";
            


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
        $scope.invoice_data.hearing_aid.push(angular.copy(aidobj));



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


HASALE.controller('POS_Controller_return', function ($scope, $http, $timeout) {
    $scope.ear = {right_ear: false, left_ear: false};
    $scope.invoice_data = {
        'invoice_date': invoice_date,
        'hearing_aid': []
    }; 
    $scope.hearing_aid = [];
    $scope.selectedAid = {};
    $scope.earSelect = "";
    $scope.selectedEar = function (ear) {
        $scope.earSelect = ear;
    }

 


    $scope.submitInvoiceData = function () {


        loading_show("Saving Data");
        $http.post(submit_url, $scope.invoice_data).then(function (rdata) {
            loading_hide();

            window.location.pathname = invoice_detail_path ;
//            $http.get(invoice_list_invoice_print + ).then(function (rdata) {
//                $scope.invoice_data_print = rdata.data;
//            })
//            $("#print_invoice").show().attr("disabled", false);
        })
    }

    $scope.serial_selected = [];
    $scope.search = {'serial_no':''};

    //search using serial no (Barcode)
    $scope.searchHearingAid = function () {

        $http.post(searchSerialNoUrl, {'serial_no': $scope.search.serial_no}).then(function (res) {
            console.log(res.data)
            $("#hearing_aid_modal").modal("hide");
            if (res.data.serial_no) {
                if ($scope.serial_selected.indexOf(res.data.serial_no) == -1) {
                    $scope.invoice_data.hearing_aid.push(res.data);
                    $scope.serial_selected.push(res.data.serial_no);

                }
                else{
                     alert("Serial No. Already Added.")
                }
            }
            else{
                alert("Serial No. Not Found.")
            }
            $scope.search.serial_no = "";

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
        $scope.invoice_data.hearing_aid.push(angular.copy(aidobj));
        $("#hearing_aid_modal").modal("hide");
  
    }


    $scope.cancelAid = function (aidobj) {
        if (aidobj == 'Right') {
            $scope.invoice_data.right_ear = {};
        }
        if (aidobj == 'Left') {
            $scope.invoice_data.left_ear = {};
        }
      
    }



})
