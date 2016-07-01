<?php echo $header; ?>
<!--suppress ALL -->
<? //RZ echo var_dump($session_id); ?>
<input type="hidden" id="sessionId" value="<? //RZ echo $session_id; ?>">
<div id="kaire"></div>
<div class="container">
    <div class="row">
        <div id="menu-1">
            <div id="logo">
                <img src="/catalog/view/theme/fotoprizme/image/logo.png" title="Fotoprizmė - nuotraukos internetu">
            </div>
            <ul id="links">
                <li><a href="#landing">Pradžia</a></li>
                <li><a href="#ikelti-nuotraukas">Įkelti nuotraukas</a></li>
                <li><a href="#paslaugos">Paslaugos</a></li>
                <li><a href="#kas-mes">Apie mus</a></li>
                <li><a href="#atsiliepimai">Atsiliepimai</a></li>
                <li><a href="/catalog/view/theme/fotoprizme/wiki/index.html" target="_blank">Instrukcijos</a></li>
                <li><a href="#kontaktai">Kontaktai</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <section id="landing">
            <div class="greet"></div>
            <!--<div class="title">
                NUOTRAUKOS PAŠTU.<br/><span id="paprasta">Tai paprasta!</span>
            </div>-->
            <div class="zingsniai">
                <div class="ikonos">
                    <div class="ikona">
                        <i class="fa fa-desktop"></i>
                    </div>
                    <div class="ikona">
                        <i class="fa fa-long-arrow-right"></i>
                    </div>
                    <div class="ikona">
                        <i class="fa fa-file-text-o"></i>
                    </div>
                    <div class="ikona">
                        <i class="fa fa-long-arrow-right"></i>
                    </div>
                    <div class="ikona">
                        <i class="fa fa-envelope-o"></i>
                    </div>
                </div>
                <div class="uzrasai">
                    <div class="uzrasas ikelk">Įkeli</div>
                    <div class="uzrasas uzpildyk">Užpildai<br/>formą</div>
                    <div class="uzrasas gauk">Gauni<br/>paštu</div>
                </div>
            </div>
            <a href="#ikelti-nuotraukas" class="ikelti">Įkelti nuotraukas</a>

            <!-- Nuotraukų įkelimas -->
            <div class="nuotrauku-kelimas" id="ikelti-nuotraukas">
                <!-- Image uploading -->
                <div id="add-photos">
                    <form actionn="" class="dropzone" id="photos-2"></form>
                    <a href="" id="ikeliau-toliau">Tęsti</a>
                    <input type="hidden" id="userId" value="">
                    <input type="hidden" id="payment-successful" value="<?php if (isset($paymentSuccessful)) echo $paymentSuccessful; ?>">
                </div>

                <div id="patvirtinimas" title="Ar norite pradėti iš naujo?" style="display: none;">
                    <p>Per pastarąsias 2 dienas Jūs jau kėlėte nuotraukas. Ar norite kėlimą tęsti, ar pradėti iš naujo?</p>
                </div>

                <div id="rinktis-parametrus"></div>
                <div id="apmokejimas"></div>
            </div>

        </section>
        <section id="diving-beach">
            <div class="title">Mūsų paslaugos</div>
        </section>
        <section id="paslaugos" class="gradient">
            <div class="row paslaugos">
                <div class="paslauga">
                    <div id="nuotrauku-spausdinimas">
                        <a>Nuotraukų<br/>spausdinimas</a>
                    </div>
                    <div id="nuotrauku-spausdinimas-modal" class="modal wide">
                        <div class="accordion">
                            <h3>Nuotraukos dokumentams</h3>
                            <div>
                                <table>
                                    <tr>
                                        <td>Skubios (4 vnt.)</td>
                                        <td>Neskubios (4 vnt.)</td>
                                    </tr>
                                    <tr>
                                        <td>9,00 Lt</td>
                                        <td>tik 6,00 Lt</td>
                                    </tr>
                                </table>
                            </div>
                            <h3>Nuotraukos iš skaitmeninių laikmenų ir iš 35mm negatyvinių fotojuostelių</h3>
                            <div>
                                <table>
                                    <tbody>
                                    <tr>
                                        <td> Dydis / Kiekis </td><td>  nuo 1 iki 10 </td><td> nuo 11 iki 50 </td><td> nuo 51 iki 100 </td><td> &nbsp;&nbsp;&nbsp; nuo 100 &nbsp;&nbsp;&nbsp; </td>
                                    </tr>
                                    <tr> <td> 9x13 (cm)   </td> <td> 0.69 Lt </td>  <td> 0.59 Lt </td> <td> 0.49 Lt </td>  <td> 0.39 Lt </td> </tr>
                                    <tr> <td> 10x15 (cm) </td> <td> 0.79 Lt</td>  <td> 0.69 Lt  </td> <td> 0.59 Lt </td>  <td> 0.49 Lt </td> </tr>
                                    <tr> <td> 13x18 (cm) </td> <td> 1.59 Lt </td>  <td> 1.49 Lt  </td> <td> 1.39 Lt </td>  <td> 1.29 Lt </td> </tr>
                                    <tr> <td> 15x21 (cm) </td> <td> 1.99 Lt </td>  <td> 1.89 Lt </td> <td> 1.79 Lt </td>  <td> 1.69 Lt  </td> </tr>
                                    <tr> <td> 15x23 (cm) </td> <td> 2.29 Lt</td>  <td> 2.19 Lt </td> <td> 2.09 Lt </td>  <td> 1.99 Lt  </td> </tr>
                                    <tr> <td> 21x25 (cm) </td> <td> 4.49 Lt </td>  <td> 4.39 Lt </td> <td> 4.29 Lt </td>  <td> 4.19 Lt </td> </tr>
                                    <tr> <td> 21x30 (cm) </td> <td> 4.99 Lt</td>  <td> 4.89 Lt  </td> <td> 4.79 Lt </td>  <td> 4.69 Lt </td> </tr>
                                    </tbody>
                                </table>
                            </div>
                            <h3>Nuotraukų išklotinės ( index )</h3>
                            <div>
                                <table>
                                    <tr>
                                        <td>13x18 (cm)</td>
                                        <td>15x21 (cm)</td>
                                        <td>20x30 (cm)</td>
                                    </tr>
                                    <tr>
                                        <td>3,00 Lt</td>
                                        <td>4,00 Lt</td>
                                        <td>5,00 Lt</td>
                                    </tr>
                                </table>
                            </div>
                            <h3>Vieno kadro skenavimas ir įrašymas į skaitmeninę laikmeną</h3>
                            <div>
                                <table>
                                    <tr>
                                        <td>512 x 768</td>
                                        <td>1024 x 1536</td>
                                        <td>2048 x 3072</td>
                                        <td>4988 x 7428</td>
                                    </tr>
                                    <tr>
                                        <td>0,50 Lt</td>
                                        <td>1,00 Lt</td>
                                        <td>2,00 Lt</td>
                                        <td>3,00 Lt</td>
                                    </tr>
                                </table>
                            </div>
                            <h3>Juostelių skenavimas ir įrašymas į skaitmeninę laikmeną
                                ( 1024x1538 dpi, ~4,5 MB )</h3>
                            <div>
                                <table>
                                    <tr>
                                        <td>12 kadrų</td>
                                        <td>24 kadrai</td>
                                        <td>36 kadrai</td>
                                    </tr>
                                    <tr>
                                        <td>8,00 Lt</td>
                                        <td>10,00 Lt</td>
                                        <td>12,00 Lt</td>
                                    </tr>
                                </table>
                            </div>
                            <h3>Negatyvinių fotojuostų ryškinimas</h3>
                            <div>
                                <table>
                                    <tr>
                                        <td>12 kadrų</td>
                                        <td>24 kadrai</td>
                                        <td>36 kadrai</td>
                                    </tr>
                                    <tr>
                                        <td>4,00 Lt</td>
                                        <td>4,00 Lt</td>
                                        <td>4,00 Lt</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="paslauga">
                    <div id="skaitmenine-spauda">
                        <a>Skaitmeninė<br/>spauda</a>
                    </div>
                    <div id="skaitmenine-spauda-modal" class="modal wide">
                        <div class="paslauga-info">
                            Mažų tiražų spaudos darbus atliekame naudojant skaitmeninės spaudos technologiją, - tai vizitinių kortelių, reklaminių lankstinukų, skrajučių, kalendorių, plakatų, nuotraukų, proginių atvirukų spausdinimas.<br/>
                            Teikiame maketavimo, kopijavimo, dokumentų laminavimo, leidinių įrišimo paslaugas.<br/>
                            Atliekame nuotraukų retušavimą: atkuriame spalvas, trūkstamas detales, pašaliname techninius pažeidimus.<br/>
                        </div>
                        <div class="accordion">
                            <h3>Spauda</h3>
                            <div>
                                <table>
                                    <tr>
                                        <td>A4 (100g-270g)</td>
                                        <td>A3 SR3 (100g-270g)</td>
                                        <td>A3 dvipusis</td>
                                        <td>A3 SR3 dvipusis</td>
                                    </tr>
                                    <tr>
                                        <td>0.75 € 2.59 lt</td>
                                        <td>1.45€ 5,00 Lt</td>
                                        <td>1.74 € 6.00 Lt</td>
                                        <td>2.31€ 8,00 Lt</td>
                                    </tr>
                                </table>
                            </div>
                            <h3>Spalvotas kopijavimas</h3>
                            <div>
                                <table>
                                    <tr>
                                        <td>A4 (80g-120g)</td>
                                        <td>A4 (120g-250g)</td>
                                        <td>A3; SR3 (80g-120g)</td>
                                        <td>A3; SR3 (120g-250g)</td>
                                    </tr>
                                    <tr>
                                        <td>2,50 Lt</td>
                                        <td>3,00 Lt</td>
                                        <td>5,00 Lt</td>
                                        <td>10,00 Lt</td>
                                    </tr>
                                </table>
                            </div>
                            <h3>Nespalvotas kopijavimas</h3>
                            <div>
                                <table>
                                    <tr>
                                        <td>A4</td>
                                        <td>A3</td>
                                    </tr>
                                    <tr>
                                        <td>0,25 Lt</td>
                                        <td>0,50 Lt</td>
                                    </tr>
                                </table>
                            </div>
                            <h3>Laminavimas</h3>
                            <div>
                                <table>
                                    <tr>
                                        <td>Pažymėjimo</td>
                                        <td>A4</td>
                                    </tr>
                                    <tr>
                                        <td>2.00 Lt</td>
                                        <td>5.00 Lt</td>
                                    </tr>
                                </table>
                            </div>
                            <h3>Įrišimas plastikine spirale</h3>
                            <div>
                                <table>
                                    <tr>
                                        <td>10-80 lapų</td>
                                        <td>80-150 lapų</td>
                                        <td>150-250 lapų</td>
                                        <td>250-350 lapų</td>
                                        <td>virš 350 lapų</td>
                                    </tr>
                                    <tr>
                                        <td>3,00 Lt</td>
                                        <td>4,00 Lt</td>
                                        <td>5,00 Lt</td>
                                        <td>6,00 Lt</td>
                                        <td>9,00 Lt</td>
                                    </tr>
                                </table>
                            </div>
                            <h3>Vizitinių kortelių spausdinimas</h3>
                            <div>
                                <table>
                                    <tr>
                                        <td>juodai – baltos 100vnt.</td>
                                        <td>spalvotos 100 vnt.</td>
                                        <td>dvipuses 100 vnt.</td>
                                    </tr>
                                    <tr>
                                        <td>20,00 Lt</td>
                                        <td>30,00 Lt</td>
                                        <td>45,00 Lt</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="paslauga">
                    <div id="spaudos-darbai">
                        <a>Spaudos<br/>darbai</a>
                    </div>
                    <div id="spaudos-darbai-modal" class="modal wide">
                        <div class="paslauga-info">
                            Nuotraukų, iliustracijų spausdinimas ant drobės, skaitmeninio vaizdo paruošimas gamybai, drobės aptempimas ant poremio, lakavimas.
                        </div>
                        <div class="accordion">
                            <h3>Standartiniai formatai:</h3>
                            <div>
                                <table>
                                    <tr>
                                        <td>Matmenys</td>
                                        <td>Kaina</td>
                                    </tr>
                                    <tr>
                                        <td>15x20 (cm)</td>
                                        <td>31,00 Lt</td>
                                    </tr>
                                    <tr>
                                        <td>21x30 (cm)</td>
                                        <td>51,00 Lt</td>
                                    </tr>
                                    <tr>
                                        <td>30x40 (cm)</td>
                                        <td>71,00 Lt</td>
                                    </tr>
                                    <tr>
                                        <td>30x45 (cm)</td>
                                        <td>81,00 Lt</td>
                                    </tr>
                                    <tr>
                                        <td>40x60 (cm)</td>
                                        <td>101,00 Lt</td>
                                    </tr>
                                    <tr>
                                        <td>60x80 (cm)</td>
                                        <td>201,00 Lt</td>
                                    </tr>
                                    <tr>
                                        <td>60x90 (cm)</td>
                                        <td>221,00 Lt</td>
                                    </tr>
                                    <tr>
                                        <td>100x70 (cm)</td>
                                        <td>281,00 Lt</td>
                                    </tr>
                                    <tr>
                                        <td>100x100 (cm)</td>
                                        <td>381,00 Lt</td>
                                    </tr>
                                </table>
                            </div>
                            <h3>Nestandartiniai formatai:</h3>
                            <div>
                                <table>
                                    <tr>
                                        <td>iki 10 dm<sup>2</sup></td>
                                        <td>9,00 Lt/dm<sup>2</sup></td>
                                    </tr>
                                    <tr>
                                        <td>10 - 20 dm<sup>2</sup></td>
                                        <td>6,00 Lt/dm<sup>2</sup></td>
                                    </tr>
                                    <tr>
                                        <td>20 - 50 dm<sup>2</sup></td>
                                        <td>5,00 Lt/dm<sup>2</sup></td>
                                    </tr>
                                    <tr>
                                        <td>50 - 100 dm<sup>2</sup></td>
                                        <td>4,00 Lt/dm<sup>2</sup></td>
                                    </tr>
                                </table>
                            </div>
                            <h3>Dideli formatai:</h3>
                            <div>
                                <table>
                                    <tr>
                                        <td>virš 1,00 m<sup>2</sup></td>
                                        <td>380,00 Lt/m<sup>2</sup></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="paslauga flr">
                    <div id="firminis-stilius">
                        <a>Firminis<br/>stilius</a>
                    </div>
                    <div id="firminis-stilius-modal" class="modal wide">
                        <div class="paslauga-info">
                            Galime sumaketuoti skaitmeniniais formatais, firminio stiliaus atributiką (logotipus ir pan.)
                            <br/><br/>
                            Taip pat galimi šių darbų užsakymai:<br/>
                            Afiša, plakatas<br/>
                            Pažymėjimas<br/>
                            Atvirukas<br/>
                            Bukletas<br/>
                            CD, video, audio kasetės dėklas<br/>
                            Diplomas<br/>
                            Etiketė<br/>
                            Kainoraščiai, meniu<br/>
                            Kalendorius – plakatas<br/>
                            Pakabinamas kalendorius<br/>
                            Lipdukas<br/>
                            Polietileninis maišelis<br/>
                            Skrajutė<br/>
                            Reklamos maketas<br/>
                            Sveikinimai, kvietimai<br/>
                            Vizitinė kortelė<br/>
                            Vokas<br/>
                            Ženklo, logotipo sukūrimas
                        </div>
                    </div>
                </div>
            </div>
            <div class="row paslaugos">
                <div class="paslauga">
                    <div id="fotografavimo-paslaugos">
                        <a>Fotografavimo<br/>paslaugos</a>
                    </div>
                    <div id="fotografavimo-paslaugos-modal" class="modal wide">
                        <div class="paslauga-info">
                            Fotosesijos studijoje ir gamtoje nuo 50 € 173 Lt.
                        </div>
                    </div>
                </div>
                <div class="paslauga">
                    <div id="renginiu-filmavimas">
                        <a>Renginių<br/>filmavimas</a>
                    </div>
                    <div id="renginiu-filmavimas-modal" class="modal wide">

                    </div>
                </div>
                <div class="paslauga">
                    <div id="vaizdo-klipai">
                        <a>Vaizdo<br/>klipai</a>
                    </div>
                    <div id="vaizdo-klipai-modal" class="modal wide">
                        <div class="paslauga-info">
                            Renginių, švenčių, jubiliejų filmavimas , vaizdo medžiagos montavimas, įrašymas į DVD, vaizdo juostų perrašymas į skaitmenines laikmenas
                        </div>
                        <div class="accordion">
                            <h3>Operatoriaus su “Panasonic DVC Pro” kamera darbo įkainiai:</h3>
                            <div>
                                <table>
                                    <tr>
                                        <td>1 val.</td>
                                        <td>100.00 Lt</td>
                                    </tr>
                                    <tr>
                                        <td>2 - 4 val.</td>
                                        <td>po 80.00 Lt</td>
                                    </tr>
                                    <tr>
                                        <td>4 val. ir daugiau</td>
                                        <td>po 70.00 Lt</td>
                                    </tr>
                                </table>
                            </div>
                            <h3>Filmavimo Digital Video (DVCAM) formatu įkainiai:</h3>
                            <div>
                                <table>
                                    <tr>
                                        <td>Įvairūs įmonių renginiai (seminarai, konferencijos, prezentacijos, sukaktys ir t.t.). 1 filmavimo diena - nuo 600.00Lt
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Filmavimas pagal individualius užsakymus (pobūviai, sukaktys, gimtadieniai ir t.t.) - nuo 200.00Lt</td>
                                    </tr>
                                </table>
                            </div>
                            <h3>Kitos paslaugos:</h3>
                            <div>
                                <table>
                                    <tr>
                                        <td>CD, MC, DVD, VHS viršelio maketavimas</td>
                                        <td>nuo 35.00 iki 100.00Lt</td>
                                    </tr>
                                    <tr>
                                        <td>Nuotraukų iš vaizdajuostės paruošimas gamybai</td>
                                        <td>1vnt. – 10.00Lt</td>
                                    </tr>
                                </table>
                            </div>
                            <h3>Vaizdajuosčių kopijavimas iš Mini DV, Video 8, Hi 8 į VHS / iš VHS į DVD</h3>
                            <div>
                                <table>
                                    <tr>
                                        <td>1 val.</td>
                                        <td>30.00 Lt</td>
                                    </tr>
                                    <tr>
                                        <td>2 val.</td>
                                        <td>20.00 Lt</td>
                                    </tr>
                                    <tr>
                                        <td>3 val.</td>
                                        <td>10.00 Lt</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="paslauga-info">
                            Pastaba: visi užsakymai atliekami per savaitę, kainos nurodytos be kasečių.<br/>
                            Kainos gali būti pakeistos be atskiro perspėjimo.<br/>
                            Visos kainos pateiktos su PVM.<br/>
                        </div>
                    </div>
                </div>
                <div class="paslauga flr">
                    <div id="suvenyrai">
                        <a>Suvenyrai</a>
                    </div>
                    <div id="suvenyrai-modal" class="modal wide">
                        <div class="paslauga-info">
                            Keraminiai puodeliai bei taupyklės, su Jūsų nuotraukom, iliustracijom, užrašais (sveikinimais) ir t.t.
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="photography">
            <div class="title">Apie mus</div>
        </section>
        <section id="kas-mes">
            <img src="/catalog/view/theme/fotoprizme/image/logo.png" alt="Fotoprizmė"/>
            <div class="apie">„FOTOPRIZMĖ“ jau daugelį metų sėkmingai dirba foto ir vaizdo paslaugų, skaitmeninės spaudos srityje. Čia dirba profesionalūs fotografai, vaizdo operatoriai, kurie su malonumu įamžins Jūsų gyvenimo akimirkas. Skaitmeninės fotolaboratorijos leidžia greitai ir kokybiškai pagaminti nuotraukas. Jūsų patogumui priimami užsakymai internetu – tai greita ir kokybiška!</div>
        </section>
        <section id="sky-frames">
            <div class="title">Atsiliepimai</div>
        </section>
        <section id="atsiliepimai">
            <div class="cd-testimonials-wrapper cd-container">
                <ul class="cd-testimonials">
                    <li>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam assumenda aut autem consequatur culpa ipsa ipsam ipsum itaque magni non quae quia.
                        </p>
                        <div class="cd-author">
                            <img src="image/catalog/no_image-45x45.png" alt="">
                            <ul class="cd-author-info">
                                <li>Vardas</li>
                                <li>Vadovas, "Geriausi sprendimai"</li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam assumenda aut autem consequatur culpa ipsa ipsam ipsum itaque magni non quae quia.
                        </p>
                        <div class="cd-author">
                            <img src="image/catalog/no_image-45x45.png" alt="">
                            <ul class="cd-author-info">
                                <li>Vardas</li>
                                <li>Konsultantas, "Geriausi sprendimai"</li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam assumenda aut autem consequatur culpa ipsa ipsam ipsum itaque magni non quae quia.
                        </p>
                        <div class="cd-author">
                            <img src="image/catalog/no_image-45x45.png" alt="">
                            <ul class="cd-author-info">
                                <li>Vardas</li>
                                <li>Pardavimai, "Geriausi sprendimai"</li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <div class="cd-see-all"></div>
                <div class="cd-testimonials-all">
                    <div class="cd-testimonials-all-wrapper">
                        <ul>
                            <li class="cd-testimonials-item">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam assumenda aut autem consequatur culpa ipsa ipsam ipsum itaque magni non quae quia.
                                </p>
                                <div class="cd-author">
                                    <img src="image/catalog/no_image-45x45.png" alt="">
                                    <ul class="cd-author-info">
                                        <li>Vardas</li>
                                        <li>Finansistas, "Geriausi sprendimai"</li>
                                    </ul>
                                </div>
                            </li>
                            <li class="cd-testimonials-item">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam assumenda aut autem consequatur culpa ipsa ipsam ipsum itaque magni non quae quia.
                                </p>
                                <div class="cd-author">
                                    <img src="image/catalog/no_image-45x45.png" alt="">
                                    <ul class="cd-author-info">
                                        <li>Vardas</li>
                                        <li>Pardavimas, "Geriausi sprendimai"</li>
                                    </ul>
                                </div>
                            </li>
                            <li class="cd-testimonials-item">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam assumenda aut autem consequatur culpa ipsa ipsam ipsum itaque magni non quae quia.
                                </p>
                                <div class="cd-author">
                                    <img src="image/catalog/no_image-45x45.png" alt="">
                                    <ul class="cd-author-info">
                                        <li>Vardas</li>
                                        <li>Konsultantas, "Geriausi sprendimai"</li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <a href="#0" class="close-btn">Close</a>
                </div>
            </div>
        </section>
        <section id="uzsisakyti-nuotraukas">
            <a class="uzsisakyti" href="#ikelti-nuotraukas">Užsisakyti nuotraukas</a>
        </section>
        <section id="kontaktai">
            <!--@TODO: Fix '?' Adresą reikia imti iš duombazės o ir visą gabaliuką derėtų imti iš google_maps.php  issue-->
            <div class="zemelapis" align="center">
                <iframe frameborder="0" style="border:0"
                        src="https://www.google.com/maps/embed/v1/place?q=Architektų+g.+19,+++LT-04112+Vilnius+&key=AIzaSyCOVSz216QtWDooaEv-bPCu24giF13RT7I"></iframe>
            </div>
        </section>
        <section id="privacy">
            <div class="copyright">
                &copy; 2015 Fotoprisma
            </div>
            <div class="pipe">
                |
            </div>
            <div class="privacy-policy">
                <a href="">
                    Privatumo politika
                </a>
            </div>
        </section>
    </div>
</div>
<div id="desine"></div>
<div id="progresas">
    <a id="atgal"><<<</a>&nbsp;
    Žingsnis <span id="progresas-dabar">1</span> iš <span id="progresas-visas">3</span>&nbsp;
    <a id="pirmyn">>>></a>
</div>
<div class="payment-successful">
    <div id="aciu">
        Ačiū, kad naudojatės mūsų paslaugomis!<br/>
        Apie užsakymo eigą informuosime nurodytu el. paštu.
    </div>
</div>
<?php echo $footer; ?>
<?php //echo $address; ?>

<script>
  window.onload = function() {
    //alert( 'Dokumentas ir resursai uzkrauti pilnai' );
  };
</script>
<script>
  function ready() {
    //alert( "DOM uzkrautas (be resursu: paveikleliu, kai kuriu css'u ir panasiai)");
  }
  document.addEventListener("DOMContentLoaded", ready);
</script>
