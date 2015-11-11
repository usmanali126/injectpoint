/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    var area_no;
    add_datepicker();
    active_li();
    $('.inject_date').each(function () {
        if (!($(this).empty())) {
            alert($(this).html());
        }
    });
    daily_sum();
    $('.card-no').on('click', function () {
        //alert($(this).text());
        // $_POST['card']='card';
        $.ajax({
            url: 'areareport.php',
            type: 'POST',
            data: {card: 'card'},
            success: function (result) {
                alert('enter');
                //window.location.replace("record.php");
            }
        });

    });
    
    
    
$(".resutl tr").each(function(){
   var date1= $(this).children(".date1").text();
    $(this).find(".date2").each(function(){
	var date2=$(this).text();
     var days=date_diff(date1,date2);   
	//console.log($(this).text());
    //console.log(date1);
    //console.log(days);
        if(days>0){
            if(days>=44){
            $(this).addClass("over");
            }else if(days>=40){
           $(this).addClass("over");
            }else{
                 $(this).addClass("under");
            }
        }
    });
});


//for tabs
//    $('#myTabs a').click(function (e) {
//        e.preventDefault()
//        $(this).tab('show')
//    });
});
//ajax for getting mother's data
$('#m_card1').on('blur', function () {
    if ($(this).val() ==='') {
        //alert('zero');
        $('#mname').val('').removeAttr("readonly", "");
        $('#fname').val('').removeAttr("readonly", "");
        $('#c_cell').val('').removeAttr("readonly", "");
        $('#address1').val('').removeAttr("readonly", "");
        $('#u_council1').removeAttr("readonly", "");
        $('#area1').removeAttr("readonly", "");
        $('#submit1').val('Submit');
    } else {
        var card_no = $(this).val();
        //alert(card_no);
        $.ajax({
            url: 'classes/inject_record.php',
            type: 'POST',
            data: {mcard: card_no},
            success: function (result) {
                area1 = jQuery.extend(true, {}, result[0]);
                var result = jQuery.parseJSON(result);
                //var num_row = result.length;
                //console.log(num_row);
                $('#mname').val(result[1]).attr("readonly", "");
                $('#fname').val(result[2]).attr("readonly", "");
                $('#c_cell').val(result[3]).attr("readonly", "");
                var uc = result[4];
                $('#u_council1 option[value="' + uc + '"]').attr("selected", "", "readonly", "");
                $('#u_council1').attr("readonly", "");
                area_no = result[5];
                get_area(uc);
                $('#address1').val(result[6]).attr("readonly", "");
                $('#submit1').val('Update');
            }
        });
    }
});


function date_diff(date1,date2){
    //alert(date1);
    //alert(date2);
var dateAr = date1.split('-');
var date1 = dateAr[1] + ' ' + dateAr[0] + ' ' + dateAr[2];
var dateAr = date2.split('-');
var date2 = dateAr[1] + ' ' + dateAr[0] + ' ' + dateAr[2];
//console.log(date1);
//alert(date2);
var d = Date.parse(date2) - Date.parse(date1);
//var d = new Date(date2) - new Date(date1);
//var d = Date.parse(date2);
//alert(d);
var minutes = 1000 * 60;
var hours = minutes * 60;
var days = hours * 24;
var years = days * 365;

var y = Math.round(d / days);
    return y;
//alert(y);
//$(".diff").text(y);
}

$('#ccard').blur(function () {
    //alert(area_no);
    $('#area1 option[value="' + area_no + '"]').attr("selected", "");
     if ($('#m_card1').val() !=='') {
         $('#area1').attr("readonly", "");
     }
    
//    $('#area1 option').each(function(){
//                console.log($(this).val());
////                if($(this).val()==uc){
////                    $(this).attr("selected","");
////                }
//            });
});

//ajax for getting area of the selected union
$('.u_council').on('change', function () {

    //area_list(id);
    //var id = $('option:selected').val();
    var id = $(this).children('option:selected').val();
    //alert(id);
    //exit();
    //$('.option').remove();
    get_area(id);
});
//var dat=$('#u_council option:selected').val();
//alert(dat);

function area_list(id) {
    //alert(id);
}


function add_datepicker() {
    $(".date-picker").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "c-10:c+10",
        //dateFormat: 'yy-mm-dd'
        dateFormat: 'dd-mm-yy'
    });
}

function active_li() {
    //jquery
    //$(location).attr('href');
    //alert($(location).attr('href'));
    //pure javascript
    var pathname = window.location.pathname;
    var filename = pathname.split('/');

    var index = filename.length;
    //alert(--index);
    index = --index;
    $('.nav').children('li').each(function () {
        var href = $(this).children('a').attr('href');
        if (href === filename[index]) {
            $(this).addClass('active');
            // console.log(href);
        }
    });
}

function daily_sum() {
    //console.log('enter');
    var s_date = $('.selected_date').text();
    //alert(s_date);
    $('.result').each('tr', function () {
        $(this).each('td', function () {
            //var s_date= $('.Selected_date').text();
            var td_val = $(this).text();
            console.log(td_val);
            console.log('enter');
        });

    });
}

function get_area(id) {
    $('.option').remove();
    $.ajax({
        url: 'classes/inject_record.php',
        type: 'POST',
        //data: $('option:selected').val(),
        data: {id: id},
        success: function (result) {
            //$("#mydiv").append(html);
            //var result=JSON.parse(data);
            var result = jQuery.parseJSON(result);
            //console.log(result.adeel[0]);
            var num_row = result.length;
            //console.log(num_row);
            //console.log(result[0][2]);
            $('.option').remove();
            var i = 0;
            while (i < num_row) {
                //$('#area').html('<option>'+result[i][0]+'</option>');
                //$().text();
                $('<option class="option" value="' + result[i][0] + '">' + result[i][0] + ' | ' + result[i][1] + '</option>').appendTo('.area');
                //$('<option class="option" value="' + result[i][0] + '">' + result[i][0] + ' | ' + result[i][2] + '</option>').appendTo('.hwname');
                //console.log(result[i][0]);
                //console.log(result[i][1]);
                //console.log(result[i][2]);
                i++;
            }
//        console.log(result.length);

            return 0;
        }
    });
}