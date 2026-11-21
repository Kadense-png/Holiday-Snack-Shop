<?php
require 'includes/data.php';

$pageTitle = "The Candy Store";
include_once 'includes/header.php';

// Conditional: greeting based on the hour
if ($hour < 12) {
    $greeting = "Good morning";
} elseif ($hour < 18) {
    $greeting = "Good afternoon";
} else {
    $greeting = "Good evening";
}

// Conditional: daily special using switch
switch ($day) {
    case "Saturday":
    case "Sunday":
        $special = "Weekend treat: buy 2 Lollipops, get 1 free!";
        break;
    case "Friday":
        $special = "Fudge Friday: Fudge Cakes are 10% off!";
        break;
    default:
        $special = "Weekday deal: free Candy Cane with any Hot Chocolate.";
}
?>
    <h2><?= $greeting ?>, <?= $name ?></h2>
    <p>Welcome to The Candy Store. Today is <?= $day ?>.</p>
    <p class="offer"><?= $special ?></p>

    <h2>Your Holiday Favorites</h2>
    <?php foreach ($favorites as $index => $treat): ?>
        <p><?= $index + 1 ?>. <?= $treat ?></p>
    <?php endforeach; ?>
    <p>Your top treat this season is <?= $favorites[1] ?>.</p>

    <h2>Our Candy Shelf</h2>
    <table>
        <tr>
            <th>Treat</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Status</th>
        </tr>
        <?php
        $totalStock = 0;
        foreach ($candies as $candy):
            $totalStock += $candy[2];

            if ($candy[2] == 0) {
                $status = "Sold out";
            } elseif ($candy[2] < 10) {
                $status = "Almost gone!";
            } else {
                $status = "Available";
            }
        ?>
        <tr>
            <td><?= $candy[0] ?></td>
            <td>&#8369;<?= $candy[1] ?></td>
            <td><?= $candy[2] ?></td>
            <td><?= $status ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <p>Total pieces on the shelf: <?= $totalStock ?></p>

    <h2>Candy Cane Decorations</h2>
    <?php for ($i = 1; $i <= 5; $i++): ?>
        <p><?= str_repeat("🍬 ", $i) ?></p>
    <?php endfor; ?>

    <h2>Days Until Christmas</h2>
    <?php
    $daysLeft = (int) ((strtotime(date('Y') . "-12-25") - strtotime(date('Y-m-d'))) / 86400);
    $count = 0;
    while ($count < 3 && $daysLeft > 0) {
        echo "<p>" . ($daysLeft - $count) . " days to go...</p>";
        $count++;
    }
    if ($daysLeft <= 0) {
        echo "<p>Merry Christmas!</p>";
    }
    ?>
    <p><a class="button" href="contact.php">Order Now</a></p>

<?php include_once 'includes/footer.php'; ?>