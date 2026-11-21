<?php
declare(strict_types=1);

// Step 2: multidimensional array: key = product name, value = [price, stock]
$products = [
    'Candy Canes'       => ['price' => 25.00,  'stock' => 40],
    'Hot Chocolate Mix' => ['price' => 80.00,  'stock' => 12],
    'Fudge Cakes'       => ['price' => 120.00, 'stock' => 6],
    'Lollipops'         => ['price' => 15.00,  'stock' => 75],
    'Peppermint Twists' => ['price' => 30.00,  'stock' => 5],
    'Gingerbread Men'   => ['price' => 45.00,  'stock' => 9],
    'Holiday Truffles'  => ['price' => 150.00, 'stock' => 28],
    'Candy Ornaments'   => ['price' => 60.00,  'stock' => 0],
];

// Step 3: global variable for the tax rate (percent)
$tax_rate = 12;

// Step 4-5: reorder message using a ternary operator
function get_reorder_message(int $stock): string
{
    return $stock < 10 ? 'Yes' : 'No';
}

// Step 6-7: total value of the stock for one product
function get_total_value(float $price, int $quantity): float
{
    return $price * $quantity;
}

// Step 8-9: tax due once all the stock is sold
function get_tax_due(float $price, int $quantity, int $tax_rate = 0): float
{
    return get_total_value($price, $quantity) * ($tax_rate / 100);
}

$pageTitle = "Stock Monitor";
include_once 'includes/header.php';
?>
    <h2>Stock Monitor</h2>
    <p>Tax rate: <?= $tax_rate ?>%</p>
    <table>
        <tr>
            <th>Product</th>
            <th>In Stock</th>
            <th>Reorder?</th>
            <th>Stock Value</th>
            <th>Tax Due</th>
        </tr>
        <?php foreach ($products as $product_name => $data): ?>
        <tr>
            <td><?= $product_name ?></td>
            <td><?= $data['stock'] ?></td>
            <td><?= get_reorder_message($data['stock']) ?></td>
            <td>&#8369;<?= number_format(get_total_value($data['price'], $data['stock']), 2) ?></td>
            <td>&#8369;<?= number_format(get_tax_due($data['price'], $data['stock'], $tax_rate), 2) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <p>All prices are in Philippine pesos (&#8369;).</p>

<?php include_once 'includes/footer.php'; ?>