<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<!-- Sidebar -->
<?php require '../requires/sideNavbar.php'; ?>

<!-- Main Content -->
<main class="content">

<?php require('../requires/navbar.php'); ?>
    <!-- Home Section -->
<?php require '../requires/adminHome.php'; ?>

    <!-- Students Section -->
    <?php require '../requires/adminStudents.php'; ?>


    <!-- Instructors Section -->
    <?php require '../requires/adminInstructors.php'; ?>

    <!-- Classrooms Section -->
    <?php require '../requires/adminClassrooms.php'; ?>

</main>

<script src="../admin.js"></script>
</body>
</html>