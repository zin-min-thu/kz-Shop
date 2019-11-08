@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="{{URL::to('/dashboard')}}">Home</a>
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="{{URL::to('/manage-order')}}">Order Details</a></li>
</ul>
@if(session('message'))
    <div class='alert alert-success'>{{session('message')}}</div>
    {{Session::put('message', null)}}
@endif
<div class="row-fluid sortable">
    <div class="box span6">
        <div class="box-header">
            <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Customer Details</h2>
            <div class="box-icon">
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Mobile Number</th>                                     
                        </tr>
                    </thead>   
                    <tbody>
                        <tr>
                            @foreach($order_by as $order_data)       
                            @endforeach                    
                            <td>{{$order_data->customer_name}}</td>
                            <td>{{$order_data->mobile_number}}</td>         
                        </tr>                                
                    </tbody>
                </table>  
                <div class="pagination pagination-centered">
            </div>     
        </div>
    </div><!--/span-->
    
    <div class="box span6">
        <div class="box-header">
            <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Shipping Details</h2>
            <div class="box-icon">
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Address</th>
                            <th>Mobile</th>
                            <th>Email</th>                                          
                        </tr>
                    </thead>   
                    <tbody>
                        <tr>
                            @foreach($order_by as $order_data)                      
                            @endforeach
                            <td>{{$order_data->shipping_first_name}}</td>
                            <td class="center">{{$order_data->shipping_address}}</td>
                            <td class="center">{{$order_data->shipping_mobile_number}}</td>                          
                            <td class="center">{{$order_data->shipping_email}}</td>    
                        </tr>                                 
                    </tbody>
                </table>  
                <div class="pagination pagination-centered">
            </div>     
        </div>
    </div><!--/span-->
</div><!--/row-->

<div class="row-fluid sortable">	
    <div class="box span12">
        <div class="box-header">
            <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Order Details</h2>
            <div class="box-icon">        
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-bordered table-striped table-condensed">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Sales Quantity</th>
                            <th>Product sub Total</th>                                          
                        </tr>
                    </thead>   
                    <tbody>
                        @foreach($order_by as $order_data)
                        <tr>
                            <td>{{$order_data->order_id}}</td>
                            <td class="center">{{$order_data->customer_name}}</td>                                     
                            <td class="center">{{$order_data->product_price}}</td>
                            <td class="center">{{$order_data->product_sales_quality}}</td>                                   
                            <td>{{$order_data->product_price*$order_data->product_sales_quality}}</td>
                        </tr>                                
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4">Total with vat:</td>
                            <td><strong>{{$order_data->order_total}}</strong> </td>
                        </tr>
                    </tfoot>
                </table>  
                <div class="pagination pagination-centered">
            </div>     
        </div>
    </div><!--/span-->
</div><!--/row-->
@endsection