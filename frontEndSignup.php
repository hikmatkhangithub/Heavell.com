<?php 
include("header.php");
?>
<div class="row">
<div id="shopNow">
<div id="container_demo">
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="validationSignup.php" method="post"> 
                                <h1>HEAVELL.com<br> Sign Up</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="F" > First Name </label>
                                    <input id="username" name="firstName" required="required" type="text" placeholder="@First Name"/>
                                </p>
                                <p> 
                                    <label for="username" class="uname" data-icon="L" > Last Name </label>
                                    <input id="username" name="lastName" required="required" type="text" placeholder="@Last Name"/>
                                </p>
                                <p> 
                                    <label for="username" class="uname" data-icon="P" > Phone </label>
                                    <input  type="number" id="username" name="phone" required="required" type="text" placeholder="@Phone"/>
                                </p>
                                <p> 
                                    <label data-icon="A" > Address </label>
                                    <input id="username" name="address" required="required" type="text" placeholder="@Address"/>
                                </p>






                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Your username </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="myusername"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                
                                <p class="login button"> 
                                    <input type="submit" name="submit" value="Sign Up" /> 
								</p>
                                
                            </form>
                        </div>

                        
						
                    </div>
                </div> 
</div>





</div>
<div class="row">
<?php 
include("mensFooter.php");
?>
</div>