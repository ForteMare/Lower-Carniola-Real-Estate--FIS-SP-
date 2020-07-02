<?php
include_once "../database/includes/connection.inc.php";

//Headers
include "../components/head_a.php";
?>
    <!-- Additional stylesheet unique to this document-->
    <link rel="stylesheet" href="../styles/estate.single.css">

<?php
include "../components/head_b.php";

// Get ID passed from estate.list.php
$id_local = $_GET['id'];


// Variable that holds SQL table row where ID matches GET
$sql_local = "SELECT * FROM properties WHERE id='{$id_local}';";

// Get a result of query $sql from $conn connection
$result = mysqli_query($conn, $sql_local);

// Checking if database actually returns something. Safety measure
$resultCheck = mysqli_num_rows($result);

// Second part of the safety measure
if (!$resultCheck > 0) {
    echo "ERROR: The SQL database could not be reached. The number of rows in the database is {$resultCheck}";
} else {

    // Column is an associative array of SQL $result
    $col = mysqli_fetch_assoc($result);

    // I prefer to have new variables
    $lc_name = $col['name'];
    $lc_region = $col['region'];
    $lc_price = $col['price'];
    $lc_bedrooms = $col['bedrooms'];
    $lc_bathrooms = $col['bathrooms'];
    $lc_plot = $col['plot'];
    $lc_living = $col['living'];
    $lc_description = $col['description'];
}

?>

    <!-- Header-Banner -->
    <header>
        <h1><?php echo "{$lc_name}" ?></h1>
    </header>

    <!-- Main Content -->
    <main>
        <section>
            <h3> Region: <?php echo "{$lc_name}" ?> </h3>
            <article>
                <p>

                    <?php echo "{$lc_description}" ?>
                </p>
            </article>
        </section>
    </main>

    <!-- Footer -->

<?php
include "../components/footer.php"
?>