<?php 
function IsNullOrEmptyString($str){
    return (!isset($str) || trim($str) === '');
}
?>
<div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">Khách hàng:</div>
                        <h2 class="to"><?php echo $invoice_info['fullname'];?></h2>
                        <?php if(!IsNullOrEmptyString($invoice_info['address'])) { ?>
                             <div class="address" style="padding-top: 10px">Địa chỉ: <?php echo $invoice_info['address'] ?></div>
                        <?php } ?>

                        <?php if(!IsNullOrEmptyString($invoice_info['phone'])) { ?>
                             <div class="address">Điện thoại: <?php echo $invoice_info['phone'] ?></div>
                        <?php } ?>
                         <?php if(!IsNullOrEmptyString($invoice_info['email'])) { ?>
                             <div class="address">Email: <?php echo $invoice_info['email'] ?></div>
                        <?php } ?>                       
                    </div>
                    <div class="col invoice-details">
                        <h3 class="invoice-id">Hóa đơn: <?php echo ($invoice_info['id']+10000) ?></h3>
                        <div class="date">Ngày: <?php echo date_format(date_create($invoice_info['create_date']),"d/m/Y ") ?></div>                        
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>NO.</th>
                            <th class="text-left">Dịch vụ</th>
                            <th class="text-right">Giá</th>
                            <th class="text-right">Số lượng</th>
                            <th class="text-right">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $index = 1;
                       
                      foreach($invoice_details as $row)
                      {
                         $num_padded = sprintf("%02d", $index);
                        ?>
                        <tr>
                            <td class="no"><?php echo $num_padded  ?></td>
                            <td class="text-left"><h3><?php echo $row['service']  ?></h3></td>
                            <td class="unit"><?php echo number_format($row['price'], 0, ',', ',')  ?> đ</td>
                            <td class="tax"><?php echo sprintf("%02d",$row['qty'])   ?></td>
                            <td class="total"><?php echo number_format($row['total'], 0, ',', ',') ?> đ</td>
                        </tr>

                    <?php
                      $index = $index + 1;
                     } ?>
                       
                    </tbody>
                    <tfoot>                        
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">Thành tiền</td>
                            <td><?php echo number_format($invoice_info['total'], 0, ',', ',') ?> đ</td>
                        </tr>
                    </tfoot>
                </table>  
                <br/>
                <div class="hd-footer">
                    <table >
                        <tr>
                            <td> <span>Khách Hàng</span> <br/> <span>(Ký,ghi rõ họ tên)</span></td>
                             <td> <span>Thu Ngân</span> <br/> <span>(Ký,ghi rõ họ tên)</span></td>
                        </tr>
                    </table>   
                 </div>  


 <form action="<?php echo base_url();?>invoice/delete" method ="post" id="frm-delete">
    <input type="hidden" name ="id" id ="id" value="">
    <input type="hidden" name ="current_url" id ="current_url" value="">
   
</form>

<script type="text/javascript">
   function show_delete(id){
        swal({
              title: "Xác nhận",
              text: "Bạn muốn xóa hóa đơn này?",
              icon: "warning",
              buttons: [
                'Hủy!',
                'Đồng ý!'
              ],
              dangerMode: true,
            }).then(function(isConfirm) {
              if (isConfirm) {
                // delete  chổ này
                $("#id").val(id);
                $("#current_url").val("<?php echo base_url();?>invoice/index" );
                $('form#frm-delete').submit();
              } 
            })
    }
    $('#printInvoice').click(function(){
          printJS('content-invoice', 'html')
     });
    $('#goback').click(function(){
         window.location.href ="<?php echo base_url();?>invoice/index";
        });

    $('#destroy').click(function(){
        show_delete(<?php echo $invoice_info['id'] ?>);
    });
     
</script>