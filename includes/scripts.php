    <!-- the javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="./js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>      
    <script type="text/javascript">
      
    $(document).ready( function() {       
        //enables the dropdown menu 
        $('.dropdown-toggle').dropdown();      
    });
    
    function check_logged_in(logged, product_id ){
        if (logged == 1){
            window.location.href = "./prescription.php?product_id=" + product_id;
        }
        else{
            alert ("<?php echo YOU_MUST_LOG_IN; ?>");
        }
    }
    
    //add class .active on menu
    /*
    $(function(){
    var url = window.location.pathname, 
        urlRegExp = new RegExp(url.replace(/\/$/,'') + "$"); // create regexp to match current url pathname and remove trailing slash if present as it could collide with the link in navigation in case trailing slash wasn't present there
        // now grab every link from the navigation
        $('.nav a').each(function(){
            // and test its normalized href against the url pathname regexp
            if(urlRegExp.test(this.href.replace(/\/$/,''))){
                $(this).parent().addClass('active');
            }
        });
    });
    
    $(document).ready(function () {  
        $('#select_lang').change(function () {
            window.location.href = "./index.php?lang="+ $(this).val();
    });    
    */
</script>
 <?php 
 require ('./includes/functions/cookie-function.php');
 ?>
