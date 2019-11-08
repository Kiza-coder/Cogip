<div class="card shadow mt-5">
    <div class="card-header text-center h3">Clients</div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>VAT</th>
                    <th>Country</th>
                </tr>
            </thead>
            <tbody>
            <?php
$companies_providers =  $req_providers-> fetchAll(PDO::FETCH_ASSOC);
foreach ($companies_providers as $key){
    $type = $key['id_type'];
    $url = $key['id'];
    $namecomp = $key['name'];
    $countrycomp = $key['country'];
    $VATcountry = $key['VAT'];
    echo <<<EOF
    <tr><td><a href="?id=$url&value=companies">$namecomp</a></td><td>$VATcountry </td><td> $countrycomp</td></tr>
EOF;
}
?>
        </tbody>
        </table>
    </div>
</div>
