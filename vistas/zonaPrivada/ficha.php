<!DOCTYPE html>
<?php
session_start();

include "../../security/sec.php";
if (isset($_SESSION["log"])) { //Si existe la variable sesion log
    if ($_SESSION["log"] == false) { // Si no estamos logeados, entramos a logear
        include "../security/sec.php";
    }
} else {
    header("Location: ../iniciarSesion.html");
}
include "../../controladores/conexionBBDD.php";

?>
<html lang="en">

</html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../estilos/ficha.css">
    <link rel="stylesheet" href="../../estilos/generales/nav-bar.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../../estilos/generales/modal.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Metamorphous&display=swap" rel="stylesheet">
    <title>Fichas</title>
</head>

<body>
    <div class="nav-bar" id="nav-bar">
        <a href="../../index.html"><img class="nav-bar-logo"
                src="../../imagenes/nav-bar/hermandad-del-grajo-foto.png"></a>
        <a class="nav-bar-texto" href="../privado.php">ZONA PRIVADA</a>
        <?php if (isset($_SESSION["log"]) && $_SESSION["log"] == 1): ?>
            <a class="nav-bar-texto-users"
                href="../../security/logout.php"><?php echo htmlspecialchars($_SESSION["nombre"]) . " - Cerrar sesión"; ?></a>
        <?php else: ?>
            <a class="nav-bar-texto-users" href="../../vistas/iniciarSesion.html">Iniciar sesión</a>
        <?php endif; ?>
    </div>
    <fieldset>
        <?php
        $filt = $con->prepare("SELECT * FROM fichas WHERE ID_ficha = ?");
        $filt->bind_param("i", $_SESSION['id']);
        $filt->execute();
        $res = $filt->get_result();
        for ($i = 0; $i < $res->num_rows; $i++) {
            $resultados = $res->fetch_assoc();
        ?>
        <form class="charsheet">
            <header>
                <section class="charname">
                    <label for="charname">Character Name</label><input name="charname"
                        value="<?php echo $resultados['charname'] ?>" placeholder="Thoradin Fireforge" />
                </section>
                <section class="misc">
                    <ul>
                        <li>
                            <label for="classlevel">Class & Level</label><input name="classlevel" value="<?php echo $resultados['classlevel'] ?>"
                                placeholder="Paladin 2" />
                        </li>
                        <li>
                            <label for="background">Background</label><input name="background" placeholder="Acolyte" value="<?php echo $resultados['background'] ?>"/>
                        </li>
                        <li>
                            <label for="playername">Player Name</label><input name="playername" value="<?php echo $resultados['playername'] ?>"
                                placeholder="Player McPlayerface">
                        </li>
                        <li>
                            <label for="race">Race</label><input name="race" placeholder="Half-elf" value="<?php echo $resultados['race'] ?>"/>
                        </li>
                        <li>
                            <label for="alignment">Alignment</label><input name="alignment" placeholder="Lawful Good" value="<?php echo $resultados['alignment'] ?>"/>
                        </li>
                        <li>
                            <label for="experiencepoints">Experience Points</label><input name="experiencepoints" value="<?php echo $resultados['experiencepoints'] ?>"
                                placeholder="3240" />
                        </li>
                    </ul>
                </section>
            </header>
            <main>
                <section>
                    <section class="attributes">
                        <div class="scores">
                            <ul>
                                <li>
                                    <div class="score">
                                        <label for="Strengthscore">Strength</label><input name="Strengthscore" value="<?php echo $resultados['Strengthscore'] ?>"
                                            placeholder="10" class="stat" />
                                    </div>
                                    <div class="modifier">
                                        <input name="Strengthmod" placeholder="+0" class="statmod" value="<?php echo $resultados['Strengthmod'] ?>"/>
                                    </div>
                                </li>
                                <li>
                                    <div class="score">
                                        <label for="Dexterityscore">Dexterity</label><input name="Dexterityscore" value="<?php echo $resultados['Dexterityscore'] ?>"
                                            placeholder="10" class="stat" />
                                    </div>
                                    <div class="modifier">
                                        <input name="Dexteritymod" placeholder="+0" class=statmod value="<?php echo $resultados['Dexteritymod'] ?>"/>
                                    </div>
                                </li>
                                <li>
                                    <div class="score">
                                        <label for="Constitutionscore">Constitution</label><input
                                            name="Constitutionscore" placeholder="10" class="stat" value="<?php echo $resultados['Constitutionscore'] ?>"/>
                                    </div>
                                    <div class="modifier">
                                        <input name="Constitutionmod" placeholder="+0" class="statmod" value="<?php echo $resultados['Constitutionmod'] ?>"/>
                                    </div>
                                </li>
                                <li>
                                    <div class="score">
                                        <label for="Wisdomscore">Wisdom</label><input name="Wisdomscore" value="<?php echo $resultados['Wisdomscore'] ?>"
                                            placeholder="10" class="stat" />
                                    </div>
                                    <div class="modifier">
                                        <input name="Wisdommod" placeholder="+0" value="<?php echo $resultados['Wisdommod'] ?>"/>
                                    </div>
                                </li>
                                <li>
                                    <div class="score">
                                        <label for="Intelligencescore">Intelligence</label><input
                                            name="Intelligencescore" placeholder="10" class="stat" value="<?php echo $resultados['Intelligencescore'] ?>"/>
                                    </div>
                                    <div class="modifier">
                                        <input name="Intelligencemod" placeholder="+0" class="statmod" value="<?php echo $resultados['Intelligencemod'] ?>"/>
                                    </div>
                                </li>
                                <li>
                                    <div class="score">
                                        <label for="Charismascore">Charisma</label><input name="Charismascore" value="<?php echo $resultados['Charismascore'] ?>"
                                            placeholder="10" class="stat" />
                                    </div>
                                    <div class="modifier">
                                        <input name="Charismamod" placeholder="+0" class="statmod" value="<?php echo $resultados['Charismamod'] ?>" />
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="attr-applications">
                            <div class="inspiration box">
                                <div class="label-container">
                                    <label for="inspiration">Inspiration</label>
                                </div>
                                <input name="inspiration" type="checkbox" />
                            </div>
                            <div class="proficiencybonus box">
                                <div class="label-container">
                                    <label for="proficiencybonus">Proficiency Bonus</label>
                                </div>
                                <input name="proficiencybonus" placeholder="+2" value="<?php echo $resultados['proficiencybonus'] ?>"/>
                            </div>
                            <div class="saves list-section box">
                                <ul>
                                    <li>
                                        <label for="Strength-save">Strength</label><input name="Strength_save" value="<?php echo $resultados['Strength_save'] ?>"
                                            placeholder="+0" type="text" /><input name="Strength-save-prof"
                                            type="checkbox" />
                                    </li>
                                    <li>
                                        <label for="Dexterity-save">Dexterity</label><input name="Dexterity_save" value="<?php echo $resultados['Dexterity_save'] ?>"
                                            placeholder="+0" type="text" /><input name="Dexterity-save-prof"
                                            type="checkbox" />
                                    </li>
                                    <li>
                                        <label for="Constitution-save">Constitution</label><input value="<?php echo $resultados['Constitution_save'] ?>"
                                            name="Constitution_save" placeholder="+0" type="text" /><input
                                            name="Constitution-save-prof" type="checkbox" />
                                    </li>
                                    <li>
                                        <label for="Wisdom-save">Wisdom</label><input name="Wisdom_save" value="<?php echo $resultados['Wisdom_save'] ?>"
                                            placeholder="+0" type="text" /><input name="Wisdom-save-prof"
                                            type="checkbox" />
                                    </li>
                                    <li>
                                        <label for="Intelligence_save">Intelligence</label><input value="<?php echo $resultados['Intelligence_save'] ?>"
                                            name="Intelligence_save" placeholder="+0" type="text" /><input
                                            name="Intelligence-save-prof" type="checkbox" />
                                    </li>
                                    <li>
                                        <label for="Charisma-save">Charisma</label><input name="Charisma_save" value="<?php echo $resultados['Charisma_save'] ?>"
                                            placeholder="+0" type="text" /><input name="Charisma-save-prof"
                                            type="checkbox" />
                                    </li>
                                </ul>
                                <div class="label">
                                    Saving Throws
                                </div>
                            </div>
                            <div class="skills list-section box">
                                <ul>
                                    <li>
                                        <label for="Acrobatics">Acrobatics <span
                                                class="skill">(Dex)</span></label><input name="Acrobatics" value="<?php echo $resultados['Acrobatics'] ?>"
                                            placeholder="+0" type="text" /><input name="Acrobatics-prof"
                                            type="checkbox" />
                                    </li>
                                    <li>
                                        <label for="AnimalHandling">Animal Handling <span
                                                class="skill">(Wis)</span></label><input name="AnimalHandling" value="<?php echo $resultados['AnimalHandling'] ?>"
                                            placeholder="+0" type="text" /><input name="Animal Handling-prof"
                                            type="checkbox" />
                                    </li>
                                    <li>
                                        <label for="Arcana">Arcana <span class="skill">(Int)</span></label><input value="<?php echo $resultados['Arcana'] ?>"
                                            name="Arcana" placeholder="+0" type="text" /><input name="Arcana-prof"
                                            type="checkbox" />
                                    </li>
                                    <li>
                                        <label for="Athletics">Athletics <span class="skill">(Str)</span></label><input value="<?php echo $resultados['Athletics'] ?>"
                                            name="Athletics" placeholder="+0" type="text" /><input name="Athletics-prof"
                                            type="checkbox" />
                                    </li>
                                    <li>
                                        <label for="Deception">Deception <span class="skill">(Cha)</span></label><input value="<?php echo $resultados['Deception'] ?>"
                                            name="Deception" placeholder="+0" type="text" /><input name="Deception-prof"
                                            type="checkbox" />
                                    </li>
                                    <li>
                                        <label for="History">History <span class="skill">(Int)</span></label><input value="<?php echo $resultados['History'] ?>"
                                            name="History" placeholder="+0" type="text" /><input name="History-prof"
                                            type="checkbox" />
                                    </li>
                                    <li>
                                        <label for="Insight">Insight <span class="skill">(Wis)</span></label><input value="<?php echo $resultados['Insight'] ?>"
                                            name="Insight" placeholder="+0" type="text" /><input name="Insight-prof"
                                            type="checkbox" />
                                    </li>
                                    <li>
                                        <label for="Intimidation">Intimidation <span
                                                class="skill">(Cha)</span></label><input name="Intimidation" value="<?php echo $resultados['Intimidation'] ?>"
                                            placeholder="+0" type="text" /><input name="Intimidation-prof"
                                            type="checkbox" />
                                    </li>
                                    <li>
                                        <label for="Investigation">Investigation <span
                                                class="skill">(Int)</span></label><input name="Investigation" value="<?php echo $resultados['Investigation'] ?>"
                                            placeholder="+0" type="text" /><input name="Investigation-prof"
                                            type="checkbox" />
                                    </li>
                                    <li>
                                        <label for="Medicine">Medicine <span class="skill">(Wis)</span></label><input value="<?php echo $resultados['Medicine'] ?>"
                                            name="Medicine" placeholder="+0" type="text" /><input name="Medicine-prof"
                                            type="checkbox" />
                                    </li>
                                    <li>
                                        <label for="Nature">Nature <span class="skill">(Int)</span></label><input value="<?php echo $resultados['Nature'] ?>"
                                            name="Nature" placeholder="+0" type="text" /><input name="Nature-prof"
                                            type="checkbox" />
                                    </li>
                                    <li>
                                        <label for="Perception">Perception <span
                                                class="skill">(Wis)</span></label><input name="Perception" value="<?php echo $resultados['Perception'] ?>"
                                            placeholder="+0" type="text" /><input name="Perception-prof"
                                            type="checkbox" />
                                    </li>
                                    <li>
                                        <label for="Performance">Performance <span
                                                class="skill">(Cha)</span></label><input name="Performance" value="<?php echo $resultados['Performance'] ?>"
                                            placeholder="+0" type="text" /><input name="Performance-prof"
                                            type="checkbox" />
                                    </li>
                                    <li>
                                        <label for="Persuasion">Persuasion <span
                                                class="skill">(Cha)</span></label><input name="Persuasion" value="<?php echo $resultados['Persuasion'] ?>"
                                            placeholder="+0" type="text" /><input name="Persuasion-prof"
                                            type="checkbox" />
                                    </li>
                                    <li>
                                        <label for="Religion">Religion <span class="skill">(Int)</span></label><input value="<?php echo $resultados['Religion'] ?>"
                                            name="Religion" placeholder="+0" type="text" /><input name="Religion-prof"
                                            type="checkbox" />
                                    </li>
                                    <li>
                                        <label for="Sleight of Hand">Sleight of Hand <span
                                                class="skill">(Dex)</span></label><input name="SleightOfHand" value="<?php echo $resultados['SleightOfHand'] ?>"
                                            placeholder="+0" type="text" /><input name="Sleight of Hand-prof"
                                            type="checkbox" />
                                    </li>
                                    <li>
                                        <label for="Stealth">Stealth <span class="skill">(Dex)</span></label><input value="<?php echo $resultados['Stealth'] ?>"
                                            name="Stealth" placeholder="+0" type="text" /><input name="Stealth-prof"
                                            type="checkbox" />
                                    </li>
                                    <li>
                                        <label for="Survival">Survival <span class="skill">(Wis)</span></label><input value="<?php echo $resultados['Survival'] ?>"
                                            name="Survival" placeholder="+0" type="text" /><input name="Survival-prof"
                                            type="checkbox" />
                                    </li>
                                </ul>
                                <div class="label">
                                    Skills
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="passive-perception box">
                        <div class="label-container">
                            <label for="passiveperception">Passive Wisdom (Perception)</label>
                        </div>
                        <input name="passiveperception" placeholder="10" value="<?php echo $resultados['passiveperception'] ?>"/>
                    </div>
                    <div class="otherprofs box textblock">
                        <label for="otherprofs">Other Proficiencies and Languages</label><textarea
                            name="otherprofs" ><?php echo $resultados['otherprofs'] ?></textarea>
                    </div>
                </section>
                <section>
                    <section class="combat">
                        <div class="armorclass">
                            <div>
                                <label for="ac">Armor Class</label><input name="ac" placeholder="10" type="text" value="<?php echo $resultados['ac'] ?>"/>
                            </div>
                        </div>
                        <div class="initiative">
                            <div>
                                <label for="initiative">Initiative</label><input name="initiative" placeholder="+0" value="<?php echo $resultados['initiative'] ?>"
                                    type="text" />
                            </div>
                        </div>
                        <div class="speed">
                            <div>
                                <label for="speed">Speed</label><input name="speed" placeholder="30" type="text" value="<?php echo $resultados['speed'] ?>"/>
                            </div>
                        </div>
                        <div class="hp">
                            <div class="regular">
                                <div class="max">
                                    <label for="maxhp">Hit Point Maximum</label><input name="maxhp" placeholder="10" value="<?php echo $resultados['maxhp'] ?>"
                                        type="text" />
                                </div>
                                <div class="current">
                                    <label for="currenthp">Current Hit Points</label><input name="currenthp" value="<?php echo $resultados['currenthp'] ?>"
                                        type="text" />
                                </div>
                            </div>
                            <div class="temporary">
                                <label for="temphp">Temporary Hit Points</label><input name="temphp" type="text" value="<?php echo $resultados['temphp'] ?>"/>
                            </div>
                        </div>
                        <div class="hitdice">
                            <div>
                                <div class="total">
                                    <label onclick="totalhd_clicked()" for="totalhd">Total</label><input name="totalhd" value="<?php echo $resultados['totalhd'] ?>"
                                        placeholder="2d10" type="text" />
                                </div>
                                <div class="remaining">
                                    <label for="remaininghd">Hit Dice</label><input name="remaininghd" type="text" value="<?php echo $resultados['remaininghd'] ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="deathsaves">
                            <div>
                                <div class="label">
                                    <label>Death Saves</label>
                                </div>
                                <div class="marks">
                                    <div class="deathsuccesses">
                                        <label>Successes</label>
                                        <div class="bubbles">
                                            <input name="deathsuccess1" type="checkbox" />
                                            <input name="deathsuccess2" type="checkbox" />
                                            <input name="deathsuccess3" type="checkbox" />
                                        </div>
                                    </div>
                                    <div class="deathfails">
                                        <label>Failures</label>
                                        <div class="bubbles">
                                            <input name="deathfail1" type="checkbox" />
                                            <input name="deathfail2" type="checkbox" />
                                            <input name="deathfail3" type="checkbox" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="attacksandspellcasting">
                        <div>
                            <label>Attacks & Spellcasting</label>
                            <table>
                                <thead>
                                    <tr>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Atk Bonus
                                        </th>
                                        <th>
                                            Damage/Type
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input name="atkname1" type="text" value="<?php echo $resultados['atkname1'] ?>"/>
                                        </td>
                                        <td>
                                            <input name="atkbonus1" type="text" value="<?php echo $resultados['atkbonus1'] ?>"/>
                                        </td>
                                        <td>
                                            <input name="atkdamage1" type="text" value="<?php echo $resultados['atkdamage1'] ?>"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input name="atkname2" type="text" value="<?php echo $resultados['atkname2'] ?>"/>
                                        </td>
                                        <td>
                                            <input name="atkbonus2" type="text" value="<?php echo $resultados['atkbonus2'] ?>"/>
                                        </td>
                                        <td>
                                            <input name="atkdamage2" type="text" value="<?php echo $resultados['atkdamage2'] ?>"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input name="atkname3" type="text" value="<?php echo $resultados['atkname3'] ?>"/>
                                        </td>
                                        <td>
                                            <input name="atkbonus3" type="text" value="<?php echo $resultados['atkbonus3'] ?>"/>
                                        </td>
                                        <td>
                                            <input name="atkdamage3" type="text" value="<?php echo $resultados['atkdamage3'] ?>"/>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <textarea></textarea>
                        </div>
                    </section>
                    <section class="equipment">
                        <div>
                            <label>Equipment</label>
                            <div class="money">
                                <ul>
                                    <li>
                                        <label for="cp">cp</label><input name="cp" value="<?php echo $resultados['cp'] ?>"/>
                                    </li>
                                    <li>
                                        <label for="sp">sp</label><input name="sp" value="<?php echo $resultados['sp'] ?>"/>
                                    </li>
                                    <li>
                                        <label for="ep">ep</label><input name="ep" value="<?php echo $resultados['ep'] ?>"/>
                                    </li>
                                    <li>
                                        <label for="gp">gp</label><input name="gp" value="<?php echo $resultados['gp'] ?>"/>
                                    </li>
                                    <li>
                                        <label for="pp">pp</label><input name="pp" value="<?php echo $resultados['pp'] ?>"/>
                                    </li>
                                </ul>
                            </div>
                            <textarea placeholder="Equipment list here" name="equipo" ><?php echo $resultados['equipo'] ?></textarea>
                        </div>
                    </section>
                </section>
                <section>
                    <section class="flavor">
                        <div class="personality">
                            <label for="personality">Personality</label><textarea name="personality" ><?php echo $resultados['personality'] ?></textarea>
                        </div>
                        <div class="ideals">
                            <label for="ideals">Ideals</label><textarea name="ideals" ><?php echo $resultados['ideals'] ?></textarea>
                        </div>
                        <div class="bonds">
                            <label for="bonds">Bonds</label><textarea name="bonds" ><?php echo $resultados['bonds'] ?></textarea>
                        </div>
                        <div class="flaws">
                            <label for="flaws">Flaws</label><textarea name="flaws" ><?php echo $resultados['flaws'] ?></textarea>
                        </div>
                    </section>
                    <section class="features">
                        <div>
                            <label for="features">Features & Traits</label><textarea name="features" ><?php echo $resultados['features'] ?></textarea>
                        </div>
                    </section>
                </section>
            </main>
            <?php
        }
            ?>
            <button type="submit" data-id="<?php echo $_SESSION['id']; ?>" class="guardar-btn">
                <span class="guardar-btn-content">
                    <svg width="22" height="22" fill="none" class="guardar-btn-icon" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="11" cy="11" r="10" fill="#bfa76a" stroke="#7c5c2b" stroke-width="2"/>
                        <path d="M7 12l3 3 5-6" stroke="#6b4f1d" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span class="guardar-btn-text">Guardar</span>
                </span>
            </button>
        </form>
    </fieldset>
    <script src="../../scripts/ficha.js"></script>
    <script src="../../scripts/generales/nav-bar.js"></script>
    <script>
        $(document).ready(function () {
            
            $(".charsheet").on("submit", function (event) {
                event.preventDefault(); 
                let id = $(this).find('button[type="submit"]').data('id');
                let opt = 0;
                let formData = $(this).serialize() + "&opt=" + opt + "&id=" + id; 
                
                $.ajax({
                    type: "POST",
                    url: "../../controladores/controladoresFicha/controladorFicha.php",
                    data: formData, 
                    success: function (response) {
                        console.log("Formulario enviado con éxito:", response);
                        alert("Datos guardados correctamente.");
                    },
                    error: function (xhr, status, error) {
                        console.error("Error al enviar el formulario:", error);
                        alert("Hubo un error al guardar los datos.");
                    }
                });
                setTimeout(function () {
                    location.reload(true);
                }, 1500);
            });
        });
    </script>
</body>