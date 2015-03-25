<!DOCTYPE html>
<html lang="en">
    <head>
        <title>ebay Shopping</title>
        <meta http-equiv="content-type" content="text/html; charset= utf-8"/>
        <style>
            h1 {
                display:inline;
            }

            #container{
                position: relative;
                top: 50px;
                width: 70%;
                margin: 0 auto; 
                border: 2px solid black;
            }

            #banner{
                width:50%;
                margin: 0 auto;
                padding: 2%;
            }

            #container #form {
                font-size: 15px;
                font-weight: bold;
                border: 3px solid black;
                margin: 2%;
                padding:2%;
                overflow: hidden;
            }

            #formTable{
                width:100%;
                margin: 0 auto;
            }
            .description{
                width:20%;  
            }

            .description p{
                margin: 0;
                padding: 3px;
            }
            .formInput #keywords{
                width:98.5%;
            }
            #shipping{
                margin: 0;
                padding-bottom: 41px;
            }

            #B,#clear{
               border: 1px outset gray;
               background-color: #D3D3D3;
               width: 80px;
               height:25px;
               float:right;
               margin:1%;
            }
            #outputs{
                clear: both;
                width:100%;
                padding:5px;
            }

            #outputs #title {
              text-align: center;
              font-size: 20px;
            }

            #resultTable{
                width:100%;
                font-size: 14px;
                border: 1px solid gray;
                font-family: serif;


            }
            #resultTable #leftPart{
                width:30%
            }
            #resultTable #leftPart img{
             width:80%;
             height: 200px;
            }

            #resultTable,#resultTable tr  {
             width: 100%;
             border: 1px solid gray;
             border-collapse: collapse;
            }

        </style>
        </head>
    <body>
        <div id="container">
            <div id ="banner">
            <table>
                <td><img src = "http://cs-server.usc.edu:45678/hw/hw6/ebay.jpg"></td>
                <td><h1>Shopping</h1></td>
            </table>
            </div>
            <div id = "form"> 
            <form method="get" id ="mainForm" action="<?php  error_reporting(E_ERROR); echo $_SERVER['PHP_SELF']; ?>">
            <table id ="formTable">
                <tr>
                    <td class = "description"><p>Key Words*:</p><hr></td>
                    <td class = "formInput"><input type="text" id = "keywords" name="keywords" value= "<?php echo $_GET["keywords"]  ?>"><hr></td>
                </tr>
                
                <tr>
                    <td class = "description"><p>Price Range:</p><hr></td>
                    <td class = "formInput">from $
                    <input type="text" id = "lowPrice" name="lowPrice" value= "<?php echo $_GET["lowPrice"];  ?>" >
                    to $
                    <input type="text" id = "highPrice" name="highPrice" value= "<?php echo $_GET["highPrice"];  ?>"><hr></td>
                </tr>
                
                <tr>
                    <td class = "description"><p>Condition:</p><hr></td>
                    <td class = "formInput">
                    <input type="checkbox" id ="newCheck" name="condition[]" value="1000" <?php if(  in_array("1000", $_GET["condition"]) ) echo "checked"; ?>> 
                    New
                    <input type="checkbox" id ="usedCheck" name="condition[]" value="3000" <?php if(  in_array("3000", $_GET["condition"]) ) echo "checked"; ?> >
                    Used
                    <input type="checkbox" id ="verygoodCheck" name="condition[]" value="4000" <?php if(  in_array("4000", $_GET["condition"]) ) echo "checked"; ?>>
                    Very Good
                    <input type="checkbox" id ="goodCheck" name="condition[]" value="5000" <?php if(  in_array("5000", $_GET["condition"]) ) echo "checked"; ?>>
                    Good
                    <input type="checkbox" id ="accptableCheck" name="condition[]" value="6000" <?php if(  in_array("6000", $_GET["condition"]) ) echo "checked"; ?>>
                    Accptable
                    <hr></td>
                </tr>
                
                <tr>
                    <td class = "description"><p>Buying Formats:</p><hr></td>
                    <td class = "formInput">
                    <input type="checkbox" id ="buyingitCheck" name="buying[]" value="FixedPrice" <?php if(  in_array("FixedPrice", $_GET["buying"]) ) echo "checked"; ?> > 
                    Buying It Now
                    <input type="checkbox" id ="auctionCheck" name="buying[]" value="Auction"  <?php if(  in_array("Auction", $_GET["buying"]) ) echo "checked"; ?> >
                    Auction
                    <input type="checkbox" id ="classifiedCheck" name="buying[]" value="Classified"  <?php if(  in_array("Classified", $_GET["buying"]) ) echo "checked"; ?> >
                    Classified Ads
                    <hr></td>
                </tr>
                <tr>
                    <td class = "description"><p>Seller:</p><hr></td>
                    <td class = "formInput"> <input type="checkbox" id ="returnedCheck" name="Seller" value="true" <?php if( "true" ==$_GET["Seller"] ) echo "checked"; ?>> 
                    Returned Accepted
                    <hr></td>
                </tr>
                <tr>
                    <td class = "description"><p id="shipping">Shipping:</p><hr></td>
                    <td class = "formInput">
                    <input type="checkbox" id ="freeCheck" name="freeshipping" value="true" <?php if(  "true" == $_GET["freeshipping"] ) echo "checked"; ?>  > 
                    Free Shipping<br>
                    <input type="checkbox" id ="expeditedCheck" name="expeditedshipping" value="Expedited" <?php if( "Expedited" == $_GET["expeditedshipping"]) echo "checked"; ?> >
                    Expedited shipping available<br>
                    Max handling time(days):
                    <input type="text" id = "maxtimeText" name="maxtime"  value="<?php echo $_GET["maxtime"];  ?>" >
                    <hr></td>
                </tr>

                <tr>
                    <td class = "description"><p>Sort by:</p><hr></td>
                    <td class = "formInput">                    
                        <select id = "sortby" name = "sortby" >
                            <option id = "firstSort"value="BestMatch" selected>Best Match </option>
                            <option value="CurrentPriceHighest"   <?php if( "CurrentPriceHighest" ==$_GET["sortby"] ) echo "selected"; ?>>Price:highest first </option>
                            <option value="CurrentPriceLowest"  <?php if( "CurrentPriceLowest" ==$_GET["sortby"] ) echo "selected"; ?>>Price:lowest first</option>
                            <option value="PricePlusShippingHighest"  <?php if( "PricePlusShippingHighest" ==$_GET["sortby"] ) echo "selected"; ?>>Price+ Shipping:highest </option>
                            <option value="PricePlusShippingLowest" <?php if( "PricePlusShippingLowest" ==$_GET["sortby"] ) echo "selected"; ?>>Price+ Shipping:lowest </option>
                        </select>
                    <hr></td>
                </tr>
                <tr>
                    <td class = "description"><p>Results Per page:</p><hr></td>
                    <td class = "formInput">                    
                        <select id = "results" name ="results"  >
                            <option id = "firstResults" value="5"  selected>5 </option>
                            <option value="10"  <?php if( "10" ==$_GET["results"] ) echo "selected"; ?>>10 </option>
                            <option value="15"  <?php if( "15" ==$_GET["results"] ) echo "selected"; ?>>15</option>
                            <option value="20"  <?php if( "20" ==$_GET["results"] ) echo "selected"; ?>>20 </option>
                        </select>
                    <hr></td>
                </tr>

            </table>
            <div id="Button">               
                <input type="button" id="B" value="submit">
                <input type="button" id="clear" value="clear" >
            </div>
            </form>
<?php 
//ini_set('display_errors',1);// Turn on all errors, warnings and notices for easier debugging 
// Turn off all error reporting
error_reporting(0);
$apiUrl = "http://svcs.eBay.com/services/search/FindingService/v1?";
$apiUrl .= "siteid=0";
$apiUrl .= "&SECURITY-APPNAME=USC887020-cd57-455b-bdcb-443fdc697d0";
$apiUrl .= "&OPERATION-NAME=findItemsAdvanced";
$apiUrl .= "&OPERATION-NAME=findItemsAdvanced&SERVICE-VERSION=1.0.0&RESPONSE-DATA-FORMAT=XML";
$keywordEncode = urlencode($_GET["keywords"]);
$apiUrl .="&keywords=$keywordEncode";
$index = 0;
//construct the filter url part

if(isset( $_GET["lowPrice"])&&$_GET["lowPrice"]!== ""){
    $lowPrice = $_GET["lowPrice"];
    $apiUrl .= "&itemFilter($index).name=MinPrice";
    $apiUrl .= "&itemFilter($index).value=$lowPrice";
    $index++;
}

if(isset( $_GET["highPrice"]) && $_GET["highPrice"]!==""){
    $highPrice = $_GET["highPrice"];
    $apiUrl .= "&itemFilter($index).name=MaxPrice";
    $apiUrl .= "&itemFilter($index).value=$highPrice";
    $index++;
}

if(isset($_GET["condition"])){
    $apiUrl .= "&itemFilter($index).name=Condition";
    foreach( $_GET["condition"] as $i => $filter ){
      $apiUrl .= "&itemFilter($index).value($i)=$filter";
    }
    $index++;
}

if(isset($_GET["buying"])){
    $apiUrl .= "&itemFilter($index).name=ListingType";
    foreach( $_GET["buying"] as $i => $filter ){
      $apiUrl .= "&itemFilter($index).value($i)=$filter";
    }
    $index++;
}

if(isset( $_GET["Seller"])){
    $returned = $_GET["Seller"];
    $apiUrl .= "&itemFilter($index).name=ReturnsAcceptedOnly";
    $apiUrl .= "&itemFilter($index).value=$returned";
    $index++;
}

if(isset( $_GET["freeshipping"])){
    $freeship = $_GET["freeshipping"];
    $apiUrl .= "&itemFilter($index).name=FreeShippingOnly";
    $apiUrl .= "&itemFilter($index).value=$freeship";
    $index++;
}

if(isset( $_GET["expeditedshipping"])){
    $expediteship = $_GET["expeditedshipping"];
    $apiUrl .= "&itemFilter($index).name=ExpeditedShippingType";
    $apiUrl .= "&itemFilter($index).value=Expedited";
    $index++;
}

if(isset( $_GET["maxtime"])&&$_GET["maxtime"]!== ""){
    $maxtime = $_GET["maxtime"];
    $apiUrl .= "&itemFilter($index).name=MaxHandlingTime";
    $apiUrl .= "&itemFilter($index).value=$maxtime";
    $index++;
}
if(isset( $_GET["sortby"])){
    $sortby = $_GET["sortby"];
    $apiUrl .= "&sortOrder=$sortby";   
}

if(isset( $_GET["results"])){
    $resultsnumber = $_GET["results"];
    $apiUrl .= "&paginationInput.entriesPerPage=$resultsnumber";   
}

//echo $apiUrl;
$xmlParser = simplexml_load_file($apiUrl) or die("Error: Cannot create object"); 
$table ="";
$output="";
if(!isset($_GET['keywords']))
   $output="";
else if($xmlParser->ack =="Failure" || $xmlParser->searchResult->item->count() == 0)
    $output = "<div id ='outputs'><div id ='title'><p>No Results Found</p></div></div>";
else {
foreach($xmlParser->searchResult->item as $item){
    $table .= "<tr><td id='leftPart'><img src ='";
    $table .=$item->galleryURL."'></td><td><a href='".$item->viewItemURL."'>".$item->title."</a>";
    $table .= "<p>condition: ".$item->condition->conditionDisplayName;
    if($item->topRatedListing == true){
        $table .= "       <img width='30px' height ='30px' src='http://cs-server.usc.edu:45678/hw/hw6/itemTopRated.jpg'></p>";
    }
    else{
        $table .=  "</p>";       
    }
    $listingType ="";
    if($item->listingInfo->listingType =="FixedPrice" || $item->listingInfo->listingType =="StoreInventory"){
        $listingType = "Buy It Now";
    }
    else if($item->listingInfo->listingType == "Classified"){
        $listingType = "Classified Ad";
    }
    else if($item->listingInfo->listingType == "Auction"){
        $listingType = "Auction";
    }

    $table .= "<p>".$listingType."</p>";
    
    // seller accept return or not 
    if($item->returnsAccepted = false){
            $acceptReturn ="Seller accepts return";
            $table .= "<p>".$acceptReturn."</p>";
    }
    
    
    // Shipping info
    $shippingInfo ="";
    if($item->shippingInfo->shippingServiceCost == 0.0){
        $shippingInfo .= "Free shipping -- ";
    }

    if($item->shippingInfo->expeditedShipping == true){
        $shippingInfo .= "Free shipping -- ";
    }
    
    $shippingInfo .= "handling shipping in ".$item->shippingInfo->handlingTime." day(s)";
    $table .= "<p>".$shippingInfo."</p>";
    
    //price and location
    $price = "Price: $".$item->sellingStatus->convertedCurrentPrice;
    if($item->shippingInfo->shippingServiceCost > 0)
        $price .= "(+$".$item->shippingInfo->shippingServiceCost." for shipping)";
    if($item->location != null){
        $price .= " from ".$item->location;
    }
    $table .= "<p>".$price."</p>";
    
    $table .= "</td></tr>";
    
}
$output = "<div id ='outputs'><div id ='title'><p>".$xmlParser->paginationOutput->totalEntries." results for ".$_GET["keywords"]."</p></div><table id='resultTable'>".$table."</table></div>";
}
echo $output;
                
?>
            </div>
        </div>
        <script >
            function isInt(n) {
                   return n % 1 === 0;
                }
                document.getElementById("B").onclick = function(){
                    //check field
                    if(document.getElementById("keywords").value == "")
                        alert("Please enter value for key words");
                    else if(!isInt( document.getElementById("lowPrice").value ) || !isInt( document.getElementById("highPrice").value ) )
                        alert("The Price range field should be integer number");
                    else if(!isInt( document.getElementById("maxtimeText").value ) )
                        alert("Max handling time field shoulb be integer number");
                    else if(document.getElementById("lowPrice").value > document.getElementById("highPrice").value )
                        alert("In Price range field, minimum Price should not larger than maximum Price!");
                    else document.getElementById("mainForm").submit();

                };

                document.getElementById("clear").onclick = function(){
                    for(var i=0; i < document.getElementsByTagName("input").length; i++){
                        if(document.getElementsByTagName("input")[i].id != "B" && document.getElementsByTagName("input")[i].id != "clear" )
                         document.getElementsByTagName("input")[i].removeAttribute("value");
                         document.getElementsByTagName("input")[i].removeAttribute("checked");
                    }
                    for(var i=0; i < document.getElementsByTagName("option").length; i++){
                     //if(document.getElementsByTagName("option")[i].id != "firstResults" && document.getElementsByTagName("option")[i].id != "firstSort" )
                         document.getElementsByTagName("option")[i].removeAttribute("selected");
                    }
                    document.getElementById("firstResults").setAttribute("selected", "selected");
                    //document.getElementById("firstResults").checked = true;
                    document.getElementById("firstSort").setAttribute("selected", "selected");
                    //document.getElementById("firstSort").checked = true;
                    document.getElementById("outputs").parentElement.removeChild(document.getElementById("outputs"));
                }

        </script>
     <NOSCRIPT>   
    </body>
</html>
    