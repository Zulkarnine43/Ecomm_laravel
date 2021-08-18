@extends('admin.layouts.template')

@section('template')
<!-- Content Header -->
<section class="content-header">
    <h1>RECEIVABLE</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
        <li class="active">Receivable</li>
    </ol>
</section>
<!-- End Content Header -->
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    List Receivable
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table-bordered" id="purchase_details" width="100%">
                            <thead>
                                <tr>
                                    <th height="25">#</th>
                                    <th>Customer Name</th>
                                    <th>Date</th>
                                    <th>Invoice No.</th>
                                    <th>Invoice Total</th>
                                    <th>Discount</th>
                                    <th>Paid</th>
                                    <th>Due</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if(isset($receivables))
                                    @php $total = 0; $discount = 0; $paid = 0; $due = 0; @endphp
                                    @foreach($receivables as $key => $data)
                                        <tr>
                                            <td height="25">{{ ++$key }}</td>
                                            <td>{{ $data->customer_name }}</td>
                                            <td>{{ $data->sales_date }}</td>
                                            <td >{{ $globalSettings->invoice_prefix."-BI-".str_pad($data->sales_master_id, 8, '0', STR_PAD_LEFT) }}</td>
                                            
                                            <td style="text-align: right;">{{ number_format($data->memo_total,2) }}</td>
                                            <td style="text-align: right;">{{ number_format($data->discount,2) }}</td>
                                            <td style="text-align: right;">{{ number_format($data->advanced_amount,2) }}</td>
                                            <td style="text-align: right;" class="text-red">{{ number_format($data->memo_total - $data->advanced_amount -$data->discount,2) }}</td>   
                                        </tr>
                                    @php
                                        $total += $data->memo_total; 
                                        $discount += $data->discount; 
                                        $paid += $data->advanced_amount; 
                                        $due += $data->memo_total - $data->advanced_amount -$data->discount;    
                                    @endphp 
                                    @endforeach
                                    <tr class="text-danger">
                                        <th colspan="7" style="text-align: center;">Total</th>
                                        <th style="text-align: right;">{{number_format($due,2)}}</th>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Main Content -->


@endsection