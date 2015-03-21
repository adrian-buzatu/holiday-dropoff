function addCamptoBasket_old(campid, campprice, obj, extra, chkallsel)
{
    //alert(extra);
    // start new code - 16-6-12
//    var chldiD = extra;
//    var check_exist = 0;
//    var check_priority = 0;
//    var varsinglechildTotalprice = 'txt_children_tmp_value_' + chldiD;
//    //alert(varsinglechildTotalprice);
//    var singlechildTotalprice = document.getElementById(varsinglechildTotalprice).value;
//
//    var children_prior_1 = document.getElementById("txt_children_tmp_1").value;
//    var children_prior_2 = document.getElementById("txt_children_tmp_2").value;
//    var children_prior_3 = document.getElementById("txt_children_tmp_3").value;
//
//    if (children_prior_1 == chldiD) {
//        //document.getElementById("txt_children_tmp_2").value = chldiD;
//        check_exist = 1;
//    } else if (children_prior_2 == chldiD) {
//        check_exist = 1;
//    } else if (children_prior_3 == chldiD) {
//        check_exist = 1;
//    }
//    if (check_exist == 0) {
//        if (children_prior_1 == 0) {
//            if (children_prior_2 != 0) {
//                document.getElementById("txt_children_tmp_1").value = children_prior_2;
//                if (children_prior_3 != 0) {
//                    document.getElementById("txt_children_tmp_2").value = children_prior_3;
//                    document.getElementById("txt_children_tmp_3").value = chldiD;
//                } else {
//                    document.getElementById("txt_children_tmp_2").value = chldiD;
//                }
//                //document.getElementById("txt_children_tmp_2").value = chldiD;
//            } else if (children_prior_3 != 0) {
//                document.getElementById("txt_children_tmp_1").value = children_prior_3;
//                document.getElementById("txt_children_tmp_2").value = chldiD;
//            } else {
//                document.getElementById("txt_children_tmp_1").value = chldiD;
//            }
//        }
//        else if (children_prior_2 == 0) {
//            if (children_prior_3 != 0) {
//                document.getElementById("txt_children_tmp_2").value = children_prior_3;
//                document.getElementById("txt_children_tmp_3").value = chldiD;
//            } else {
//                document.getElementById("txt_children_tmp_2").value = chldiD;
//            }
//        }
//        else if (children_prior_3 == 0) {
//            document.getElementById("txt_children_tmp_3").value = chldiD;
//        }
//    }
//    // end new code - 16-6-12
//    //alert(campid);alert(campprice);
//    //alert(extra);
//    var p = document.getElementById("txttotal_price").value;
//    // start new code - 14-6-12
//    var varsinglechildTotalprice = 'txt_children_tmp_value_' + extra;
//    var singlechildTotalprice = document.getElementById(varsinglechildTotalprice).value;
//
//    var children_prior_1 = document.getElementById("txt_children_tmp_1").value;
//    var children_prior_2 = document.getElementById("txt_children_tmp_2").value;
//    var children_prior_3 = document.getElementById("txt_children_tmp_3").value;
//    // end new code - 14-6-12
//    var pp = 0;
//    var chkobj1, chk, chkid, chkvalue = 0;
//    if (obj.checked)
//    {
//        p = p * 1 + campprice * 1;
//        //alert('checked');
//        // start new code - 14-6-12
//        singlechildTotalprice = singlechildTotalprice * 1 + campprice * 1;
//        // end new code - 14-6-12
//    } else {
//        //alert('unchecked');
//        p = p * 1 - campprice * 1;
//        // start new code - 14-6-12
//        singlechildTotalprice = singlechildTotalprice * 1 - campprice * 1;
//        // end new code - 14-6-12
//    }
//    // start new code 12-6-12 
//    if (extra != '') {
//        //chk = 'all_select_camps_'+extra+'_CHK';
//        //chkid = 'all_select_camps_'+extra;
//        chk = 'all_select_camps_' + chkallsel + '_CHK';
//        chkid = 'all_select_camps_' + chkallsel;
//        //alert(chkid);
//        chkvalue = document.getElementById(chkid).value;
//        chkobj1 = document.getElementById(chk);
//        if (chkobj1.checked) {
//            p = chkvalue * 1 + p * 1;
//            // start new code - 14-6-12
//            singlechildTotalprice = chkvalue * 1 + singlechildTotalprice * 1;
//            // end new code - 14-6-12
//            chkobj1.checked = false;
//        }
//    }
//    // end new code 12-6-12 
//    // start new code - 14-6-12
//    document.getElementById(varsinglechildTotalprice).value = singlechildTotalprice;
//    // end new code - 14-6-12
//    //alert(p);
//    // start new code - 14-6-12
//    //singlechildTotalprice = singlechildTotalprice*1 +  campprice*1;
//    // end new code - 14-6-12
//    document.getElementById("txttotal_price").value = p;
//    //document.getElementById("total_price").innerHTML = 'Total Charge: &pound;'+p;
//    //document.getElementById("total_price1").innerHTML = 'Total Charge: &pound;'+p;
//    ////////////////////////////////////////////////////
//
//    ////////////////////////////////////////////////////
//    // start new code - 16-6-12		
//    var children_total_price_1 = 0;
//    var children_EXTtotal_price_1 = 0;
//    var children_total_price_2 = 0;
//    var children_EXTtotal_price_2 = 0;
//    var children_total_price_3 = 0;
//    var children_EXTtotal_price_3 = 0;
//    var children_prior_1 = document.getElementById("txt_children_tmp_1").value;
//    var children_prior_2 = document.getElementById("txt_children_tmp_2").value;
//    var children_prior_3 = document.getElementById("txt_children_tmp_3").value;
//    //alert(children_prior_1);
//    if (children_prior_1 != 0) {
//        var varchildren_total_price_1 = 'txt_children_tmp_value_' + children_prior_1;
//        children_total_price_1 = document.getElementById(varchildren_total_price_1).value;
//
//        var varchildren_EXTtotal_price_1 = 'txt_children_tmpEXT_value_' + children_prior_1;
//        children_EXTtotal_price_1 = document.getElementById(varchildren_EXTtotal_price_1).value;
//    }
//
//
//    if (children_prior_2 != 0) {
//        var varchildren_total_price_2 = 'txt_children_tmp_value_' + children_prior_2;
//        children_total_price_2 = document.getElementById(varchildren_total_price_2).value;
//
//        var varchildren_EXTtotal_price_2 = 'txt_children_tmpEXT_value_' + children_prior_2;
//        children_EXTtotal_price_2 = document.getElementById(varchildren_EXTtotal_price_2).value;
//    }
//
//
//    if (children_prior_3 != 0) {
//        var varchildren_total_price_3 = 'txt_children_tmp_value_' + children_prior_3;
//        var children_total_price_3 = document.getElementById(varchildren_total_price_3).value;
//
//        var varchildren_EXTtotal_price_3 = 'txt_children_tmpEXT_value_' + children_prior_3;
//        children_EXTtotal_price_3 = document.getElementById(varchildren_EXTtotal_price_3).value;
//    }
//    //alert(varchildren_total_price_1);
//
//    var totalEXTPrice = children_EXTtotal_price_1 * 1 + children_EXTtotal_price_2 * 1 + children_EXTtotal_price_3 * 1;
//
//
//    var singlechildTotalprice = document.getElementById(varsinglechildTotalprice).value;
//
//    var child_prices_test_1 = children_total_price_1;
//    var child_prices_test_2 = children_total_price_2 * 1 - (children_total_price_2 * 0.25);
//    var child_prices_test_3 = children_total_price_3 * 1 - (children_total_price_3 * 0.50);
//    var tot_price_of_children = child_prices_test_1 * 1 + child_prices_test_2 * 1 + child_prices_test_3 * 1 + totalEXTPrice * 1;
//    /*	alert('CHildren 1:'+child_prices_test_1);
//     alert('CHildren 2:'+child_prices_test_2);
//     alert('CHildren 3:'+child_prices_test_3);
//     alert('CHildrens total:'+tot_price_of_children);*/
//
//    //document.getElementById("total_price").innerHTML = 'Total Charge:'+tot_price_of_children;
//    //document.getElementById("total_price1").innerHTML = 'Total Charge:'+tot_price_of_children; 
//    document.getElementById("total_price").innerHTML = 'Total Charge:' + tot_price_of_children.toFixed(2);
//    document.getElementById("total_price1").innerHTML = 'Total Charge:' + tot_price_of_children.toFixed(2);
//    // end new code - 16-6-12
//    //swap_children();
//    // new code - 20-6-12
//    // start new code - 14-6-12		
//    var children_total_price_1 = 0;
//    var children_EXTtotal_price_1 = 0;
//    var children_total_price_2 = 0;
//    var children_EXTtotal_price_2 = 0;
//    var children_total_price_3 = 0;
//    var children_EXTtotal_price_3 = 0;
//    var children_prior_1 = document.getElementById("txt_children_tmp_1").value;
//    var children_prior_2 = document.getElementById("txt_children_tmp_2").value;
//    var children_prior_3 = document.getElementById("txt_children_tmp_3").value;
//    //alert(children_prior_1);
//    if (children_prior_1 != 0) {
//        var varchildren_total_price_1 = 'txt_children_tmp_value_' + children_prior_1;
//        children_total_price_1 = document.getElementById(varchildren_total_price_1).value;
//
//        var varchildren_EXTtotal_price_1 = 'txt_children_tmpEXT_value_' + children_prior_1;
//        children_EXTtotal_price_1 = document.getElementById(varchildren_EXTtotal_price_1).value;
//    }
//
//
//    if (children_prior_2 != 0) {
//        var varchildren_total_price_2 = 'txt_children_tmp_value_' + children_prior_2;
//        children_total_price_2 = document.getElementById(varchildren_total_price_2).value;
//
//        var varchildren_EXTtotal_price_2 = 'txt_children_tmpEXT_value_' + children_prior_2;
//        children_EXTtotal_price_2 = document.getElementById(varchildren_EXTtotal_price_2).value;
//    }
//
//
//    if (children_prior_3 != 0) {
//        var varchildren_total_price_3 = 'txt_children_tmp_value_' + children_prior_3;
//        var children_total_price_3 = document.getElementById(varchildren_total_price_3).value;
//
//        var varchildren_EXTtotal_price_3 = 'txt_children_tmpEXT_value_' + children_prior_3;
//        children_EXTtotal_price_3 = document.getElementById(varchildren_EXTtotal_price_3).value;
//    }
//    //alert(varchildren_total_price_1);
//
//
//    var totalEXTPrice = children_EXTtotal_price_1 * 1 + children_EXTtotal_price_2 * 1 + children_EXTtotal_price_3 * 1;
//
//    var singlechildTotalprice = document.getElementById(varsinglechildTotalprice).value;
//
//    var child_prices_test_1 = children_total_price_1;
//    var child_prices_test_2 = children_total_price_2 * 1 - (children_total_price_2 * 0.25);
//    var child_prices_test_3 = children_total_price_3 * 1 - (children_total_price_3 * 0.50);
//    var tot_price_of_children = child_prices_test_1 * 1 + child_prices_test_2 * 1 + child_prices_test_3 * 1 + totalEXTPrice * 1;
    /*alert('CHildren 1:'+child_prices_test_1);
     alert('CHildren 2:'+child_prices_test_2);
     alert('CHildren 3:'+child_prices_test_3);
     alert('CHildrens total:'+tot_price_of_children);*/

//    document.getElementById("total_price").innerHTML = 'Total Charge:' + tot_price_of_children.toFixed(2);
//    document.getElementById("total_price1").innerHTML = 'Total Charge:' + tot_price_of_children.toFixed(2);
    // end new code - 14-6-12
    // end code - 20-6-12
}
function addCamptoBasketEXT_old(campid, campprice, obj, chldID)
{
    //alert(chldID);
    // start new code - 16-6-12
    var chldiD = chldID;
    var check_exist = 0;
    var check_priority = 0;
    var varsinglechildTotalprice = 'txt_children_tmp_value_' + chldiD;
//		alert(varsinglechildTotalprice);
    var singlechildTotalprice = document.getElementById(varsinglechildTotalprice).value;

    var children_prior_1 = document.getElementById("txt_children_tmp_1").value;
    var children_prior_2 = document.getElementById("txt_children_tmp_2").value;
    var children_prior_3 = document.getElementById("txt_children_tmp_3").value;

    if (children_prior_1 == chldiD) {
        //document.getElementById("txt_children_tmp_2").value = chldiD;
        check_exist = 1;
    } else if (children_prior_2 == chldiD) {
        check_exist = 1;
    } else if (children_prior_3 == chldiD) {
        check_exist = 1;
    }
    if (check_exist == 0) {
        if (children_prior_1 == 0) {
            if (children_prior_2 != 0) {
                document.getElementById("txt_children_tmp_1").value = children_prior_2;
                if (children_prior_3 != 0) {
                    document.getElementById("txt_children_tmp_2").value = children_prior_3;
                    document.getElementById("txt_children_tmp_3").value = chldiD;
                } else {
                    document.getElementById("txt_children_tmp_2").value = chldiD;
                }
                //document.getElementById("txt_children_tmp_2").value = chldiD;
            } else if (children_prior_3 != 0) {
                document.getElementById("txt_children_tmp_1").value = children_prior_3;
                document.getElementById("txt_children_tmp_2").value = chldiD;
            } else {
                document.getElementById("txt_children_tmp_1").value = chldiD;
            }
        }
        else if (children_prior_2 == 0) {
            if (children_prior_3 != 0) {
                document.getElementById("txt_children_tmp_2").value = children_prior_3;
                document.getElementById("txt_children_tmp_3").value = chldiD;
            } else {
                document.getElementById("txt_children_tmp_2").value = chldiD;
            }
        }
        else if (children_prior_3 == 0) {
            document.getElementById("txt_children_tmp_3").value = chldiD;
        }
    }
    // end new code - 16-6-12
    //alert(campid);alert(campprice);
    // start new code - 14-6-12
    //alert(chldID);
    var varsinglechildTotalprice = 'txt_children_tmp_value_' + chldID;
    var varsinglechildEXTTotalprice = 'txt_children_tmpEXT_value_' + chldID;
    var singlechildTotalprice = document.getElementById(varsinglechildTotalprice).value;
    var singlechildEXTTotalprice = document.getElementById(varsinglechildEXTTotalprice).value;
    var varcheckboxall = 'checkBox_EXT_ALL_' + campid + '_' + chldID;
    var varcheckboxAllObj = document.getElementById(varcheckboxall);
    // end new code - 14-6-12
    var p = document.getElementById("txttotal_price").value;



    if (obj.checked)
    {
        p = p * 1 + campprice * 1;
        // start new code - 14-6-12
        //singlechildTotalprice = singlechildTotalprice*1 +  campprice*1;
        singlechildEXTTotalprice = singlechildEXTTotalprice * 1 + campprice * 1;
        varcheckboxAllObj.checked = false;
        // end new code - 14-6-12
        //alert('checked');
    } else {
        //alert('unchecked');
        p = p * 1 - campprice * 1;
        // start new code - 14-6-12
        //singlechildTotalprice = singlechildTotalprice*1 -  campprice*1;
        singlechildEXTTotalprice = singlechildEXTTotalprice * 1 - campprice * 1;
        varcheckboxAllObj.checked = false;
        // end new code - 14-6-12
    }
    p = p.toFixed(2);
    // start new code - 14-6-12
    document.getElementById(varsinglechildTotalprice).value = singlechildTotalprice;
    document.getElementById(varsinglechildEXTTotalprice).value = singlechildEXTTotalprice;
    // end new code - 14-6-12
    document.getElementById("txttotal_price").value = p;
    //document.getElementById("total_price").innerHTML = 'Total Charge: '+p;
    //document.getElementById("total_price1").innerHTML = 'Total Charge: '+p;
    ////////////////////////////////////////////////////
    // start new code - 16-6-12		
    var children_total_price_1 = 0;
    var children_EXTtotal_price_1 = 0;
    var children_total_price_2 = 0;
    var children_EXTtotal_price_2 = 0;
    var children_total_price_3 = 0;
    var children_EXTtotal_price_3 = 0;
    var children_prior_1 = document.getElementById("txt_children_tmp_1").value;
    var children_prior_2 = document.getElementById("txt_children_tmp_2").value;
    var children_prior_3 = document.getElementById("txt_children_tmp_3").value;
    //alert(children_prior_1);
    if (children_prior_1 != 0) {
        var varchildren_total_price_1 = 'txt_children_tmp_value_' + children_prior_1;
        children_total_price_1 = document.getElementById(varchildren_total_price_1).value;

        var varchildren_EXTtotal_price_1 = 'txt_children_tmpEXT_value_' + children_prior_1;
        children_EXTtotal_price_1 = document.getElementById(varchildren_EXTtotal_price_1).value;
    }


    if (children_prior_2 != 0) {
        var varchildren_total_price_2 = 'txt_children_tmp_value_' + children_prior_2;
        children_total_price_2 = document.getElementById(varchildren_total_price_2).value;

        var varchildren_EXTtotal_price_2 = 'txt_children_tmpEXT_value_' + children_prior_2;
        children_EXTtotal_price_2 = document.getElementById(varchildren_EXTtotal_price_2).value;
    }


    if (children_prior_3 != 0) {
        var varchildren_total_price_3 = 'txt_children_tmp_value_' + children_prior_3;
        var children_total_price_3 = document.getElementById(varchildren_total_price_3).value;

        var varchildren_EXTtotal_price_3 = 'txt_children_tmpEXT_value_' + children_prior_3;
        children_EXTtotal_price_3 = document.getElementById(varchildren_EXTtotal_price_3).value;
    }
    //alert(varchildren_total_price_1);


    var totalEXTPrice = children_EXTtotal_price_1 * 1 + children_EXTtotal_price_2 * 1 + children_EXTtotal_price_3 * 1;

    var singlechildTotalprice = document.getElementById(varsinglechildTotalprice).value;

    var child_prices_test_1 = children_total_price_1;
    var child_prices_test_2 = children_total_price_2 * 1 - (children_total_price_2 * 0.25);
    var child_prices_test_3 = children_total_price_3 * 1 - (children_total_price_3 * 0.50);
    var tot_price_of_children = child_prices_test_1 * 1 + child_prices_test_2 * 1 + child_prices_test_3 * 1 + totalEXTPrice * 1;
    /*	alert('CHildren 1:'+child_prices_test_1);
     alert('CHildren 2:'+child_prices_test_2);
     alert('CHildren 3:'+child_prices_test_3);
     alert('CHildrens total:'+tot_price_of_children);*/

    document.getElementById("total_price").innerHTML = 'Total Charge:' + tot_price_of_children.toFixed(2);
    document.getElementById("total_price1").innerHTML = 'Total Charge:' + tot_price_of_children.toFixed(2);
    // end new code - 16-6-12

}
function checkBox_select_old(ids, obj, allPrice, diffprice)
{
    // start new code - 16-6-12
    var chldiD = obj.value;
    var check_exist = 0;
    var check_priority = 0;
    var varsinglechildTotalprice = 'txt_children_tmp_value_' + chldiD;
    //alert(varsinglechildTotalprice);
    var singlechildTotalprice = document.getElementById(varsinglechildTotalprice).value;

    var children_prior_1 = document.getElementById("txt_children_tmp_1").value;
    var children_prior_2 = document.getElementById("txt_children_tmp_2").value;
    var children_prior_3 = document.getElementById("txt_children_tmp_3").value;

    if (children_prior_1 == chldiD) {
        //document.getElementById("txt_children_tmp_2").value = chldiD;
        check_exist = 1;
    } else if (children_prior_2 == chldiD) {
        check_exist = 1;
    } else if (children_prior_3 == chldiD) {
        check_exist = 1;
    }
    if (check_exist == 0) {
        if (children_prior_1 == 0) {
            if (children_prior_2 != 0) {
                document.getElementById("txt_children_tmp_1").value = children_prior_2;
                if (children_prior_3 != 0) {
                    document.getElementById("txt_children_tmp_2").value = children_prior_3;
                    document.getElementById("txt_children_tmp_3").value = chldiD;
                } else {
                    document.getElementById("txt_children_tmp_2").value = chldiD;
                }
                //document.getElementById("txt_children_tmp_2").value = chldiD;
            } else if (children_prior_3 != 0) {
                document.getElementById("txt_children_tmp_1").value = children_prior_3;
                document.getElementById("txt_children_tmp_2").value = chldiD;
            } else {
                document.getElementById("txt_children_tmp_1").value = chldiD;
            }
        }
        else if (children_prior_2 == 0) {
            if (children_prior_3 != 0) {
                document.getElementById("txt_children_tmp_2").value = children_prior_3;
                document.getElementById("txt_children_tmp_3").value = chldiD;
            } else {
                document.getElementById("txt_children_tmp_2").value = chldiD;
            }
        }
        else if (children_prior_3 == 0) {
            document.getElementById("txt_children_tmp_3").value = chldiD;
        }
    }
    // end new code - 16-6-12

    // start new code - 14-6-12
    //alert(obj.value);
    var test123 = false;
    var varsinglechildTotalprice = 'txt_children_tmp_value_' + obj.value;
    var singlechildTotalprice = document.getElementById(varsinglechildTotalprice).value;
    // end new code - 14-6-12

    //alert("hello");
    var p = document.getElementById("txttotal_price").value;
    var pTotal = 0;
    var a2 = new Array();
    var a3 = new Array();
    a2 = ids.split(",");
    //alert(a1);
    for (i = 0; i < a2.length; i++) {
        //string = string + "<br>" + a1[i];
        a3 = a2[i].split("_");
        chkID_tmp = 'checkBox_normal_' + a3[0]; //alert(tblID_tmp);
        // alert(chkID_tmp);
        chkObj = document.getElementById(chkID_tmp);
        //alert(chkObj);
        if (obj.checked) {
            if (chkObj != null) {
                if (!chkObj.checked)
                {
                    p = p * 1 + a3[1] * 1;
                    pTotal += a3[1] * 1;
                    // start new code - 14-6-12
                    singlechildTotalprice = singlechildTotalprice * 1 + a3[1] * 1;
                    // end new code - 14-6-12
                    //alert('checked');
                }
                chkObj.checked = true;
            }
        } else {
            test123 = true;
            if (chkObj != null) {
                if (chkObj.checked)
                {
                    p = p * 1 - a3[1] * 1;
                    // start new code - 14-6-12
                    singlechildTotalprice = singlechildTotalprice * 1 - a3[1] * 1;
                    // end new code - 14-6-12
                    //alert('checked');
                }
                chkObj.checked = false;
            }
        }
    }

    // start new code - 11-6-12
    //alert(pTotal);
    if (diffprice != null) {
        if (allPrice != 0) {
            if (obj.checked) {
                //p = (document.getElementById("txttotal_price").value)*1 + allPrice*1 - pTotal*1;
                p = p * 1 - diffprice * 1;
                // start new code - 15 -6-12
                //alert('before diff1 : '+singlechildTotalprice);
                singlechildTotalprice = singlechildTotalprice * 1 - diffprice * 1;
                ;
                //alert('after diff : '+singlechildTotalprice);
                // start new code - 15-6-12
            } else {

                // start new code - 15 -6-12
                //alert('before diff : '+singlechildTotalprice);
                singlechildTotalprice = singlechildTotalprice * 1 + diffprice * 1;
                ;
                //alert('after diff : '+singlechildTotalprice);
                // start new code - 15-6-12
                p = (document.getElementById("txttotal_price").value) * 1 - allPrice * 1;
            }
        }
    } else {
        diffprice = 0;
    }
    // end new code - 11-6-12
    //alert(diffprice);
    //alert(p);
    // start new code - 14-6-12
    //alert(singlechildTotalprice);
    //alert(varsinglechildTotalprice);
    document.getElementById(varsinglechildTotalprice).value = singlechildTotalprice * 1;

    // end new code - 14-6-12
    document.getElementById("txttotal_price").value = p;
    //document.getElementById("total_price").innerHTML = 'Total Charge:'+p;
    //document.getElementById("total_price1").innerHTML = 'Total Charge:'+p;
    // start new code - 14-6-12		
    var children_total_price_1 = 0;
    var children_EXTtotal_price_1 = 0;
    var children_total_price_2 = 0;
    var children_EXTtotal_price_2 = 0;
    var children_total_price_3 = 0;
    var children_EXTtotal_price_3 = 0;
    var children_prior_1 = document.getElementById("txt_children_tmp_1").value;
    var children_prior_2 = document.getElementById("txt_children_tmp_2").value;
    var children_prior_3 = document.getElementById("txt_children_tmp_3").value;
    //alert(children_prior_1);
    if (children_prior_1 != 0) {
        var varchildren_total_price_1 = 'txt_children_tmp_value_' + children_prior_1;
        children_total_price_1 = document.getElementById(varchildren_total_price_1).value;

        var varchildren_EXTtotal_price_1 = 'txt_children_tmpEXT_value_' + children_prior_1;
        children_EXTtotal_price_1 = document.getElementById(varchildren_EXTtotal_price_1).value;
    }


    if (children_prior_2 != 0) {
        var varchildren_total_price_2 = 'txt_children_tmp_value_' + children_prior_2;
        children_total_price_2 = document.getElementById(varchildren_total_price_2).value;

        var varchildren_EXTtotal_price_2 = 'txt_children_tmpEXT_value_' + children_prior_2;
        children_EXTtotal_price_2 = document.getElementById(varchildren_EXTtotal_price_2).value;
    }


    if (children_prior_3 != 0) {
        var varchildren_total_price_3 = 'txt_children_tmp_value_' + children_prior_3;
        var children_total_price_3 = document.getElementById(varchildren_total_price_3).value;

        var varchildren_EXTtotal_price_3 = 'txt_children_tmpEXT_value_' + children_prior_3;
        children_EXTtotal_price_3 = document.getElementById(varchildren_EXTtotal_price_3).value;
    }
    //alert(varchildren_total_price_1);


    var totalEXTPrice = children_EXTtotal_price_1 * 1 + children_EXTtotal_price_2 * 1 + children_EXTtotal_price_3 * 1;

    var singlechildTotalprice = document.getElementById(varsinglechildTotalprice).value;

    var child_prices_test_1 = children_total_price_1;
    var child_prices_test_2 = children_total_price_2 * 1 - (children_total_price_2 * 0.25);
    var child_prices_test_3 = children_total_price_3 * 1 - (children_total_price_3 * 0.50);
    var tot_price_of_children = child_prices_test_1 * 1 + child_prices_test_2 * 1 + child_prices_test_3 * 1 + totalEXTPrice * 1;
    /*alert('CHildren 1:'+child_prices_test_1);
     alert('CHildren 2:'+child_prices_test_2);
     alert('CHildren 3:'+child_prices_test_3);
     alert('CHildrens total:'+tot_price_of_children);*/

    document.getElementById("total_price").innerHTML = 'Total Charge:' + tot_price_of_children.toFixed(2);
    document.getElementById("total_price1").innerHTML = 'Total Charge:' + tot_price_of_children.toFixed(2);
    // end new code - 14-6-12

    swap_children();
    // new code - 20-6-12
    // start new code - 14-6-12		
    var children_total_price_1 = 0;
    var children_EXTtotal_price_1 = 0;
    var children_total_price_2 = 0;
    var children_EXTtotal_price_2 = 0;
    var children_total_price_3 = 0;
    var children_EXTtotal_price_3 = 0;
    var children_prior_1 = document.getElementById("txt_children_tmp_1").value;
    var children_prior_2 = document.getElementById("txt_children_tmp_2").value;
    var children_prior_3 = document.getElementById("txt_children_tmp_3").value;
    //alert(children_prior_1);
    if (children_prior_1 != 0) {
        var varchildren_total_price_1 = 'txt_children_tmp_value_' + children_prior_1;
        children_total_price_1 = document.getElementById(varchildren_total_price_1).value;

        var varchildren_EXTtotal_price_1 = 'txt_children_tmpEXT_value_' + children_prior_1;
        children_EXTtotal_price_1 = document.getElementById(varchildren_EXTtotal_price_1).value;
    }


    if (children_prior_2 != 0) {
        var varchildren_total_price_2 = 'txt_children_tmp_value_' + children_prior_2;
        children_total_price_2 = document.getElementById(varchildren_total_price_2).value;

        var varchildren_EXTtotal_price_2 = 'txt_children_tmpEXT_value_' + children_prior_2;
        children_EXTtotal_price_2 = document.getElementById(varchildren_EXTtotal_price_2).value;
    }


    if (children_prior_3 != 0) {
        var varchildren_total_price_3 = 'txt_children_tmp_value_' + children_prior_3;
        var children_total_price_3 = document.getElementById(varchildren_total_price_3).value;

        var varchildren_EXTtotal_price_3 = 'txt_children_tmpEXT_value_' + children_prior_3;
        children_EXTtotal_price_3 = document.getElementById(varchildren_EXTtotal_price_3).value;
    }
    //alert(varchildren_total_price_1);


    var totalEXTPrice = children_EXTtotal_price_1 * 1 + children_EXTtotal_price_2 * 1 + children_EXTtotal_price_3 * 1;

    var singlechildTotalprice = document.getElementById(varsinglechildTotalprice).value;

    var child_prices_test_1 = children_total_price_1;
    var child_prices_test_2 = children_total_price_2 * 1 - (children_total_price_2 * 0.25);
    var child_prices_test_3 = children_total_price_3 * 1 - (children_total_price_3 * 0.50);
    var tot_price_of_children = child_prices_test_1 * 1 + child_prices_test_2 * 1 + child_prices_test_3 * 1 + totalEXTPrice * 1;
    /*alert('CHildren 1:'+child_prices_test_1);
     alert('CHildren 2:'+child_prices_test_2);
     alert('CHildren 3:'+child_prices_test_3);
     alert('CHildrens total:'+tot_price_of_children);*/

    document.getElementById("total_price").innerHTML = 'Total Charge:' + tot_price_of_children.toFixed(2);
    document.getElementById("total_price1").innerHTML = 'Total Charge:' + tot_price_of_children.toFixed(2);
    // end new code - 14-6-12
    // end code - 20-6-12
}

function checkBoxEXT_select_old(ids, obj, allPrice, diffprice)
{
    // start new code - 16-6-12
    var chldiD = obj.value;
    var check_exist = 0;
    var check_priority = 0;
    var varsinglechildTotalprice = 'txt_children_tmp_value_' + chldiD;
    var singlechildTotalprice = document.getElementById(varsinglechildTotalprice).value;
    var varsinglechildEXTTotalprice = 'txt_children_tmpEXT_value_' + chldiD;
    var singlechildEXTTotalprice = document.getElementById(varsinglechildEXTTotalprice).value;

    var children_prior_1 = document.getElementById("txt_children_tmp_1").value;
    var children_prior_2 = document.getElementById("txt_children_tmp_2").value;
    var children_prior_3 = document.getElementById("txt_children_tmp_3").value;

    if (children_prior_1 == chldiD) {
        //document.getElementById("txt_children_tmp_2").value = chldiD;
        check_exist = 1;
    } else if (children_prior_2 == chldiD) {
        check_exist = 1;
    } else if (children_prior_3 == chldiD) {
        check_exist = 1;
    }
    if (check_exist == 0) {
        if (children_prior_1 == 0) {
            if (children_prior_2 != 0) {
                document.getElementById("txt_children_tmp_1").value = children_prior_2;
                if (children_prior_3 != 0) {
                    document.getElementById("txt_children_tmp_2").value = children_prior_3;
                    document.getElementById("txt_children_tmp_3").value = chldiD;
                } else {
                    document.getElementById("txt_children_tmp_2").value = chldiD;
                }
                //document.getElementById("txt_children_tmp_2").value = chldiD;
            } else if (children_prior_3 != 0) {
                document.getElementById("txt_children_tmp_1").value = children_prior_3;
                document.getElementById("txt_children_tmp_2").value = chldiD;
            } else {
                document.getElementById("txt_children_tmp_1").value = chldiD;
            }
        }
        else if (children_prior_2 == 0) {
            if (children_prior_3 != 0) {
                document.getElementById("txt_children_tmp_2").value = children_prior_3;
                document.getElementById("txt_children_tmp_3").value = chldiD;
            } else {
                document.getElementById("txt_children_tmp_2").value = chldiD;
            }
        }
        else if (children_prior_3 == 0) {
            document.getElementById("txt_children_tmp_3").value = chldiD;
        }
    }
    // end new code - 16-6-12

    // start new code - 14-6-12
    //alert(obj.value);
    var test123 = false;
    var varsinglechildTotalprice = 'txt_children_tmp_value_' + obj.value;
    var singlechildTotalprice = document.getElementById(varsinglechildTotalprice).value;
    // end new code - 14-6-12

    //alert("hello");
    var p = document.getElementById("txttotal_price").value;
    var pTotal = 0;
    var a2 = new Array();
    var a3 = new Array();
    a2 = ids.split(",");
    //alert(a1);
    for (i = 0; i < a2.length; i++) {
        //string = string + "<br>" + a1[i];
        a3 = a2[i].split("_");
        chkID_tmp = 'checkBox_normal_' + a3[0]; //alert(tblID_tmp);
        // alert(chkID_tmp);
        chkObj = document.getElementById(chkID_tmp);
        //alert(chkObj);
        if (obj.checked) {
            if (chkObj != null) {
                if (!chkObj.checked)
                {
                    p = p * 1 + a3[1] * 1;
                    pTotal += a3[1] * 1;
                    // start new code - 14-6-12
                    singlechildEXTTotalprice = singlechildEXTTotalprice * 1 + a3[1] * 1;
                    //singlechildTotalprice = singlechildTotalprice*1 + a3[1]*1;
                    // end new code - 14-6-12
                    //alert('checked');
                }
                chkObj.checked = true;
            }
        } else {
            test123 = true;
            if (chkObj != null) {
                if (chkObj.checked)
                {
                    p = p * 1 - a3[1] * 1;
                    // start new code - 14-6-12
                    singlechildEXTTotalprice = singlechildEXTTotalprice * 1 - a3[1] * 1;
                    //singlechildTotalprice = singlechildTotalprice*1 - a3[1]*1;
                    // end new code - 14-6-12
                    //alert('checked');
                }
                chkObj.checked = false;
            }
        }
    }

    // start new code - 11-6-12
    //alert(pTotal);
    if (diffprice != null) {
        if (allPrice != 0) {
            if (obj.checked) {
                //p = (document.getElementById("txttotal_price").value)*1 + allPrice*1 - pTotal*1;
                p = p * 1 - diffprice * 1;
                // start new code - 15 -6-12
                //alert('before diff1 : '+singlechildTotalprice);
                //singlechildTotalprice = singlechildTotalprice*1 - diffprice*1 ;
                singlechildEXTTotalprice = singlechildEXTTotalprice * 1 - diffprice * 1;
                //alert('after diff : '+singlechildTotalprice);
                // start new code - 15-6-12
            } else {

                // start new code - 15 -6-12
                //alert('before diff : '+singlechildTotalprice);
                //singlechildTotalprice = singlechildTotalprice*1 + diffprice*1 ;;
                singlechildEXTTotalprice = singlechildEXTTotalprice * 1 + diffprice * 1;
                //alert('after diff : '+singlechildTotalprice);
                // start new code - 15-6-12
                p = (document.getElementById("txttotal_price").value) * 1 - allPrice * 1;
            }
        }
    } else {
        diffprice = 0;
    }
    // end new code - 11-6-12
    //alert(diffprice);
    //alert(p);
    // start new code - 14-6-12
    //alert(singlechildTotalprice);
    //alert(varsinglechildTotalprice);
    document.getElementById(varsinglechildTotalprice).value = singlechildTotalprice * 1;
    document.getElementById(varsinglechildEXTTotalprice).value = singlechildEXTTotalprice * 1;

    // end new code - 14-6-12
    document.getElementById("txttotal_price").value = p;
    //document.getElementById("total_price").innerHTML = 'Total Charge:'+p;
    //document.getElementById("total_price1").innerHTML = 'Total Charge:'+p;
    // start new code - 14-6-12		
    var children_total_price_1 = 0;
    var children_EXTtotal_price_1 = 0;
    var children_total_price_2 = 0;
    var children_EXTtotal_price_2 = 0;
    var children_total_price_3 = 0;
    var children_EXTtotal_price_3 = 0;
    var children_prior_1 = document.getElementById("txt_children_tmp_1").value;
    var children_prior_2 = document.getElementById("txt_children_tmp_2").value;
    var children_prior_3 = document.getElementById("txt_children_tmp_3").value;
    //alert(children_prior_1);
    if (children_prior_1 != 0) {
        var varchildren_total_price_1 = 'txt_children_tmp_value_' + children_prior_1;
        children_total_price_1 = document.getElementById(varchildren_total_price_1).value;

        var varchildren_EXTtotal_price_1 = 'txt_children_tmpEXT_value_' + children_prior_1;
        children_EXTtotal_price_1 = document.getElementById(varchildren_EXTtotal_price_1).value;
    }


    if (children_prior_2 != 0) {
        var varchildren_total_price_2 = 'txt_children_tmp_value_' + children_prior_2;
        children_total_price_2 = document.getElementById(varchildren_total_price_2).value;

        var varchildren_EXTtotal_price_2 = 'txt_children_tmpEXT_value_' + children_prior_2;
        children_EXTtotal_price_2 = document.getElementById(varchildren_EXTtotal_price_2).value;
    }


    if (children_prior_3 != 0) {
        var varchildren_total_price_3 = 'txt_children_tmp_value_' + children_prior_3;
        var children_total_price_3 = document.getElementById(varchildren_total_price_3).value;

        var varchildren_EXTtotal_price_3 = 'txt_children_tmpEXT_value_' + children_prior_3;
        children_EXTtotal_price_3 = document.getElementById(varchildren_EXTtotal_price_3).value;
    }
    //alert(varchildren_total_price_1);


    var totalEXTPrice = children_EXTtotal_price_1 * 1 + children_EXTtotal_price_2 * 1 + children_EXTtotal_price_3 * 1;

    var singlechildTotalprice = document.getElementById(varsinglechildTotalprice).value;

    var child_prices_test_1 = children_total_price_1;
    var child_prices_test_2 = children_total_price_2 * 1 - (children_total_price_2 * 0.25);
    var child_prices_test_3 = children_total_price_3 * 1 - (children_total_price_3 * 0.50);
    var tot_price_of_children = child_prices_test_1 * 1 + child_prices_test_2 * 1 + child_prices_test_3 * 1 + totalEXTPrice * 1;
    /*alert('CHildren 1:'+child_prices_test_1);
     alert('CHildren 2:'+child_prices_test_2);
     alert('CHildren 3:'+child_prices_test_3);
     alert('CHildrens total:'+tot_price_of_children);*/

    document.getElementById("total_price").innerHTML = 'Total Charge:' + tot_price_of_children.toFixed(2);
    document.getElementById("total_price1").innerHTML = 'Total Charge:' + tot_price_of_children.toFixed(2);
    // end new code - 14-6-12
}

function show_Childrens_area(id, obj)
{
    var tblID = 'Childrens_area_' + id;
    var tblID_tmp = '';
    var total_childrens = document.getElementById("total_childrens").value;
    total_childrens = total_childrens.trim();
    var a1 = new Array();
    a1 = total_childrens.split(",");
    //alert(a1);
    for (i = 0; i < a1.length; i++) {
        //string = string + "<br>" + a1[i];
        tblID_tmp = 'Childrens_area_' + a1[i]; //alert(tblID_tmp);
        document.getElementById(tblID_tmp).style.display = 'none';
    }

    document.getElementById(tblID).style.display = 'block';
    //	alert( document.getElementById('select_children').options[document.getElementById('select_children').selectedIndex].text );

    //document.getElementById("children_name").innerHTML = 'Select Camps for - ' + document.getElementById('select_children').options[document.getElementById('select_children').selectedIndex].text ;

}
function addChild()
{
    if (document.getElementById("new_child").style.display == '') {
        // start new code 30-6-12
        document.getElementById("addfrndmsg").innerHTML = 'You have <span>cancelled</span> to add friend';
        // start new code 30-6-12
        document.getElementById("add_children").value = 0;
        document.getElementById("new_child").style.display = 'none';
        document.getElementById("newtbl123").style.display = 'none';
    } else {
        // start new code 30-6-12
        document.getElementById("addfrndmsg").innerHTML = 'You have <span>selected</span> to add friend';
        // start new code 30-6-12
        document.getElementById("add_children").value = 1;
        document.getElementById("new_child").style.display = '';
        document.getElementById("newtbl123").style.display = '';
    }
    var have_child_friend = document.getElementById("add_children").value;
    jQuery('#mainbkdiv').show();
    jQuery('#divmsg').show();
    jQuery.post("cart_total.php", "&hv_chld_frnd=" + have_child_friend + "&action=set_image_session", function(results) {
        jQuery('#total_price').html(results);
        jQuery('#total_price1').html(results);
        jQuery('#mainbkdiv').hide();
        jQuery('#divmsg').hide();
    });
    return false;
}
function showbooking(id)
{
    //alert("hello");
    window.location = "mydetails.php?CampID=" + id;
}
function swap_children()
{
    //alert("in");
    var children_prior_1 = document.getElementById("txt_children_tmp_1").value;
    var children_prior_2 = document.getElementById("txt_children_tmp_2").value;
    var children_prior_3 = document.getElementById("txt_children_tmp_3").value;

    //alert(children_prior_1);
    //alert(children_prior_2);
    //alert(children_prior_3);


    var varchildren_total_price_1 = 'txt_children_tmp_value_' + children_prior_1;
    //alert(varchildren_total_price_1);
    if (document.getElementById(varchildren_total_price_1) != null) {
        children_total_price_1 = document.getElementById(varchildren_total_price_1).value;
    } else {
        children_total_price_1 = 0;
    }
    var varchildren_total_price_2 = 'txt_children_tmp_value_' + children_prior_2;
    //alert(varchildren_total_price_2);
    if (document.getElementById(varchildren_total_price_2) != null) {
        children_total_price_2 = document.getElementById(varchildren_total_price_2).value;
    } else {
        children_total_price_2 = 0;
    }
    var varchildren_total_price_3 = 'txt_children_tmp_value_' + children_prior_3;
    //alert(varchildren_total_price_3);
    if (document.getElementById(varchildren_total_price_3) != null) {
        children_total_price_3 = document.getElementById(varchildren_total_price_3).value;
    } else {
        children_total_price_3 = 0;
    }
    //	alert(children_total_price_1);

    if (children_total_price_1 == 0)
    {
        if (children_total_price_2 != 0)
        {
            document.getElementById("txt_children_tmp_1").value = children_prior_2;
            document.getElementById("txt_children_tmp_2").value = 0;
            if (children_total_price_3 != 0) {
                document.getElementById("txt_children_tmp_2").value = children_prior_3;
                document.getElementById("txt_children_tmp_3").value = 0;
            }
        } else if (children_total_price_3 != 0) {
            document.getElementById("txt_children_tmp_1").value = children_prior_3;
        }
    } else if (children_total_price_2 == 0) {
        if (children_total_price_3 != 0) {
            document.getElementById("txt_children_tmp_2").value = children_prior_3;
            document.getElementById("txt_children_tmp_3").value = 0;
        }
    }

}
function showtable_old(tbl, tbl1, chldiD)
{
    // start new code - 14-6-12
    var check_exist = 0;
    var check_priority = 0;
    var varsinglechildTotalprice = 'txt_children_tmp_value_' + chldiD;
    var singlechildTotalprice = document.getElementById(varsinglechildTotalprice).value;

    var children_prior_1 = document.getElementById("txt_children_tmp_1").value;
    var children_prior_2 = document.getElementById("txt_children_tmp_2").value;
    var children_prior_3 = document.getElementById("txt_children_tmp_3").value;

    /*if( children_prior_1 == 0 ) {
     document.getElementById("txt_children_tmp_1").value = chldiD;
     } else if( children_prior_1 == chldiD ) {
     //document.getElementById("txt_children_tmp_2").value = chldiD;
     } else if( children_prior_2 == 0 ) {
     document.getElementById("txt_children_tmp_2").value = chldiD;
     } else if( children_prior_2 == chldiD ) {
     //document.getElementById("txt_children_tmp_2").value = chldiD;
     } else if( children_prior_3 == 0 ) {
     document.getElementById("txt_children_tmp_3").value = chldiD;
     } else if( children_prior_3 == chldiD ) {
     //document.getElementById("txt_children_tmp_2").value = chldiD;
     }*/


    // end new code - 14-6-12

    if (document.getElementById(tbl).style.display == 'none') {
        // start new code - 14-6-12
        if (children_prior_1 == chldiD) {
            //document.getElementById("txt_children_tmp_2").value = chldiD;
            check_exist = 1;
        } else if (children_prior_2 == chldiD) {
            check_exist = 1;
        } else if (children_prior_3 == chldiD) {
            check_exist = 1;
        }
        if (check_exist == 0) {
            if (children_prior_1 == 0) {
                if (children_prior_2 != 0) {
                    document.getElementById("txt_children_tmp_1").value = children_prior_2;
                    if (children_prior_3 != 0) {
                        document.getElementById("txt_children_tmp_2").value = children_prior_3;
                        document.getElementById("txt_children_tmp_3").value = chldiD;
                    } else {
                        document.getElementById("txt_children_tmp_2").value = chldiD;
                    }
                    //document.getElementById("txt_children_tmp_2").value = chldiD;
                } else if (children_prior_3 != 0) {
                    document.getElementById("txt_children_tmp_1").value = children_prior_3;
                    document.getElementById("txt_children_tmp_2").value = chldiD;
                } else {
                    document.getElementById("txt_children_tmp_1").value = chldiD;
                }
            }
            else if (children_prior_2 == 0) {
                if (children_prior_3 != 0) {
                    document.getElementById("txt_children_tmp_2").value = children_prior_3;
                    document.getElementById("txt_children_tmp_3").value = chldiD;
                } else {
                    document.getElementById("txt_children_tmp_2").value = chldiD;
                }
            }
            else if (children_prior_3 == 0) {
                document.getElementById("txt_children_tmp_3").value = chldiD;
            }
        }
        // end new code - 14-6-12
        document.getElementById(tbl).style.display = '';
        document.getElementById(tbl1).style.display = '';
    } else {
        // start new code - 14-6-12
        if (children_prior_1 == chldiD) {
            //document.getElementById("txt_children_tmp_2").value = chldiD;
            if (singlechildTotalprice == 0) {
                document.getElementById("txt_children_tmp_1").value = 0;
            }
        } else if (children_prior_2 == chldiD) {
            //document.getElementById("txt_children_tmp_2").value = chldiD;
            if (singlechildTotalprice == 0) {
                document.getElementById("txt_children_tmp_2").value = 0;
            }
        } else if (children_prior_3 == chldiD) {
            //document.getElementById("txt_children_tmp_2").value = chldiD;
            if (singlechildTotalprice == 0) {
                document.getElementById("txt_children_tmp_3").value = 0;
            }
        }
        // end new code - 14-6-12
        document.getElementById(tbl).style.display = 'none';
        document.getElementById(tbl1).style.display = 'none';
    }

    // start new code - 16-6-12		
    var children_total_price_1 = 0;
    var children_EXTtotal_price_1 = 0;
    var children_total_price_2 = 0;
    var children_EXTtotal_price_2 = 0;
    var children_total_price_3 = 0;
    var children_EXTtotal_price_3 = 0;
    var children_prior_1 = document.getElementById("txt_children_tmp_1").value;
    var children_prior_2 = document.getElementById("txt_children_tmp_2").value;
    var children_prior_3 = document.getElementById("txt_children_tmp_3").value;

    //alert(children_prior_1);
    if (children_prior_1 != 0) {
        var varchildren_total_price_1 = 'txt_children_tmp_value_' + children_prior_1;
        children_total_price_1 = document.getElementById(varchildren_total_price_1).value;

        var varchildren_EXTtotal_price_1 = 'txt_children_tmpEXT_value_' + children_prior_1;
        children_EXTtotal_price_1 = document.getElementById(varchildren_EXTtotal_price_1).value;
    }


    if (children_prior_2 != 0) {
        var varchildren_total_price_2 = 'txt_children_tmp_value_' + children_prior_2;
        children_total_price_2 = document.getElementById(varchildren_total_price_2).value;

        var varchildren_EXTtotal_price_2 = 'txt_children_tmpEXT_value_' + children_prior_2;
        children_EXTtotal_price_2 = document.getElementById(varchildren_EXTtotal_price_2).value;
    }


    if (children_prior_3 != 0) {
        var varchildren_total_price_3 = 'txt_children_tmp_value_' + children_prior_3;
        var children_total_price_3 = document.getElementById(varchildren_total_price_3).value;

        var varchildren_EXTtotal_price_3 = 'txt_children_tmpEXT_value_' + children_prior_3;
        children_EXTtotal_price_3 = document.getElementById(varchildren_EXTtotal_price_3).value;
    }
    //alert(varchildren_total_price_1);


    var totalEXTPrice = children_EXTtotal_price_1 * 1 + children_EXTtotal_price_2 * 1 + children_EXTtotal_price_3 * 1;

    var singlechildTotalprice = document.getElementById(varsinglechildTotalprice).value;

    var child_prices_test_1 = children_total_price_1;
    var child_prices_test_2 = children_total_price_2 * 1 - (children_total_price_2 * 0.25);
    var child_prices_test_3 = children_total_price_3 * 1 - (children_total_price_3 * 0.50);
    var tot_price_of_children = child_prices_test_1 * 1 + child_prices_test_2 * 1 + child_prices_test_3 * 1 + totalEXTPrice * 1;
    //alert('CHildren 1:'+child_prices_test_1);
    //alert('CHildren 2:'+child_prices_test_2);
    //alert('CHildren 3:'+child_prices_test_3);
    //	alert('CHildrens total:'+tot_price_of_children);

    document.getElementById("total_price").innerHTML = 'Total Charge:' + tot_price_of_children.toFixed(2);
    document.getElementById("total_price1").innerHTML = 'Total Charge:' + tot_price_of_children.toFixed(2);
    // end new code - 16-6-12
}
function chkfrm()
{
    var varadd_children = document.getElementById("add_children").value;
    if (varadd_children == 1) {
        if (document.addtocartfrm.txtfirstname.value == "")
        {
            alert("Please Enter Forename");
            return false;
        }
        if (document.addtocartfrm.txtlastname.value == "")
        {
            alert("Please Enter Lastname");
            return false;
        }
        return true;
    } else {
        return true;
    }
}

// start new code - 22-6-12 
function addCamptoBasketFriend(campid, campprice, obj, Children_id, chkallsel, day)
{
    //alert("hi");
    //alert(campid + campprice + obj + extra + chkallsel );
    //////////////////////////////////
    chk = 'all_select_camps_' + chkallsel + '_CHK';
    chkobj1 = document.getElementById(chk);
    if (chkobj1.checked) {
        chkobj1.checked = false;
    }

    var have_child_friend = document.getElementById("add_children").value;
    ////////////////////////////////////
    var removed_camp = 0;
    if (obj.checked) {
    } else {
        removed_camp = 1;
    }
    // start loading image 
    jQuery('#mainbkdiv').show();
    jQuery('#divmsg').show();
    // end loading image 
    jQuery.post("friend_cart.php", "campid=" + campid + "&childid=" + Children_id + "&day=" + day + "&removecamp=" + removed_camp + "&hv_chld_frnd=" + have_child_friend + "&action=set_image_session", function(results) {
        jQuery('#total_price').html(results);
        jQuery('#total_price1').html(results);
        jQuery('#mainbkdiv').hide();
        jQuery('#divmsg').hide();
    });
}
function checkBox_selectFriend(ids, obj, allPrice, diffprice, day, campid)
{
    //alert("hello");
    /////////////////////
    var a2 = new Array();
    var a3 = new Array();
    a2 = ids.split(",");
    //alert(a1);
    for (i = 0; i < a2.length; i++) {
        //string = string + "<br>" + a1[i];
        a3 = a2[i].split("_");
        chkID_tmp = 'checkBox_normal_' + a3[0]; //alert(tblID_tmp);
        // alert(chkID_tmp);
        chkObj = document.getElementById(chkID_tmp);
        //alert(chkObj);
        if (obj.checked) {
            if (chkObj != null) {
                if (!chkObj.checked)
                {

                }
                chkObj.checked = true;
            }
        } else {
            if (chkObj != null) {
                if (chkObj.checked)
                {

                }
                chkObj.checked = false;
            }
        }
    }
    var have_child_friend = document.getElementById("add_children").value;
    /////////////////////
    var removed_camp = 0;
    if (obj.checked) {
    } else {
        removed_camp = 1;
    }
    jQuery('#mainbkdiv').show();
    jQuery('#divmsg').show();
    jQuery.post("friend_cart.php", "campid=" + campid + "&childid=" + obj.value + "&day=" + day + "&removecamp=" + removed_camp + "&hv_chld_frnd=" + have_child_friend + "&action=set_image_session", function(results) {
        jQuery('#total_price').html(results);
        jQuery('#total_price1').html(results);
        jQuery('#mainbkdiv').hide();
        jQuery('#divmsg').hide();
    });
}
function addCamptoBasketEXTFriend(campid, campprice, obj, chldID, day)
{
    var chkallExtID = 'checkBox_EXT_ALL_' + campid + '_' + chldID;
    var chkallExtObj = document.getElementById(chkallExtID);

    if (chkallExtObj.checked) {
        chkallExtObj.checked = false;
    }
    var removed_camp = 0;
    if (obj.checked) {
    } else {
        removed_camp = 1;
    }
    var have_child_friend = document.getElementById("add_children").value;
    jQuery('#mainbkdiv').show();
    jQuery('#divmsg').show();
    jQuery.post("friend_cart.php", "campid=" + campid + "&childid=" + chldID + "&day=" + obj.value + "&removecamp=" + removed_camp + "&hv_chld_frnd=" + have_child_friend + "&extday=1", function(results) {
        jQuery('#total_price').html(results);
        jQuery('#total_price1').html(results);
        jQuery('#mainbkdiv').hide();
        jQuery('#divmsg').hide();
    });
}

function checkBoxEXT_selectFriend(ids, obj, campid, day)
{
    /////////////////////
    var a2 = new Array();
    var a3 = new Array();
    a2 = ids.split(",");
    //alert(a1);
    for (i = 0; i < a2.length; i++) {
        //string = string + "<br>" + a1[i];
        a3 = a2[i].split("_");
        chkID_tmp = 'checkBox_normal_' + a3[0]; //alert(tblID_tmp);
        // alert(chkID_tmp);
        chkObj = document.getElementById(chkID_tmp);
        //alert(chkObj);
        if (obj.checked) {
            if (chkObj != null) {
                if (!chkObj.checked)
                {

                }
                chkObj.checked = true;
            }
        } else {
            if (chkObj != null) {
                if (chkObj.checked)
                {

                }
                chkObj.checked = false;
            }
        }
    }
    var have_child_friend = document.getElementById("add_children").value;
    /////////////////////
    var removed_camp = 0;
    if (obj.checked) {
    } else {
        removed_camp = 1;
    }
    jQuery('#mainbkdiv').show();
    jQuery('#divmsg').show();
    jQuery.post("friend_cart.php", "campid=" + campid + "&childid=" + obj.value + "&day=" + day + "&removecamp=" + removed_camp + "&hv_chld_frnd=" + have_child_friend + "&action=set_image_session", function(results) {
        jQuery('#total_price').html(results);
        jQuery('#total_price1').html(results);
        jQuery('#mainbkdiv').hide();
        jQuery('#divmsg').hide();
    });
}

function addCamptoBasket(campid, campprice, obj, Children_id, chkallsel, day)
{
    //alert(campid + campprice + obj + extra + chkallsel );
    //////////////////////////////////
    chk = 'all_select_camps_' + chkallsel + '_CHK';
    chkobj1 = document.getElementById(chk);
    if (chkobj1.checked) {
        chkobj1.checked = false;
    }
    ////////////////////////////////////
    var removed_camp = 0;
    if (obj.checked) {
    } else {
        removed_camp = 1;
    }
    var have_child_friend = document.getElementById("add_children").value;
    // start loading image 
    jQuery('#mainbkdiv').show();
    jQuery('#divmsg').show();
    // end loading image 
    jQuery.post("cart.php", "campid=" + campid + "&childid=" + Children_id + "&day=" + day + "&removecamp=" + removed_camp + "&hv_chld_frnd=" + have_child_friend + "&action=set_image_session", function(results) {
        jQuery('#total_price').html(results);
        jQuery('#total_price1').html(results);
        jQuery('#mainbkdiv').hide();
        jQuery('#divmsg').hide();
    });
}
function addCamptoBasketEXT(campid, campprice, obj, chldID, day)
{
    var chkallExtID = 'checkBox_EXT_ALL_' + campid + '_' + chldID;
    var chkallExtObj = document.getElementById(chkallExtID);

    if (chkallExtObj.checked) {
        chkallExtObj.checked = false;
    }
    var removed_camp = 0;
    if (obj.checked) {
    } else {
        removed_camp = 1;
    }
    var have_child_friend = document.getElementById("add_children").value;
    jQuery('#mainbkdiv').show();
    jQuery('#divmsg').show();
    jQuery.post("cart.php", "campid=" + campid + "&childid=" + chldID + "&day=" + obj.value + "&removecamp=" + removed_camp + "&hv_chld_frnd=" + have_child_friend + "&extday=1", function(results) {
        jQuery('#total_price').html(results);
        jQuery('#total_price1').html(results);
        jQuery('#mainbkdiv').hide();
        jQuery('#divmsg').hide();
    });
}
function checkBox_select(ids, obj, allPrice, diffprice, day, campid)
{
    /////////////////////
    var a2 = new Array();
    var a3 = new Array();
    a2 = ids.split(",");
    //alert(a1);
    for (i = 0; i < a2.length; i++) {
        //string = string + "<br>" + a1[i];
        a3 = a2[i].split("_");
        chkID_tmp = 'checkBox_normal_' + a3[0]; //alert(tblID_tmp);
        // alert(chkID_tmp);
        chkObj = document.getElementById(chkID_tmp);
        //alert(chkObj);
        if (obj.checked) {
            if (chkObj != null) {
                if (!chkObj.checked)
                {

                }
                chkObj.checked = true;
            }
        } else {
            if (chkObj != null) {
                if (chkObj.checked)
                {

                }
                chkObj.checked = false;
            }
        }
    }
    var have_child_friend = document.getElementById("add_children").value;
    /////////////////////
    var removed_camp = 0;
    if (obj.checked) {
    } else {
        removed_camp = 1;
    }
    jQuery('#mainbkdiv').show();
    jQuery('#divmsg').show();
    jQuery.post("cart.php", "campid=" + campid + "&childid=" + obj.value + "&day=" + day + "&removecamp=" + removed_camp + "&hv_chld_frnd=" + have_child_friend + "&action=set_image_session", function(results) {
        jQuery('#total_price').html(results);
        jQuery('#total_price1').html(results);
        jQuery('#mainbkdiv').hide();
        jQuery('#divmsg').hide();
    });
}

function checkBoxEXT_select(ids, obj, campid, day)
{
    /////////////////////
    var a2 = new Array();
    var a3 = new Array();
    a2 = ids.split(",");
    //alert(a1);
    for (i = 0; i < a2.length; i++) {
        //string = string + "<br>" + a1[i];
        a3 = a2[i].split("_");
        chkID_tmp = 'checkBox_normal_' + a3[0]; //alert(tblID_tmp);
        // alert(chkID_tmp);
        chkObj = document.getElementById(chkID_tmp);
        //alert(chkObj);
        if (obj.checked) {
            if (chkObj != null) {
                if (!chkObj.checked)
                {

                }
                chkObj.checked = true;
            }
        } else {
            if (chkObj != null) {
                if (chkObj.checked)
                {

                }
                chkObj.checked = false;
            }
        }
    }
    var have_child_friend = document.getElementById("add_children").value;
    /////////////////////
    var removed_camp = 0;
    if (obj.checked) {
    } else {
        removed_camp = 1;
    }
    jQuery('#mainbkdiv').show();
    jQuery('#divmsg').show();
    jQuery.post("cart.php", "campid=" + campid + "&childid=" + obj.value + "&day=" + day + "&removecamp=" + removed_camp + "&hv_chld_frnd=" + have_child_friend + "&action=set_image_session", function(results) {
        jQuery('#total_price').html(results);
        jQuery('#total_price1').html(results);
        jQuery('#mainbkdiv').hide();
        jQuery('#divmsg').hide();
    });
}
function showtable(tbl, tbl1, chldiD)
{
    // start new code - 14-6-12
    var check_exist = 0;
    var check_priority = 0;
    var varsinglechildTotalprice = 'txt_children_tmp_value_' + chldiD;
    var singlechildTotalprice = document.getElementById(varsinglechildTotalprice).value;

    var children_prior_1 = document.getElementById("txt_children_tmp_1").value;
    var children_prior_2 = document.getElementById("txt_children_tmp_2").value;
    var children_prior_3 = document.getElementById("txt_children_tmp_3").value;
    // end new code - 14-6-12

    if (document.getElementById(tbl).style.display == 'none') {

        document.getElementById(tbl).style.display = '';
        document.getElementById(tbl1).style.display = '';
    } else {

        document.getElementById(tbl).style.display = 'none';
        document.getElementById(tbl1).style.display = 'none';
    } 
}
//var name = "#floatMenu";
//var menuYloc = null;
//var jQuery = jQuery.noConflict();
//jQuery(document).ready(function() {
//    menuYloc = parseInt(jQuery(name).css("top").substring(0, jQuery(name).css("top").indexOf("px")))
//    jQuery(window).scroll(function() {
//        offset = menuYloc + jQuery(document).scrollTop() + "px";
//        jQuery(name).animate({top: offset}, {duration: 500, queue: false});
//    });
//}); 