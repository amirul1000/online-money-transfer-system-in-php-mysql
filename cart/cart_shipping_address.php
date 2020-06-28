<h3>Shipping Address</h3>
   <table width="50%">
      <tr>
        <td>First Name</td>
        <td><input type="text" name="ship_first_name" id="ship_first_name" value="<?=$_REQUEST['ship_first_name']?>" required/></td>
      </tr>
      <tr>
        <td>Last Name</td>
        <td><input type="text" name="ship_last_name" id="ship_last_name" value="<?=$_REQUEST['ship_last_name']?>" required/></td>
      </tr>
      <tr>
        <td>Address Line 1</td>
        <td><input type="text" name="ship_adress1" id="ship_adress1" value="<?=$_REQUEST['ship_adress1']?>" required/>
        </td>
      </tr>
      <tr>
        <td>Address Line 2</td>
        <td><input type="text" name="ship_adress2" id="ship_adress2"  value="<?=$_REQUEST['ship_adress2']?>"/>
        </td>
      </tr>
      <tr>
        <td>Zip code</td>
        <td><input type="text" name="ship_zip_code" id="ship_zip_code" value="<?=$_REQUEST['ship_zip_code']?>" required/>
        </td>
      </tr>
      <tr>
        <td>District/City</td>
        <td><input type="text" name="ship_city" id="ship_city" value="<?=$_REQUEST['ship_city']?>" required/>
        </td>
      </tr>
      <tr>
        <td>State</td>
        <td><input type="text" name="ship_state" id="ship_state" value="<?=$_REQUEST['ship_state']?>"/>
        </td>
      </tr>
      <tr>
        <td>Country</td>
        <td><input type="text" name="ship_country" id="ship_country" value="<?=$_REQUEST['ship_country']?>" required/>
        </td>
      </tr>
   </table>