-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2025 at 04:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'ram', '2024-12-23 05:53:07', '2024-12-23 05:53:07'),
(2, 'showan', '2024-12-23 05:53:38', '2024-12-23 05:53:38'),
(4, 'Nishan', '2024-12-23 06:12:34', '2024-12-23 06:12:34'),
(7, 'author one two', '2024-12-26 06:05:45', '2024-12-27 19:07:31'),
(8, 'Jane Austen', '2024-12-26 08:37:50', '2024-12-26 08:37:50'),
(9, 'Harper Lee', '2025-01-04 03:07:21', '2025-01-04 03:07:21'),
(10, 'Harold Bloom', '2025-01-04 03:16:23', '2025-01-04 03:16:23'),
(11, 'Sylvia Plath', '2025-01-04 03:23:03', '2025-01-04 03:23:03'),
(12, 'Don DeLillo', '2025-01-04 03:30:40', '2025-01-04 03:30:40'),
(13, 'Kazuo Ishiguro', '2025-01-04 03:41:48', '2025-01-04 03:41:48'),
(14, 'Hilary Mantel', '2025-01-04 03:48:40', '2025-01-04 03:48:40'),
(15, 'Marilynne Robinson', '2025-01-04 04:29:46', '2025-01-04 04:29:46'),
(16, 'Chimamanda Ngozi Adichie', '2025-01-04 04:37:14', '2025-01-04 04:37:14'),
(17, 'Buddhi Sagar', '2025-01-04 04:43:20', '2025-01-04 04:43:20'),
(18, 'Sudheer Sharma', '2025-01-04 04:49:10', '2025-01-04 04:49:10'),
(19, 'Thaddeus Kertzmann', '2025-01-05 00:06:17', '2025-01-05 00:06:17'),
(20, 'Marilie Wilkinson', '2025-01-05 00:06:17', '2025-01-05 00:06:17'),
(21, 'Rusty Johns', '2025-01-05 00:06:17', '2025-01-05 00:06:17'),
(22, 'Gunnar Lueilwitz', '2025-01-05 00:06:17', '2025-01-05 00:06:17'),
(23, 'Valentine Schowalter', '2025-01-05 00:06:17', '2025-01-05 00:06:17'),
(24, 'Henry Ortiz IV', '2025-01-05 00:06:17', '2025-01-05 00:06:17'),
(25, 'Edwina Schinner', '2025-01-05 00:06:17', '2025-01-05 00:06:17'),
(26, 'Jalon Johnson', '2025-01-05 00:06:17', '2025-01-05 00:06:17'),
(27, 'Kattie Lubowitz', '2025-01-05 00:06:17', '2025-01-05 00:06:17'),
(28, 'Dr. Forrest Rau', '2025-01-05 00:06:17', '2025-01-05 00:06:17'),
(29, 'Prof. Ian Hahn MD', '2025-01-05 00:06:17', '2025-01-05 00:06:17'),
(30, 'Mylene Gutmann', '2025-01-05 00:06:17', '2025-01-05 00:06:17'),
(31, 'Jamison Erdman III', '2025-01-05 00:06:17', '2025-01-05 00:06:17'),
(32, 'Jimmie Rohan', '2025-01-05 00:06:17', '2025-01-05 00:06:17'),
(33, 'Mr. Merritt Willms MD', '2025-01-05 00:06:17', '2025-01-05 00:06:17');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `available_copies` int(11) DEFAULT 0,
  `publisherID` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `published_date` date DEFAULT NULL,
  `total_pages` int(10) UNSIGNED DEFAULT NULL,
  `language` varchar(50) DEFAULT NULL,
  `featured` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `isbn`, `description`, `available_copies`, `publisherID`, `image`, `created_at`, `updated_at`, `published_date`, `total_pages`, `language`, `featured`) VALUES
(94, 'Pride and Prejudice', '9789387779679', 'Pride and Prejudice is the second novel by English author Jane Austen, published in 1813. A novel of manners, it follows the character development of Elizabeth Bennet, the protagonist of the book, who learns about the repercussions of hasty judgments and comes to appreciate the difference between superficial goodness and actual goodness.\r\n\r\nMr Bennet, owner of the Longbourn estate in Hertfordshire, has five daughters, but his property is entailed and can only be passed to a male heir. His wife also lacks an inheritance, so his family faces becoming poor upon his death. Thus, it is imperative that at least one of the daughters marry well to support the others, which is a primary motivation driving the plot.\r\n\r\nPride and Prejudice has consistently appeared near the top of lists of \"most-loved books\" among literary scholars and the reading public. It has become one of the most popular novels in English literature, with over 20 million copies sold, and has inspired many derivatives in modern literature. For more than a century, dramatic adaptations, reprints, unofficial sequels, films, and TV versions of Pride and Prejudice have portrayed the memorable characters and themes of the novel, reaching mass audiences.', 29, 12, 'uploads/books/xcJDU7PH0HjJKkpt782BRoXm9Pd0QI5lFYc29OYv.jpg', '2024-12-26 08:40:08', '2025-01-05 06:46:37', NULL, NULL, NULL, 'yes'),
(103, 'To Kill a Mockingbird', '9780099549482', 'The unforgettable novel of a childhood in a sleepy Southern town and the crisis of conscience that rocked it. “To Kill A Mockingbird” became both an instant bestseller and a critical success when it was first published in 1960. It went on to win the Pulitzer Prize in 1961 and was later made into an Academy Award-winning film, also a classic.\r\nCompassionate, dramatic, and deeply moving, “To Kill A Mockingbird” takes readers to the roots of human behavior – to innocence and experience, kindness and cruelty, love and hatred, humor and pathos. Now with over 18 million copies in print and translated into forty languages, this regional story by a young Alabama woman claims universal appeal. Harper Lee always considered her book to be a simple love story. Today it is regarded as a masterpiece of American literature.', 10, 13, 'uploads/books/vKNwdnxIraV1KKsuIxnx6gJe0kKoy3gPtwaLwiTR.jpg', '2025-01-04 03:11:36', '2025-01-04 03:11:36', '2024-02-17', 350, 'English', 'no'),
(104, 'The Catcher in the Rye', '9781438113739', 'Holden Caulfield recalls the events of a long weekend, shortly before the previous year\'s Christmas. The story begins at Pencey Preparatory Academy, a boarding school in Pennsylvania, where he has been expelled after failing all his classes, except English\r\nLater, Holden agrees to write an English composition for his roommate, Ward Stradlater, who is heading out on a date. He is distressed when he learns that Stradlater\'s date is Jane Gallagher, with whom Holden has been infatuated. When Stradlater returns, hours later, he fails to appreciate the deeply personal composition Holden has written for him about the baseball glove of Holden\'s late brother, Allie, who died from leukemia years earlier, and refuses to say whether he had sex with Jane. Enraged, Holden punches and insults him, but Stradlater easily wins the fight. Fed up with the \"phonies\" at Pencey Prep, Holden decides to catch a train to New York, planning to stay away from his home until Wednesday, when his parents will have received notification of his expulsion.', 7, 14, 'uploads/books/q9ZblPe7ZU7nKPWcfmZHOqpQZjEgLPkzcldukEcu.jpg', '2025-01-04 03:21:20', '2025-01-04 03:21:20', '2009-07-10', 288, 'English', 'no'),
(105, 'The Bell Jar', '9788181320346', 'The Bell Jar chronicles the crack-up of Esther Greenwood: brilliant, beautiful, enormously talented, and successful, but slowly going under—maybe for the last time. Sylvia Plath masterfully draws the reader into Esther\'s breakdown with such intensity that Esther\'s insanity becomes completely real and even rational, as probable and accessible an experience as going to the movies. Such deep penetration into the dark and harrowing corners of the psyche is an extraordinary accomplishment and has made The Bell Jar a haunting American classic.\r\nThe Bell Jar shocking, realistic, and intensely emotional novel about a woman falling into the grip of insanity. Esther Greenwood is brilliant, beautiful, enormously talented, and successful, but slowly going under—maybe for the last time.', 7, 13, 'uploads/books/fi8YjvajqIVHvtbI7JE9Zg1lzuVFaCQTzcZ1xpqg.jpg', '2025-01-04 03:28:22', '2025-01-04 03:28:22', '2024-03-24', 468, 'English', 'no'),
(106, 'White Noise', '0-670-80373-1', 'White Noise is the eighth novel by Don DeLillo, published by Viking Press in 1985. It won the U.S. National Book Award for Fiction.\r\nWhite Noise is a cornerstone example of postmodern literature. It is widely considered DeLillo\'s breakout work and brought him to the attention of a much larger audience. The novel was included in Time\'s List of the 100 Best Novels. DeLillo originally wanted to call the book Panasonic, but the Panasonic Corporation objected.\r\nIn late 2022, the novel was adapted by director Noah Baumbach into a film of the same name starring Adam Driver and Greta Gerwig.\r\nSet in the bucolic college town Blacksmith, White Noise follows a year in the life of Jack Gladney, a professor at the College-on-the-Hill who has made his name by pioneering the field of Hitler studies (though he has not taken German lessons until this year).', 3, 15, 'uploads/books/ye59LKc0iiUYYxKiv1lvXFoM1VKzQEG08UFPbmqY.jpg', '2025-01-04 03:40:05', '2025-01-05 06:46:43', '1985-01-21', 326, 'English', 'no'),
(107, 'Never Let Me Go', '1-4000-4339-5', 'Never Let Me Go is a 2005 science fiction novel by the British author Kazuo Ishiguro. It was shortlisted for the 2005 Man Booker Prize (an award Ishiguro had previously won in 1989 for The Remains of the Day), for the 2006 Arthur C. Clarke Award and for the 2005 National Book Critics Circle Award. Time magazine named it the best novel of 2005 and included the novel in its \"100 Best English-language novels published since 1923—the beginning of TIME\".It also received an ALA Alex Award in 2006, and the Nobel Prize in Literature in 2017. A film adaptation directed by Mark Romanek was released in 2010; a Japanese television drama aired in 2016.\r\nNever Let Me Go, Ishiguro\'s sixth novel, takes place in an alternate reality of England during the 1990s in which mass human cloning is authorised and performed for the purpose of organ transplants, though this is not initially revealed to the reader. Ishiguro started writing Never Let Me Go in 1990. It was originally titled The Student\'s Novel.', 2, 16, 'uploads/books/G230n1TGxuaeA9ZmbnDYU6HVWFR1Xl6AZQYwPlv0.jpg', '2025-01-04 03:44:45', '2025-01-05 03:37:42', '2005-06-09', 288, 'English', 'no'),
(108, 'Wolf Hall', '978-1554687787', 'Wolf Hall is a 2009 historical novel by English author Hilary Mantel, published by Fourth Estate, named after the Seymour family\'s seat of Wolfhall, or Wulfhall, in Wiltshire. Set in the period from 1500 to 1535, Wolf Hall is a sympathetic fictionalised biography documenting the rapid rise to power of Thomas Cromwell in the court of Henry VIII through to the death of Sir Thomas More. The novel won both the Booker Prize and the National Book Critics Circle Award. In 2012, The Observer named it as one of \"The 10 best historical novels\".\r\nIn 1500, the teenage Thomas Cromwell ran away from home to flee his abusive father and sought his fortune as a soldier in France.\r\n\r\nBy 1527, the well-travelled Cromwell had returned to England and was now a lawyer, a married father of three, and highly respected as the right-hand man of Cardinal Thomas Wolsey, with a reputation for successful deal-making. His life takes a tragic turn when his wife and two daughters abruptly die of the sweating sickness, leaving him a widower. His sister-in-law, Johane, comes to keep house for him.', 20, 17, 'uploads/books/HL60hgwFfL4ZZl4v3GMA7wd9M2VzZocIzng2YdaM.jpg', '2025-01-04 03:51:50', '2025-01-04 03:51:50', '2009-04-30', 672, 'English', 'no'),
(109, 'Gilead', '978-0-374-15389-2', 'Gilead is a novel by Marilynne Robinson published in 2004. It won the 2005 Pulitzer Prize for Fiction and the National Book Critics Circle Award. It is Robinson\'s second novel, following Housekeeping (1980). Gilead is an epistolary novel, as the entire narrative is a single, continuing, albeit episodic, document, written on several occasions in a form combining a journal and a memoir. It comprises the fictional autobiography of John Ames, an elderly, white Congregationalist pastor in the small, secluded town of Gilead, Iowa (also fictional), who knows that he is dying of a heart condition. At the beginning of the book, the date is established as 1956. Ames explains that he is writing an account of his life for his seven-year-old son, who will have few memories of him.\r\nThe book is an account of the memories and legacy of John Ames as he remembers his experiences with his father and grandfather and shares them with his son. All three men share a vocational life-style and profession as Congregationalist ministers in Gilead, Iowa. John Ames describes his vocation as \"giving you a good basic sense of what is being asked of you and also what you might as well ignore\", explaining that your vocation is both hard to fulfill and hard to obtain.  He writes that this is one of the essential pieces of wisdom he can bestow upon his son. Ames\'s father was a Christian pacifist. Still, his grandfather was a radical abolitionist who carried out guerrilla actions with John Brown before the American Civil War, served as a chaplain with the Union forces in that war, and incited his congregation to join up and serve in it; as Ames remarks, his grandfather \"preached his people into the war.\"', 1, 18, 'uploads/books/L96xNOq3Jyt3qlLTrUuWp8rcx74dkVVaRtFRfDKc.jpg', '2025-01-04 04:36:46', '2025-01-04 04:36:46', '2004-11-04', 256, 'English', 'no'),
(110, 'Half of a Yellow Sun', '978-0-00-720028-3', 'The novel takes place in Nigeria prior to and during the Nigerian Civil War (1967–70). The effect of the war is shown through the relationships of five people\'s lives including the twin daughters of an influential businessman, a professor, a British expat, and a Nigerian houseboy. After Biafra\'s declaration of secession, the lives of the main characters drastically change and are torn apart by the brutality of the civil war and decisions in their personal lives. The book jumps between events that took place during the early and late 1960s, when the war took place, and extends until the end of the war. In the early 1960s, the main characters are introduced: Ugwu, a 13-year-old village boy who moves in with Odenigbo, to work as his houseboy. Odenigbo frequently entertains intellectuals to discuss the political turmoil in Nigeria. Life changes for Ugwu when Odenigbo\'s girlfriend, Olanna, moves in with them. Ugwu forms a strong bond with both of them, and is a very loyal houseboy. Olanna has a twin sister, Kainene, a woman with a dry sense of humor, tired by the pompous company she runs for her father. Her lover Richard is an English writer who goes to Nigeria to explore Igbo-Ukwu art.', 3, 17, 'uploads/books/nvuAU0GitDJp7JCq1lSytsQDJw3BTdAXygJT76qH.jpg', '2025-01-04 04:41:15', '2025-01-04 04:41:15', '2006-02-16', 448, 'English', 'no'),
(111, 'Karnali Blues', '9789937827935', 'Karnali Blues (Nepali: कर्नाली ब्लुज) is book written by Buddhi Sagar and published by FinePrint publication, Nepal in 2010. Karnali Blues is a story about a young boy who travels through different phases of his life with his parents. The story\'s main focus is on the protagonist\'s father. The book is one of the best selling Nepalese novels. The novel depicts the father-son relationship in a family from the Mid-western region of Nepal. The family had descended from Surkhet to the plains around present Bardiya National Park when the forest lands had opened up to agriculture, and then moved to Kalikot.\r\n\r\nBrisha Bahadur, the narrator of the novel, is born into a Pahari family. They are one of the hill people families, who have been moving down to the plains in growing numbers over the past fifty years to open up newly cleared forest lands for agriculture. Brisha Bahadur\'s family belongs to this community, which dominates local commerce, trade and politics and forms a majority in the small bazaar towns of the district.\r\n\r\nThe story of Brisha\'s childhood is intertwined with a parallel story that begins with Brisha\'s father\'s admission into a hospital when Brisha is a teenager. Brisha Bahadur narrates his father\'s struggles. The novel is divided into eleven days. Brisha Bahadur is taking care of his father who is sick in those eleven days and he reminisces his past with his parents.', 10, 19, 'uploads/books/dPOOfPZw5c9ljzbe01w6dYKIvx0UfCMi3WfE8fYk.jpg', '2025-01-04 04:46:32', '2025-01-04 04:46:32', '2010-01-05', 400, 'Nepali', 'no'),
(112, 'Himalpariko Huri', '9789937949262', 'Himalpariko Huri (हिमालपारिको हुरी: गणतन्त्रपछि फेरिएको नेपाल-चिन सम्बन्ध) offers a deep exploration of the evolving relationship between Nepal and China in the post-republic era. Written by noted Nepali journalist and political analyst Sudheer Sharma, the book examines how Nepal\'s political shift to a republic has altered its diplomatic, economic, and strategic ties with China. It presents an in-depth analysis of the growing Chinese influence in Nepal and its impact on Nepal\'s internal politics, border issues, and foreign policy, especially in light of regional power dynamics with India and the global stage.\r\n\r\nSharma meticulously traces the historical backdrop of Nepal-China relations, focusing on the post-2008 republican era, and how China\'s Belt and Road Initiative (BRI) and infrastructure projects are reshaping Nepal’s economy and governance. The book also sheds light on the domestic political developments in Nepal that have led to closer ties with China, offering readers a nuanced understanding of these complex geopolitical shifts.', 10, 20, 'uploads/books/IvICAZKD71g1GZXLhEvE8nwmJeOfr9AU7Kz8BCzG.jpg', '2025-01-04 04:55:52', '2025-01-05 06:47:08', '2024-02-06', 279, 'Nepali', 'yes'),
(113, 'Ea distinctio dolores.', '0382268539', 'Earum veritatis esse vitae qui accusamus ipsum qui similique. Possimus id qui non.', 6, 16, 'https://via.placeholder.com/640x480.png/0000cc?text=veritatis', '2025-01-05 00:58:38', '2025-01-05 06:46:57', '2022-05-01', 338, 'English', 'no'),
(114, 'Deleniti earum impedit possimus et.', '3505906115', 'Nobis corrupti ea perspiciatis ut est unde. Ullam quaerat qui magnam quam aliquid. Est error recusandae eaque eius dolorum. At commodi quisquam et.', 45, 20, 'https://via.placeholder.com/640x480.png/000099?text=consequatur', '2025-01-05 00:58:38', '2025-01-05 00:58:38', '2008-04-07', 469, 'Neplai', 'no'),
(115, 'Fugiat est aut.', '0560559186', 'Nemo qui ab quis doloribus. Cumque ea nemo numquam id. Libero nihil animi consectetur iure iste officiis. Hic cupiditate voluptatum alias in sed non voluptatem. Non autem ex cum nihil non saepe expedita.', 13, 1, 'https://via.placeholder.com/640x480.png/00aadd?text=quos', '2025-01-05 00:58:38', '2025-01-05 06:47:03', '2008-10-26', 559, 'Neplai', 'no'),
(117, 'Eum dolores voluptatem est.', '3623151432', 'Ducimus quia occaecati qui beatae dignissimos quas. Vel eos sequi itaque at. Sequi excepturi consequatur eos qui aut minus sed. Nemo quaerat tempore mollitia in quia molestias.', 36, 12, 'https://via.placeholder.com/640x480.png/00aa11?text=fuga', '2025-01-05 00:58:38', '2025-01-05 00:58:38', '2021-11-24', 351, 'Neplai', 'no'),
(118, 'Praesentium et harum eius.', '4856413708', 'Nisi excepturi praesentium alias facere esse laborum. Quidem rerum molestiae soluta eius iste. Nostrum laboriosam itaque qui beatae blanditiis dolor.', 9, 32, 'https://via.placeholder.com/640x480.png/00ee66?text=temporibus', '2025-01-05 00:58:38', '2025-01-05 00:58:38', '1986-09-03', 352, 'Neplai', 'no'),
(120, 'Voluptatum vel accusamus.', '0592445526', 'Ratione dolorem quia reiciendis fugiat quam non voluptatem. Aut enim rem sed dignissimos natus quaerat nobis unde. Ut blanditiis dolore earum impedit ut aut. Libero nostrum quia quis delectus velit delectus ut.', 22, 18, 'https://via.placeholder.com/640x480.png/0033bb?text=ut', '2025-01-05 00:58:38', '2025-01-05 00:58:38', '1979-01-26', 905, 'Neplai', 'no'),
(124, 'Commodi numquam.', '2486613293', 'Dolore provident reprehenderit doloribus est. Nobis voluptatem eaque ipsa illum. Ex aut soluta voluptatibus facere deserunt et.', 1, 24, 'https://via.placeholder.com/640x480.png/00dd22?text=debitis', '2025-01-05 00:58:38', '2025-01-05 00:58:38', '2011-09-26', 692, 'Neplai', 'no'),
(125, 'Fugiat hic vitae consequatur sint.', '1198348437', 'Earum ut non consectetur. Qui cum et totam officia odit. Ullam fugiat sed laboriosam repudiandae ipsa laboriosam explicabo et. Dolorem veniam et sint qui sit qui.', 36, 5, 'https://via.placeholder.com/640x480.png/0055cc?text=tempora', '2025-01-05 00:58:38', '2025-01-05 06:46:48', '2008-07-13', 715, 'Neplai', 'no'),
(126, 'Aliquam temporibus quae.', '3214617168', 'Quo quibusdam aliquam voluptas dicta illo nemo. Sit aperiam dolorem deserunt cum qui nulla. Nobis expedita odio autem sapiente sed a.', 17, 26, 'https://via.placeholder.com/640x480.png/00cccc?text=expedita', '2025-01-05 00:58:38', '2025-01-05 06:18:18', '2001-06-18', 704, 'English', 'no'),
(127, 'Sunt tempore accusantium quia.', '131375210X', 'Eum eum voluptate ad maxime enim ea sequi. Dolorem ut atque omnis asperiores quas illum aut. Ipsa quae dolores necessitatibus necessitatibus aliquam sed. Et sed laudantium impedit reiciendis.', 14, 13, 'uploads/books/wD9SeTC6eCbtAgFOF8REv17TpbbBgWZhRMUI0DiL.jpg', '2025-01-05 00:58:38', '2025-01-05 06:32:36', '1978-06-02', 978, 'English', 'no'),
(129, 'Odio quisquam est sit.', '0311427448', 'Quia voluptatem ducimus aut dicta. Est laborum modi id repudiandae. Veniam id neque nemo dicta dolores autem et.', 38, 3, 'https://via.placeholder.com/640x480.png/00aa66?text=est', '2025-01-05 00:58:38', '2025-01-05 00:58:38', '1980-05-18', 928, 'English', 'no'),
(130, 'Modi impedit odit.', '4246678929', 'Voluptatem sapiente excepturi beatae eum exercitationem voluptate libero. Commodi eaque deserunt deserunt commodi architecto molestias mollitia. Earum id reprehenderit laboriosam quia non tenetur voluptatem. Odio quos facilis est quam alias eius fuga. Dolor alias ab ratione sit fuga assumenda et.', 15, 24, 'https://via.placeholder.com/640x480.png/0077dd?text=nesciunt', '2025-01-05 00:58:38', '2025-01-05 00:58:38', '1990-10-09', 820, 'Neplai', 'no'),
(131, 'Est est eius aliquid.', '3512518729', 'Velit dolorum nulla est vitae ut earum ex. A omnis consectetur omnis ea aut. Saepe repellendus amet et deleniti.', 13, 13, 'https://via.placeholder.com/640x480.png/0099aa?text=deleniti', '2025-01-05 00:58:38', '2025-01-05 00:58:38', '2002-05-15', 995, 'Neplai', 'no'),
(132, 'Cupiditate enim corrupti omnis.', '738601709X', 'Cumque enim ab et explicabo quos provident repellat. Neque molestiae et at ex tempora. Voluptatibus mollitia voluptatem dolor assumenda quam non. Molestiae dolorem reprehenderit itaque adipisci.', 21, 13, 'https://via.placeholder.com/640x480.png/00ff66?text=excepturi', '2025-01-05 00:58:38', '2025-01-05 00:58:38', '2005-07-11', 834, 'Neplai', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `book_authors`
--

CREATE TABLE `book_authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bookID` varchar(255) NOT NULL,
  `authorID` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_authors`
--

INSERT INTO `book_authors` (`id`, `bookID`, `authorID`, `created_at`, `updated_at`) VALUES
(1, '44', 'ram', '2024-12-24 07:58:22', '2024-12-24 07:58:22'),
(2, '45', 'ram, showan', '2024-12-24 08:02:36', '2024-12-24 08:02:36'),
(3, '50', 'ram, showan', '2024-12-24 08:19:25', '2024-12-24 08:19:25'),
(4, '56', 'ram, showan', '2024-12-24 08:32:06', '2024-12-24 08:32:06'),
(5, '57', 'ram', '2024-12-24 08:40:37', '2024-12-24 08:40:37'),
(6, '58', 'ram', '2024-12-24 08:41:58', '2024-12-24 08:41:58'),
(7, '59', '1', '2024-12-24 08:44:02', '2024-12-24 08:44:02'),
(8, '60', '1', '2024-12-24 08:44:46', '2024-12-24 08:44:46'),
(9, '60', '2', '2024-12-24 08:44:46', '2024-12-24 08:44:46'),
(10, '60', '4', '2024-12-24 08:44:46', '2024-12-24 08:44:46'),
(17, '64', '1', '2024-12-24 09:07:53', '2024-12-24 09:07:53'),
(18, '64', '2', '2024-12-24 09:07:53', '2024-12-24 09:07:53'),
(23, '86', '1', '2024-12-24 10:52:36', '2024-12-24 10:52:36'),
(24, '87', '1', '2024-12-24 10:57:43', '2024-12-24 10:57:43'),
(25, '88', '1', '2024-12-24 10:58:51', '2024-12-24 10:58:51'),
(26, '88', '2', '2024-12-24 10:58:51', '2024-12-24 10:58:51'),
(27, '88', '3', '2024-12-24 10:58:51', '2024-12-24 10:58:51'),
(28, '89', '1', '2024-12-24 18:41:35', '2024-12-24 18:41:35'),
(29, '89', '2', '2024-12-24 18:41:35', '2024-12-24 18:41:35'),
(30, '90', '1', '2024-12-26 04:20:20', '2024-12-26 04:20:20'),
(31, '90', '2', '2024-12-26 04:20:21', '2024-12-26 04:20:21'),
(32, '91', '4', '2024-12-26 04:37:04', '2024-12-26 04:37:04'),
(33, '91', '6', '2024-12-26 04:37:04', '2024-12-26 04:37:04'),
(34, '92', '1', '2024-12-26 04:38:12', '2024-12-26 04:38:12'),
(35, '92', '6', '2024-12-26 04:38:12', '2024-12-26 04:38:12'),
(36, '93', '4', '2024-12-26 06:06:36', '2024-12-26 06:06:36'),
(37, '93', '7', '2024-12-26 06:06:36', '2024-12-26 06:06:36'),
(38, '94', '8', '2024-12-26 08:40:08', '2024-12-26 08:40:08'),
(41, '87', '2', NULL, NULL),
(42, '95', '2', '2025-01-02 00:28:09', '2025-01-02 00:28:09'),
(43, '95', '4', '2025-01-02 00:28:09', '2025-01-02 00:28:09'),
(46, '98', '1', NULL, NULL),
(47, '99', '2', NULL, NULL),
(48, '100', '1', NULL, NULL),
(49, '101', '2', NULL, NULL),
(50, '102', '1', NULL, NULL),
(51, '102', '2', NULL, NULL),
(52, '103', '9', NULL, NULL),
(53, '104', '10', NULL, NULL),
(54, '105', '11', NULL, NULL),
(55, '106', '12', NULL, NULL),
(56, '107', '13', NULL, NULL),
(57, '108', '14', NULL, NULL),
(58, '109', '15', NULL, NULL),
(59, '110', '16', NULL, NULL),
(60, '111', '17', NULL, NULL),
(61, '112', '18', NULL, NULL),
(62, '113', '14', NULL, NULL),
(63, '113', '2', NULL, NULL),
(64, '113', '1', NULL, NULL),
(65, '114', '16', NULL, NULL),
(66, '114', '20', NULL, NULL),
(67, '115', '2', NULL, NULL),
(68, '116', '7', NULL, NULL),
(69, '116', '28', NULL, NULL),
(70, '116', '2', NULL, NULL),
(71, '117', '10', NULL, NULL),
(72, '118', '14', NULL, NULL),
(73, '119', '20', NULL, NULL),
(74, '119', '25', NULL, NULL),
(75, '120', '21', NULL, NULL),
(76, '120', '25', NULL, NULL),
(77, '121', '16', NULL, NULL),
(78, '122', '7', NULL, NULL),
(79, '122', '27', NULL, NULL),
(80, '122', '13', NULL, NULL),
(81, '123', '17', NULL, NULL),
(82, '123', '8', NULL, NULL),
(83, '123', '15', NULL, NULL),
(84, '124', '16', NULL, NULL),
(85, '124', '25', NULL, NULL),
(86, '125', '12', NULL, NULL),
(87, '126', '32', NULL, NULL),
(88, '127', '18', NULL, NULL),
(89, '128', '31', NULL, NULL),
(90, '128', '19', NULL, NULL),
(91, '129', '14', NULL, NULL),
(92, '129', '19', NULL, NULL),
(93, '130', '2', NULL, NULL),
(94, '130', '25', NULL, NULL),
(95, '130', '8', NULL, NULL),
(96, '131', '29', NULL, NULL),
(97, '131', '32', NULL, NULL),
(98, '132', '19', NULL, NULL),
(99, '132', '26', NULL, NULL),
(100, '133', '8', NULL, NULL),
(101, '133', '9', NULL, NULL),
(102, '134', '7', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `book_genres`
--

CREATE TABLE `book_genres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `genre_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_genres`
--

INSERT INTO `book_genres` (`id`, `book_id`, `genre_id`, `created_at`, `updated_at`) VALUES
(16, 94, 6, '2024-12-26 08:40:08', '2024-12-26 08:40:08'),
(17, 94, 12, '2024-12-26 08:40:08', '2024-12-26 08:40:08'),
(18, 94, 13, '2024-12-26 08:40:08', '2024-12-26 08:40:08'),
(33, 103, 6, NULL, NULL),
(34, 103, 9, NULL, NULL),
(35, 104, 9, NULL, NULL),
(36, 104, 15, NULL, NULL),
(37, 105, 9, NULL, NULL),
(38, 105, 13, NULL, NULL),
(39, 105, 15, NULL, NULL),
(40, 106, 15, NULL, NULL),
(41, 107, 8, NULL, NULL),
(42, 108, 13, NULL, NULL),
(43, 109, 15, NULL, NULL),
(44, 110, 5, NULL, NULL),
(45, 110, 13, NULL, NULL),
(46, 111, 13, NULL, NULL),
(47, 112, 3, NULL, NULL),
(48, 112, 9, NULL, NULL),
(49, 112, 10, NULL, NULL),
(50, 113, 8, NULL, NULL),
(51, 113, 15, NULL, NULL),
(52, 114, 13, NULL, NULL),
(53, 115, 12, NULL, NULL),
(57, 117, 9, NULL, NULL),
(58, 117, 6, NULL, NULL),
(59, 118, 6, NULL, NULL),
(60, 118, 12, NULL, NULL),
(61, 118, 3, NULL, NULL),
(63, 120, 5, NULL, NULL),
(71, 124, 7, NULL, NULL),
(72, 124, 8, NULL, NULL),
(73, 124, 15, NULL, NULL),
(74, 125, 7, NULL, NULL),
(75, 125, 6, NULL, NULL),
(76, 125, 5, NULL, NULL),
(78, 126, 9, NULL, NULL),
(79, 126, 3, NULL, NULL),
(80, 127, 6, NULL, NULL),
(81, 127, 5, NULL, NULL),
(82, 127, 3, NULL, NULL),
(86, 129, 7, NULL, NULL),
(87, 130, 3, NULL, NULL),
(88, 131, 15, NULL, NULL),
(89, 132, 15, NULL, NULL),
(90, 132, 8, NULL, NULL),
(91, 132, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `borrows`
--

CREATE TABLE `borrows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `request` enum('pending','approved','denied') NOT NULL DEFAULT 'pending',
  `status` enum('borrowed','returned') NOT NULL DEFAULT 'borrowed',
  `borrow_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `borrows`
--

INSERT INTO `borrows` (`id`, `user_id`, `book_id`, `request`, `status`, `borrow_date`, `return_date`, `created_at`, `updated_at`) VALUES
(11, 45, 107, 'approved', 'returned', '2025-01-05', NULL, '2025-01-05 01:20:34', '2025-01-05 03:37:42'),
(14, 51, 113, 'approved', 'returned', '2025-01-05', '2025-01-05', '2025-01-05 01:20:34', '2025-01-05 06:46:57'),
(16, 43, 117, 'approved', 'borrowed', '2025-01-05', NULL, '2025-01-05 01:20:34', '2025-01-05 01:20:34'),
(17, 27, 115, 'approved', 'returned', '2025-01-05', '2025-01-05', '2025-01-05 01:20:34', '2025-01-05 06:47:03'),
(19, 28, 104, 'approved', 'returned', '2025-01-05', NULL, '2025-01-05 01:20:34', '2025-01-05 01:20:34'),
(21, 13, 112, 'approved', 'returned', '2025-01-05', '2025-01-05', '2025-01-05 01:20:34', '2025-01-05 06:47:08'),
(22, 51, 130, 'approved', 'borrowed', '2025-01-05', NULL, '2025-01-05 01:20:34', '2025-01-05 01:20:34'),
(24, 42, 120, 'approved', 'borrowed', '2025-01-05', NULL, '2025-01-05 01:20:34', '2025-01-05 01:20:34'),
(25, 54, 106, 'approved', 'borrowed', '2025-01-05', NULL, '2025-01-05 01:20:34', '2025-01-05 03:37:48'),
(26, 19, 111, 'pending', 'returned', '2025-01-05', NULL, '2025-01-05 01:20:34', '2025-01-05 01:20:34'),
(29, 21, 110, 'approved', 'returned', '2025-01-05', NULL, '2025-01-05 01:20:34', '2025-01-05 01:20:34'),
(30, 41, 111, 'pending', 'borrowed', '2025-01-05', NULL, '2025-01-05 01:20:34', '2025-01-05 01:20:34'),
(31, 2, 103, 'pending', 'borrowed', NULL, NULL, '2025-01-05 06:37:58', '2025-01-05 06:37:58'),
(32, 2, 94, 'approved', 'borrowed', '2025-01-05', NULL, '2025-01-05 06:38:13', '2025-01-05 06:46:37'),
(33, 2, 106, 'approved', 'borrowed', '2025-01-05', NULL, '2025-01-05 06:41:48', '2025-01-05 06:46:43'),
(34, 2, 125, 'approved', 'returned', '2025-01-05', '2025-01-05', '2025-01-05 06:41:54', '2025-01-05 06:46:48');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('a@a.a|::1', 'i:1;', 1736090637),
('a@a.a|::1:timer', 'i:1736090637;', 1736090637),
('ram@gmail.com|::1', 'i:1;', 1736069346),
('ram@gmail.com|::1:timer', 'i:1736069346;', 1736069346);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'Action', '2024-12-23 05:19:01', '2024-12-27 19:37:51'),
(5, 'comedy', '2024-12-24 17:54:38', '2024-12-24 17:54:38'),
(6, 'Fantasy', '2024-12-24 17:55:35', '2024-12-24 17:55:35'),
(7, 'Horror', '2024-12-24 17:56:06', '2024-12-24 17:56:06'),
(8, 'Science Fiction', '2024-12-24 17:56:37', '2024-12-24 17:56:37'),
(9, 'Thriller', '2024-12-24 17:56:55', '2024-12-24 17:56:55'),
(10, 'Mystery', '2024-12-24 17:57:08', '2024-12-24 17:57:08'),
(12, 'Romance', '2024-12-26 08:34:08', '2024-12-26 08:34:08'),
(13, 'Fiction', '2024-12-26 08:34:22', '2024-12-26 08:34:22'),
(14, 'Biography', '2024-12-28 06:43:40', '2025-01-05 06:57:52'),
(15, 'Novel', '2025-01-04 03:15:48', '2025-01-04 03:15:48');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '0001_01_01_000000_create_users_table', 1),
(12, '0001_01_01_000001_create_cache_table', 1),
(13, '0001_01_01_000002_create_jobs_table', 1),
(14, '2024_12_15_013703_add_two_factor_columns_to_users_table', 1),
(15, '2024_12_15_013738_create_personal_access_tokens_table', 1),
(16, '2024_12_20_082136_add_two_factor_columns_to_users_table', 2),
(17, '2024_12_20_141559_publisher', 3),
(18, '2024_12_21_094027_create_publishers_table', 4),
(19, '2024_12_21_100926_products', 4),
(20, '2024_12_21_101628_books', 5),
(21, '2024_12_22_012412_authors', 6),
(22, '2024_12_23_032115_genre', 6),
(23, '2024_12_23_143235_create_books_table', 7),
(24, '2024_12_23_174200_books', 8),
(25, '2024_12_24_113828_book_genre', 9),
(26, '2024_12_24_114348_create_book_authors_table', 10),
(27, '2024_12_24_143756_book_genre', 11),
(28, '2024_12_28_170436_add_role_to_users_table', 12),
(29, '2024_12_28_171217_create_profile_details_table', 13),
(30, '2024_12_29_125500_create_borrows_table', 14),
(31, '2024_12_31_063431_create_reviews_table', 15),
(32, '2025_01_01_090740_create_wishlists_table', 16),
(33, '2025_01_01_213455_create_ratings_table', 17),
(34, '2025_01_02_062532_add_published_date_total_pages_and_language_to_books_table', 18),
(35, '2025_01_02_120622_add_featured_to_books_table', 19);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile_details`
--

CREATE TABLE `profile_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile_details`
--

INSERT INTO `profile_details` (`id`, `user_id`, `address`, `contact_number`, `date_of_birth`, `created_at`, `updated_at`) VALUES
(1, 2, 'kathmandu', '98181818188', '2024-12-13', '2024-12-29 01:50:12', '2024-12-29 04:12:31');

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`id`, `created_at`, `updated_at`, `name`, `address`) VALUES
(1, '2024-12-21 04:33:17', '2025-01-05 06:52:00', 'Ram Publishers', 'kathmandu nepal'),
(2, '2024-12-21 04:41:55', '2025-01-05 06:52:34', 'New Publisher', 'kathmandu'),
(3, '2024-12-21 17:25:32', '2025-01-05 06:51:39', 'We Publish', 'kathmandu'),
(5, '2024-12-21 23:50:11', '2025-01-05 06:50:56', 'rama', 'atlanta'),
(6, '2024-12-21 23:50:31', '2025-01-05 06:51:16', 'hari', 'New York, United States'),
(10, '2024-12-26 04:18:17', '2024-12-26 04:18:17', 'pub one', 'atlanta'),
(12, '2024-12-26 08:36:18', '2024-12-26 08:36:18', 'Dover Publications', 'New York, United States'),
(13, '2025-01-04 03:06:46', '2025-01-04 03:06:46', 'Bibliomania', 'Egypt'),
(14, '2025-01-04 03:15:05', '2025-01-04 03:15:05', 'Infobase', 'New York, United States'),
(15, '2025-01-04 03:30:24', '2025-01-04 03:30:24', 'Viking Adult', 'United States'),
(16, '2025-01-04 03:41:30', '2025-01-04 03:41:30', 'Faber and Faber', 'United Kingdom'),
(17, '2025-01-04 03:49:05', '2025-01-04 03:49:05', 'Fourth Estate', 'United Kingdom'),
(18, '2025-01-04 04:30:34', '2025-01-04 04:30:34', 'Farrar Straus and Giroux', 'United States'),
(19, '2025-01-04 04:42:50', '2025-01-04 04:42:50', 'FinePrint Publication', 'Nepal'),
(20, '2025-01-04 04:50:07', '2025-01-04 04:50:07', 'Kitab Publishers', 'Kathmandu, Nepal'),
(21, '2025-01-05 00:28:20', '2025-01-05 00:28:20', 'Williamson Ltd', '6306 Goodwin Shoals Apt. 309\nL'),
(22, '2025-01-05 00:28:20', '2025-01-05 00:28:20', 'Labadie, Hermiston and Bins', '60562 Gaylord Street Suite 597'),
(23, '2025-01-05 00:28:20', '2025-01-05 00:28:20', 'Watsica Inc', '8086 Eulalia Orchard\nPort Alis'),
(24, '2025-01-05 00:28:20', '2025-01-05 00:28:20', 'Mann and Sons', '68884 O\'Keefe Point\nIgnatiusmo'),
(25, '2025-01-05 00:28:20', '2025-01-05 00:28:20', 'Hermiston Ltd', '2903 Kilback Street\nPadbergfur'),
(26, '2025-01-05 00:28:20', '2025-01-05 00:28:20', 'Kiehn, Steuber and Herzog', '848 Unique Locks Apt. 760\nEast'),
(27, '2025-01-05 00:28:20', '2025-01-05 00:28:20', 'Nicolas and Sons', '834 Effertz Pine Suite 736\nPet'),
(28, '2025-01-05 00:28:20', '2025-01-05 00:28:20', 'Maggio Group', '9788 Koss Mount Apt. 425\nVinni'),
(29, '2025-01-05 00:28:20', '2025-01-05 00:28:20', 'Erdman Inc', '770 Ariel Ranch Apt. 969\nUpton'),
(30, '2025-01-05 00:28:20', '2025-01-05 00:28:20', 'Hermiston, Cremin and O\'Keefe', '2780 Jazmyne Stravenue\nElfried'),
(31, '2025-01-05 00:28:20', '2025-01-05 00:28:20', 'Schimmel Ltd', '225 Stephanie Greens\nSouth Alt'),
(32, '2025-01-05 00:28:20', '2025-01-05 00:28:20', 'Kunze, Dach and Miller', '9410 Gertrude View\nEast Mathew');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rateable_id` bigint(20) UNSIGNED NOT NULL,
  `rateable_type` varchar(255) NOT NULL,
  `rating` tinyint(3) UNSIGNED NOT NULL COMMENT 'Rating from 1 to 5',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `rateable_id`, `rateable_type`, `rating`, `created_at`, `updated_at`) VALUES
(8, 3, 94, 'App\\Models\\Book', 5, '2025-01-01 19:31:44', '2025-01-01 19:31:57'),
(9, 3, 8, 'App\\Models\\Author', 2, '2025-01-01 19:32:00', '2025-01-01 19:32:00'),
(10, 3, 12, 'App\\Models\\Publisher', 5, '2025-01-01 19:32:04', '2025-01-01 19:32:04'),
(11, 4, 12, 'App\\Models\\Publisher', 5, '2025-01-02 10:36:42', '2025-01-02 10:36:51'),
(12, 4, 2, 'App\\Models\\Author', 5, '2025-01-02 10:36:55', '2025-01-02 10:36:55'),
(13, 2, 90, 'App\\Models\\Book', 1, '2025-01-03 11:35:53', '2025-01-03 11:35:53'),
(14, 2, 91, 'App\\Models\\Book', 3, '2025-01-03 11:40:09', '2025-01-03 12:08:59'),
(15, 2, 4, 'App\\Models\\Author', 4, '2025-01-03 11:59:46', '2025-01-03 11:59:50'),
(16, 2, 6, 'App\\Models\\Publisher', 3, '2025-01-03 12:04:37', '2025-01-03 12:04:37'),
(17, 4, 104, 'App\\Models\\Book', 4, '2025-01-04 05:00:02', '2025-01-04 05:00:02'),
(18, 2, 112, 'App\\Models\\Book', 4, '2025-01-05 06:27:42', '2025-01-05 06:27:42'),
(19, 2, 18, 'App\\Models\\Author', 4, '2025-01-05 06:28:02', '2025-01-05 06:28:02'),
(20, 2, 20, 'App\\Models\\Publisher', 5, '2025-01-05 06:28:07', '2025-01-05 06:28:07'),
(21, 2, 13, 'App\\Models\\Publisher', 3, '2025-01-05 06:29:35', '2025-01-05 06:29:35'),
(22, 2, 9, 'App\\Models\\Author', 4, '2025-01-05 06:29:41', '2025-01-05 06:29:41'),
(23, 2, 103, 'App\\Models\\Book', 5, '2025-01-05 06:29:45', '2025-01-05 06:29:45');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `review` text NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `review`, `user_id`, `book_id`, `created_at`, `updated_at`) VALUES
(4, 'Loved this book', 2, 112, '2025-01-05 06:27:54', '2025-01-05 06:27:54'),
(5, 'nice book', 2, 103, '2025-01-05 06:29:29', '2025-01-05 06:29:29');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('wzxc6LkqS2LwTwtxVxKS3AWjGfcZlagaQuYYgVdF', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibmFyYTNEdDRDZUFxTXJzQkxMRThoVjFTQjF4VWpiQVVVdDMxMDI2TCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9sb2NhbGhvc3Q6OTAwMC9yZWdpc3RlciI7fX0=', 1736090927);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `role`, `created_at`, `updated_at`) VALUES
(2, 'sita', 'sita@gmail.com', NULL, '$2y$12$a15j06vFi5oNl0.OU5NVBeLrDP6nqxaxlwQ.Fg0b36TnHtnwKyD46', NULL, NULL, NULL, NULL, NULL, NULL, 'user', '2024-12-28 18:36:31', '2024-12-28 18:36:31'),
(3, 'hari', 'hari@gmail.com', NULL, '$2y$12$UIQ/KwAK/QKt9PuEatTByea2IB7AJPGoIueb0RkSNw9wNol2lu4R2', NULL, NULL, NULL, NULL, NULL, NULL, 'user', '2024-12-30 02:55:12', '2024-12-30 02:55:12'),
(4, 'Admin', 'admin@gmail.com', NULL, '$2y$12$RxuF8pN/R/eRt5yTV5kUmOXSfXu38Mglv2jcJjCt6LoCL7tyvt3wu', NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2024-12-30 09:23:51', '2024-12-30 09:23:51'),
(5, 'Russel Brekke', 'nbeatty@example.net', '2025-01-04 02:46:43', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, 'UyvG5XE13Q', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(6, 'Braden Schamberger', 'gaylord.nils@example.org', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, 'w23wqj4ph1', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(7, 'Glen Rempel', 'gtorphy@example.net', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, 'txdf6A8U9n', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(8, 'Heath Nitzsche', 'schulist.raleigh@example.org', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, 'uht8soZSYQ', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(9, 'Miss Sandra Gorczany V', 'noberbrunner@example.net', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, 'CyPrOsBqg4', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(10, 'Mrs. Rachelle Gutkowski DVM', 'orn.reynold@example.net', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, '1ZZ7idcL8f', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(11, 'Jacky Block', 'tyrese.leannon@example.net', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, '7EglzTUbXk', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(12, 'Mia Kling', 'amy86@example.net', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, 'Ffna0WoCDs', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(13, 'Dr. Frida Goodwin', 'icie23@example.org', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, 'GBqrZmTppl', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(14, 'Savion Schamberger', 'cremin.therese@example.org', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, 'GrXIkpCTJY', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(15, 'Garth Jenkins', 'feeney.daniella@example.com', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, 'sYcilgzIAD', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(16, 'Emelia Parisian PhD', 'born@example.com', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, 'CauAaVLAlC', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(17, 'Pearlie Rowe', 'claudie.will@example.org', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, 'rDk3lUUfLL', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(18, 'Jacky Marvin Jr.', 'braun.mittie@example.net', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, 'kWI0BF5zO8', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(19, 'Dr. Issac Orn II', 'glover.parker@example.net', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, '0m48VvchH8', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(20, 'Eveline Kihn Jr.', 'zboncak.arnaldo@example.com', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, 'BWWYaPbsZM', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(21, 'Jake Thiel', 'ymills@example.net', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, '9kxsj1lKxc', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(22, 'Valentine Beatty', 'stephon.boyer@example.net', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, 'NodofHBXwt', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(23, 'Dr. Hanna Fahey Sr.', 'yundt.chesley@example.org', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, '2C5lvthyQ6', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(24, 'Leopoldo Hauck', 'gmedhurst@example.net', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, 'ovQ2Nb5kAC', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(25, 'Brigitte Kling', 'coleman42@example.net', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, 'Dunl4cEOz0', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(26, 'Orrin Thiel', 'jaeden.beer@example.net', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, '7ZyGTgq9Pn', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(27, 'Lisette Bins', 'leonardo02@example.com', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, 'hzZ93GqWIy', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(28, 'Adolfo Stark', 'connelly.noel@example.org', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, '3B347MAz9s', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(29, 'Roberta Rau', 'loren97@example.org', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, 'sMCzeMrfyI', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(30, 'Cassidy Wyman', 'haylee05@example.com', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, 'jgu2zb3CyB', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(31, 'Maurine Hoppe', 'olson.aiyana@example.com', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, 'irQjJbDv1E', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(32, 'Mr. Camren Rohan', 'scottie23@example.net', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, 'ZazTLsRJPi', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(33, 'Zola Dietrich', 'sylvan37@example.org', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, 'p0L1bZn3Cb', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(34, 'Miss Leanne Gaylord', 'njenkins@example.net', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, 'jLeTTk6afG', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(35, 'Ms. Bonita Kassulke MD', 'clint.zboncak@example.net', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, 'BKkoAT5UPk', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(36, 'Garnet Jacobi Sr.', 'bernier.patsy@example.net', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, '7XAbFL2PEB', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(37, 'Eloy Barton Jr.', 'casper.vella@example.com', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, 'zmoutWHO4T', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(38, 'Jacky Larson', 'zcartwright@example.org', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, 'vmi4m2dPmS', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(39, 'Alda Langworth', 'madams@example.com', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, 'PPd9NzmF5Q', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(40, 'Margarete Kovacek', 'fharris@example.com', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, '6JFZ31cNqp', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(41, 'Dr. Erik Rath', 'kihn.madonna@example.net', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, 'YnLfSaRAS4', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(42, 'Mr. Kian Kling', 'balistreri.zackery@example.com', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, 'SXNmd3IIfP', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(43, 'Dr. Ova Kris', 'thora25@example.org', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, '8oXSWKjudO', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(44, 'Van Walsh', 'dprosacco@example.com', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, 'XkCsAMcBaR', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(45, 'Mr. Oran Friesen', 'franco.volkman@example.net', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, 'zoG1B4Lu1n', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(46, 'Brianne Schinner', 'spencer.manuela@example.org', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, 'NNOVXOvUeb', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(47, 'Chloe Muller II', 'jessika19@example.net', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, 'ZtPB1y7RsK', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(48, 'Prof. Clyde Johnson', 'kaela15@example.com', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, 'i2pRwKxXPM', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(49, 'Aniya Medhurst V', 'trantow.erika@example.net', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, 'P2j1R6rrK3', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(50, 'Mrs. Antonina Senger Jr.', 'prudence01@example.com', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, 'our3J6Oq5S', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(51, 'Eldora Krajcik', 'barry.daniel@example.com', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, 'eShzGIkUfR', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(52, 'Pearl Shields', 'ayla73@example.net', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, 'R6puWulwDq', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(53, 'Shayna Lockman', 'helen.ritchie@example.org', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, 'C5WYimrYXt', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44'),
(54, 'Aurelie Hodkiewicz', 'fhill@example.com', '2025-01-04 02:46:44', '$2y$12$KOF8ctDyGfbVcneHoGjhXuSvqMcExKUHY9cjE.xOuDH/Hj5POs2mS', NULL, NULL, NULL, '8Tsp4yy0pE', NULL, NULL, 'user', '2025-01-04 02:46:44', '2025-01-04 02:46:44');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `book_id`, `user_id`, `created_at`, `updated_at`) VALUES
(7, 114, 43, '2025-01-05 01:10:58', '2025-01-05 01:10:58'),
(8, 127, 48, '2025-01-05 01:10:58', '2025-01-05 01:10:58'),
(10, 125, 23, '2025-01-05 01:10:58', '2025-01-05 01:10:58'),
(11, 108, 12, '2025-01-05 01:10:58', '2025-01-05 01:10:58'),
(12, 94, 54, '2025-01-05 01:10:58', '2025-01-05 01:10:58'),
(13, 115, 27, '2025-01-05 01:10:58', '2025-01-05 01:10:58'),
(22, 111, 7, '2025-01-05 01:10:58', '2025-01-05 01:10:58'),
(23, 103, 18, '2025-01-05 01:10:58', '2025-01-05 01:10:58'),
(24, 112, 18, '2025-01-05 01:10:58', '2025-01-05 01:10:58'),
(25, 107, 6, '2025-01-05 01:10:58', '2025-01-05 01:10:58'),
(26, 103, 25, '2025-01-05 01:10:58', '2025-01-05 01:10:58'),
(28, 109, 31, '2025-01-05 01:10:58', '2025-01-05 01:10:58'),
(30, 105, 13, '2025-01-05 01:10:58', '2025-01-05 01:10:58'),
(31, 112, 21, '2025-01-05 01:10:58', '2025-01-05 01:10:58'),
(33, 125, 5, '2025-01-05 01:10:58', '2025-01-05 01:10:58'),
(35, 115, 10, '2025-01-05 01:10:58', '2025-01-05 01:10:58'),
(36, 104, 2, '2025-01-05 06:38:26', '2025-01-05 06:38:26'),
(37, 108, 2, '2025-01-05 06:38:33', '2025-01-05 06:38:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `books_isbn_unique` (`isbn`),
  ADD KEY `books_publisherid_foreign` (`publisherID`);

--
-- Indexes for table `book_authors`
--
ALTER TABLE `book_authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_genres`
--
ALTER TABLE `book_genres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_genres_book_id_foreign` (`book_id`),
  ADD KEY `book_genres_genre_id_foreign` (`genre_id`);

--
-- Indexes for table `borrows`
--
ALTER TABLE `borrows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `borrows_user_id_foreign` (`user_id`),
  ADD KEY `borrows_book_id_foreign` (`book_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profile_details`
--
ALTER TABLE `profile_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_user_id_foreign` (`user_id`),
  ADD KEY `ratings_rateable_id_rateable_type_index` (`rateable_id`,`rateable_type`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_book_id_foreign` (`book_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_book_id_foreign` (`book_id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `book_authors`
--
ALTER TABLE `book_authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `book_genres`
--
ALTER TABLE `book_genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `borrows`
--
ALTER TABLE `borrows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile_details`
--
ALTER TABLE `profile_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_publisherid_foreign` FOREIGN KEY (`publisherID`) REFERENCES `publishers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `book_genres`
--
ALTER TABLE `book_genres`
  ADD CONSTRAINT `book_genres_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `book_genres_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `borrows`
--
ALTER TABLE `borrows`
  ADD CONSTRAINT `borrows_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `borrows_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profile_details`
--
ALTER TABLE `profile_details`
  ADD CONSTRAINT `profile_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
