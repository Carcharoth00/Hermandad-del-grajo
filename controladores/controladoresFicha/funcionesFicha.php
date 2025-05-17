<?php

class FuncionesFicha
{
    public function modificarFicha($charname, $classlevel, $background, $playername, $race, $alignment, $experiencepoints, 
    $Strengthscore, $Strengthmod, $Dexterityscore, $Dexteritymod, $Constitutionscore, $Constitutionmod, $Wisdomscore, $Wisdommod, $Intelligencescore, $Intelligencemod, $Charismascore, $Charismamod, 
    $proficiencybonus, $Strength_save, $Dexterity_save, $Constitution_save, $Wisdom_save, $Intelligence_save, $Charisma_save, $Acrobatics, $AnimalHandling, $Arcana, $Athletics, $Deception, $History, 
    $Insight, $Intimidation, $Investigation, $Medicine, $Nature, $Perception, $Performance, $Persuasion, $Religion, $SleightOfHand, $Stealth, $Survival, $passiveperception, $otherprofs, $ac, 
    $initiative, $speed, $maxhp, $currenthp, $temphp, $totalhd, $remaininghd, $atkname1, $atkbonus1, $atkdamage1, $atkname2, $atkbonus2, $atkdamage2, $atkname3, $atkbonus3, $atkdamage3, 
    $cp, $sp, $ep, $gp, $pp, $personality, $ideals, $bonds, $flaws, $features, $equipo, $id)
    {
        include "../conexionBBDD.php";


        $filt = $con->prepare("UPDATE fichas SET charname = ?, classlevel = ?, background = ?, playername = ?, race = ?, alignment = ?, experiencepoints = ?, 
                    Strengthscore = ?, Strengthmod = ?, Dexterityscore = ?, Dexteritymod = ?, Constitutionscore = ?, Constitutionmod = ?, 
                    Wisdomscore = ?, Wisdommod = ?, Intelligencescore = ?, Intelligencemod = ?, Charismascore = ?, Charismamod = ?, 
                    proficiencybonus = ?, Strength_save = ?, Dexterity_save = ?, Constitution_save = ?, Wisdom_save = ?, Intelligence_save = ?, 
                    Charisma_save = ?, Acrobatics = ?, AnimalHandling = ?, Arcana = ?, Athletics = ?, Deception = ?, History = ?, Insight = ?, 
                    Intimidation = ?, Investigation = ?, Medicine = ?, Nature = ?, Perception = ?, Performance = ?, Persuasion = ?, Religion = ?, 
                    SleightOfHand = ?, Stealth = ?, Survival = ?, passiveperception = ?, otherprofs = ?, ac = ?, initiative = ?, speed = ?, 
                    maxhp = ?, currenthp = ?, temphp = ?, totalhd = ?, remaininghd = ?, atkname1 = ?, atkbonus1 = ?, atkdamage1 = ?, 
                    atkname2 = ?, atkbonus2 = ?, atkdamage2 = ?, atkname3 = ?, atkbonus3 = ?, atkdamage3 = ?, cp = ?, sp = ?, ep = ?, gp = ?, 
                    pp = ?, personality = ?, ideals = ?, bonds = ?, flaws = ?, features = ?, equipo = ? WHERE ID_ficha = ?");

        $filt->bind_param("ssssssiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiisiiiiiisssississisiiiiissssssi",
            $charname,
            $classlevel,
            $background,
            $playername,
            $race,
            $alignment,
            $experiencepoints,
            $Strengthscore,
            $Strengthmod,
            $Dexterityscore,
            $Dexteritymod,
            $Constitutionscore,
            $Constitutionmod,
            $Wisdomscore,
            $Wisdommod,
            $Intelligencescore,
            $Intelligencemod,
            $Charismascore,
            $Charismamod,
            $proficiencybonus,
            $Strength_save,
            $Dexterity_save,
            $Constitution_save,
            $Wisdom_save,
            $Intelligence_save,
            $Charisma_save,
            $Acrobatics,
            $AnimalHandling,
            $Arcana,
            $Athletics,
            $Deception,
            $History,
            $Insight,
            $Intimidation,
            $Investigation,
            $Medicine,
            $Nature,
            $Perception,
            $Performance,
            $Persuasion,
            $Religion,
            $SleightOfHand,
            $Stealth,
            $Survival,
            $passiveperception,
            $otherprofs,
            $ac,
            $initiative,
            $speed,
            $maxhp,
            $currenthp,
            $temphp,
            $totalhd,
            $remaininghd,
            $atkname1,
            $atkbonus1,
            $atkdamage1,
            $atkname2,
            $atkbonus2,
            $atkdamage2,
            $atkname3,
            $atkbonus3,
            $atkdamage3,
            $cp,
            $sp,
            $ep,
            $gp,
            $pp,
            $personality,
            $ideals,
            $bonds,
            $flaws,
            $features,
            $equipo,
            $id
        );
        $filt->execute();
        $con->close();
    }

    public function crearFicha()
    {//Finalmente se creará desde la creación de usuario
        include "../conexionBBDD.php";

        $userId = filter_var($_SESSION['id'], FILTER_SANITIZE_NUMBER_INT);
        $nombreTabla = "fichas_" . $userId;

        $filt = $con->prepare("CREATE TABLE IF NOT EXISTS $nombreTabla (
            ID_ficha INT PRIMARY KEY AUTO_INCREMENT,
            charname VARCHAR(255) ,
            classlevel VARCHAR(255),
            background VARCHAR(255),
            playername VARCHAR(255),
            race VARCHAR(255),
            alignment VARCHAR(255),
            experiencepoints INT,
            Strengthscore INT,
            Strengthmod INT,
            Dexterityscore INT,
            Dexteritymod INT,
            Constitutionscore INT,
            Constitutionmod INT,
            Wisdomscore INT,
            Wisdommod INT,
            Intelligencescore INT,
            Intelligencemod INT,
            Charismascore INT,
            Charismamod INT,
            proficiencybonus INT,
            Strength_save INT,
            Dexterity_save INT,
            Constitution_save INT,
            Wisdom_save INT,
            Intelligence_save INT,
            Charisma_save INT,
            Acrobatics INT,
            AnimalHandling INT,
            Arcana INT,
            Athletics INT,
            Deception INT,
            History INT,
            Insight INT,
            Intimidation INT,
            Investigation INT,
            Medicine INT,
            Nature INT,
            Perception INT,
            Performance INT,
            Persuasion INT,
            Religion INT,
            SleightOfHand INT,
            Stealth INT,
            Survival INT,
            passiveperception INT,
            otherprofs TEXT,
            ac INT,
            initiative INT,
            speed INT,
            maxhp INT,
            currenthp INT,
            temphp INT,
            totalhd VARCHAR(255),
            remaininghd VARCHAR(255),
            atkname1 VARCHAR(255),
            atkbonus1 VARCHAR(255),
            atkdamage1 VARCHAR(255),
            atkname2 VARCHAR(255),
            atkbonus2 VARCHAR(255),
            atkdamage2 VARCHAR(255),
            atkname3 VARCHAR(255),
            atkbonus3 VARCHAR(255),
            atkdamage3 VARCHAR(255),
            cp INT,
            sp INT,
            ep INT,
            gp INT,
            pp INT,
            personality TEXT,
            ideals TEXT,
            bonds TEXT,
            flaws TEXT,
            features TEXT
        )");

        $filt->execute();
        $con->close();

    }

    public function borrarFicha($id)
    {
        include "../conexionBBDD.php";

        $userId = filter_var($_SESSION['id'], FILTER_SANITIZE_NUMBER_INT);
        $nombreTabla = "notas_" . $userId;

        $filt = $con->prepare("DELETE FROM $nombreTabla WHERE ID_ficha = ?");
        $filt->bind_param("i", $id);
        $filt->execute();
        $con->close();
    }
}

?>