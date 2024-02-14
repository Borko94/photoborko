<a href="pricing.php?source=add_pricing" class="btn btn-success">Dodaj novi paket</a>
<table class="table table__wrapper">
    <thead>
        <tr class="table__row">
        <th class="table__head">ID</th>
        <th class="table__head">Kategorija</th>
        <th class="table__head">Naziv</th>
        <th class="table__head">Opis</th>
        <th class="table__head">Detalji</th>
        <th class="table__head">Cijena</th>
        </tr>
    </thead>
    <tbody>
        <tr class="table__row">
            <?php
            $get_pricing_id = $_GET['id'];
            $query_pricing = "SELECT * FROM pricing WHERE pricing_category_id = $get_pricing_id";
            $run_query_pricing = mysqli_query($conn, $query_pricing);
            while($row = mysqli_fetch_assoc($run_query_pricing)){
                $pricing_id = $row['pricing_id'];
                $pricing_category_id = $row['pricing_category_id'];
                $pricing_title = $row['pricing_title'];
                $pricing_description = $row['pricing_description'];
                $pricing_features = $row['pricing_features'];
                $pricing_price = $row['pricing_price'];

            
            ?>
            <td data-label="ID" class="table__data"><?php echo $pricing_id; ?></td>
            <td data-label="ID" class="table__data">
            <?php
            $query_cat = "SELECT * FROM portfolio_categories WHERE portfolio_category_id = $pricing_category_id";
            $run_query_cat = mysqli_query($conn, $query_cat);
            while($row = mysqli_fetch_assoc($run_query_cat)){
                $cat_id = $row['portfolio_category_id'];
                $cat_name = $row['portfolio_category_name'];
            ?>
            <a href="pricing.php?source=pricing_by_category&id=<?php echo $cat_id; ?>"><?php echo $cat_name;?></a>
            <?php } ?>
            </td>
            <td data-label="Naslov" class="table__data"><?php echo $pricing_title; ?></td>
            <td data-label="Date" class="table__data"><?php echo $pricing_description; ?></td>
            <td data-label="Author" class="table__data"><?php echo $pricing_features; ?></td>
            <td data-label="Author" class="table__data"><?php echo $pricing_price; ?></td>
        </tr>
        <?php } ?>
    </tbody>
    </table>