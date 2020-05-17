angular.module('datepickerBasicUsage', ['ngMaterial', 'ngMessages', 'angular-material-persian-datepicker'])
.controller('AppCtrl', function($scope, $element) {
this.myDate = new Date();
  this.isOpen = false;
  // var myDatePicker = angular.element($element[0].querySelector('#myDatePicker'));
    // var myDatePickerInputContainer = angular.element(myDatePicker[0].children[1]);
    // var myDatePickerInput = angular.element (myDatePickerInputContainer[0].children[0]);
$scope.myDate.attr("name", "myDatePickerInput");
    // myDatePickerInput.css("background", "yellow")
});
