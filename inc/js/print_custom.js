var data={};
$("#single-product input[type='number'][id='pquantity']").bind("input", function() {
    var amount=parseInt($(this).parents('.modal-body').find('input[id="pprice"]').val()) * parseInt($(this).val());
    $(this).parents('.modal-body').find('input[id="pamount"]').val(amount);
});

$("#double-product input[type='number'][id='pquantity']").bind("input", function() {
    var amount=parseInt($(this).parents('.modal-body').find('input[id="pprice"]').val()) * parseInt($(this).val());
    $(this).parents('.modal-body').find('input[id="pamount"]').val(amount);
    var totalAmount= parseInt($(this).parents('.modal-body').find('input[id="pamount"]').val()) + parseInt($(this).parents('.modal-body').find('input[id="p2amount"]').val());
    $(this).parents('.modal-body').find('input[id="Total"]').val(totalAmount);
});

$("#double-product input[type='number'][id='p2quantity']").bind("input", function() {
    var amount=parseInt($(this).parents('.modal-body').find('input[id="p2price"]').val()) * parseInt($(this).val());
    $(this).parents('.modal-body').find('input[id="p2amount"]').val(amount);
    var totalAmount= parseInt($(this).parents('.modal-body').find('input[id="pamount"]').val()) + parseInt($(this).parents('.modal-body').find('input[id="p2amount"]').val());
    $(this).parents('.modal-body').find('input[id="Total"]').val(totalAmount);
});


$('.btn-printdetail').on('click', function () {  
    data['pname']=$(this).closest('.product-warpper').find('#product-name').html();
    data['pprice']=$(this).closest('.product-warpper').find('#product-price').html();
    data['pimg']=$(this).closest('.product-warpper').find('#product-img').attr('src');
    data['ptype']=$(this).data('type');
    data['p2name']=$(this).data('name');
    data['p2price']=$(this).data('price');
    data['p2img']=$(this).data('img');
    if(data['ptype']==='single'){
        $('#single-product input[id="pname"]').val(data['pname']);
        $('#single-product input[id="pprice"]').val(data['pprice']);
        $('#single-product #pimg').attr('src',data['pimg']);
        $('#single-product input[id="pamount"]').val(parseInt($('#single-product input[id="pprice"]').val()) * parseInt($("#single-product input[type='number'][id='pquantity']").val()));
        $('#single-product').modal('show');
    }
    else if(data['ptype']==='double'){
        $('#double-product input[id="pname"]').val(data['pname']);
        $('#double-product input[id="pprice"]').val(data['pprice']);
        $('#double-product #pimg').attr('src',data['pimg']);
        $('#double-product input[id="p2name"]').val(data['p2name']);
        $('#double-product input[id="p2price"]').val(data['p2price']);
        $('#double-product #p2img').attr('src','img/thmbs/'+data['p2img']);
        $('#double-product input[id="pamount"]').val(parseInt($('#double-product input[id="pprice"]').val()) * parseInt($("#double-product input[type='number'][id='pquantity']").val()));
        $('#double-product input[id="p2amount"]').val(parseInt($('#double-product input[id="p2price"]').val()) * parseInt($("#double-product input[type='number'][id='p2quantity']").val()));
        var total= parseInt($('#double-product input[id="pamount"]').val()) + parseInt($('#double-product input[id="p2amount"]').val());
        $('#double-product input[id="Total"]').val(total.toFixed(2));
        $('#double-product').modal('show');
    }
});

$('.print').on('click', function () {
    var today = new Date();
    var logo=$('.modal').find('#logo').attr('src');
    if(data['ptype']==='single'){
        $('#single-product').modal('hide');
        data['pquantity']=$('#single-product').find('input[id="pquantity"]').val();
        data["pamount"]=$('#single-product').find('input[id="pamount"]').val();
        var mywindow = window.open('', 'my div');
        mywindow.document.write('<html><head><title></title>');
        mywindow.document.write('<style>body{margin:10px 0px; font-size:7px;}.bold{font-weight:bold;}.center{text-align: center;}th{text-align: left;} table, td, th {border: none; font-size:8px;}.detail-table td{padding:1px 5px;}.detail-table tr{margin:0;}.detail-table img{max-width:100%;height:150px;}</style>');
        mywindow.document.write('</head><body>');
        mywindow.document.write('<table class="detail-table">');
        mywindow.document.write('<tr><td class="" colspan="2"><img src="'+logo+'"/></td></tr>');
        mywindow.document.write('<tr><td class="bold center" colspan="2">'+data["pname"]+'</td></tr>');
        mywindow.document.write('<tr><td class="center" colspan="2"><img src="'+data["pimg"]+'"/></td></tr>');
        mywindow.document.write('<tr><th>Quantity:</th><td>'+data["pquantity"]+'</td></tr>');
        mywindow.document.write('<tr><th>Price:</th><td>'+data["pprice"]+' SAR</td></tr>');
        mywindow.document.write('<tr><th>Amount:</th><td>'+data["pamount"]+' SAR</td></tr>');
        mywindow.document.write('<tr><th>Date:</th><td>'+today.toDateString()+' , '+today.getHours() + ':' + today.getMinutes()+'</td></tr>');
        mywindow.document.write('<tr><td colspan="2">For assistance please call our helpline 1789</td></tr>');
        mywindow.document.write('</table>');
        mywindow.document.write('</body></html>');
        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10
        mywindow.print();
        mywindow.close();
    }else if(data['ptype']==='double'){
        $('#double-product').modal('hide');
        data['pquantity']=$('#double-product').find('input[id="pquantity"]').val();
        data['p2quantity']=$('#double-product').find('input[id="p2quantity"]').val();
        data['pamount']=$('#double-product').find('input[id="pamount"]').val();
        data['p2amount']=$('#double-product').find('input[id="p2amount"]').val();
        data['p2img']=$('#double-product #p2img').attr('src');
        data['Total']=$('#double-product input[id="Total"]').val();
        var mywindow = window.open('', 'my div');
        mywindow.document.write('<html><head><title></title>');
        mywindow.document.write('<style>body{margin:10px 0px; font-size:7px;}.bold{font-weight:bold;}.center{text-align: center;}th{text-align: left;} table, td, th {border: none;  font-size:8px;}.detail-table td{padding:1px 5px;}.detail-table tr{margin:0;}.detail-table img{max-width:100%;height:150px;}</style>');
        mywindow.document.write('</head><body>');
        mywindow.document.write('<table class="detail-table">');
        mywindow.document.write('<tr><td class="" colspan="2"><img src="'+logo+'"/></td></tr>');
        mywindow.document.write('<tr><td class="bold center" colspan="2">'+data["pname"]+'</td></tr>');
        mywindow.document.write('<tr><td class="center" colspan="2"><img src="'+data["pimg"]+'"/></td></tr>');
        mywindow.document.write('<tr><th>Quantity:</th><td>'+data["pquantity"]+'</td></tr>');
        mywindow.document.write('<tr><th>Price:</th><td>'+data["pprice"]+' SAR</td></tr>');
        mywindow.document.write('<tr><th>Amount:</th><td>'+data["pamount"]+' SAR</td></tr>');
        mywindow.document.write('<tr><td class="center" colspan="2">------------------------------------------------------------------------------</td></tr>');
        mywindow.document.write('<tr><td class="bold center" colspan="2">'+data["p2name"]+'</td></tr>');
        mywindow.document.write('<tr><td class="center" colspan="2"><img src="'+data["p2img"]+'"/></td></tr>');
        mywindow.document.write('<tr><th>Quantity:</th><td>'+data["p2quantity"]+'</td></tr>');
        mywindow.document.write('<tr><th>Price:</th><td>'+data["p2price"]+' SAR</td></tr>');
        mywindow.document.write('<tr><th>Amount:</th><td>'+data["p2amount"]+' SAR</td></tr>');
        mywindow.document.write('<tr><th>Total Amount:</th><td>'+data["Total"]+' SAR</td></tr>');
        mywindow.document.write('<tr><th>Date:</th><td>'+today.toDateString()+' , '+today.getHours() + ':' + today.getMinutes()+'</td></tr>');
        mywindow.document.write('<tr><td colspan="2">For assistance please call our helpline 1789</td></tr>');
        mywindow.document.write('</table>');
        mywindow.document.write('</body></html>');
        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10
        mywindow.print();
        mywindow.close();
    }
});




