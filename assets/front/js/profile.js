function valid(txtfirstname, txtlastname)
{
    if (document.addchildform1.txtfirstname.value == "")
    {
        alert("Please Enter Forename");
        return false;
    }
    if (document.addchildform1.txtlastname.value == "")
    {
        alert("Please Enter Lastname");
        return false;
    }
}

function validation1(txtfirstname, txtlastname)
{
    if (document.addchildform.txtfirstname.value == "")
    {
        alert("Please Enter Forename");
        return false;
    }

    if (document.addchildform.txtfirstname.value == "")
    {
        alert("Please Enter Lastname");
        return false;
    }

}


function addChild()
{
    document.getElementById("addchildTbl").style.display = '';
    document.getElementById("new_child").style.display = '';
    document.getElementById("editchildTbl").style.display = '';
    document.getElementById("old_child").style.display = 'none';
    return false;
}
function showbooking(id)
{
    //alert("hello");
    window.location = "booking/" + id;
}
var $ = jQuery.noConflict();
$(document).ready(function(){
    if (!window.location.origin) {
        window.location.origin = window.location.protocol + "//" + window.location.hostname + (window.location.port ? ':' + window.location.port : '');
    }

    var $ = jQuery.noConflict();
    $('.datepicker').datepicker({ changeYear: true, yearRange: "-100:+0" });
    $("#addchildform1").submit(function(e){
        e.preventDefault();
        
        valid = 1;
        if($("#first_name").val() == ""){
            valid = 0;
            $("#first_name_error").html("Field must not be empty");
        } else {
            $("#first_name_error").html("");
        }
        if($("#last_name").val() == ""){
            valid = 0;
            $("#last_name_error").html("Field must not be empty");
        } else {
            $("#last_name_error").html("");
        }
        if($("#birthdate").val() == ""){
            valid = 0;
            $("#birthdate").html("Field must not be empty");
        } else {
            $("#birthdate").html("");
        }
        if(valid == 0){
            return false;
        } else {
            $.ajax({
                url: window.location.origin + "/profile/add_child",
                type: "POST",
                dataType: "json",
                data: "first_name=" + $("#first_name").val() + "&last_name=" + $("#last_name").val() 
                        + "&birthdate=" + $("#birthdate").val() + "&notes=" + $("#notes").val(),
                success: function(data){
                    post = data.data;
                    html = "<tr>";
                    html += '<td width="11%" align="center" style="font-weight: normal; padding: 16px 0pt 13px 28px;"><a href="#"><img height="22" width="24" alt="" src="http://www.pythox.com/assets/front/images/star-icon.png"></a></td>';
                    html += '<td width="22%" style="font-size: 15px; height: 32px; line-height: 27px;">';
                    html += '<a style="color: rgb(51, 51, 51);" href="javascript:void(1)" rel="3">' + post.first_name + ' ' + post.last_name + '</a> ';
                    html += '</td>';
                    html += '<td>';
                    html += '<a href="javascript:void(1)" class="update_child" rel="' + post.id + '"><img alt="" src="http://www.pythox.com/assets/front/images/updateyellobt.png"></a>';
                    html += '</td>';
                    html += '<td style="margin-right:5%;">';
                    html += '<a href="javascript:void(1)" rel="' + post.id + '" class="delete_child"><img alt="" src="http://www.pythox.com/assets/front/images/deleteyellobt.png"></a>';
                    html += '</td>';
                                    
                    html += "</tr>";
                    $("#children_table").append(html);
                    $("#first_name").val('');
                    $("#last_name").val('');
                    $("#birthdate").val('');
                    $("#notes").val('');
                    $("#addchildTbl").hide();
                }
            });
        }
    });
    
    $("#editchildform").submit(function(e){
        e.preventDefault();
        
        valid = 1;
        if($("#up_first_name").val() == ""){
            valid = 0;
            $("#up_first_name_error").html("Field must not be empty");
        } else {
            $("#up_first_name_error").html("");
        }
        if($("#up_last_name").val() == ""){
            valid = 0;
            $("#up_last_name_error").html("Field must not be empty");
        } else {
            $("#up_last_name_error").html("");
        }
        if($("#up_birthdate").val() == ""){
            valid = 0;
            $("#up_birthdate").html("Field must not be empty");
        } else {
            $("#up_birthdate").html("");
        }
        if(valid == 0){
            return false;
        } else {
            $.ajax({
                url: window.location.origin + "/profile/update_child",
                type: "POST",
                dataType: "json",
                data: "first_name=" + $("#up_first_name").val() + "&last_name=" + $("#up_last_name").val() 
                        + "&birthdate=" + $("#up_birthdate").val() + "&notes=" + $("#up_notes").val()
                        + "&child_id=" + $("#child_id").val(),
                success: function(data){
                    post = data.data;
                    $("#editchildTbl").hide();
                    $("#editchildform").hide();
                    $("#old_child").hide();
                    $("#up_first_name").val('');
                    $("#up_last_name").val('');
                    $("#up_birthdate").val('');
                    $("#up_notes").val('');
                    $("#child_id").val('');
                    $("#children_table").find('a[rel=' + post.id + "]").each(function(){
                        if($(this).hasClass('editable_text')){
                            $(this).text(post.first_name + " " + post.last_name);
                        }
                    });
                }
            });
        }
    });
    
    $(document).delegate(".delete_child", 'click', function(){
        var childId = $(this).attr('rel');
        var me = $(this);
        $.ajax({
            url: window.location.origin + "/profile/delete_child",
            type: "POST",
            dataType: "json",
            data: "child_id=" + childId,
            success: function() {
                $(me).parent().parent().remove();
            }
        });
    });
    
    $(document).delegate(".update_child", 'click', function(){
        var childId = $(this).attr('rel');
        var me = $(this);
        console.log("update triggered");
        $.ajax({
            url: window.location.origin + "/profile/get_child",
            type: "POST",
            dataType: "json",
            data: "child_id=" + childId,
            success: function(data) {
                var child = data.data;
                $("#up_first_name").val(child.first_name);
                $("#up_last_name").val(child.last_name);
                $("#up_birthdate").val(child.birthdate);
                $("#up_notes").val(child.notes);
                $("#editchildTbl").show();
                $("#editchildform").show();
                $("#old_child").show();
                $("#child_id").val(childId);
            }
        });
    });
    
});