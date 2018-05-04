var NGTools = new Object();

NGTools.CallNgService = function ($http, $scope, url, method, param, successFunctionCallback, errorFunctionCallback) {

    var self = this;

    self.reqObj = {
        method: method,
        url: url
    };

    if (method.toLowerCase() == 'post') {
        self.reqObj.data = param;
    }
    if (method.toLowerCase() == 'get') {
        self.reqObj.params = param;
    }

    self.request = $http(self.reqObj);
    $scope.promise = self.request;

    self.callErrorFunction = function (response, status) {
        if (errorFunctionCallback && errorFunctionCallback != null) {
            errorFunctionCallback(response, status);
        }
    };
    self.request.success(function (response, status) {

        if (response.Type == 'NOT_AUTHENTICATED') {
            alert("Giriş yapılmamış");
        } else if (response.HasError && response.HasError == true) {
            if (response.Type == "NOT_VALID") {
                self.callErrorFunction(response, status);
            }
            if (response.Type == "NOT_AUTHORIZED") {
                alert("Hata var");
                self.callErrorFunction(response, status);
            }
        } else {
            if (successFunctionCallback && successFunctionCallback != null) {
                if (typeof response.Data == 'object') {
                    //It is JSON object                    
                } else {
                    //It is Json string
                    //response.Data = "(" + eval(response.Data) + ")";
                    response.Data = eval('(' + response.Data + ')');
                }
                successFunctionCallback(response, status);
            }
        }
    });
    self.request.error(function (response, status) {
        self.callErrorFunction(response, status);
    });
}

//Angular service call with request and only success function callback and error functionName so that you dont need to write additional onerror function
NGTools.CallNgServiceWithRequest = function (request, successFunctionCallback, functionName) {
    Metronic.blockUI({ target: $('body') });


    // Metronic.blockUI({ target: $("body") });
    var self = this;
    self.request = request;
    //pageLoadingFrame("show");

    self.callErrorFunction = function (response, status) {
        console.log('Error on ' + functionName);
        console.log(status);
        console.log(response);
    };
    self.request.success(function (response, status) {
        //pageLoadingFrame("hide");
        console.log(response);

        var tip = response.Type;
        if (response.HasError && response.HasError == true) {
            if (tip == 'NOT_AUTHENTICATED' || tip == 'NOT_AUTHORIZED' || tip == "NOT_VALID") {
                //self.callErrorFunction(response, status); 
                //NGTools.OpenPopup(2500, response.Message, 'alert-warning');
                window.location = "/UserLogin/Login";
            } else {
                self.callErrorFunction(response, status);
            }
        } else {
            if (tip == 'SUCCESS' || tip == 'SUCCESS_WITH_DATA') {
                response.Data = eval('(' + response.Data + ')');
                successFunctionCallback(response, status);
            } else if (tip == 'NOT_AUTHENTICATED' || tip == 'NOT_AUTHORIZED' || tip == "NOT_VALID") {
                //self.callErrorFunction(response, status); 
                //NGTools.OpenPopup(2500, response.Message, 'alert-danger');
                window.location = "/UserLogin/Login";
            } else {
                self.callErrorFunction(response, status);
            }
        }
        var timeout = setTimeout(function () {
            Metronic.unblockUI();
        }, 500);

    });
    self.request.error(function (response, status) {
        //pageLoadingFrame("hide");
        self.callErrorFunction(response, status);
        var timeout = setTimeout(function () {
            Metronic.unblockUI();
        }, 500);
    });
}

//Angular service call with request and both success and error function callback
NGTools.CallNgServiceWithRequestV2 = function (req, successFunctionCallback, errorFunctionCallback) {

    self.request = req;

    self.callErrorFunction = function (response, status) {
        if (errorFunctionCallback && errorFunctionCallback != null) {
            errorFunctionCallback(response, status);
        }
    };
    self.request.success(function (response, status) {
        //console.log(response);

        if (response.Type == 'NOT_AUTHENTICATED') {
            //alert("Giriş yapılmamış");
            //SmartTools.OpenDialog();
            successFunctionCallback(response, status);
        } else if (response.HasError && response.HasError == true) {
            if (response.Type == "NOT_VALID") {
                self.callErrorFunction(response, status);
            }
            if (response.Type == "NOT_AUTHORIZED") {
                alert("Hata var");
                self.callErrorFunction(response, status);
            }
        } else {
            if (successFunctionCallback && successFunctionCallback != null) {
                successFunctionCallback(response, status);
            }
        }
    });
    self.request.error(function (response, status) {
        self.callErrorFunction(response, status);
    });
}

NGTools.GetScope = function (id) {
    var obj = document.getElementById(id);
    var _element = angular.element(obj);
    return _element.scope();
};

NGTools.GetParameterByName = function (name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
};

NGTools.uploadFiles = function ($http, $scope, elementId, url, filesArray, onSuccess, onError) {
    var files = $("#" + elementId)[0].files;
    for (var i = 0; i < files.length; i++) {
        NGTools.uploadSingleFile(files[i], $http, $scope, url, filesArray, onSuccess, onError);
    }

}

NGTools.uploadSingleFile = function (file, $http, $scope, url, filesArray, onSuccess, onError) {
    var x = 1;

    if (file && file != null) {
        var reader = new FileReader();

        reader.onload = function (readerEvt) {
            var binaryString = readerEvt.target.result;

            var param = new Object();
            param.content = btoa(binaryString);

            var fileInfo = new Object();
            fileInfo.OwnerEntryId = -1;
            fileInfo.Filename = file.name;

            param.fileInfo = JSON.stringify(fileInfo);

            var s = function (data) {
                if (x == 1) {
                    //console.log(data);
                    filesArray.push({ "id": data.Data, "originalName": file.name });
                    ++x;
                }
            }

            NGTools.CallNgService($http, $scope, url, "POST", JSON.stringify(param), s, onError);

        };

        reader.readAsBinaryString(file);
    }

};

NGTools.OpenPopup = function (timer, message, classs) {
    bootbox.alert(message);
    /*
    $('#popupTimer').bPopup({
        fadeSpeed: 'fast', //can be a string ('slow'/'fast') or int
        followSpeed: 1500,
        autoClose: timer,
        onOpen: function () {
            $('#popupTimer').addClass(classs);
            $('#message').html(message);
        },
        onClose: function () {
            $('#popupTimer').removeClass(classs);
            $('#message').html('');
        }
    });
    */
};

NGTools.getParameterByName = function (name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}