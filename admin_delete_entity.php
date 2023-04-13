<?php
    ob_start();
    session_start();
    include("dbh-inc.php");
	include("functions.php");
    //Query the database for all the doctors, offices, and patients, and save each result into an array.
    $doctor_query = "SELECT doctor_id, first_name, last_name FROM doctor";
    $doctor_result = mysqli_query($conn, $doctor_query);
    $doctor_array = mysqli_fetch_all($doctor_result, MYSQLI_ASSOC);

    $office_query = "SELECT office_id, street_address, city, state, zip FROM address,office WHERE office.address_id = address.address_id";
    //Get each associative array from each result of each of the queries

?>

<!DOCTYPE html>
<html>

<script>
    function ben_fun(str) {
    if(window.XMLHttpRequest) {
      xmlhttp = new XMLHttpRequest();
    }
    else{
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function() {
      if (this.readyState==4 && this.status==200) {
        document.getElementById('entity').innerHTML = this.responseText;
      }
    }
    xmlhttp.open("GET","admin_entity.php?value="+str, true);
    xmlhttp.send();

  }
  //Get the select element with id "object" using getElementId
  const thingToDel = document.getElementById('entity');
  thingToDel.addEventListener('change', (event) => {
    e.preventDefault();
    //Reset the html of the select
    //If the user selects doctor, show all the doctors in the select with id "object"
    //Create an array of the doctors/offices/patients using the arrays you got at the top
    //Then we do:
    /*
    arr.forEach(entry => {
        const html = `<option value="doctor">entry</option>`
        selectElem.insertAdjacentHTML('afterbegin', html)
    })
     */
  });

</script>

<head>
    <title>Admin Delete Entity</title>
    <header>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <h1><center>Delete Entity</center></h1>
        <nav>
            <ul>
                <li class ="active"><a href="adminhomepage.php">Home</a></li>
                <li><a href="admin_create_doctor.php">Create Doctor</a></li>
                <li><a href="admin_create_office.php">Create Office</a></li>
                <li><a href="admin_delete_entity.php">Delete Entity</a></li>
				<li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
</head>

<body>
    <form method="post" action = "<?php echo $_SERVER['PHP_SELF']; ?>" >
		<label for="entity">Pick an entity to delete:</label>
	    <select id="entity" name="entity" onchange="ben_fun(this.value);"> 
            <option value=""></option>
            <option value="doctor">Doctor</option>
            <option value="office">Office</option>
            <option value="patient">Patient</option>
	    </select>
	   
        <!-- onchange="my_other_fun(this.value);" -->
        <label for="">Pick an object to delete:</label>
        <select id="object" name="object" >
            <option value="">Select object</option>
        </select>

        <input type="submit" value="Submit">
    <form>
</body>