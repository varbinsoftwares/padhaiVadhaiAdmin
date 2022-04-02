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

function notifyMe(title) {
    // Let's check if the browser supports notifications
    if (!("Notification" in window)) {
        alert("This browser does not support desktop notification");
    }

    // Let's check whether notification permissions have already been granted
    else if (Notification.permission === "granted") {
        // If it's okay let's create a notification
        var notification = new Notification(title);
    }

    // Otherwise, we need to ask the user for permission
    else if (Notification.permission !== "denied") {
        Notification.requestPermission(function (permission) {
            // If the user accepts, let's create a notification
            if (permission === "granted") {
                var notification = new Notification(title);
            }
        });
    }

    // At last, if the user has denied notifications, and you 
    // want to be respectful there is no need to bother them any more.
}





function check_extension(obj) {
    filename = obj.value;
    parent = $(".fileUploadDiv").last();
    //var newClone = $(parent).clone().hide();
    //$(".vfileContainer").append(newClone);
    var hash = {
        '.jpg': 1,
        '.jpeg': 1,
        '.png': 1, '.gif': 1, };
    var re = /\..+$/;
    var vfileTag = $(parent).find(".vfileTag");
    var votherFile = $(parent).find(".votherFile");
    var ext = filename.match(re);
    if (hash[ext[0]]) {
        $(vfileTag).show();
        $(votherFile).hide();
    } else {
        $(vfileTag).hide();
        $(votherFile).show();
    }
}

$(document).on('change', "input[type=file]", function () {
    //check_extension(this);
    var fileobj = this;
    function imageIsLoaded(e) {
        var imgobj = $(".messageimagedata").find("img").first();
        $(imgobj).attr('src', e.target.result);
    }
    if (this.files) {
        var reader = new FileReader();
        reader.onload = imageIsLoaded;

        reader.readAsDataURL(this.files[this.files.length - 1]);
    }
})



HASALE.directive('fileModel', ['$parse', function ($parse) {
        return {
            restrict: 'A',
            link: function (scope, element, attrs) {
                var model = $parse(attrs.fileModel);
                var modelSetter = model.assign;
                element.bind('change', function () {
                    scope.$apply(function () {
                        console.log(element[0].files[0])
                        modelSetter(scope, element[0].files[0]);
                    });
                });
            }
        };
    }]);

HASALE.controller('Channel_Chat_Controller', function ($scope, $http, $timeout, $interval) {
   
    $scope.imageserver = imageserver;

    $scope.uploadImages = function (index) {
        return new Promise(function (resolve, reject) {
            var fd = new FormData();
            var file = $scope.measurementiamges[index]['imgdata'];
            var pose = $scope.measurementiamges[index]['pose'];
            fd.append('file', file);
            fd.append('profile_id', $scope.mesid);
            fd.append('pose', pose);
            $http.post(uploadUrl, fd, {
                transformRequest: angular.identity,
                headers: {
                    'Content-Type': undefined
                }
            }).success(function (response) {
                resolve(index + 1)
            }).error(function (error) {
                resolve(index + 1)
            });
        })
    }


    $scope.messagedict = gsender;

  


  
    $scope.channelMessages = [];
    $scope.getChannelMessage = function () {
        var surl = chatsendapi + $scope.messagedict.channel_id+ "/" + $scope.messagedict.receiver_id;
        $http.get(surl).then(function (rdata) {

        
            $scope.channelMessages = rdata.data;

            $timeout(function () {
                $(".direct-chat-messages").animate({scrollTop: $(".direct-chat-messages")[0].scrollHeight}, 'slow');
            }, 500)

        })
       var ssurl = "http://app.padhaivadhai.com/padhaiVadhaiApp/api/index.php/updateSeen/admin/" + $scope.messagedict.channel_id;
        $http.get(ssurl).then(function (rdata) {

        })


    }
    $scope.getChannelMessage()

    $interval(function () {
       $scope.getChannelMessage()
    }, 3000);

    $scope.message = {}
    $scope.sendMessage = function () {
     
        var surl = chatsend;
        var form =angular.copy($scope.messagedict);

        console.log(form);
        $scope.messagedict.message_body = "";
        $scope.messagedict.message_file = "";
        $http.post(surl, form).then(function (rdata) {
            $scope.getChannelMessage();
        })
    }

    $scope.chooseFile = function () {
        $("#mfilesend").click();
    }


    /////////////////////////////////////////////////////////////////////////////

})


HASALE.controller('Channel_Chat_Controller_not', function ($scope, $http, $timeout, $interval) {
   


   


    $scope.messagedict = gsender;



    $scope.message = {}
    $scope.sendMessage = function () {
     
        var surl = chatsend;
        var form =angular.copy($scope.messagedict);
        $scope.messagedict.message_body = "";
        $scope.messagedict.message_file = "";
        $http.post(surl, form).then(function (rdata) {
            $scope.getChannelMessage();
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


//
//$(function () {
//    $(".datepicker").datepicker({format: 'yyyy-mm-dd', autoclose: true});
//})
