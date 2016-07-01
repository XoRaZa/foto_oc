<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<?php

require_once('connect.php');
//phpinfo();
$userId = $_COOKIE['userId'];

$stmt = $con->prepare('SELECT * FROM picture WHERE user_id = :user_id');
$stmt->execute(
    array(
        'user_id' => $userId
    )
);
$results = $stmt->fetchAll();
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
        <?php foreach($results as $result): ?>
            <tr id="<?php echo $result['name'] ?>">
                <td class="td-nuotrauka">
                    <img src="<?php echo $result['url_thumb']; ?>" alt="<?php echo $result['name']; ?>">
                </td>
                <td class="td-pavadinimas">
                    <?php echo $result['original_name']; ?>
                </td>
                <td class="td-dydis">
                    <?php
                    $sizes = array(
                        '9x13',
                        '10x15',
                        '13x18',
                        '15x21',
                        '15x23',
                        '21x25',
                        '21x30'
                    );
                    $saved = isset($_COOKIE['sizeQ']) ? json_decode($_COOKIE['sizeQ'], TRUE) : '';
                    ?>
                    <div class="select-style">
                        <select name="dydis" class="dydis">
                            <!--<option value="" selected="selected" hidden="hidden"></option>-->
                            <?php foreach($sizes as $size): ?>
                                <?php
                                $savedSize = isset($saved[$result['name']]['size']) ? $saved[$result['name']]['size'] : '';
                                ?>
                            <option value="<?php echo $size ?>" <?php if($savedSize == $size) { echo 'selected="selected"'; } ?>><?php echo $size ?></option>
                            <?php endforeach; ?>
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
                            'su-kadravimu' => 'Su kadravimu',
                            'be-kadravimo' => 'Be kadravimo'
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
                <option value="9x13" selected>9x13</option>
                <option value="10x15">10x15</option>
                <option value="13x18">13x18</option>
                <option value="15x21">15x21</option>
                <option value="15x23">15x23</option>
                <option value="21x25">21x25</option>
                <option value="21x30">21x30</option>
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
