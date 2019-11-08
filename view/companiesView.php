<div class="card shadow mt-5">
    <div class="card-header text-center h3">Cogip : Companies Directory</div>
    <div class="card-body">
        <div class="card">
        <div class="card-header">
        <?php
        $typecompany = $requesttype ->fetchAll(PDO::FETCH_ASSOC);
        $type = $typecompany[0]['id_type'];
echo <<<EOF
<a href="?id_type=$type&value=companies">Clients</a>
EOF;
?>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th>Name</th>
                        <th>VAT</th>
                        <th>Country</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                ##### table for clients #####
                $company =  $req-> fetchAll(PDO::FETCH_ASSOC);
                    // loops in each company which is a client
                    foreach ($company as $key){
                    // variable $url stores the id for le detail de la company so when click, use that id for page detail
                    $url = $key['id'];
                    $namecomp = $key['name'];
                    $countrycomp = $key['country'];
                    $VATcountry = $key['VAT'];
                    $valueoptions = $_GET['value'];
                    $type = $key['id_type_companies'];
echo <<<EOF
<tr class="text-center"><td><a href="?id=$url&value=$valueoptions">$namecomp</a></td><td>$VATcountry </td><td> $countrycomp</td></tr>
EOF;
                }
                ?>
                </tbody>
            </table>
        </div>
        </div>
    </div>
    <!-- Providers -->
    <div class="card-body">
        <div class="card">
            <div class="card-header">
            <?php
$typecompany = $requesttype ->fetchAll(PDO::FETCH_ASSOC);
$type = $typecompany[0]['id_type'];
echo $type;
echo <<<EOF
<a href="?id_type=$type&value=companies">Providers</a>
EOF;
?>
          </div>
          <div class ="card-body">
                <table class="table">
                <thead>
                    <tr class="text-center">
                    <th>Name</th>
                    <th>VAT</th>
                    <th>Country</th>
                    </tr>
                </thead>
                <tbody>
                <?php
####### table for providers ######
$company = $requestp -> fetchAll(PDO::FETCH_ASSOC);
// looping to create link
foreach($company as $key){
    // variable $url stores the id for le detail de la company so when click, use that id for page detail
    $url = $key['id'];
    $namecomp = $key['name'];
    $countrycomp = $key['country'];
    $VATcountry = $key['VAT'];
    $valueoptions = $_GET['value'];
    echo <<<EOF
    <tr class="text-center"><td><a href="?id=$url&value=$valueoptions"> $namecomp</a></td><td> $VATcountry</td><td>$countrycomp</td></tr>
EOF;
}
?>
                </tbody>
                </table>
          </div>
        </div>
    </div>
    </div>
</div>



