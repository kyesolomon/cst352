-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 13, 2018 at 05:28 AM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vidBox`
--

-- --------------------------------------------------------

--
-- Table structure for table `consoleInfo`
--

CREATE TABLE `consoleInfo` (
  `consoleId` int(11) NOT NULL,
  `console` varchar(20) NOT NULL,
  `consoleLogoURL` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consoleInfo`
--

INSERT INTO `consoleInfo` (`consoleId`, `console`, `consoleLogoURL`) VALUES
(1, 'PS4', 'https://s4827.pcdn.co/wp-content/uploads/2013/02/PS4_logo_thumb.jpg'),
(2, 'PS3', 'http://www.godisageek.com/wp-content/uploads/ps3logo.jpg'),
(3, 'Xbox One', 'https://www.xboxachievements.com/images/news/general/xbox-one.png'),
(4, 'Xbox 360', 'http://photos1.blogger.com/blogger/841/1380/200/xbox360logosm.jpg'),
(5, 'Nintendo Switch', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/04/Nintendo_Switch_logo%2C_square.png/100px-Nintendo_Switch_logo%2C_square.png'),
(6, 'Wii', 'https://img.icons8.com/ios/2x/wii-filled.png'),
(7, 'Wii U', 'https://www.godisageek.com/wp-content/uploads/Wii-U-Logo-600x424.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sellerInfo`
--

CREATE TABLE `sellerInfo` (
  `sellerId` int(1) NOT NULL,
  `seller` varchar(50) NOT NULL,
  `sellerLocation` varchar(100) NOT NULL,
  `sellerURL` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sellerInfo`
--

INSERT INTO `sellerInfo` (`sellerId`, `seller`, `sellerLocation`, `sellerURL`) VALUES
(1, 'Amazon', 'online', 'www.amazon.com'),
(2, 'Best Buy', 'Marina, CA', 'https://stores.bestbuy.com/ca/marina/101-general-stillwell-dr-1061.html'),
(3, 'eBay', 'online', 'www.ebay.com'),
(4, 'GameStop', 'https://www.gamestop.com/store/us/ca/sand-city/4918/edgewater-on-monterey-bay-gamestop-prestige', 'Sand City, CA'),
(5, 'Target', 'Marina, CA', 'https://www.target.com/sl/marina/2306'),
(6, 'Walmart', 'Marina, CA', 'https://www.walmart.com/store/4488/marina-ca/details');

-- --------------------------------------------------------

--
-- Table structure for table `videoGames`
--

CREATE TABLE `videoGames` (
  `gameId` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `genre` varchar(25) NOT NULL,
  `developer` varchar(25) NOT NULL,
  `imgUrl` varchar(500) NOT NULL,
  `releaseYear` smallint(6) NOT NULL,
  `description` varchar(400) NOT NULL,
  `consoleId` int(11) NOT NULL,
  `sellerId` int(2) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videoGames`
--

INSERT INTO `videoGames` (`gameId`, `title`, `genre`, `developer`, `imgUrl`, `releaseYear`, `description`, `consoleId`, `sellerId`, `price`) VALUES
(1, 'Red Dead Redemption 2', 'Action-Adventure', 'Rockstar Games', 'https://upload.wikimedia.org/wikipedia/en/thumb/4/44/Red_Dead_Redemption_II.jpg/220px-Red_Dead_Redemption_II.jpg', 2018, 'Red Dead Redemption 2 is a Western-themed action-adventure game set in an open world environment. It is played from either a third or first-person perspective and the player controls Arthur Morgan, an outlaw and a member of the Van der Linde gang. The game features both single-player and online multiplayer components.', 1, 1, 59.99),
(2, 'Super Smash Bros Ultimate', 'Action-Adventure', 'Nintendo', 'https://upload.wikimedia.org/wikipedia/en/thumb/5/50/Super_Smash_Bros._Ultimate.jpg/220px-Super_Smash_Bros._Ultimate.jpg', 2018, 'Super Smash Bros. Ultimate is a fighting game for up to 8 players in which characters from Nintendo games and from other third-party franchises must try to knock each other out of an arena.', 1, 2, 59.99),
(3, 'God of War', 'Action-Adventure', 'Sony', 'https://upload.wikimedia.org/wikipedia/en/thumb/a/a7/God_of_War_4_cover.jpg/220px-God_of_War_4_cover.jpg', 2018, 'From Santa Monica Studio and creative director Cory Barlog comes a new beginning for God of War. Living as a man outside the shadow of the gods, Kratos must adapt to unfamiliar lands, unexpected threats, and a second chance at being a father. Together with his son Atreus, the pair will venture into the brutal Norse wilds and fight to fulfill a deeply personal quest.', 1, 3, 39.99),
(4, 'Assassin\'s Creed Odyssey', 'Role-playing', 'Ubisoft', 'https://m.media-amazon.com/images/M/MV5BY2FlMGY2ZTctMDhkNS00OTIyLThjNTEtODMyYjJmMGJiZTMxXkEyXkFqcGdeQXVyNjMxMDgyNzQ@._V1_UY268_CR11,0,182,268_AL_.jpg', 2018, 'Assassin\'s Creed Odyssey is a 2018 action role-playing video game developed by Ubisoft Quebec and published by Ubisoft. It is the eleventh major installment, and twentieth overall, in the Assassin\'s Creed series and the successor to 2017\'s Assassin\'s Creed Origins. Set in the year 431 BC, the plot tells a fictional history of the Peloponnesian War between Athens and Sparta. Players control a male ', 1, 4, 29.99),
(5, 'Call of Duty: Black Ops 4', 'Action-Adventure', 'Activision', 'https://upload.wikimedia.org/wikipedia/en/thumb/1/1c/Call_of_Duty_Black_Ops_4_official_box_art.jpg/220px-Call_of_Duty_Black_Ops_4_official_box_art.jpg', 2018, 'Call of Duty: Black Ops 4 is a multiplayer first-person shooter video game. Unlike previous titles in the Call of Duty series, Black Ops 4 is the first entry to not feature a traditional single-player campaign, and contains only Multiplayer, Zombies and a new battle royale mode called Blackout.', 1, 5, 19.99),
(6, 'Spider-Man', 'Action-Adventure', 'Sony', 'https://upload.wikimedia.org/wikipedia/en/thumb/e/e1/Spider-Man_PS4_cover.jpg/220px-Spider-Man_PS4_cover.jpg', 2018, 'After eight years behind the mask, Peter Parker is a crime-fighting master. Feel the full power of a more experienced Spider-Man with improvisational combat, dynamic acrobatics, fluid urban traversal, and environmental interactions. A rookie no longer, this is the most masterful Spider-Man you\'ve ever played.', 1, 6, 39.99),
(7, 'Monster Hunter: World', 'Role-playing', 'Capcom', 'https://upload.wikimedia.org/wikipedia/en/thumb/1/1b/Monster_Hunter_World_cover_art.jpg/220px-Monster_Hunter_World_cover_art.jpg', 2018, 'Monster Hunter World introduces a living, breathing ecosystem in which players take on the role of a hunter that seeks and slays ferocious beasts in heart-pounding battles that unfold across the vast ever-changing terrain.', 1, 1, 29.99),
(8, 'Forza Horizon 4', 'Sports', 'Microsoft Studios', 'https://upload.wikimedia.org/wikipedia/en/thumb/8/87/Forza_Horizon_4_cover.jpg/220px-Forza_Horizon_4_cover.jpg', 2018, 'Forza Horizon 4 is a racing video game set in an open world environment based in a fictional representation of the United Kingdom and features over 420 licensed cars. The game features a route creator which enables players to create their own races.', 1, 2, 59.99),
(9, 'Far Cry 5', 'Action-Adventure', 'Ubisoft', 'https://upload.wikimedia.org/wikipedia/en/thumb/0/03/Far_Cry_5_boxshot.jpg/220px-Far_Cry_5_boxshot.jpg', 2018, 'Far Cry 5 is a massive gameplay arena that\'s filled with something new around every bend. The enemy AI behavior is more realistic, and the exploration is endless. Even when you feel like taking a break from the campaign, you can take in some leisurely fishing before diving back into your quest. It\'s your mission.', 2, 3, 59.99),
(10, 'The Legend of Zelda: Brea', 'Action-Adventure', 'Nintendo', 'https://upload.wikimedia.org/wikipedia/en/thumb/c/c6/The_Legend_of_Zelda_Breath_of_the_Wild.jpg/220px-The_Legend_of_Zelda_Breath_of_the_Wild.jpg', 2017, 'Step into a world of discovery, exploration and adventure in The Legend of Zelda: Breath of the Wild, a boundary-breaking new game in the acclaimed series. Travel across fields, through forests and to mountain peaks as you discover what has become of the ruined kingdom of Hyrule in this stunning open-air adventure.', 2, 4, 49.99),
(11, 'Destiny 2: Forsaken', 'Action-Adventure', 'Activision', 'https://upload.wikimedia.org/wikipedia/en/thumb/e/ec/Destiny_2_Forsaken_cover.png/220px-Destiny_2_Forsaken_cover.png', 2017, 'Destiny 2 is an online-only multiplayer first-person shooter video game developed by Bungie and published by Activision. It was released for PlayStation 4 and Xbox One on September 6, 2017, followed by a Microsoft Windows version the following month. It is the sequel to 2014\'s Destiny and its subsequent expansions.', 2, 5, 19.99),
(12, 'Fortnite: Save the World', 'Action-adventure', 'Epic Games', 'https://upload.wikimedia.org/wikipedia/en/thumb/d/dd/Fortnite_cover_art%28PC%29.jpg/220px-Fortnite_cover_art%28PC%29.jpg', 2017, 'Considered by Epic as a cross between Minecraft and Left 4 Dead, Fortnite has up to four players cooperating on various missions on randomly-generated maps to collect resources, build fortifications around defensive objectives that are meant to help fight the storm and protect survivors, and construct weapons and traps.', 2, 6, 0),
(13, 'Resident Evil 7: Biohazar', 'Action-Adventure', 'Capcom', 'https://upload.wikimedia.org/wikipedia/en/thumb/f/fd/Resident_Evil_7_cover_art.jpg/220px-Resident_Evil_7_cover_art.jpg', 2017, ' In 2017, Ethan Winters is drawn to a derelict plantation in Dulvey, Louisiana, by a message from his wife, Mia, who has been presumed dead for three years. He finds Mia imprisoned in the basement of a seemingly abandoned house, but she becomes violent and attacks him, forcing him to kill her.', 2, 1, 29.99),
(14, 'Sonic Mania', 'Action-adventure', 'Sega', 'https://images-na.ssl-images-amazon.com/images/I/51yK28T4cHL._AC_SX215_.jpg', 2017, 'Emulating the style of the original Sonic Sega Mega Drive games, Sonic Mania is a 2D sprite-based side-scrolling platform game with Sonic the Hedgehog, Miles \"Tails\" Prower and Knuckles the Echidna as playable characters. The game uses an autosave feature that saves the player\'s progress at certain points.', 2, 2, 14.99),
(15, 'Star Wars Battlefront II', 'Action-Adventure', 'EA Games', 'https://upload.wikimedia.org/wikipedia/en/thumb/2/23/SWBF2_box.jpeg/220px-SWBF2_box.jpeg', 2017, 'Heroes are born on the battlefront, and in Star Wars Battlefront 2, you\'re able to experience it for yourself. Play as heroes from all three eras of Star Wars in massive battles across iconic locations, and take part in a thrilling single-player story as Iden Versio fights to avenge the Emperor.', 3, 3, 9.99),
(16, 'Just Dance 2018', 'Music', 'Ubisoft', 'https://upload.wikimedia.org/wikipedia/en/thumb/3/3b/Just_Dance_2018_Switch_cover.jpg/220px-Just_Dance_2018_Switch_cover.jpg', 2017, 'Just Dance 2018 is a dance rhythm game developed by Ubisoft. It was unveiled on June 12, 2017, during its E3 press conference, and was released on October 24, 2017 for PlayStation 3, PlayStation 4, Xbox 360, Xbox One, Wii, Wii U, and Nintendo Switch.', 3, 4, 59.99),
(17, 'FIFA \'17', 'Sports', 'EA Games', 'https://upload.wikimedia.org/wikipedia/en/thumb/0/08/FIFA_17_cover.jpeg/220px-FIFA_17_cover.jpeg', 2016, 'FIFA 17. FIFA 17 is a sports video game in the FIFA series developed and published by Electronic Arts, that was released in September 2016. This is the first FIFA game in the series to use the Frostbite game engine. Borussia Dortmund midfielder Marco Reus serves as the cover athlete on the game.', 3, 5, 4.99),
(18, 'NBA 2K17', 'Sports', '2K Games', 'https://upload.wikimedia.org/wikipedia/en/thumb/a/a0/NBA_2K17_cover_art.jpg/220px-NBA_2K17_cover_art.jpg', 2016, 'NBA 2K17 is a basketball simulation video game developed by Visual Concepts and published by 2K Sports. It is the 18th installment in the NBA 2K franchise and the successor to NBA 2K16. It was released worldwide on September 20, 2016, for Microsoft Windows, PlayStation 4, PlayStation 3, Xbox One, and Xbox 360. Players who pre-ordered the game received it on September 16, 2016. Paul George of the I', 3, 6, 9.99),
(19, 'Overwatch', 'Action-Adventure', 'Blizzard Entertainment', 'https://upload.wikimedia.org/wikipedia/en/thumb/5/51/Overwatch_cover_art.jpg/220px-Overwatch_cover_art.jpg', 2016, ' In a time of global crisis, an international task force of heroes banded together to restore peace to a war-torn world: OVERWATCH. It ended the crisis and helped to maintain peace in the decades that followed, inspiring an era of exploration, innovation, and discovery.', 3, 1, 0),
(20, 'Doom', 'Action-Adventure', 'Bethesda Softworks', 'https://upload.wikimedia.org/wikipedia/en/2/28/Doom_Cover.jpg', 2016, 'Doom (previously known as Doom 4 and stylized as DOOM) is a soft reboot of the Doom franchise produced by id Software and published by Bethesda Softworks. The game was released on May 13, 2016. It is currently available on PC, PS4, and Xbox One, and was released on Nintendo Switch on November 10, 2017.', 3, 2, 19.99),
(21, 'Killing Floor 2', 'Action-Adventure', 'Tripwire', 'https://upload.wikimedia.org/wikipedia/en/thumb/a/a4/Killing_floor_2_art.jpg/220px-Killing_floor_2_art.jpg', 2016, 'In either Co-Op or Solo mode, players engage hordes of AI controlled Zeds across multiple waves until they reach the boss or die trying. The players can select from a variety of perks, each with its own skills, powers, and weapons, in addition to choosing from among several playable characters with different appearances and personalities. Against the players are arrayed a multitude of Zeds, from l', 3, 3, 14.99),
(22, 'Halo 5: Guardians', 'Action-Adventure', '343 Industries', 'https://upload.wikimedia.org/wikipedia/en/thumb/6/68/Halo_Guardians.png/220px-Halo_Guardians.png', 2015, 'Halo 5: Guardians is a first-person shooter video game developed by 343 Industries and published by Microsoft Studios for the Xbox One home video game console. The tenth installment and fifth main entry in the Halo series of video games, it was released worldwide on October 27, 2015.', 4, 4, 14.99),
(23, 'Battlefield 1', 'Action-Adventure', 'EA Games', 'https://upload.wikimedia.org/wikipedia/en/thumb/f/fc/Battlefield_1_cover_art.jpg/220px-Battlefield_1_cover_art.jpg', 2016, 'Gameplay. Similar to its predecessors, Battlefield 1 is a first-person shooter game that emphasizes teamwork. It is set in the period of World War I, and is inspired by historical events. ... Melee combat was reworked, with DICE introducing new melee weapons such as sabres, trench clubs, and shovels into the game.', 4, 5, 19.99),
(24, 'Earth Defense Force: Insect Armagedon', 'Action-Adventure', 'Vicious Cycle Software', 'https://upload.wikimedia.org/wikipedia/en/thumb/3/33/Insect_Armageddon.jpg/220px-Insect_Armageddon.jpg', 2011, 'The EDF defends a fictional city called New Detroit against an alien invasion, aided by bio-engineered terrestrial insects. The Player goes by the name of \'Lightning Alpha\', leader of an elite team of fighters, known as \"Strike Force Lightning.\" Along with two squad mates, Lightning is (usually) aided by local EDF fighting forces in the area, though they are poor compared to Lightning.', 4, 6, 9.99),
(25, 'Injustice 2', 'Action-Adventure', 'NetherRealm Studios', 'https://upload.wikimedia.org/wikipedia/en/thumb/3/36/Injustice_2_Cover.jpg/220px-Injustice_2_Cover.jpg', 2017, 'Injustice 2 is a fighting video game developed by NetherRealm Studios and published by Warner Bros. Interactive Entertainment. It is the sequel to 2013\'s Injustice: Gods Among Us. ... The core gameplay remains similar to its predecessor, albeit with minor adjustments to returning game mechanics.', 4, 1, 19.99),
(26, 'Left 4 Dead 2', 'Action-Adventure', 'Valve', 'https://upload.wikimedia.org/wikipedia/en/thumb/b/ba/Left4Dead2.jpg/220px-Left4Dead2.jpg', 2009, 'Left 4 Dead 2 is a cooperative first-person shooter video game developed and published by Valve Corporation. ... Left 4 Dead 2 builds upon cooperatively focused gameplay and Valve\'s proprietary Source engine, the same game engine used in the original Left 4 Dead.', 4, 2, 29.99),
(27, 'Payday 2', 'Shooter', '505 Games', 'https://images-na.ssl-images-amazon.com/images/I/91Epiu28pKL._AC_SX215_.jpg', 2013, 'PAYDAY 2 is a co-operative first-person shooter action game developed by Overkill Software and the successor to PAYDAY: The Heist. It was released on August 13, 2013, for Windows, PlayStation 3, and Xbox 360 via digital distribution and retail.', 5, 3, 9.99),
(28, 'Quantum Break', 'Action-adventure', 'Microsoft Studios', 'https://upload.wikimedia.org/wikipedia/en/thumb/d/d9/Quantum_Break_cover.jpg/220px-Quantum_Break_cover.jpg', 2016, 'Quantum Break is an action-adventure video game played from a third-person perspective. Players play as Jack Joyce, who has time manipulation powers in a world where time stutters, making everything freeze except Joyce.', 5, 4, 9.99),
(29, 'UFC Undisputed 3', 'Action-Adventure', 'Yuke\'s', 'https://upload.wikimedia.org/wikipedia/en/thumb/d/d0/UFC_Undisputed_3_cover.png/220px-UFC_Undisputed_3_cover.png', 2012, 'UFC Undisputed 3 is a mixed martial arts (MMA) fighting game in which players step into the iconic octagon fighting cage to battle in one-on-one action for the ultimate fighting championship (UFC).', 5, 5, 9.99),
(30, 'Vacation Sports', 'Sports', 'Ubisoft', 'https://images-na.ssl-images-amazon.com/images/I/81tg9gz3hrL._AC_SX215_.jpg', 2009, 'Vacation Sports brings the exhilaration of sports competition to your home! Players stay at a 5-star resort and enjoy a variety of their favorite classic sports, such as go-carts, dodgeball, darts, frisbee golf and and more, while also picking up other global sports played by millions around the world', 5, 6, 4.99),
(31, 'Wall-E', 'Action-adventure', 'THQ', 'https://upload.wikimedia.org/wikipedia/en/thumb/8/88/WALL-E_Coverart.jpg/220px-WALL-E_Coverart.jpg', 2008, 'Mesmerized with trinkets of Earth\'s history and show tunes, WALL-E is alone on Earth except for a sprightly pet cockroach. One day, EVE, a sleek (and dangerous) reconnaissance robot, is sent to Earth to find proof that life is once again sustainable.', 5, 1, 39.99),
(32, 'X-Men: Destiny', 'Action-adventure', 'Activision', 'https://upload.wikimedia.org/wikipedia/en/thumb/1/14/X-men-destiny-cover-890x1024.jpg/220px-X-men-destiny-cover-890x1024.jpg', 2011, 'n X-Men: Destiny, players are put in the roles of new mutants who choose to join either the X-Men or the Brotherhood of Mutants; from there, they make decisions for the ultimate destiny of their character. ... Throughout the game, players collect power enhancements called X-Genes.', 5, 2, 14.99),
(33, 'Yakuza Kiwami 2', 'Action-Adventure', 'Sega', 'https://metarankings.ru/wp-content/uploads/Yakuza-Kiwami-2-boxart-cover.jpg', 2017, 'Yakuza Kiwami 2 is a remake of Yakuza 2, and is an action-adventure game set in an open world environment and played from a third-person perspective. ... Combat is based on that previously seen in Yakuza 6. A new \"Majima Saga\" story scenario features recurring series anti-hero Goro Majima as a playable character.', 6, 3, 39.99),
(34, 'Zombie Army Trilogy', 'Action-Adventure', 'Rebellion Developments', 'https://upload.wikimedia.org/wikipedia/en/thumb/8/8b/Zombie_Army_Trilogy_cover_art.jpg/220px-Zombie_Army_Trilogy_cover_art.jpg', 2015, 'ombie Army Trilogy is a third-person tactical shooter stealth video game developed and published by Rebellion Developments. It is a spin-off to the Sniper Elite series, released on March 6, 2015 for Microsoft Windows, PlayStation 4 and Xbox One.[1] The premise of the game is that, in an alternative version of the final days of World War II, with the German army close to defeat, Adolf Hitler deploy', 6, 4, 29.99),
(35, 'Gran Turismo Sport', 'Sports', 'Polyphony Digital', 'https://upload.wikimedia.org/wikipedia/en/thumb/9/96/GT_Sport_cover_art.jpg/220px-GT_Sport_cover_art.jpg', 2017, 'Gran Turismo Sport. Gran Turismo Sport is a racing video game developed by Polyphony Digital and published by Sony Interactive Entertainment for PlayStation 4.', 6, 5, 19.99),
(36, 'Dying Light', 'Action-Adventure', 'Techland', 'https://upload.wikimedia.org/wikipedia/en/thumb/c/c0/Dying_Light_cover.jpg/220px-Dying_Light_cover.jpg', 2015, 'Dying Light is a first-person, action survival horror game set in a vast and dangerous open world. During the day, players traverse an expansive urban environment overrun by a vicious outbreak, scavenging the world for supplies and crafting weapons to defend against the growing infected population.', 6, 6, 0),
(37, 'Guitar Hero Live', 'Music', 'Activision', 'https://cdn.cheatcc.com/reviews/guitarherolivereview_boxart.jpg', 2015, 'Feel the rush of performing in a REAL band, in front of REAL crowds who react in REAL time to your performance. You’ll either win the crowd or lose them. Plus, your band mates will also let you know if you’re rocking out or need to pick it up. Fight the stage fright and bring down the house.', 6, 1, 24.99),
(38, 'Player Unknown Battlegrounds', 'Action-Adventure', 'Bluehole', 'https://images-eds-ssl.xboxlive.com/image?url=8Oaj9Ryq1G1_p3lLnXlsaZgGzAie6Mnu24_PawYuDYIoH77pJ.X5Z.MqQPibUVTcySknyDHTWmKS8aOv4hIxgAxiOHf4S6I1H_OSiN7jK2rn._Rd5B82zT9brFp4z1DHgy4RdA.ve7_Z2xq7gJlZinjhU_aKmbwH0TaTBlW8Tl6rtX_RzlZDeuh75lXr3SGVBxgTXWGCnrlK4X.Vw1DhSHcJYhg4qkCcw2WQb9.Sn5Y-&h=300&w=200&format=jpg', 2017, 'Players are dropped into a wide, open area, and they must fight to the death - all while the battlefield shrinks, adding pressure to all in its grip. Use a variety of interesting weapons and vehicles amid the BATTLEGROUNDS. \"Killing off another player cuts down on your competition, but it also offers up the opportunity to grab some loot. Your character can only carry around a limited amount of gea', 6, 2, 29.99),
(39, 'The Witcher 3 Wild Hunt', 'Role-playing', 'CD Projekt', 'https://upload.wikimedia.org/wikipedia/en/thumb/0/0c/Witcher_3_cover_art.jpg/220px-Witcher_3_cover_art.jpg', 2015, 'The Witcher 3: Wild Hunt[a] is a 2015 action role-playing game developed and published by CD Projekt. Based on The Witcher series of fantasy novels by Polish author Andrzej Sapkowski, it is the sequel to the 2011 game The Witcher 2: Assassins of Kings. Played in an open world with a third-person perspective, players control protagonist Geralt of Rivia, a monster hunter known as a witcher, who is l', 7, 3, 24.99),
(40, 'Rise of the Tomb Raider', 'Action-Adventure', 'Crystal Dynamix', 'https://s3.amazonaws.com/comparegame/thumbnails/41992/large.jpg', 2015, 'Its story follows Lara Croft as she ventures into Siberia in search of the legendary city of Kitezh while battling the paramilitary organization Trinity, which intends to uncover the city\'s promise of immortality. Lara must traverse the environment and combat enemies with firearms and stealth as she explores semi-open hubs. In these hubs she can raid challenge tombs to unlock new rewards, complete', 7, 4, 19.99),
(41, 'Dance, Dance Revolution', 'Music', 'Konami', 'https://upload.wikimedia.org/wikipedia/en/thumb/5/58/Dance_Dance_Revolution_North_American_PlayStation_cover_art.png/220px-Dance_Dance_Revolution_North_American_PlayStation_cover_art.png', 2004, 'The premise of Dance Dance Revolution is to move one\'s feet to a set pattern. The song selection interface of Dance Dance Revolution is a jukebox-like menu of CDs. Players must step to the beat, matching their beat to the arrows presented to them on screen by stepping on arrows on a dance stage.', 7, 5, 0),
(42, 'Rockband 4', 'Music', 'Harmonix', 'https://upload.wikimedia.org/wikipedia/en/e/e3/Rock_band_4_cover.png', 2015, 'Rock Band 4. Rock Band 4 is a 2015 music video game developed and published by Harmonix. Rock Band 4 allows players to simulate the playing of music across many different decades and genres using instrument controllers that mimic playing lead and bass guitar, drums, and vocals.', 7, 6, 9.99),
(43, 'DJ Hero', 'Music', 'Activision', 'http://www.xboxachievements.com/images/game/955/cover_orig.jpg', 2008, 'DJ Hero is a music video game, developed by FreeStyleGames and published by Activision as a rhythm game spin-off of the Guitar Hero franchise.', 7, 1, 4.99),
(44, 'Def Jam: Rap Star', 'Music', 'Konami', 'https://upload.wikimedia.org/wikipedia/en/b/b6/Def_Jam_Rapstar_Game_Cover.jpg', 2010, 'Def Jam Rapstar is a rapping game developed by Terminal Reality. The game was released on October 5, 2010 in the United States of America (U.S.), and released on November 26, 2010 in Europe. An official launch event was held at New York\'s Hudson hotel on October 6, 2010 to celebrate the game\'s U.S. release.', 7, 2, 9.99),
(45, 'legend of zelda ocarina of time', 'action-adventure', 'nintendo', '', 1997, 'awsome game', 6, 1, 29.99),
(46, 'csumb students working', 'action', 'csumb', '', 2018, 'students are working on finishing a project', 1, 1, 2.99);

-- --------------------------------------------------------

--
-- Table structure for table `v_admin`
--

CREATE TABLE `v_admin` (
  `adminId` tinyint(4) NOT NULL,
  `firstName` varchar(25) NOT NULL,
  `lastName` varchar(25) NOT NULL,
  `username` varchar(8) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `v_admin`
--

INSERT INTO `v_admin` (`adminId`, `firstName`, `lastName`, `username`, `password`) VALUES
(1, 'Sam', 'Poplack', 'spopla', '6d28129d25d6a029598d8432c37cfaf469c44f75'),
(2, 'Admin', 'Admin', 'admin', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4'),
(5, 'alice ', 'otter', 'aotter', '29916a575277c40d7fa30e8cfaae387f0eb398ae'),
(6, 'ashton', 'cutty', 'acutty', 'e63b1457775e3a3be48ab688f0b8583b9149ad09'),
(7, 'tom', 'otter', 'totter', '4827e733c37295ca9225100baf37e2a67a6ac3f6'),
(8, 'tom', 'otter', 'totter', '4827e733c37295ca9225100baf37e2a67a6ac3f6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consoleInfo`
--
ALTER TABLE `consoleInfo`
  ADD PRIMARY KEY (`consoleId`),
  ADD KEY `consoleId` (`consoleId`);

--
-- Indexes for table `sellerInfo`
--
ALTER TABLE `sellerInfo`
  ADD PRIMARY KEY (`sellerId`),
  ADD KEY `sellerId` (`sellerId`);

--
-- Indexes for table `videoGames`
--
ALTER TABLE `videoGames`
  ADD PRIMARY KEY (`gameId`),
  ADD KEY `sellerId` (`sellerId`),
  ADD KEY `consoleId` (`consoleId`);

--
-- Indexes for table `v_admin`
--
ALTER TABLE `v_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consoleInfo`
--
ALTER TABLE `consoleInfo`
  MODIFY `consoleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sellerInfo`
--
ALTER TABLE `sellerInfo`
  MODIFY `sellerId` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `videoGames`
--
ALTER TABLE `videoGames`
  MODIFY `gameId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `v_admin`
--
ALTER TABLE `v_admin`
  MODIFY `adminId` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `consoleInfo`
--
ALTER TABLE `consoleInfo`
  ADD CONSTRAINT `consoleInfo_ibfk_1` FOREIGN KEY (`consoleId`) REFERENCES `videoGames` (`consoleId`);

--
-- Constraints for table `videoGames`
--
ALTER TABLE `videoGames`
  ADD CONSTRAINT `videoGames_ibfk_1` FOREIGN KEY (`sellerId`) REFERENCES `sellerInfo` (`sellerId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
