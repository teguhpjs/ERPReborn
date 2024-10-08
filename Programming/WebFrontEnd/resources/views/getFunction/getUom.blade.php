<div id="mySearchUomRevision" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Choose UOM</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <table>
                            <tr>
                                <td><label>Code</label></td>
                                <td>
                                    <div class="input-group">
                                        <input autocomplete="off" style="border-radius:0;" type="text" class="form-control" id="code_uom" onkeyup="searchUomCode()">
                                        <br><br>
                                    </div>
                                </td>
                                <td><label>Name</label></td>
                                <td>
                                    <div class="input-group">
                                        <input autocomplete="off" style="border-radius:0;" type="text" class="form-control" id="name_uom" onkeyup="searchUomName()">
                                        <br><br>
                                    </div>
                                </td>
                                <td><label>Description</label></td>
                                <td>
                                    <div class="input-group">
                                        <input autocomplete="off" style="border-radius:0;" type="text" class="form-control" id="description_uom" onkeyup="searchDescriptionName()">
                                        <br><br>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableSearchUom">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>UOM Code</th>
                                            <th>UOM Name</th>
                                            <th>UOM Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no=1; @endphp
                                        @for($i = 1; $i < 20; $i++)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>
                                                <span class="tag tag-success">
                                                    <p data-dismiss="modal" class="kliktableSearchUom" data-id="UOM Code {{ $i }}" data-name="UOM Name {{ $i }}">UOM Code {{$i}}</p>
                                                </span>
                                            </td>
                                            <td>
                                                <p>UOM Name {{$i}}</p>
                                            </td>
                                            <td>
                                                <p>UOM Description {{$i}}</p>
                                            </td>
                                        </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--|----------------------------------------------------------------------------------|
    |                            End Function My Project Code                          |
    |----------------------------------------------------------------------------------|-->
<script>
    function searchUomCode() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("code_uom");
        filter = input.value.toUpperCase();
        table = document.getElementById("tableSearchUom");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    function searchUomName() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("name_uom");
        filter = input.value.toUpperCase();
        table = document.getElementById("tableSearchUom");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    function searchDescriptionName() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("description_uom");
        filter = input.value.toUpperCase();
        table = document.getElementById("tableSearchUom");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[3];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>

<script>
    $(function() {
        $(".kliktableSearchUom").on('click', function(e) {
            e.preventDefault(); // in chase you change to a link or button
            var $this = $(this);
            var code = $this.data("id");
            $("#uomCode").val(code);
        });
    });
</script>