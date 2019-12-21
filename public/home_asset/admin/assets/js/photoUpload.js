var app = angular.module("app", ["myDirectives"]);
var myDirectives = angular.module("myDirectives", []);

app.controller("UploadController", function ($log) {
  this.upload = function () {
    $log.info("Uploading:", this.file || "no file selected!");
  }
})

myDirectives.directive("myFileUpload", function ($compile) {
  return {
    restrict: "AE",
    require: "ngModel",
    scope: true,
    link: link
  };

  function link (scope, element, attrs, ngModel) {
    var input = angular.element("<input type=\"file\" style=\"display: none;\">");

    input.bind("browse", function () {
      this.click();
    });
    
    input.bind("change", function (changed) {
      if (changed.target.files.length < 1) {
        return;
      }

      var fileName = changed.target.files[0].name;
      var reader = new FileReader();

      reader.onload = function (loaded) {
        scope.fileName = fileName;
        ngModel.$setViewValue(loaded.target.result);
      };
      
      reader.readAsDataURL(changed.target.files[0]);
    });

    $compile(input)(scope);
    element.append(input);

    scope.browse = function () {
      input.triggerHandler("browse");
    };
    
    scope.reset = function () {
      scope.fileName = null;
      ngModel.$setViewValue(null);
    };
  }
});
