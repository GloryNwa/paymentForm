<?php session_start();


$con = mysqli_connect('localhost','root', '');

if (!$con)
{
    echo 'Not connected to server';
}

if (!mysqli_select_db($con, 'imm'))
{
    echo 'Database not selected';
}


?>
<!doctype html>
<html class="no-js" lang="">


<!-- Mirrored from affixtheme.com/html/xmee/demo/register-11.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Mar 2020 10:44:02 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>IMM GLOBAL PARTNERS NETWORK</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="font/flaticon.css">
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <link href="https://unpkg.com/nprogress@0.2.0/nprogress.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <div class="modal fade" id="KingschatModal" tabindex="-1" role="dialog" aria-labelledby="KingschatModalLabel"
         aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="KingschatModalLabel">KingsChat Code</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" align="center">
                    <h1>IMM01</h1>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-primary" onclick="submitKingschat()">Submit Data</button>
                </div>
            </div>
        </div>
    </div>

    <section class="fxt-template-animation fxt-template-layout11 has-animation">

        <div class="container">

            <div class="row align-items-center justify-content-center">

                <div class="col-xl-6 col-lg-7 col-sm-12 col-12 fxt-bg-color">

                    <div class="fxt-content"> <img src="img/letterhead.jpg" alt="Logo" style="width:100%;">
                        <div class="fxt-header">
                            <?php session_start();
                                if(isset($_SESSION['msg']) && $_SESSION['msg'] != ''){
                                    echo $_SESSION['msg'];
                                    unset($_SESSION['msg']);
                                }
                            ?>
                            <a class="fxt-logo"></a><br />
                            <h2>IMM GLOBAL PARTNER NETWORK</h2>
                            <h6>Become a global partner  and  reach billions of people across the globe.</h6>
                        </div>                            
                        <div class="fxt-form">
                            <form action="insert.php" method="post" id="forme">
                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-1">
                                        <select name="title" id="mytitle"class="form-control">
                                            <option value="">Select Title</option>
                                            <option value="Brother" >Brother</option>
                                            <option value="Sister">Sister</option>
                                            <option value="Pastor">Pastor</option>
                                            <option value="Deacon">Deacon</option>
                                            <option value="Deaconess">Deaconess</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group"> 
                                    <div class="fxt-transformY-50 fxt-transition-delay-1">                                              
                                        <input type="text" id="surname" class="form-control" name="surname" placeholder="Surname" required="required" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-1">
                                        <input type="text" id="first" class="form-control" name="first" placeholder="Firstname" required="required" >
                                    </div>
                                </div>
                                <div class="form-group"> 
                                    <div class="fxt-transformY-50 fxt-transition-delay-1">                                              
                                        <input type="email" id="email" class="form-control" name="email" placeholder="Email" required="required" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-1">
                                        <input type="number" id="phone" class="form-control" name="phone" placeholder="Phone +234" required="required" >
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-1">
                                        <select name="country" id="mycountry"class="form-control">
                                            <option value="">Select Country</option>
                                             <?php  $query = "SELECT * FROM `country`";
                                               if ($query_run = mysqli_query($con,$query)) {
                                        
                                                   while($query_row = mysqli_fetch_assoc($query_run)){
                                                     $country = $query_row['country'];?>

                                                   <option value="<?php echo $country;?>" ><?php echo $country;?></option>
                                               <?php
                                             }
                                         }
                                       ?>
                                         
                                     </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-1" id="myzonal" style="display: none">
                                        <select name="member" id="mymember" class="form-control">
                                            <option value="" >Are you a member of Christ Embassy?</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-1" >
                                    <select name="zonal" id="myzonal"class="form-control">
                                  
                                     <option value="">Select Your Zone</option>
                                      <?php  $query = "SELECT * FROM `table 2`";

                                      if ($query_run = mysqli_query($con,$query)) {
                                        
                                            while($query_row = mysqli_fetch_assoc($query_run)){
                                                $col = $query_row['COL 1'];
                                         ?>
                                           
                                        <option value="<?php echo $col;?>" ><?php echo $col;?></option>
                                       <?php
                                          }
                                       }
                                       ?>
                                        <option value="">Not Listed</option>
                                                   
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-1">
                                        <select name="partner" id="mypartner" class="form-control">
                                            <option value="" >SELECT YOUR PARTNERSHIP
                                                OPTION</option>
                                            <option value="1,000,000 Online Outreaches with Technology">1,000,000 Online Outreaches with
                                                Technology</option>
                                            <option  value="Translation Outreach Projec">Translation Outreach Project</option>
                                            <option  value="Global Ministry Transmission and Translation Project">Global Ministry Transmission and Translation Project</option>
                                            <option  value="Setting up New Mobile Live Translation Studios">Setting up New Mobile Live Translation Studios</option>
                                            <option  value="Global Ministry Transmission Sponsorship">Global Ministry Transmission Sponsorship</option>
                                            <option  value="1 Million images on Ceflix Campaign( Get free personalized greetings, events and occasion designs for one month on ceflix images">1 Million images on Ceflix Campaign( Get free personalized  greetings,events and occasion designs for one month on ceflix images</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-1">
                                        <input type="number" id="amount" class="form-control" name="amount" placeholder="Amount" required="required" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-4">

                                        <input  name="submit" class="fxt-btn-fill" id="payee2" value="Pay with KingsPay"
                                                onclick="payWithKingsChat()" style="text-align: center">
<!--                                        <button type="submit" name="submit" class="fxt-btn-fill">Log in</button>-->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-4">

                                        <input name="submit" class="fxt-btn-fill" id="payee" value="Pay with Debit/Credit Card" onclick="payWithPaystack()" style="text-align: center">
                                        <!--                                        <button type="submit" name="submit" class="fxt-btn-fill">Log in</button>-->
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>                    
            </div>
        </div>



        <!-- Modal -->

    </section>





    </div>
    <!-- jquery-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <script src="js/notify.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Imagesloaded js -->
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <!-- Validator js -->
    <script src="js/validator.min.js"></script>
    <!-- Custom Js -->
    <script src="js/main.js"></script>
    <script src="https://unpkg.com/nprogress@0.2.0/nprogress.js"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script>
        
        function payWithKingsChat(){

            var title =  $( "#mytitle" ).val();
            var first = $('input[name=first]').val();
            var surname = $('input[name=surname]').val();
            var email = $('input[name=email]').val();
            var phone = $('input[name=phone]').val();
            var partner = $( "#mypartner" ).val();
            var zonal = $( "#myzonal" ).val();
            var member = $( "#mymember" ).val();
            var amount = $('input[name=amount]').val();


            if(title != "" && first != "" && surname != "" && email != "" && phone != "" && partner != ""  && amount != "") {

                $('#KingschatModal').modal('show');

                $('#KingschatModal').modal({
                    backdrop: 'static',
                    keyboard: false
                });

            }else{

                $.notify("All fields are compulsory", {className: 'error',
                    autoHide: true,} );

            }


        }


        function submitKingschat (){
            var title =  $( "#mytitle" ).val();
            var first = $('input[name=first]').val();
            var surname = $('input[name=surname]').val();
            var email = $('input[name=email]').val();
            var phone = $('input[name=phone]').val();
            var partner = $( "#mypartner" ).val();
            var zonal = $( "#myzonal" ).val();
            var member = $( "#mymember" ).val();
            var amount = $('input[name=amount]').val();


            if(title != "" && first != "" && surname != "" && email != "" && phone != "" && partner != "" && amount != "") {
                $("#payee2").hide(500);
                NProgress.start();
                event.preventDefault();


                var formData = {
                    'title'              : $( "#mytitle" ).val(),
                    'first'             : $('input[name=first]').val(),
                    'surname'    : $('input[name=surname]').val(),
                    'email'    : $('input[name=email]').val(),
                    'phone'    : $('input[name=phone]').val(),
                    'zonal'    : $( "#myzonal" ).val(),
                    'partner'    : $( "#mypartner" ).val(),
                    'member'    : $( "#mymember" ).val(),
                    'amount'  : $('input[name=amount]').val(),
                    'type'  : "kingschat",


                };

                //alert("I got here");

                $.ajax({
                    type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                    url         : 'insert2.php', // the url where we want to POST
                    data        : formData,
                    // dataType    : 'json', // what type of data do we expect back from the server
                    encode          : true
                })

                //  NProgress.start()
                // using the done promise callback
                    .done(function(data) {

                        // alert("I dididid")
                        // log data to the console so we can see
                        // console.log("I got here too just now");
//
//                    //if number is on kingschat then process
                        if(data){
                            NProgress.done();
                            $.notify("Your registration was successful", {className: 'success',autoHide: false,
                            } );
                            $('#forme')[0].reset();
                            $('#KingschatModal').modal('hide');
                            $("#payee2").show(500);


                        }else{
                            NProgress.done();
                            $.notify("There was an issue with your payment, please contact IMM support to rectify this error", {className: 'error',autoHide: false,
                            } );
                            $('#KingschatModal').modal('hide');
                            $("#payee2").show(500);

                        }

                        // here we will handle errors and validation messages
                    });
            }
        }
        
        
        
        
        
        
        function payWithPaystack(){


            var title =  $( "#mytitle" ).val();
            var first = $('input[name=first]').val();
            var surname = $('input[name=surname]').val();
            var email = $('input[name=email]').val();
            var phone = $('input[name=phone]').val();
            var partner = $( "#mypartner" ).val();
            var zonal = $( "#myzonal" ).val();
            var member = $( "#mymember" ).val();
            var amount = $('input[name=amount]').val();


            if(title != "" && first != "" && surname != "" && email != "" && phone != "" && partner != "" && amount != ""){
                NProgress.start();
                event.preventDefault();

                $.notify("Connecting to gateway... Please wait ...", {className: 'warning',autoHide: true,} );
                //$.notify("Connecting to gateway... Please wait ...", "warn");
                $("#payee").hide(500);

                            var handler = PaystackPop.setup({
                                key: 'pk_test_150c834486ba274657c0bb15d188d6eafd6cdd9a',
                                email: email,
                                amount: amount * 100,
                                currency: "NGN",
                                //ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                                metadata: {
                                    custom_fields: [
                                        {
                                            display_name: "Mobile Number",
                                            variable_name: "mobile_number",
                                            value: "+2348012345678"
                                        }
                                    ]
                                },
                                callback: function(response){
                                    $.notify("... Verifying Payment ... Please wait ...", {className: 'warning',
                                        autoHide: false,} );
                                    submit_form(response.reference)
                                    //alert('success. transaction ref is ' + response.reference);
                                },
                                onClose: function(){
                                    $.notify("...Payment window closed", {className: 'warning',
                                        autoHide: true,} );
                                }
                            });

                            handler.openIframe();

                        // here we will handle errors and validation messages
                    }

                // stop the form from submitting the normal way and refreshing the page

            else{
                $.notify("All fields are compulsory", {className: 'error',
                    autoHide: true,} );

            }



        }


        function submit_form(response) {

            var formData = {
                'title'              : $( "#mytitle" ).val(),
                'first'             : $('input[name=first]').val(),
                'surname'    : $('input[name=surname]').val(),
                'email'    : $('input[name=email]').val(),
                'phone'    : $('input[name=phone]').val(),
                'zonal'    : $( "#myzonal" ).val(),
                'partner'    : $( "#mypartner" ).val(),
                'member'    : $( "#mymember" ).val(),
                'amount'  : $('input[name=amount]').val(),
                'type'  : "Card",


            };

            //alert("I got here");

            $.ajax({
                type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                url         : 'insert.php?reference='+response, // the url where we want to POST
                data        : formData,
               // dataType    : 'json', // what type of data do we expect back from the server
                encode          : true
            })

          //  NProgress.start()
            // using the done promise callback
                .done(function(data) {

                   // alert("I dididid")
                    // log data to the console so we can see
                   // console.log("I got here too just now");
//
//                    //if number is on kingschat then process
                    if(data){
                        NProgress.done();
                        $.notify("Your registration was successful", {className: 'success',autoHide: false,
                        } );
                        $('#forme')[0].reset();
                        $("#payee").show(500);

                    }else{
                        NProgress.done();
                        $.notify("There was an issue with your payment, please contact IMM support to rectify this error", {className: 'error',autoHide: false,
                        } );
                        $("#payee").show(500);
                    }

                    // here we will handle errors and validation messages
                });



        }
    </script>

    

        <script type="text/javascript">
            $("#mymember").change(function(){

               if($(this).val() === "Yes"){

                $('#myzonal').show();


               }else{
                $('#myzonal').hide();
            
               }

            });

 </script>

</body>


</html>