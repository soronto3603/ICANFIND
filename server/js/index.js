window.onload=()=>{
    find_new_result();
    //setInterval(find_new_result,1000);
}
function onchange_myfile(){
    var imagepath=document.getElementById('myfile').files[0];
    // $("#preview").attr("src",window.URL.createObjectURL(imagepath));
    $("#preview_box").html("<img id=preview src='"+window.URL.createObjectURL(imagepath)+"'>");
}
var backgroundColorList=["#512A2A","#323551","#324E51","#115121"];
var colorIndex=0;
/* #512A2A
#323551
#324E51
#115121 */
function onclick_preview_box(){
    $("#myfile").click();
}
function insert_new_result(filepath){
    var html='<div id="'+filepath+'" class="resultview_box" style="background-color:'+backgroundColorList[Math.floor(Math.random()*backgroundColorList.length)]+'">';
    html+='<img class="resultview" src="'+filepath+'">';
    html+='</div>';
    document.getElementById('resultview_wrap').innerHTML=html+document.getElementById('resultview_wrap').innerHTML;
}
var result_list=[];
function find_new_result(){
    $.get("./find_new_result.php",{}).done((r)=>{
        var obj=JSON.parse(r);
        for(var i=0;i<obj.length;i++){
            var check=0;
            for(var j=0;j<result_list.length;j++){
                if(result_list[j]==obj[i]){
                    // console.log(result_list[j]);
                    // console.log(obj[i]);
                    check=1;
                }
            }
            if(check==0 && isPNG(obj[i])==1){
                $.get("read_csv.php",{filepath:"./outputs/"+obj[i]}).done((re)=>{
                    // var obj2=JSON.parse(re);
                    if(re=="die"){

                    }else{

                        var obj2=JSON.parse(re);
                        insert_new_result(obj2[0]);
                        result_list.push(obj2[0]);
                        var str="";
                        for(var i=1;i<obj2.length;i++){
                            str+="<div class='csv_info' >";
                            str+="<table><tr><th class=data_table>ClassName</th><th class=data_table>ClassNo</th><th class=data_table>ClassInd</th><th class=data_table>ClassOds</th><th class=data_table>{X1,</th><th class=data_table>Y1}</th><th class=data_table>{X2,</th><th class=data_table>Y2}</th></tr>";
               
                            str+="<tr>";
                            for(var j=0;j<obj2[i].length;j++){
                                str+="<td class=data_table_td>"+obj2[i][j]+"</td>";
                            }
                            str+="</tr>";
                            
                            
                            str+="</table><div class=data_question>is correct masking?</div><div class=data_answer><input class=data_answer></div><div class=data_question>What is it?</div><div class=data_answer><input class=data_answer></div></div>";
                            //console.log(str);
                        }
                        str+="<center><div class='submit' onclick='alert(\"성공적으로 저장되었습니다.\")'>Submit</div></center>"
                        document.getElementById(obj2[0]).innerHTML+=str;
                    }
                    // alert(re);
                });
                // insert_new_result("./outputs/"+obj[i]);
                // result_list.push(obj[i]);
            }
        }
    });
}
function isPNG(filename){
    var _fileLen=filename.length;
    var _lastDot=filename.lastIndexOf('.');
    var _fileExt=filename.substring(_lastDot,_fileLen).toLowerCase();
    if(_fileExt==".png"){
        return 1;
    }
    return 0;
}