<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax PHP</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>

    
    <form method="post">
    <div id="insertsection">
    <h1>Student Details</h1>
        <input type="text" placeholder="Enter Your Name" id="txtname" required><br><br>
        <input type="number" placeholder="Enter Your Number" id="txtnumber" required><br><br>
        <input type="email" placeholder="Enter Your Email" id="txtemail" required><br><br>
        <input type="text" placeholder="Enter Your Semester" id="txtsem"  required><br><br>
        <input type="button" value="Done" id="btninsert">
        </div><br><br>
        <div id="btnupdatesection">

        </div>
        </form><br><br><br><br>
        <input type="text" placeholder="Search Here" id="txtsearch"><br><br>
    
    <table border="2">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>PHONE</th>
                <th>EMAIL</th>
                <th>SEMESTER</th>
                <th colspan="2">ACTIONS</th>
            </tr>
        </thead>
        <tbody id="tbody">

        </tbody>
    </table>
</body>
</html>
<!-- Jquery Link -->   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Sweet Alert link --> <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
<script>
    $(document).ready(function(){

//Fetch 
function fetchdata(){

    $.ajax({
        url:"fetch.php",
        type:"POST",
        success:function(mydata)
        {
            $("#tbody").html(mydata)
        }
    })
}
fetchdata();

        $("#btninsert").on("click",function()
        {
            var stdname =$("#txtname").val();
            var stdnumber =$("#txtnumber").val();
            var stdemail =$("#txtemail").val();
            var stdsem =$("#txtsem").val();

//Insert
            $.ajax({
                url:"insert.php",
                type:"POST",
                data:{name:stdname,phone:stdnumber,email:stdemail,semester:stdsem},
                success:function(data){
                    $("#txtname").val("");
                    $("#txtnumber").val("");
                    $("#txtemail").val("");
                    $("#txtsem").val("");

                    fetchdata();
                    // alert("hello");
                   // Swal.fire('SweetAlert2 is working!');
                   Swal.fire({
                   title: "Data Inserted!",
                   text: "Clicked the button!",
                   icon: "success"
});

                }
            })
        })

// Delete 
        $(document).on("click","#btndelete",function()
        {
            var sid = $(this).attr("rowid");
          // alert(sid);
          
          $.ajax({
            url:"delete.php",
            type:"POST",
            data:{id:sid},
            success:function(mydata)
            {
              fetchdata();
              Swal.fire({
                   title: "Data Deleted!",
                   text: "Click Ok button!",
                   icon: "success"});  
            }
          })
        })
// Update Form
$(document).on("click","#btnupdate",function()
{
    $("#insertsection").css("display","none");
    var stdid = $(this).attr("rowid");
    //alert(stdid);
    $.ajax({
        url:"update.php",
        type:"POST",
        data:{id:stdid},
        success:function(mydata)
        {
            $("#btnupdatesection").html(mydata);
        }
    })
})
// Upadte Student Data

$(document).on("click","#updatebtn",function()
{
    var stdid = $("#sid").val();
    var stdname = $("#name").val();
    var stdnumber = $("#number").val();
    var stdemail = $("#email").val();
    var stdsemester = $("#semester").val();

    $.ajax({
    url:"studentupdate.php",
    type:"POST",
    data:{s_id:stdid,s_name:stdname,s_number:stdnumber,s_email:stdemail,s_semester:stdsemester},
    success:function(mydata){
        fetchdata();
        Swal.fire({
                   title: "Data Deleted!",
                   text: "Click Ok button!",
                   icon: "success"});  
        $("#insertsection").css("display","block");           
        $("#btnupdatesection").css("display","none");           

        
    }
})

})                

// Searching In Ajax with Like Cluase

$(document).on("keyup","#txtsearch",function()
{
    var stdname = $("#txtsearch").val();
   $.ajax({
    url:"search.php",
    type:"POST",
    data:{name:stdname},
    success:function(searchdata){
        $('#tbody').html(searchdata)
        
    }
   })
})
    });
</script>