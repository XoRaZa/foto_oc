<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<?php

require_once('connect.php');
$userId = $_COOKIE['userId'];

$results = $con->query("SELECT * FROM picture WHERE user_id = '$userId'");
//var_dump($results);

?>
    <table>
        <tr class="tr-pavadinimai">
            <td>Nuotrauka</td>
            <td>Pavadinimas</td>
            <td>Pasirinkti dydį</td>
            <td>Popieriaus paviršius</td>
            <td>Pilnas kadras</td>
            <td>Kiekis</td>
            <td>Pašalinti</td>
        </tr>
        <?php 
            foreach($results as $result): ?>
            <tr id="<?php echo $result['name'] ?>">
                <td class="td-nuotrauka">
                    <img src="<?php echo $result['url_thumb']; ?>" alt="<?php echo $result['name']; ?>">
                </td>
                <td class="td-pavadinimas">
                    <?php echo $result['original_name']; ?>
                </td>
                <td class="td-dydis">
                    <?php
                        $sizes = array();
                        $sql_str = 
                                "SELECT pr.product_id, model "
                                ."FROM oc_product pr, oc_product_to_category cat "
                                ."WHERE pr.product_id = cat.product_id AND cat.category_id = 59";
                        
                        foreach ($con->query($sql_str) as $row) {
                            $sizes[] = array('product_id' => $row['product_id'], 'model' => substr($row['model'], -5));
                        }
                    
                    $saved = isset($_COOKIE['sizeQ']) ? json_decode($_COOKIE['sizeQ'], TRUE) : '';
                    ?>
                    <div class="select-style">
                        <select name="dydis" class="dydis">
                            <!--<option value="" selected="selected" hidden="hidden"></option>-->
                            <?php foreach($sizes as $size){ ?>
                                <?php
                                $savedSize = isset($saved[$result['name']]['size']) ? $saved[$result['name']]['size'] : '';
                                ?>
                                <option value="<?php echo $size['product_id'] ?>" <?php if($savedSize == $size['model']) { echo ' selected'; } ?>><?php echo $size['model'] ?></option>
                            <?php }; ?>
                        </select>
                    </div>
                </td>
                <td class="td-pavirsius">
                    <div class="select-style">
                        <?php
                        $pavirsiai = array(
                            'blizgus' => 'Blizgus',
                            'matinis' => 'Matinis'
                        );
                        ?>
                        <select name="pavirsius" class="pavirsius">
                            <!--<option value="" selected="selected" hidden="hidden"></option>-->
                            <?php foreach($pavirsiai as $val => $name): ?>
                                <option value="<?php echo $val; ?>"><?php echo $name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </td>
                <td class="td-kadravimas">
                    <div class="select-style">
                        <?php
                        $kadravimas = array(
                            'be-kadravimo' => 'Pilnas',
                            'su-kadravimu' => 'Su kadravimu'
                        );
                        ?>
                        <select name="kadravimas" class="kadravimas">
                            <!--<option value="" selected="selected" hidden="hidden"></option>-->
                            <?php foreach($kadravimas as $val => $name): ?>
                                <option value="<?php echo $val; ?>"><?php echo $name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </td>
                <td class="td-kiekis">
                    <input type="number" name="kiekis" class="kiekis" value="<?php if(isset($saved[$result['name']]['quantity'])) {
                        echo $saved[$result['name']]['quantity'];
                    } else { echo '1'; } ?>" min="1">
                </td>
                <td class="td-panaikinti">
                    <a class="panaikinti"><i class="fa fa-trash-o"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <div id="dydziai">
        <div class="parinkti">
            Parinkti dydį pažymėtoms nuotraukoms:
        </div>
        <div class="select-style">
            <select name="dydziai" class="dydziai">
                <?php foreach($sizes as $size){ ?>
                    <option value="<?php echo $size['product_id'] ?>" ><?php echo $size['model'] ?></option>
                <?php }; ?>
            </select>
        </div>
        <!--
        <div class="select-style" hidden visibility="hidden" display="none">
            <select name="pavirsius" class="pavirsius">
                <option value="1" >Blizgus</option>
                <option value="2">Matinis</option>
            </select>
        </div>
        <div class="select-style" hidden>
            <select name="kadravimas" class="kadravimas">
                <option value="1" >Su kadravimu</option>
                <option value="2">Be kadravimo</option>
            </select>
        </div>
        -->
        <br/>
        <button id="pazymeti" class="btn btn-default">Pažymėti visas nuotraukas</button>
        <button id="atzymeti" class="btn btn-default">Atžymėti visas nuotraukas</button>
    </div>
    <div id="viso">
        Iš viso nuotraukų: <span id="nuotrauku-kiekis"></span>&nbsp;Kaina: <span id="kaina"></span> &euro;
    </div>
    <button id="apmoketi" class="narsyti">Apmokėti užsakymą</button>

<script type="text/javascript" src="/catalog/view/javascript/jfoto/change_size.js"></script>
<script type="text/javascript" src="/catalog/view/javascript/jfoto/change_pavirsius.js"></script>
<script type="text/javascript" src="/catalog/view/javascript/jfoto/change_kadravimas.js"></script>
<script type="text/javascript" src="/catalog/view/javascript/jfoto/change_quantity.js"></script>
<script type="text/javascript" src="/catalog/view/javascript/jfoto/recalculate.js"></script>
