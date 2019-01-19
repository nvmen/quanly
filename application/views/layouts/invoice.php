<!DOCTYPE html>
<html lang="en">

<head>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<link href="<?php echo base_url();?>public/assets/css/bootstrap.min.css" rel="stylesheet" /> 

<script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
<link href="https://printjs-4de6.kxcdn.com/print.min.css" rel="stylesheet" /> 
  <link data-require="sweet-alert@*" data-semver="0.4.2" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  

<!------ Include the above in your HEAD tag ---------->


<style type="text/css">
    #inventory-invoice{
    padding: 30px;
}
#inventory-invoice a{text-decoration:none ! important;}
.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #3989c6
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #3989c6
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #3989c6
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,.invoice table th {
    padding: 15px;
   /* background: #eee;*/
    border-bottom: 1px solid #fff
}

.invoice table th{
    white-space: nowrap;
    font-weight: 600;
    font-size: 16px;
    border:1px solid #c0c0c0;
}
.invoice table td{
    border:1px solid #c0c0c0;
}
.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #3989c6;
    font-size: 1.2em
}

.invoice table .tax,.invoice table .total,.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}

.invoice table .no {
    color: #000;
   /* font-size: 1.6em;
    background: #17a2b8*/
}

.invoice table .unit {
   /* background: #ddd*/
}

.invoice table .total {
   /* background: #17a2b8;*/
    color: #000
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
    border-top: none
}

.invoice table tfoot tr:last-child td {
    color: #3989c6;
    font-size: 1.4em;
    border-top: 1px solid #c0c0c0;
    border-bottom: 1px solid #c0c0c0;
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
}
.hd-footer table td{     
    border: 1px solid white;
    text-align: center;
    font-weight: 700;

}
@media print {
    .invoice {
        font-size: 11px!important;
        overflow: hidden!important
    }

    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }

    .invoice>div:last-child {
        page-break-before: always
    }
}
</style>
</head>

<body>
<!--Author      : @arboshiki-->
<div id="inventory-invoice">

    <div class="toolbar hidden-print">
        <div class="text-right">
            <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> In hóa đơn</button>
            <button  id="destroy" class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Hủy hóa đơn</button>
            <button id="goback" class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Quay về</button>
        </div>
        <hr>
    </div>
    <div class="invoice overflow-auto" id="content-invoice">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        <a target="_blank" href="#">
                            <img src="https://nhatnga.vn/public/images/logo-nhatnga_header.png">
                            </a>
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                            <a target="_blank" href="#">
                            CÔNG TY TNHH TM DV & DL NHẤT NGA
                            </a>
                        </h2>
                        <div> 65 Ngô Quyền, phường 11, quận 5, Hồ Chí Minh.</div>
                        <div> (+84) 28 6279 3318 - (+84) 28 66817653</div>
                        <div>info@gemmaspa.vn</div>
                    </div>
                </div>
            </header>
            <main>
                    <?php $this->load->view($main_view); ?>            
            </main>           
        </div>
        <div></div>
    </div>
</div>
   
</body>
<!--   Core JS Files   -->
</html>