<script>
    $(".ShowTableReportPurchaseRequisitionSummary").hide();
    $("#site_code").prop("disabled", true);
    $("#site_code_popup").prop("disabled", true);
</script>


<script>
    $('#tableGetProject tbody').on('click', 'tr', function() {


        $("#myProject").modal('toggle');

        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();
        var sys_id = $('#sys_id_budget' + id).val();
        var code = row.find("td:nth-child(2)").text();
        var name = row.find("td:nth-child(3)").text();

        $("#project_id").val(sys_id);
        $("#project_code").val(code);
        $("#site_code").prop("disabled", false);
        $("#site_code_popup").prop("disabled", false);
        $("#site_id").val("");
        $("#site_code").val("");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var keys = 0;
        $.ajax({
            type: 'GET',
            url: '{!! route("getSite") !!}?project_code=' + sys_id,
            success: function(data) {

                var no = 1;
                var t = $('#tableGetSite').DataTable();
                t.clear();
                $.each(data, function(key, val) {
                    keys += 1;
                    t.row.add([
                        '<tbody><tr><input id="sys_id_site' + keys + '" value="' + val.Sys_ID + '" type="hidden"><td>' + no++ + '</td>',
                        '<td>' + val.Code + '</td>',
                        '<td>' + val.Name + '</td></tr></tbody>'
                    ]).draw();
                });
            }
        });
    });
</script>

<script>
    $('#tableGetSite tbody').on('click', 'tr', function() {

        $("#mySiteCode").modal('toggle');

        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();
        var sys_id = $('#sys_id_site' + id).val();
        var code = row.find("td:nth-child(2)").text();
        var name = row.find("td:nth-child(3)").text();

        $("#site_id").val(sys_id);
        $("#site_code").val(code);

    });
</script>


<!-- SUBMIT FILTER  -->
<script>
    $(function() {
        $("#FormSubmitReportPurchaseRequisitionSummary").on("submit", function(e) {
            e.preventDefault();

            var project_code = $("#project_code").val();
            var site_code = $("#site_code").val();
            var requester_id = $("#requester_id").val();

            if (project_code == "" && site_code == "" && requester_id == "") {
                ErrorNotif("Data Cannot Empty !");
            } else {

                $(".ShowTableReportPurchaseRequisitionSummary").show();

                var action = $(this).attr("action");
                var method = $(this).attr("method");
                var form_data = new FormData($(this)[0]);
                var form = $(this);

                ShowLoading();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#TableReportPurchaseRequisitionSummary').find('tbody').empty();

                var t = $('#TableReportPurchaseRequisitionSummary').DataTable();
                t.clear().draw();

                var no = 1;
                var keys = 0;
                var TotalIdr = 0;
                var TotalOtherCyrrency = 0;

                $.ajax({
                    url: action,
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: method,

                    success: function(data) {
                        $.each(data.data, function(key, val) {
                            console.log(val);
                            $("#budget_code").html(val.combinedBudgetCode+ ' - ' + val.combinedBudgetName);
                            if (val.requesterWorkerName == null) {
                                requesterWorkerName = "";
                            } else {
                                requesterWorkerName = val.requesterWorkerName;
                            }

                            var TotalPr = 0;
                            var OtherCurrency = 0;

                            

                            TotalIdr += +TotalPr;
                            TotalOtherCyrrency += +OtherCurrency;

                            const date = dateFns.format(
                                dateFns.parse(val.documentDateTimeTZ, "yyyy-MM-dd hh:mm:ss"),
                                'DD-MM-YYYY');

                            keys += 1;

                            t.row.add([
                                '<tbody><tr><td>' + no++ + '</td>',
                                '<td><a href="ReportPurchaseRequisitionDetailID/' + +val.sys_ID + '">' + val.documentNumber + '</a></td>',
                                '<td>' + date + '</td>',
                                '<td>' + currencyTotal(TotalPr) + '</td>',
                                '<td>' + currencyTotal(OtherCurrency) + '</td>',
                                '<td>' + requesterWorkerName + '</td></tr></tbody>'
                            ]).draw();

                        });

                        $('#TotalIdr').html(currencyTotal(TotalIdr));
                        $('#TotalOtherCyrrency').html(currencyTotal(TotalOtherCyrrency));

                        HideLoading();
                    },
                    error: function(response) {
                        HideLoading();
                        // CALL FUNCTION ERROR NOTIFICATION
                        ErrorNotif("Data Not Found !");
                    },
                })
            }
        });
    });
</script>