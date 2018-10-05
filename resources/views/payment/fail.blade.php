<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

    <title id="printPageButton">Payment</title>

    <link rel='stylesheet' type='text/css' href='/css/style.css' />
    <link rel='stylesheet' type='text/css' href='/css/print.css' media="print" />
    <script type='text/javascript' src='/js/jquery-1.3.2.min.js'></script>
    <script type='text/javascript' src='/js/example.js'></script>
    <style type="text/css">
    	@media print {
		  #printPageButton {
		    display: none;
		  }
		}
    </style>

</head>

<body>
	<center>
	@if (session('success'))
	    <div id="printPageButton" style="background-color: #d0e9c6;padding:15px;margin-bottom:22px;border:1px solid transparent;border-radius:4px">
	        {!! session('success') !!}
	    </div>
	@endif
	@if (session('message'))
	    <div id="printPageButton" style="background-color: #ebcccc;padding:15px;margin-bottom:22px;border:1px solid transparent;border-radius:4px">
	        {!! session('message') !!}
	    </div>
	@endif
	</center>

    <div id="page-wrap">

        <textarea readonly id="header">INVOICE</textarea>

        <div id="identity">
        	<label>{!! $user->name !!}</label><br>
        	<label>{!! $user->email !!}</label><br>
        	<label>{!! $user->mobile !!}</label><br>
            <label id="address">{!! $user->address1 !!}, {!! $user->address2 !!}</label>

            <div id="logo">
                <img src="/img/logo-copy1.jpg" alt="logo" />
            </div>

        </div>

        <div style="clear:both"></div>

        <div id="customer">

            <label id="customer-title">Mentor Learning Services Pvt Ltd.</label>

            <table id="meta">
                <tr>
                    <td class="meta-head">Transaction ID</td>
                    <td>
                        <label>{!! $cart['txnid'] !!}</label>
                    </td>
                </tr>
                <tr>

                    <td class="meta-head">Date</td>
                    <td>
                        <label id="date">{!! Carbon\Carbon::parse($cart['created_at'])->format('d-m-Y') !!}</label>
                    </td>
                </tr>
                <tr>
                    <td class="meta-head">Amount Due</td>
                    <td>
                        <div class="due">{!! number_format($cart->amount, 2, '.', ''); !!}</div>
                    </td>
                </tr>
                <tr>
                    <td class="meta-head">Payment Status</td>
                    <td>
                        <div class="due">{!! $payment['status'] !!}</div>
                    </td>
                </tr>

            </table>

        </div>

        <table id="items">

            <tr>
				<th>S.No</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Unit Cost</th>
				<th>Price</th>
            </tr>

            <tr class="item-row">
				<td>01</td>
                <td class="item-name">
                    <div class="delete-wpr">
                        <label>{!! $pro->p_name !!}</label></div>
                </td>
                <td class="description">
                    <label>{!! $pro->p_discription !!}</label>
                </td>
                <td>
                    <label class="cost">{!! number_format($cart->amount, 2, '.', ''); !!}</label>
                </td>
				<td><span class="price">{!! number_format($cart->amount, 2, '.', ''); !!}</span></td>
            </tr>
            <tr id="hiderow">
                <td colspan="5"><a id="addrow" href="javascript:;" title="Add a row"></a></td>
            </tr>
            <tr>
                <td colspan="2" class="blank"> </td>
                <td colspan="2" class="total-line balance">Total</td>
                <td class="total-value balance">
                    <div class="due">{!! number_format($cart->amount, 2, '.', ''); !!}</div>
                </td>
            </tr>
        </table>

        <br>
        <center>
        <input type="button" id="printPageButton" style="padding:4px 10px 4px;font-weight:normal;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px" onclick="window.location.href='/products'" value="Go to Home Page" />
 
        <button id="printPageButton" style="padding:4px 10px 4px;font-weight:normal;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px" onclick="myFunction()">Print this page</button>
        </center>
    </div>

</body>
<script>
	function myFunction() {
	    window.print();
	}
</script>

</html>