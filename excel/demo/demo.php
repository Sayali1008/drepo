<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="../dist/jquery.table2excel.js"></script>
</head>

<body>

    <div class="container" style="margin-top:3%;">
        <!-- <h3>WORKSHOPS</h3> -->

        <table class="table2excel" data-tableName="Test Table 1">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>1</th>
                    <th>Sayali</th>
                </tr>
                <tr>
                    <th>2</th>
                    <th>Sayali</th>
                </tr>
                <tr>
                    <th>3</th>
                    <th>Sayali</th>
                </tr>
                <tr>
                    <th>4</th>
                    <th>Sayali</th>
                </tr>
                <tr>
                    <th>5</th>
                    <th>Sayali</th>
                </tr>
            </tbody>
        </table>

        <button class="exportToExcel">Export to XLS</button>
        <script>
            $(function() {
                $(".exportToExcel").click(function(e) {
                    var table = $(this).prev('.table2excel');
                    if (table && table.length) {
                        var preserveColors = (table.hasClass('table2excel_with_colors') ? true : false);
                        $(table).table2excel({
                            exclude: ".noExl",
                            name: "Excel Document Name",
                            filename: "myFileName" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls",
                            fileext: ".xls",
                            exclude_img: true,
                            exclude_links: true,
                            exclude_inputs: true,
                            preserveColors: preserveColors
                        });
                    }
                });

            });
        </script>
    </div>

</body>

</html>