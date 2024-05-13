-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 13, 2024 at 10:22 AM
-- Server version: 10.8.4-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `page_count` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `author`, `short_description`, `full_description`, `price`, `page_count`, `genre_id`) VALUES
(2, 'The Demon of Unrest', 'Erik Larson', 'The #1 New York Times bestselling author of The Splendid and the Vile brings to life the pivotal five months between the election of Abraham Lincoln and the start of the Civil War—a slow-burning crisis that finally tore a deeply divided nation in two.', 'On November 6, 1860, Abraham Lincoln became the fluky victor in a tight race for president. The country was bitterly at odds; Southern extremists were moving ever closer to destroying the Union, with one state after another seceding and Lincoln powerless to stop them. Slavery fueled the conflict, but somehow the passions of North and South came to focus on a lonely federal fortress in Charleston: Fort Sumter.\r\n \r\nMaster storyteller Erik Larson offers a gripping account of the chaotic months between Lincoln’s election and the Confederacy’s shelling of Sumter—a period marked by tragic errors and miscommunications, enflamed egos and craven ambitions, personal tragedies and betrayals. Lincoln himself wrote that the trials of these five months were “so great that, could I have anticipated them, I would not have believed it possible to survive them.”', '14.99', 592, 7),
(3, 'The Wide Wide Sea: Imperial Ambition', 'Hampton Sides', 'From New York Times bestselling author Hampton Sides, an epic account of the most momentous voyage of the Age of Exploration, which culminated in Captain James Cook’s death in Hawaii, and left a complex and controversial legacy still debated to this day.', 'On July 12th, 1776, Captain James Cook, already lionized as the greatest explorer in British history, set off on his third voyage in his ship the HMS Resolution . Two-and-a-half years later, on a beach on the island of Hawaii, Cook was killed in a conflict with native Hawaiians. How did Cook, who was unique among captains for his respect for Indigenous peoples and cultures, come to that fatal moment?\r\n\r\nHampton Sides’ bravura account of Cook’s last journey both wrestles with Cook’s legacy and provides a thrilling narrative of the titanic efforts and continual danger that characterized exploration in the 1700s. Cook was renowned for his peerless seamanship, his humane leadership, and his dedication to science-–the famed naturalist Joseph Banks accompanied him on his first voyage, and Cook has been called one of the most important figures of the Age of Enlightenment. He was also deeply interested in the native people he encountered. In fact, his stated mission was to return a Tahitian man, Mai, who had become the toast of London, to his home islands. On previous expeditions, Cook mapped huge swaths of the Pacific, including the east coast of Australia, and initiated first European contact with numerous peoples. He treated his crew well, and endeavored to learn about the societies he encountered with curiosity and without judgment.', '13.00', 432, 7),
(4, 'After 1177 B.C.: The Survival of Civilizations', 'Eric H. Cline', 'In this gripping sequel to his bestselling 1177 B.C., Eric Cline tells the story of what happened after the Bronze Age collapsed—why some civilizations endured, why some gave way to new ones, and why some disappeared forever', 'At the end of the acclaimed history 1177 B.C., many of the Late Bronze Age civilizations of the Aegean and Eastern Mediterranean lay in ruins, undone by invasion, revolt, natural disasters, famine, and the demise of international trade. An interconnected world that had boasted major empires and societies, relative peace, robust commerce, and monumental architecture was lost and the so-called First Dark Age had begun. Now, in After 1177 B.C., Eric Cline tells the compelling story of what happened next, over four centuries, across the Aegean and Eastern Mediterranean world. It is a story of resilience, transformation, and success, as well as failures, in an age of chaos and reconfiguration.\r\n\r\nAfter 1177 B.C. tells how the collapse of powerful Late Bronze Age civilizations created new circumstances to which people and societies had to adapt. Those that failed to adjust disappeared from the world stage, while others transformed themselves, resulting in a new world order that included Phoenicians, Philistines, Israelites, Neo-Hittites, Neo-Assyrians, and Neo-Babylonians. Taking the story up to the resurgence of Greece marked by the first Olympic Games in 776 B.C., the book also describes how world-changing innovations such as the use of iron and the alphabet emerged amid the chaos.\r\n\r\nFilled with lessons for today\'s world about why some societies survive massive shocks while others do not, After 1177 B.C. reveals why this period, far from being the First Dark Age, was a new age with new inventions and new opportunities.', '12.00', 352, 7),
(5, 'New Cold Wars: China\'s Rise', 'David E. Sanger', 'A fast-paced account of America’s plunge into simultaneous Cold Wars against two very different adversaries—Xi Jinping’s China and Vladimir Putin’s Russia—based on deep reporting from inside the White House, U.S. intelligence agencies, technology firms, and foreign governments.', 'More than thirty years after the fall of the Berlin Wall, the United States finds itself in a volatile rivalry against the world’s other two great nuclear powers. Yet this era bears very little resemblance to the old Cold War. As Putin and Xi increasingly threaten to team up, this moment grows far more complex—and undeniably more dangerous—than the world of a half century ago.\r\n\r\nNew Cold Wars —the latest from Pulitzer Prize-winning journalist and bestselling author of The Perfect Weapon, David E. Sanger—tells the riveting story of America at a crossroads. At the turn of the millennium, the United States was confident that a democratic Russia and a newly wealthy China could gradually be pulled into the Western-led order. That proved a fantasy. By the time Washington emerged from the age of terrorism, the three nuclear powers were engaged in a new, high-stakes struggle for military, economic, and technological supremacy—with nations around the world forced to take sides.\r\n\r\nBased on a remarkable array of interviews with top officials in the United States, foreign leaders, andtech companies thrust onto the front lines, Sanger unfolds a riveting narrative spun around the era’s critical Will the mistakes Putin made in his ill-considered invasion of Ukraine prove his undoing, and will he reach for his nuclear arsenal? Will China strike back at the U.S. chip embargo, or seize Taiwan, the world’s semiconductor capital?\r\n\r\nTaking readers from the battlefields of Ukraine—where trench warfare and cyberwarfare are fought side by side—to the back rooms and boardrooms where diplomats, spies, and tech executives jockey for geopolitical advantage, New Cold Wars is a remarkable first draft history chronicling America’s return to superpower conflict, the choices that lie ahead, and what is at stake for the United States and the world.', '13.59', 528, 7),
(6, 'Your Blood, My Bones', 'Kelly Andrew', 'A seductively twisted romance about loyalty, fate, the lengths we go to hide the darkest parts of ourselves . . . and the people who love those parts most of all.', 'Wyatt Westlock has one plan for the farmhouse she\'s just inherited -- to burn it to the ground. But during her final walkthrough of her childhood home, she makes a shocking discovery in the basement -- Peter, the boy she once considered her best friend, strung up in chains and left for dead.\r\n\r\nUnbeknownst to Wyatt, Peter has suffered hundreds of ritualistic deaths on her family\'s property. Semi-immortal, Peter never remains dead for long, but he can\'t really live, either. Not while he\'s bound to the farm, locked in a cycle of grisly deaths and painful rebirths. There\'s only one way for him to break free. He needs to end the Westlock line.\r\n\r\nHe needs to kill Wyatt.\r\n\r\nWith Wyatt\'s parents gone, the spells protecting the property have begun to unravel, and dark, ancient forces gather in the nearby forest. The only way for Wyatt to repair the wards is to work with Peter -- the one person who knows how to harness her volatile magic. But how can she trust a boy who\'s sworn an oath to destroy her? When the past turns up to haunt them in the most unexpected way, they are forced to rely on one another to survive, or else tear each other apart.', '13.00', 368, 2),
(7, 'A Better World', 'Sarah Langan\r\n', 'The author of Good Neighbors, “one of the creepiest, most unnerving deconstructions of American suburbia I’ve ever read,” (NPR), returns with a cunning, out-of-the-box satirical thriller about a family’s odyssey into an exclusive enclave for the wealthy that might not be as ideal as it seems.', 'You’ll be safe here. That’s what the greasy tour guide tells the Farmer-Bowens when they visit Plymouth Valley, a walled-off company town with clean air, pantries that never go empty, and blue-ribbon schools. On a very trial basis, the company offers to hire Linda Farmer’s husband, a numbers genius, and relocate her whole family to this bucolic paradise for the .0001%. Though Linda will have to sacrifice her medical career back home, the family jumps at the opportunity. They’d be crazy not to take it. With the outside world literally falling apart, this might be the Farmer-Bowens last chance.\r\n\r\nBut fitting in takes work. The pampered locals distrust outsiders, cruelly snubbing Linda, Russell, and their teen twins. And the residents fervently adhere to a group of customs and beliefs called Hollow . . . but what exactly is Hollow?\r\n\r\nIt’s Linda who brokers acceptance by volunteering her medical skills to the most powerful people in town with their pet charity, ActHollow. In the months afterward, everything seems fine. Sure, Russell starts hyperventilating through a paper bag in the middle of the night, and the kids have drifted like bridgeless islands, but living here’s worth sacrificing their family’s closeness, isn’t it? At least they’ll survive. The trouble is, the locals never say what they think. They seem scared. And Hollow’s ominous culminating event, the Plymouth Valley Winter Festival, is coming.\r\n\r\nLinda’s warned by her husband and her powerful new friends to stop asking questions. But the more she learns, the more frightened she becomes. Should the Farmer-Bowens be fighting to stay, or fighting to get out?\r\n\r\nSarah Langan’s latest novel A Better World is gleefully ruthless in its dissection of wealth, power, and privilege, timely in its depiction of a self-destructing world—and it is a prescient warning to us all.\r\n\r\nSarah Langan, a Columbia MFA graduate and three-time recipient of the Bram Stoker Award, is the author of several novels including A Better World and Good Neighbors. She grew up on Long Island and she currently lives in Los Angeles with her husband and daughters.', '14.89', 368, 2),
(8, 'Knife: Meditations After an Attempted Murder', 'Salman Rushdie', 'From internationally renowned writer and Booker Prize winner Salman Rushdie, a searing, deeply personal account of enduring—and surviving—an attempt on his life thirty years after the fatwa that was ordered against him\r\n', 'On the morning of August 12, 2022, Salman Rushdie was standing onstage at the Chautauqua Institution, preparing to give a lecture on the importance of keeping writers safe from harm, when a man in black—black clothes, black mask—rushed down the aisle toward him, wielding a knife. His first thought: So it’s you. Here you are.\r\n\r\nWhat followed was a horrific act of violence that shook the literary world and beyond. Now, for the first time, and in unforgettable detail, Rushdie relives the traumatic events of that day and its aftermath, as well as his journey toward physical recovery and the healing that was made possible by the love and support of his wife, Eliza, his family, his army of doctors and physical therapists, and his community of readers worldwide.\r\n\r\nKnife is Rushdie at the peak of his powers, writing with urgency, with gravity, with unflinching honesty. It is also a deeply moving reminder of literature’s capacity to make sense of the unthinkable, an intimate and life-affirming meditation on life, loss, love, art—and finding the strength to stand up again.', '16.00', 209, 5),
(9, 'My Beloved Monster', 'Caleb Carr\r\n', 'The #1 bestselling author of  The Alienist,  Caleb  Carr , tells the extraordinary story of Masha, a half-wild rescue cat who fought off a bear, tackled Caleb like a linebacker—and bonded with him as tightly as any cat and human possibly can.\r\n', 'Caleb Carr has had special relationships with cats since he was a young boy in a turbulent household, famously peopled by the founding members of the Beat Generation, where his steadiest companions were the adopted cats that lived with him both in the city and the country. As an adult, he has had many close feline companions, with relationships that have outlasted most of his human ones. But only after building a three-story home in rural, upstate New York did he enter into the most extraordinary of all of his cat Masha, a Siberian Forest cat who had been abandoned as a kitten, and was languishing in a shelter when Caleb met her. She had hissed and fought off all previous carers and potential adopters, but somehow, she chose Caleb as her savior.\r\n \r\nFor the seventeen years that followed, Caleb and Masha were inseparable. Masha ruled the house and the extensive, dangerous surrounding fields and forests. When she was hurt, only Caleb could help her. When he suffered long-standing physical ailments, Masha knew what to do. Caleb’s life-long study of the literature of cat behavior, and his years of experience with previous cats, helped him decode much of Masha’s inner life. But their bond went far beyond academic studies and experience. The story of Caleb and Masha is an inspiring and life-affirming relationship for readers of all backgrounds and interests—a love story like no other.', '15.99', 352, 5),
(10, 'Hearts Still Beating', 'Brooke Archer', 'Gripping, romantic, and impossible to put down, this dark and immersive post-apocalyptic debut YA novel is about two teen girls who loved each other before the end of the world — and before one of them became infected with the virus that turned her into a monster.', 'Perfect for fans of Krystal Sutherland, Adam Silvera, and the darkly human side of the HBOMax horror-drama, The Last of Us.\r\n\r\nSeventeen-year-old Mara is dead—mostly.\r\n\r\nInfected with a virus that brought the dead back to life and the world to its knees, she wakes up in a facility to learn a treatment for the disease has been found. No longer a Tick, Mara is placed in an experimental resettlement program. But her recovery is complicated by her destination: she’s sent to live with the best friend she hasn’t seen since the world ended—and since their first and only kiss.\r\n\r\nSeventeen-year-old Rory is alive—barely.\r\n\r\nWith impaired mobility from an injury and a dead sister, Rory’s nightmares are just as monstrous as the Ticks that turned her former best friend. Even after the Island—one of a handful of surviving communities—rebuilds itself, Rory is prepared for the Ticks to return at any time. She never expected them to come in the form of the only girl she’s ever loved.\r\n\r\nAs the girls struggle with their pasts and the people they’ve become, the Island’s soldiers go rogue and come after the Ticks and anyone harboring them. With the Island’s fragile peace in the balance, Rory and Mara must lean on each other to survive—or risk losing the girl they love all over again.', '10.99', 331, 1),
(11, 'Powerful', 'Lauren Roberts', 'Set during the time of the New York Times bestseller Powerless, fan favorite Adena gets a story all her own as she attempts to survive on the streets of Loot...and falls for a mysterious—and dangerous—Elite.', 'Adena and Paedyn have always been inseparable. Fate brought them together when they were young, but friendship ensured they would always protect each other and the home they built in the slums of Loot. But now Paedyn—an Ordinary—has been selected for the Purging Trials, which means almost certain death.\r\n\r\nNow alone in Loot, Adena must fend for herself. After attempting to steal, she\'s rescued by a mysterious man from the market. Mak\'s shadowy past and secretive power set him apart from the other low-level Elites of Loot. And as the pair team up to see their loved ones before the Trials, the quest tests their loyalty, their love, and their lives.', '9.99', 192, 1),
(12, 'The Poisons We Drink', 'Bethany Baptiste', 'In a country divided between humans and witchers, Venus Stoneheart hustles as a brewer making illegal love potions to support her family.', 'Love potions is a dangerous business. Brewing has painful, debilitating side effects, and getting caught means death or a prison sentence. But what Venus is most afraid of is the dark, sentient magic within her.\r\n\r\nThen an enemy\'s iron bullet kills her mother, Venus’s life implodes. Keeping her reckless little sister Janus safe is now her responsibility. When the powerful Grand Witcher, the ruthless head of her coven, offers Venus the chance to punish her mother\'s killer, she has to pay a steep price for revenge. The cost? Brew poisonous potions to enslave D.C.\'s most influential politicians.\r\n\r\nAs Venus crawls deeper into the corrupt underbelly of her city, the line between magic and power blurs, and it\'s hard to tell who to trust…Herself included.', '9.59', 480, 1),
(13, 'A Short Walk Through a Wide World', 'Douglas Westerbeke', 'The Invisible Life of Addie LaRue meets Life of Pi in this dazzlingly epic debut that charts the incredible, adventurous life of one woman as she journeys the globe trying to outrun a mysterious curse that will destroy her if she stops moving.\r\n', 'Paris, 1885: Aubry Tourvel, a spoiled and stubborn nine-year-old girl, comes across a wooden puzzle ball on her walk home from school. She tosses it over the fence, only to find it in her backpack that evening. Days later, at the family dinner table, she starts to bleed to death.\r\n\r\nWhen medical treatment only makes her worse, she flees to the outskirts of the city, where she realizes that it is this very act of movement that keeps her alive. So begins her lifelong journey on the run from her condition, which won’t allow her to stay anywhere for longer than a few days nor return to a place where she’s already been.\r\n\r\nFrom the scorched dunes of the Calashino Sand Sea to the snow-packed peaks of the Himalayas; from a bottomless well in a Parisian courtyard, to the shelves of an infinite underground library, we follow Aubry as she learns what it takes to survive and ultimately, to truly live. But the longer Aubry wanders and the more desperate she is to share her life with others, the clearer it becomes that the world she travels through may not be quite the same as everyone else’s...', '14.99', 400, 1),
(14, 'The Silverblood Promise', 'James Logan', 'Lukan Gardova is a cardsharp, academy dropout, and―thanks to a duel that ended badly―the disgraced heir to an ancient noble house. His days consist of cheap wine, rigged card games, and wondering how he might win back the life he threw away.', 'When Lukan discovers that his estranged father has been murdered in strange circumstances, he finds fresh purpose. Deprived of his chance to make amends for his mistakes, he vows to unravel the mystery behind his father\'s death.\r\n\r\nHis search for answers leads him to Saphrona, fabled city of merchant princes, where anything can be bought if one has the coin. Lukan only seeks the truth, but instead he finds danger and secrets in every shadow.\r\n\r\nFor in Saphrona, everything has a price―and the price of truth is the deadliest of all.', '7.77', 528, 1);

-- --------------------------------------------------------

--
-- Table structure for table `book_covers`
--

CREATE TABLE `book_covers` (
  `id` int(11) NOT NULL,
  `img_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_covers`
--

INSERT INTO `book_covers` (`id`, `img_url`, `book_id`) VALUES
(1, '/www/img/book_covers/1.jpg', 2),
(2, '/www/img/book_covers/2.jpg', 3),
(3, '/www/img/book_covers/3.jpg', 4),
(4, '/www/img/book_covers/4.jpg', 5),
(5, '/www/img/book_covers/5.jpg', 6),
(6, '/www/img/book_covers/6.jpg', 7),
(7, '/www/img/book_covers/7.jpg', 8),
(8, '/www/img/book_covers/8.jpg', 9),
(9, '/www/img/book_covers/9.jpg', 10),
(10, '/www/img/book_covers/10.jpg', 11),
(11, '/www/img/book_covers/11.jpg', 12),
(12, '/www/img/book_covers/12.jpg', 13),
(13, '/www/img/book_covers/13.jpg', 14);

-- --------------------------------------------------------

--
-- Table structure for table `book_orders`
--

CREATE TABLE `book_orders` (
  `id` int(11) NOT NULL,
  `buyer_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_phone` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_orders`
--

INSERT INTO `book_orders` (`id`, `buyer_name`, `buyer_phone`, `book_id`, `user_id`, `created_date`, `status_id`) VALUES
(8, 'Mike Clinton', '+380882277181', 3, 1, '2024-05-12 03:15:16', 5),
(9, 'Mike Clinton', '+380882277181', 4, 1, '2024-05-12 03:15:38', 1),
(10, 'Mike Clinton', '+380882277181', 10, 1, '2024-05-12 03:15:53', 5),
(11, 'Mike Clinton', '+380882277181', 7, 1, '2024-05-12 03:16:07', 2),
(12, 'Mike Clinton', '+380882277181', 14, 1, '2024-05-12 03:16:18', 3),
(13, 'Bob Johnson', '+380882277181', 5, 4, '2024-05-12 08:08:45', 1),
(14, 'Bob Johnson', '+380882277181', 8, 4, '2024-05-12 08:11:34', 5),
(15, 'Bob Johnson', '+380882277181', 6, 4, '2024-05-12 09:47:50', 1),
(16, 'Bob Johnson', '+380882277181', 6, 4, '2024-05-12 09:48:16', 1),
(17, 'Bob Johnson', '+380882277181', 2, 4, '2024-05-13 10:02:17', 4);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(6, 'Adventure'),
(5, 'Biography'),
(1, 'Fantasy'),
(7, 'History'),
(2, 'Horror');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(5, 'Cancelled'),
(4, 'Delivered'),
(1, 'In processing'),
(2, 'Ready to ship'),
(3, 'Sent to customer');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `is_admin`) VALUES
(1, 'alex', '123123', 0),
(3, 'alex2', '123123', 0),
(4, 'alex3', '123123', 0),
(5, 'admin', '123123', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `genre_fk` (`genre_id`);

--
-- Indexes for table `book_covers`
--
ALTER TABLE `book_covers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `book_id` (`book_id`),
  ADD UNIQUE KEY `img_url` (`img_url`);

--
-- Indexes for table `book_orders`
--
ALTER TABLE `book_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_book_id_fk` (`book_id`),
  ADD KEY `orders_status_id_fk` (`status_id`),
  ADD KEY `orders_user_id_fk` (`user_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `book_covers`
--
ALTER TABLE `book_covers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `book_orders`
--
ALTER TABLE `book_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `genre_fk` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`);

--
-- Constraints for table `book_covers`
--
ALTER TABLE `book_covers`
  ADD CONSTRAINT `book_id_fk` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `book_orders`
--
ALTER TABLE `book_orders`
  ADD CONSTRAINT `orders_book_id_fk` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `orders_status_id_fk` FOREIGN KEY (`status_id`) REFERENCES `order_status` (`id`),
  ADD CONSTRAINT `orders_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
