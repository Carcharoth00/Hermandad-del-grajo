<?php

$opt = filter_input(INPUT_POST, 'opt', FILTER_SANITIZE_NUMBER_INT);
class funcionesUsuarios
{
    function crearUser($user, $pass, $nombre, $auto)
    {
        include "../conexionBBDD.php";

        $filt = $con->prepare("INSERT INTO usuarios(Usuario,Pass,Nombre) VALUES (?,?,?)");
        $filt->bind_param('sss', $user, $pass, $nombre);
        $filt->execute();

        if (isset($auto) && $auto == "true") {
            $filt = $con->prepare("SELECT * FROM usuarios where Usuario = ? AND Pass = ?"); 
            $filt->bind_param('ss', $user, $pass); 
            $filt->execute();
            $res = $filt->get_result(); 
            $resultados = $res->fetch_assoc();

            $_SESSION["nombre"] = $resultados['Usuario'];
            $_SESSION['poder'] = $resultados['Nivel'];
            $_SESSION["id"] = $resultados["ID"];
            $_SESSION["log"] = 1;

        }

        $userDir = "../../Notas/Notas_{$_SESSION['id']}";
        if (!file_exists($userDir)) {
            if (!mkdir($userDir, 0777, true)) {
                die("Error al crear el directorio para el usuario.");
            }
        }

        $filt = $con->prepare("CREATE TABLE IF NOT EXISTS Notas_" . $_SESSION['id'] . " (
            ID_nota int PRIMARY KEY NOT NULL AUTO_INCREMENT,
            Nombre_nota varchar(255) NOT NULL,
            Cuerpo_nota varchar(2000)
        ) ");
        $filt->execute();

        $userId = filter_var($_SESSION['id'], FILTER_SANITIZE_NUMBER_INT);
        

        $filt = $con->prepare("UPDATE fichas SET 
            charname = '', 
            classlevel = '', 
            background = '', 
            playername = '', 
            race = '', 
            alignment = '', 
            experiencepoints = '', 
            Strengthscore = '', 
            Strengthmod = '', 
            Dexterityscore = '', 
            Dexteritymod = '', 
            Constitutionscore = '', 
            Constitutionmod = '', 
            Wisdomscore = '', 
            Wisdommod = '', 
            Intelligencescore = '', 
            Intelligencemod = '', 
            Charismascore = '', 
            Charismamod = '', 
            proficiencybonus = '', 
            Strength_save = '', 
            Dexterity_save = '', 
            Constitution_save = '', 
            Wisdom_save = '', 
            Intelligence_save = '', 
            Charisma_save = '', 
            Acrobatics = '', 
            AnimalHandling = '', 
            Arcana = '', 
            Athletics = '', 
            Deception = '', 
            History = '', 
            Insight = '', 
            Intimidation = '', 
            Investigation = '', 
            Medicine = '', 
            Nature = '', 
            Perception = '', 
            Performance = '', 
            Persuasion = '', 
            Religion = '', 
            SleightOfHand = '', 
            Stealth = '', 
            Survival = '', 
            passiveperception = '', 
            otherprofs = '', 
            ac = '', 
            initiative = '', 
            speed = '', 
            maxhp = '', 
            currenthp = '', 
            temphp = '', 
            totalhd = '', 
            remaininghd = '', 
            atkname1 = '', 
            atkbonus1 = '', 
            atkdamage1 = '', 
            atkname2 = '', 
            atkbonus2 = '', 
            atkdamage2 = '', 
            atkname3 = '', 
            atkbonus3 = '', 
            atkdamage3 = '', 
            cp = '', 
            sp = '', 
            ep = '', 
            gp = '', 
            pp = '', 
            personality = '', 
            ideals = '', 
            bonds = '', 
            flaws = '', 
            features = '', 
            ID_ficha = $userId
        ");

        $filt->execute();
        $con->close();

        header("Location: ../../vistas/privado.php");
        exit();
    }
}

?>