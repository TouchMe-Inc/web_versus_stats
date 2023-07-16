<?php

namespace App\Enums;

enum VersusStats: int
{
    // Infected Kill
    /**
     * @var int Survivor Killed Common Infected.
     */
    case S_K_CI = 0;
    /**
     * @var int Survivor Killed Smoker.
     */
    case S_K_SMOKER = 1;
    /**
     * @var int Survivor Killed Boomer.
     */
    case S_K_BOOMER = 2;
    /**
     * @var int Survivor Killed Hunter.
     */
    case S_K_HUNTER = 3;
    /**
     * Survivor Killed Spitter.
     */
    case S_K_SPITTER = 4;
    /**
     * Survivor Killed Jockey.
     */
    case S_K_JOCKEY = 5;
    /**
     * Survivor Killed Changer.
     */
    case S_K_CHARGER = 6;
    /**
     * Survivor Killed Witch.
     */
    case S_K_WITCH = 7;

    /**
     * Survivor avg Tank damage.
     */
    case S_AVG_DMG_TANK = 8;

    // Infected Kill Headshot/One shot
    /**
     * Survivor Killed Common Infected (Headshot).
     */
    case S_K_CI_HS = 9;
    /**
     * Survivor Killed Special Infected (Headshot).
     */
    case S_K_SI_HS = 10;
    /**
     * Survivor Killed Witch in one shot.
     */
    case S_K_WITCH_OS = 11;

    // Survivor event
    /**
     * Amount of Survivor shot.
     */
    case S_SHOT = 12;
    /**
     * Amount of Survivor hit.
     */
    case S_HIT = 13;
    /**
     * Survivor revived someone.
     */
    case S_REVIVE = 14;
    /**
     * Survivor is revived by someone.
     */
    case S_REVIVED = 15;
    /**
     * Amount of damage hurt by SI.
     */
    case S_HURT = 16;
    /**
     * Amount of damage made SI.
     */
    case S_DMG = 17;
    /**
     * Amount of damage made tank.
     */
    case S_DMG_TANK = 18;
    /**
     * Amount of Team kill.
     */
    case S_TEAMKILL = 19;
    /**
     * Amount of Killing infected (last hit).
     */
    case S_KILL = 20;
    /**
     * Amount of Survivor incapacated.
     */
    case S_INCAPACITATED = 21;
    /**
     * Amount of death of Survivor.
     */
    case S_DEATH = 22;

    // Infected event
    /**
     * Amount of damage hurt by Survivor.
     */
    case I_HURT = 23;
    /**
     * Amount of damage made Survivor.
     */
    case I_DMG = 24;
    /**
     * Amount of Killing Survivor.
     */
    case I_KILL = 25;
    /**
     * Amount of Incapacitating Survivor.
     */
    case I_INCAPACITATE = 26;
    /**
     * Amount of death of infected.
     */
    case I_DEATH = 27;

    // Items event
    /**
     * Survivor used Pills.
     */
    case S_PILLS = 28;
    /**
     * Survivor used Adrenaline.
     */
    case S_ADRENALINE = 29;
    /**
     * Survivor used Medikit.
     */
    case S_MEDKIT = 30;
    /**
     * Survivor is healed by someone.
     */
    case S_HEALED = 31;
    /**
     * Survivor is healed by himself.
     */
    case S_SELF_HEALED = 32;
    /**
     * Survivor used Medikit for healing someone.
     */
    case S_HEAL = 33;
    /**
     * Survivor defibrillated someone.
     */
    case S_DEFIBRILLATE = 34;
    /**
     * Survivor is defibrillated by someone.
     */
    case S_DEFIBRILLATED = 35;

    // Gun statistic
    /**
     * Survivor killed CI/SI by SMG.
     */
    case S_K_SMG = 36;
    /**
     * Survivor killed CI/SI by SMG silenced.
     */
    case S_K_SILENCED = 37;
    /**
     * Survivor killed CI/SI by MP5.
     */
    case S_K_MP5 = 38;
    /**
     * Survivor killed CI/SI by Pump.
     */
    case S_K_PUMP = 39;
    /**
     * Survivor killed CI/SI by Chrome.
     */
    case S_K_CHROME = 40;
    /**
     * Survivor killed CI/SI by Scout.
     */
    case S_K_SCOUT = 41;
    /**
     * Survivor killed CI/SI by Rifle (M16).
     */
    case S_K_M16 = 42;
    /**
     * Survivor killed CI/SI by Desert.
     */
    case S_K_DESERT = 43;
    /**
     * Survivor killed CI/SI by AK47.
     */
    case S_K_AK47 = 44;
    /**
     * Survivor killed CI/SI by Sg552.
     */
    case S_K_SG552 = 45;
    /**
     * Survivor killed CI/SI by Hunting.
     */
    case S_K_HUNTING = 46;
    /**
     * Survivor killed CI/SI by Military.
     */
    case S_K_MILITARY = 47;
    /**
     * Survivor killed CI/SI by Awp.
     */
    case S_K_AWP = 48;
    /**
     * Survivor killed CI/SI by Auto.
     */
    case S_K_AUTO = 49;
    /**
     * Survivor killed CI/SI by Spas.
     */
    case S_K_SPAS = 50;
    /**
     * Survivor killed CI/SI by Magnum.
     */
    case S_K_MAGNUM = 51;
    /**
     * Survivor killed CI/SI by Pistol
     */
    case S_K_PISTOL = 52;
    /**
     * Survivor killed CI/SI by M60.
     */
    case S_K_M60 = 53;
    /**
     * Survivor killed CI/SI by Grenade Launcher.
     */
    case S_K_GL = 54;

    // Melee statistic
    /**
     * Survivor killed CI/SI by Katana.
     */
    case S_K_KATANA = 55;
    /**
     * Survivor killed CI/SI by Axe.
     */
    case S_K_AXE = 56;
    /**
     * Survivor killed CI/SI by Machete.
     */
    case S_K_MACHATE = 57;
    /**
     * Survivor killed CI/SI by Knife.
     */
    case S_K_KNIFE = 58;
    /**
     * Survivor killed CI/SI by Chainsaw.
     */
    case S_K_SAW = 59;
    /**
     * Survivor killed CI/SI by Pitchfork.
     */
    case S_K_PITCHFORK = 60;
    /**
     * Survivor killed CI/SI by Shovel.
     */
    case S_K_SHOVEL = 61;
    /**
     * Survivor killed CI/SI by Golfclub.
     */
    case S_K_GOLF = 62;
    /**
     * Survivor killed CI/SI by Guitar.
     */
    case S_K_GUITAR = 63;
    /**
     * Survivor killed CI/SI by Tonfa.
     */
    case S_K_TONFA = 64;
    /**
     * Survivor killed CI/SI by Baseball.
     */
    case S_K_BASEBALL = 65;
    /**
     * Survivor killed CI/SI by Cricket.
     */
    case S_K_CRICKET = 66;
    /**
     * Survivor killed CI/SI by Pan.
     */
    case S_K_PAN = 67;
    /**
     * Survivor killed CI/SI by Crowbar.
     */
    case S_K_CROWBAR = 68;

    // Other statistic
    /**
     * Survivor killed CI/SI by Pipe.
     */
    case S_K_PIPE = 69;
    /**
     * Survivor killed CI/SI by Molotov.
     */
    case S_K_MOLOTOV = 70;
    /**
     * Survivor killed CI/SI by none (e.g. Throwables).
     */
    case S_K_NONE = 71;

    /**
     * Survivor throwed Molotov.
     */
    case S_TH_MOLOTOV = 72;
    /**
     * Survivor throwed Pipe bomb.
     */
    case S_TH_PIPE = 73;
    /**
     * Survivor throwed Vomitjar.
     */
    case S_TH_VOMITJAR = 74;

    /**
     * Survivor met Tank.
     */
    case S_MET_TANK = 75;

    /**
     * Max array size.
     */
    case CODE_STATS_SIZE = 76;
}
