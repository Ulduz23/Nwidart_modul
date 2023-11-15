@extends('core::layouts.master')

@section('content')
    
<!-- Primary table start -->
<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Data Table Primary</h4>
            <div class="data-tables datatable-primary">
                <table id="dataTable2" class="text-center">
                    <thead class="text-capitalize">
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start Date</th>
                            <th>salary</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Airi Satou</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>33</td>
                            <td>2008/11/28</td>
                            <td>$162,700</td>
                        </tr>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Primary table end -->
@endsection
