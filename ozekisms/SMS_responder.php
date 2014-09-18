<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if(isset($_GET['sender']) and isset($_GET['msg']))
{
//$msg = "kubaza*Imyumbati*Gatsibo";
//$msg = "kubaza*Imyumbati*Gatsibo";
$msg = $_GET['msg'];

$valuearray=explode("*",$msg);
$service=$valuearray[0];
$product=$valuearray[1];
$district=$valuearray[2];
$message = "";


	if(strtolower($service) == "kubaza")
	{


			if($district!="" and $product!="") //if($district!="" and $product!=""$)
				{


					//query from database 
				$query="SELECT cp.id as id,idproduct,pr.productname as productname, m.umurenge,cp.idclient, totalamount, currentprice, quantity,mesure, creationdate,province,district
					FROM igu_payment p, igu_voucher v, igu_credit c, igu_products pr, igu_client_product cp,igu_registration r,imirenge m,igu_district dis,igu_province pro
					WHERE c.id = v.idcredit
					AND v.vouchernumber = p.vouchernumber
					AND pr.id = cp.idproduct
					and r.id = cp.idclient
					and m.id = r.idumurenge
					and m.iddistrict = dis.id
					and r.id = p.idclient
					and pro.id = dis.idprovince
					and dis.id = r.iddistrict
					and SUBSTRING(now(),1,10)  <= DATE_ADD( datepaiement, INTERVAL days DAY ) 
					and validity = 0 
                    and  idproduct = (SELECT id FROM igu_products WHERE productname ='".strtolower($product)."' ) 
                    and r.iddistrict = (SELECT id FROM igu_district WHERE district ='".strtolower($district)."')
					 ";
					
                //echo $query;

					
					$con = mysqli_connect("localhost","inyungu_inyungu","QHTJ-h^5mAQH","inyungu_inyungudb");
					//$db_selected = mysql_select_db("inyungu_inyungudb", $con);
					
					$rs = mysqli_query($con,$query);

					//end of query from database
				    while($row = mysqli_fetch_array($rs))
					{
						

				     $message=$message." ".$row['productname']."  ".$row['quantity'];
				    

				   }



				}
			else
			{
					$message='wanditse nabi !!! andika "kubaza*icyoushaka*akarere" murakoze.';
					
			}
	}
	else
	{
		$message='wanditse nabi !!! andika "kubaza*icyoushaka*akarere" murakoze.';

	}
	
	//echo $message;
echo "{SMS:TEXT}{}{+250788543310}{".$_GET['sender']."}{".$message."}";

}


?>