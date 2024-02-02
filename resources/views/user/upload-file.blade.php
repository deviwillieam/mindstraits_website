@extends('layouts.app')

@section('page-title', 'Upload File')
@section('page-heading', 'Upload File')

@section('breadcrumbs')
    <li class="breadcrumb-item active">
        Upload File
    </li>
@stop

@section('content')
    @include('partials.messages')

    <!-- Include your head content here -->
    <title>Import Export Example </title> <a href="https://docs.google.com/spreadsheets/d/1HxyvcLVEKwijAkX78sp3VO7w2gmlULcc/edit?usp=sharing&ouid=110932340311877016329&rtpof=true&sd=true">
    <a href="https://docs.google.com/spreadsheets/d/1hPIZ0339Vz4F1GHELLMeHEbJAHoHziDs/edit?usp=sharing&ouid=110932340311877016329&rtpof=true&sd=true">
         <img src="https://cdn-icons-png.flaticon.com/512/732/732220.png" alt="Excel Icon" style="width:10pt;height:auto;vertical-align:middle;" />
            Please follow this Excel format
        </a>

        
    

    <div class="container">
        <div class="card bg-light mt-3">
            <div class="card-header">
                Import Your Bank Statement (CSV/EXCEL FILE)
            </div>
            <div class="card-body">
                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file" name="file" class="form-control">
                    <br>
                    <button class="btn btn-success">Import Bulk Data</button>
                    <a href="#" id="download-btn" class="btn btn-primary">Download Data</a>
                </form>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="card">
        <div class="card-header d-block">
            <h3>DATA UPLOAD FROM EXCEL BANK STATEMENT</h3>
        </div>
        <div class="card-body">
            <div class="dt-responsive">
                <div id="simpletable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr role="row">
                                        <th data-sortable="true">Date</th>
                                        <th data-sortable="true">Document Number</th>
                                        <th data-sortable="true">Description</th>
                                        <th data-sortable="true">Account</th>
                                        <th data-sortable="true">Item</th>
                                        <th data-sortable="true">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($totalAmounts as $totalAmount)
                                        @if($totalAmount->userid === auth()->user()->email)
                                            <tr>
                                                <td>{{ date('d/m/Y', strtotime($totalAmount->date)) }}</td>
                                                <td>{{ $totalAmount->doc_no }}</td>
                                                <td>{{ $totalAmount->description }}</td>
                                                <td>{{ $totalAmount->account }}</td>
                                                <td>{{ $totalAmount->item }}</td>
                                                <td>{{ $totalAmount->amount }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('styles')
    <style>
        .user.media {
            float: left;
            border: 1px solid #dfdfdf;
            background-color: #fff;
            padding: 15px 20px;
            border-radius: 4px;
            margin-right: 15px;
        }
    </style>
@stop

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.4/xlsx.full.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const downloadBtn = document.getElementById('download-btn');
        const table = document.getElementById('simpletable'); // Update with your table ID

        downloadBtn.addEventListener('click', function() {
            const tableData = [];
            const headerRow = table.querySelector('thead tr');
            const headerCells = headerRow.querySelectorAll('th');

            // Process header row
            const headerRowData = [];
            headerCells.forEach(function(headerCell) {
                headerRowData.push(headerCell.textContent);
            });
            tableData.push(headerRowData);

            // Process data rows
            const rows = table.querySelectorAll('tbody tr');
            rows.forEach(function(row) {
                const rowData = [];
                const cells = row.querySelectorAll('td');

                cells.forEach(function(cell) {
                    rowData.push(cell.textContent);
                });

                tableData.push(rowData);
            });

            const ws = XLSX.utils.aoa_to_sheet(tableData);
            const wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');
            XLSX.writeFile(wb, 'table_data.xlsx');
        });
    });
</script>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include DataTables CSS and JS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.7/css/jquery.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.7/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#simpletable').DataTable({
            "paging": true,  // Enable pagination
            "lengthMenu": [10, 20, 50, 100, -1],  // Define the number of records per page
            "searching": true,  // Enable searching
        });
    });
</script>
@stop
