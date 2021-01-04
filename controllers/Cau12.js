//Reference File app.js
myApp.controller(
  "Cau12",
  function ($scope, $state, $http, $location) {
    var vm = this;

    $scope.currentPage = 1;
    $scope.maxSize = 3;
    this.search_data = function (search_input) {
      if (search_input.length > 0) vm.loadData(1);
    };

    this.loadData = function (page_number) {
      var search_input = document.getElementById("search_input").value;
      $http
        .get(
          "model/selectCau12.php?page=" +
            page_number +
            "&search_input=" +
            search_input
        )
        .then(function (response) {
          vm.sinhvien_list = response.data.sinhvien_data;
          $scope.total_row = 2* +response.data.total;
        });
    };

    $scope.$watch("currentPage + numPerPage", function () {
      vm.loadData($scope.currentPage);

      var begin = ($scope.currentPage - 1) * $scope.numPerPage,
        end = begin + $scope.numPerPage;
    });
    //

    this.addsinhvien = function (info) {
      $http.post("model/insert.php", info).then(function (response) {
        vm.msg = response.data.message;
        vm.alert_class = "custom-alert";
        document.getElementById("create_sinhvien_info_frm").reset();
        $("#create_sinhvien_info_modal").modal("toggle");
        vm.loadData($scope.currentPage);
      });
    };

    this.edit_sinhvien_info = function (MANV) {
      $http.get("model/selectone.php?MANV=" + MANV).then(function (response) {
        vm.sinhvien_info = response.data;
      });
    };

    this.updatesinhvien = function () {
      $http
        .put("model/update.php", this.sinhvien_info)
        .then(function (response) {
          vm.msg = response.data.message;
          vm.alert_class = "custom-alert";
          $("#edit_sinhvien_info_modal").modal("toggle");
          vm.loadData($scope.currentPage);
        });
    };

    this.get_sinhvien_info = function (MANV) {
      $http.get("model/selectone.php?MANV=" + MANV).then(function (response) {
        vm.view_sinhvien_info = response.data; //alert(response.data);
      });
    };

    this.delete_sinhvien_info = function (MANV) {
      if (confirm("Bạn có chắc chẵn xóa không", "Thông báo")) {
        //do your process of delete using angular js.
        $http.delete("model/delete.php?MANV=" + MANV).then(function (response) {
          vm.msg = response.data.message;
          vm.alert_class = "custom-alert";
          vm.loadData($scope.currentPage);
        });
      }
    };
  }
);
