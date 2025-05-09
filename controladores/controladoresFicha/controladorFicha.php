<?php
include "funcionesFicha.php";

$opt = filter_input(INPUT_POST, 'opt', FILTER_SANITIZE_NUMBER_INT);
$ficha = new funcionesFicha();

switch ($opt) {
    //Modificar ficha
    case 0:
        //Id de la tabla (Aun por determinar nombre variable)
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

        // Personaje y descripción
        $charname = filter_input(INPUT_POST, 'charname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $classlevel = filter_input(INPUT_POST, 'classlevel', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $background = filter_input(INPUT_POST, 'background', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $playername = filter_input(INPUT_POST, 'playername', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $race = filter_input(INPUT_POST, 'race', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $alignment = filter_input(INPUT_POST, 'alignment', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $experiencepoints = filter_input(INPUT_POST, 'experiencepoints', FILTER_SANITIZE_NUMBER_INT);

        // Atributos y modificadores
        $Strengthscore = filter_input(INPUT_POST, 'Strengthscore', FILTER_SANITIZE_NUMBER_INT);
        $Strengthmod = filter_input(INPUT_POST, 'Strengthmod', FILTER_SANITIZE_NUMBER_INT);
        $Dexterityscore = filter_input(INPUT_POST, 'Dexterityscore', FILTER_SANITIZE_NUMBER_INT);
        $Dexteritymod = filter_input(INPUT_POST, 'Dexteritymod', FILTER_SANITIZE_NUMBER_INT);
        $Constitutionscore = filter_input(INPUT_POST, 'Constitutionscore', FILTER_SANITIZE_NUMBER_INT);
        $Constitutionmod = filter_input(INPUT_POST, 'Constitutionmod', FILTER_SANITIZE_NUMBER_INT);
        $Wisdomscore = filter_input(INPUT_POST, 'Wisdomscore', FILTER_SANITIZE_NUMBER_INT);
        $Wisdommod = filter_input(INPUT_POST, 'Wisdommod', FILTER_SANITIZE_NUMBER_INT);
        $Intelligencescore = filter_input(INPUT_POST, 'Intelligencescore', FILTER_SANITIZE_NUMBER_INT);
        $Intelligencemod = filter_input(INPUT_POST, 'Intelligencemod', FILTER_SANITIZE_NUMBER_INT);
        $Charismascore = filter_input(INPUT_POST, 'Charismascore', FILTER_SANITIZE_NUMBER_INT);
        $Charismamod = filter_input(INPUT_POST, 'Charismamod', FILTER_SANITIZE_NUMBER_INT);

        // Bonos y habilidades
        $proficiencybonus = filter_input(INPUT_POST, 'proficiencybonus', FILTER_SANITIZE_NUMBER_INT);
        $Strength_save = filter_input(INPUT_POST, 'Strength_save', FILTER_SANITIZE_NUMBER_INT);
        $Dexterity_save = filter_input(INPUT_POST, 'Dexterity_save', FILTER_SANITIZE_NUMBER_INT);
        $Constitution_save = filter_input(INPUT_POST, 'Constitution_save', FILTER_SANITIZE_NUMBER_INT);
        $Wisdom_save = filter_input(INPUT_POST, 'Wisdom_save', FILTER_SANITIZE_NUMBER_INT);
        $Intelligence_save = filter_input(INPUT_POST, 'Intelligence_save', FILTER_SANITIZE_NUMBER_INT);
        $Charisma_save = filter_input(INPUT_POST, 'Charisma_save', FILTER_SANITIZE_NUMBER_INT);

        // Habilidades
        $Acrobatics = filter_input(INPUT_POST, 'Acrobatics', FILTER_SANITIZE_NUMBER_INT);
        $AnimalHandling = filter_input(INPUT_POST, 'Animal Handling', FILTER_SANITIZE_NUMBER_INT);
        $Arcana = filter_input(INPUT_POST, 'Arcana', FILTER_SANITIZE_NUMBER_INT);
        $Athletics = filter_input(INPUT_POST, 'Athletics', FILTER_SANITIZE_NUMBER_INT);
        $Deception = filter_input(INPUT_POST, 'Deception', FILTER_SANITIZE_NUMBER_INT);
        $History = filter_input(INPUT_POST, 'History', FILTER_SANITIZE_NUMBER_INT);
        $Insight = filter_input(INPUT_POST, 'Insight', FILTER_SANITIZE_NUMBER_INT);
        $Intimidation = filter_input(INPUT_POST, 'Intimidation', FILTER_SANITIZE_NUMBER_INT);
        $Investigation = filter_input(INPUT_POST, 'Investigation', FILTER_SANITIZE_NUMBER_INT);
        $Medicine = filter_input(INPUT_POST, 'Medicine', FILTER_SANITIZE_NUMBER_INT);
        $Nature = filter_input(INPUT_POST, 'Nature', FILTER_SANITIZE_NUMBER_INT);
        $Perception = filter_input(INPUT_POST, 'Perception', FILTER_SANITIZE_NUMBER_INT);
        $Performance = filter_input(INPUT_POST, 'Performance', FILTER_SANITIZE_NUMBER_INT);
        $Persuasion = filter_input(INPUT_POST, 'Persuasion', FILTER_SANITIZE_NUMBER_INT);
        $Religion = filter_input(INPUT_POST, 'Religion', FILTER_SANITIZE_NUMBER_INT);
        $SleightOfHand = filter_input(INPUT_POST, 'Sleight of Hand', FILTER_SANITIZE_NUMBER_INT);
        $Stealth = filter_input(INPUT_POST, 'Stealth', FILTER_SANITIZE_NUMBER_INT);
        $Survival = filter_input(INPUT_POST, 'Survival', FILTER_SANITIZE_NUMBER_INT);

        // Otros datos
        $passiveperception = filter_input(INPUT_POST, 'passiveperception', FILTER_SANITIZE_NUMBER_INT);
        $otherprofs = filter_input(INPUT_POST, 'otherprofs', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $ac = filter_input(INPUT_POST, 'ac', FILTER_SANITIZE_NUMBER_INT);
        $initiative = filter_input(INPUT_POST, 'initiative', FILTER_SANITIZE_NUMBER_INT);
        $speed = filter_input(INPUT_POST, 'speed', FILTER_SANITIZE_NUMBER_INT);
        $maxhp = filter_input(INPUT_POST, 'maxhp', FILTER_SANITIZE_NUMBER_INT);
        $currenthp = filter_input(INPUT_POST, 'currenthp', FILTER_SANITIZE_NUMBER_INT);
        $temphp = filter_input(INPUT_POST, 'temphp', FILTER_SANITIZE_NUMBER_INT);
        $totalhd = filter_input(INPUT_POST, 'totalhd', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $remaininghd = filter_input(INPUT_POST, 'remaininghd', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // Ataques
        $atkname1 = filter_input(INPUT_POST, 'atkname1', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $atkbonus1 = filter_input(INPUT_POST, 'atkbonus1', FILTER_SANITIZE_NUMBER_INT);
        $atkdamage1 = filter_input(INPUT_POST, 'atkdamage1', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $atkname2 = filter_input(INPUT_POST, 'atkname2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $atkbonus2 = filter_input(INPUT_POST, 'atkbonus2', FILTER_SANITIZE_NUMBER_INT);
        $atkdamage2 = filter_input(INPUT_POST, 'atkdamage2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $atkname3 = filter_input(INPUT_POST, 'atkname3', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $atkbonus3 = filter_input(INPUT_POST, 'atkbonus3', FILTER_SANITIZE_NUMBER_INT);
        $atkdamage3 = filter_input(INPUT_POST, 'atkdamage3', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // Dinero
        $cp = filter_input(INPUT_POST, 'cp', FILTER_SANITIZE_NUMBER_INT);
        $sp = filter_input(INPUT_POST, 'sp', FILTER_SANITIZE_NUMBER_INT);
        $ep = filter_input(INPUT_POST, 'ep', FILTER_SANITIZE_NUMBER_INT);
        $gp = filter_input(INPUT_POST, 'gp', FILTER_SANITIZE_NUMBER_INT);
        $pp = filter_input(INPUT_POST, 'pp', FILTER_SANITIZE_NUMBER_INT);

        // Rasgos y características
        $personality = filter_input(INPUT_POST, 'personality', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $ideals = filter_input(INPUT_POST, 'ideals', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $bonds = filter_input(INPUT_POST, 'bonds', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $flaws = filter_input(INPUT_POST, 'flaws', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $features = filter_input(INPUT_POST, 'features', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // Llama a la función para actualizar la ficha
        $ficha->modificarFicha($charname, $classlevel, $background, $playername, $race, $alignment, $experiencepoints, $Strengthscore, $Strengthmod, $Dexterityscore, $Dexteritymod, $Constitutionscore, $Constitutionmod, $Wisdomscore, $Wisdommod, $Intelligencescore, $Intelligencemod, $Charismascore, $Charismamod, $proficiencybonus, $Strength_save, $Dexterity_save, $Constitution_save, $Wisdom_save, $Intelligence_save, $Charisma_save, $Acrobatics, $AnimalHandling, $Arcana, $Athletics, $Deception, $History, $Insight, $Intimidation, $Investigation, $Medicine, $Nature, $Perception, $Performance, $Persuasion, $Religion, $SleightOfHand, $Stealth, $Survival, $passiveperception, $otherprofs, $ac, $initiative, $speed, $maxhp, $currenthp, $temphp, $totalhd, $remaininghd, $atkname1, $atkbonus1, $atkdamage1, $atkname2, $atkbonus2, $atkdamage2, $atkname3, $atkbonus3, $atkdamage3, $cp, $sp, $ep, $gp, $pp, $personality, $ideals, $bonds, $flaws, $features, $id);
        break;


    case 1:
        //Crear ficha
        $ficha->crearFicha();
        break;
    
    case 2:
        //Borrar ficha
        $id = filter_input(INPUT_POST, 'ids', FILTER_SANITIZE_NUMBER_INT);
        $ficha->borrarFicha($id);    
}


?>