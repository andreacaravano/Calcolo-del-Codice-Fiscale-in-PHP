<!--
 * Progetto "Codice Fiscale" - Componente di indicizzazione
 * Data ultima modifica: 27/12/2019
 * Adattamento del progetto "Codice Fiscale in PHP" da https://github.com/pirasalbe/5AII_Info_CodiceFiscale
-->
<?php
$opzioniComuni = " ";
$myfile = fopen("comuni.csv", "r") or die ("Database dei comuni non trovato.");
while (!feof($myfile)) {
    $linea = fgets($myfile);
    if (!feof($myfile)) {
        $array = explode(",", $linea);
        $com = trim($array[1]);
        $opzioniComuni = $opzioniComuni . "<option value=" . $array[0] . ">" . $com . "</option>";
    }
}
?>
<html lang="it">
    <head>
        <title>
            Progetto "Codice Fiscale" - Componente di indicizzazione
        </title>
        <script type="text/javascript">
            function richiediCF() {
                var richiesta = new XMLHttpRequest();
                richiesta.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("visore").innerHTML = this.responseText;
                        if (this.responseText.length == 16) {
                            document.getElementById("visore").style.color = "#1e7e34";
                        } else
                            document.getElementById("visore").style.color = "#a71d2a";
                    }
                };
                richiesta.open("POST", "calcola.php", true);
                richiesta.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                richiesta.send(("Cognome=" + document.getElementById("cognome").value + "&Nome=" + document.getElementById("nome").value + "&Sesso=" + document.getElementById("sesso").value + "&Anno=" + document.getElementById("anno").value + "&Mese=" + document.getElementById("mese").value + "&Giorno=" + document.getElementById("giorno").value + "&Comune=" + comune.options[comune.selectedIndex].text).trim());
            }
        </script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
              integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
              crossorigin="anonymous">
        <style>
            td {
                padding-top: 10px;
                padding-bottom: 10px;
            }

            th {
                padding-right: 30px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h3 style="display: flex; justify-content: center; padding-top: 30px; padding-bottom: 30px;">Progetto
                "Codice
                Fiscale" - Componente di
                indicizzazione</h3>
            <form name="modulo" style="display: flex; justify-content: center;">
                <table border="0">
                    <tr>
                        <td colspan="4">
                            <span id="visore"
                                  style="font-size: 1.5em; color: #000000; display: flex; justify-content: center">Inserisci i dati richiesti per continuare...</span>
                        </td>
                    </tr>
                    <tr>
                        <th>Cognome:</th>
                        <td colspan="3">
                            <input type="text" name="cognome" id="cognome" required style="width: 100%"/>
                        </td>
                    </tr>
                    <tr>
                        <th>Nome:</th>
                        <td colspan="3">
                            <input type="text" name="nome" id="nome" required style="width: 100%"/>
                        </td>
                    </tr>
                    <tr>
                        <th>Data di nascita:</th>
                        <td>
                            <label for="giorno">
                                Giorno
                            </label>
                            <br/>
                            <select name="giorno" id="giorno" size="1">
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>
                            &nbsp;&nbsp;
                        </td>
                        <td>
                            <label for="mese" style="padding-left: 28%;">
                                Mese
                            </label><br/>
                            <select name="mese" id="mese" size="1">
                                <option value="01">Gennaio</option>
                                <option value="02">Febbraio</option>
                                <option value="03">Marzo</option>
                                <option value="04">Aprile</option>
                                <option value="05">Maggio</option>
                                <option value="06">Giugno</option>
                                <option value="07">Luglio</option>
                                <option value="08">Agosto</option>
                                <option value="09">Settembre</option>
                                <option value="10">Ottobre</option>
                                <option value="11">Novembre</option>
                                <option value="12">Dicembre</option>
                            </select>
                            &nbsp;&nbsp;
                        </td>
                        <td>
                            <label for="anno" style="padding-left: 35%;">
                                Anno
                            </label><br/>
                            <input type="text" id="anno" name="anno" placeholder="1980" required>
                            &nbsp;&nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th>Città di nascita:</th>
                        <td colspan="3">
                            <select id="comune" name="comune" size="1" style="width: 100%">
                                <?= $opzioniComuni ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Sesso:</th>
                        <td colspan="3">
                            <select id="sesso" name="sesso" size="1" style="width: 100%">
                                <option value="M">Maschio</option>
                                <option value="F">Femmina</option>
                            </select>
                        </td>
                    </tr>
                    <tr style="text-align: center">
                        <td><input type="reset" value="AZZERA"/></td>
                        <td colspan="3">
                            <input type="button" value="CALCOLA" style="justify-content: center"
                                   onclick="richiediCF()"/>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>