-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql300.epizy.com
-- Generation Time: May 26, 2023 at 11:56 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_34277902_doanwebofficial`
--

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

CREATE TABLE `Category` (
  `id_category` int(3) NOT NULL,
  `name_category` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` (`id_category`, `name_category`) VALUES
(1, 'T-SHIRTS'),
(2, 'SWEATERS'),
(3, 'BLOUSES'),
(4, 'PANTS'),
(5, 'SHORTS'),
(6, 'SKIRTS'),
(7, 'DRESSES'),
(8, 'JUMPSUITS');

-- --------------------------------------------------------

--
-- Table structure for table `Color`
--

CREATE TABLE `Color` (
  `id_color` int(5) NOT NULL,
  `name_color` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Color`
--

INSERT INTO `Color` (`id_color`, `name_color`) VALUES
(1, 'White'),
(2, 'Black'),
(3, 'Green'),
(4, 'Beige'),
(5, 'Blue'),
(6, 'Yellow'),
(7, 'Grey'),
(8, 'Brown');

-- --------------------------------------------------------

--
-- Table structure for table `Price`
--

CREATE TABLE `Price` (
  `id_product` int(5) NOT NULL,
  `datetime` datetime NOT NULL,
  `price` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Price`
--

INSERT INTO `Price` (`id_product`, `datetime`, `price`) VALUES
(1, '2023-05-15 08:00:00', 18.99),
(2, '2023-05-15 08:00:00', 18.99),
(3, '2023-05-15 08:00:00', 18.99),
(4, '2023-05-15 08:00:00', 19.99),
(5, '2023-05-15 08:00:00', 19.99),
(6, '2023-05-15 08:00:00', 19.99),
(7, '2023-05-15 08:00:00', 22.59),
(8, '2023-05-15 08:00:00', 22.99),
(9, '2023-05-15 08:00:00', 24.99),
(10, '2023-05-15 08:00:00', 22.99),
(11, '2023-05-15 08:00:00', 22.99),
(12, '2023-05-15 08:00:00', 22.99),
(13, '2023-05-15 08:00:00', 21.99),
(14, '2023-05-15 08:00:00', 21.99),
(15, '2023-05-15 08:00:00', 21.99),
(16, '2023-05-15 08:00:00', 20.99),
(17, '2023-05-15 08:00:00', 20.99),
(18, '2023-05-15 08:00:00', 20.99),
(19, '2023-05-15 08:00:00', 28.99),
(20, '2023-05-15 08:00:00', 28.99),
(21, '2023-05-15 08:00:00', 28.99),
(22, '2023-05-15 08:00:00', 28.99),
(23, '2023-05-15 08:00:00', 27.99),
(24, '2023-05-15 08:00:00', 27.99),
(25, '2023-05-15 08:00:00', 27.99),
(26, '2023-05-15 08:00:00', 26.99),
(27, '2023-05-15 08:00:00', 26.99),
(28, '2023-05-15 08:00:00', 24.99),
(29, '2023-05-15 08:00:00', 24.99),
(30, '2023-05-15 08:00:00', 24.99),
(31, '2023-05-15 08:00:00', 23.99),
(32, '2023-05-15 08:00:00', 23.99),
(33, '2023-05-15 08:00:00', 23.99),
(34, '2023-05-15 08:00:00', 24.99),
(35, '2023-05-15 08:00:00', 24.99),
(36, '2023-05-15 08:00:00', 24.99),
(37, '2023-05-15 08:00:00', 23.99),
(38, '2023-05-15 08:00:00', 23.99),
(39, '2023-05-15 08:00:00', 23.99),
(40, '2023-05-15 08:00:00', 28.99),
(41, '2023-05-15 08:00:00', 28.99),
(42, '2023-05-15 08:00:00', 28.99),
(43, '2023-05-15 08:00:00', 28.99),
(44, '2023-05-15 08:00:00', 30.99),
(45, '2023-05-15 08:00:00', 30.99),
(46, '2023-05-15 08:00:00', 28.99),
(47, '2023-05-15 08:00:00', 28.99),
(48, '2023-05-15 08:00:00', 28.99),
(49, '2023-05-15 08:00:00', 30.99),
(50, '2023-05-15 08:00:00', 30.99),
(51, '2023-05-15 08:00:00', 30.99);

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
  `id_product` int(5) NOT NULL,
  `name_product` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bestseller` bit(1) NOT NULL,
  `new` bit(1) NOT NULL,
  `thumbnail` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `id_category` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`id_product`, `name_product`, `bestseller`, `new`, `thumbnail`, `description`, `id_category`) VALUES
(1, 'Essentialist T-Shirt', b'0', b'1', 'images/Blue_Essentialist T-Shirt.webp', 'An oversized slouchy t-shirt with high side splits and a hi-low hem that\'ll become a star in your minimalist wardrobe. This gem is part of our Plant Life collection, Made from our super-soft, plant-based (beechwood trees!) modal.', 1),
(2, 'Necessi-T-Shirt', b'0', b'0', 'images/Black_Necessi-T-Shirt.webp', 'We took our best-selling Essentialist T-Shirt, and gave it a fresh neckline whilst keeping the super soft feel and universally flattering drape you love. Crafted from our sustainable plant-based modal, Plant Life, this shirt is a necessity for ultimate comfort.', 1),
(3, 'Made It T-Shirt', b'1', b'0', 'images\\White_Made It T-Shirt.webp', 'Crafted from our Technical Silk this italian fabric is stretchy, soft, and machine-washable. Plus, it has built-in UV protection. Tuck it in, or don\'t — it\'ll always look sharp.', 1),
(4, 'Everyday T-Shirt', b'0', b'0', 'images/Black_Everyday T-Shirt.webp', 'Elevate your everyday in our Everyday T-Shirt. This luxurious organic cotton t-shirt features monochrome embroidery, for a premium look and feel you won\'t want to take off.', 1),
(5, 'All Day Long Sleeve T-Shirt', b'0', b'0', 'images/Blue_All Day Long Sleeve T-Shirt.webp', 'We made an organic cotton t-shirt you\'ll want to wear All Day Long. This luxurious t-shirt features a subtle monochrome embroidery you can layer under a blazer, or wear casually with jeans.', 1),
(6, 'It\'s A Classic T-Shirt', b'0', b'0', 'images/Black_It\'s A Classic T-Shirt.webp', 'We\'re getting back to basics with this classic black t-shirt. Pairing a modern fit with impeccable tailoring, this breathable yet structured t-shirt is stretchy and oh, so soft. It\'s got all the makings of an instant classic and we know it\'ll be your new go-to black top.', 1),
(7, 'All Weather Cardigan', b'1', b'0', 'images/Green_All Weather Cardigan.webp', 'We\'re knit-picky about our knitwear, but this polished cardigan passes every test with it\'s cozy feel, functional pockets, and relaxed fit.', 2),
(8, 'No Sweat Sweater', b'0', b'1', 'images/Grey_No Sweat Sweater.webp', 'For when it\'s cold outside and warm inside, this elevated quarter zip sweater perfectly pairs polish and comfort with striking contrast stitching and sewn in thumbholes.', 2),
(9, 'Cozy Up Top', b'0', b'0', 'images/Green_Cozy Up Top.webp', 'You can wear the soft, ribbed lines of this blouse tied, draped, snapped and wrapped multiple ways, all with effortless elegance. Even better? This cotton rib is made in a certified mill that is committed to reducing the environmental impact of traditional cotton production. We can jive with that.', 2),
(10, 'Something Borrowed Shirt', b'1', b'0', 'images/White_Something Borrowed Shirt.webp', 'Our bestselling shirt, a classic button up reinvented as a boyfriend shirt with a universally flattering relaxed silhouette. Crafted from our Technical Silk this italian fabric is stretchy, soft, and machine-washable. Now you see why this button up blouse always sells out fast.', 3),
(11, 'That\'s A Wrap Top', b'0', b'1', 'images/Blue_That\'s A Wrap Top.webp', 'Versatile and universally flattering, our wrap blouse can be tied, draped, snapped and wrapped multiple ways.', 3),
(12, 'Snap To It Tank Top', b'0', b'0', 'images/Black_Snap To It Tank Top.webp', 'Our equivalent of unbuttoning the dress shirt and rolling down the sleeves to go from business formal to evening casual. The snappable straps make it just that easy to adjust your decolletage from day to night, while the top stays just as ultra-flattering and silky comfortable the whole time.', 3),
(13, 'Tip-Top Crop Top', b'0', b'0', 'images/Green_Tip-Top Crop Top.webp', 'Get your outfits into tip-top shape with this buttery soft crop top, made with luxuriously soft Plant Life Modal. The comfortable body-hugging silhouette pairs well with your favorite high-waisted pants for weekend picnics and weekday lounging.', 3),
(14, 'Up To Par Wrap Top', b'0', b'0', 'images/Black_Up To Par Wrap Top.webp', 'Is your wardrobe up to par? This wrap top features a plunging neckline, gathered drape at the back, and wrap closure to give it the heir of quiet luxury and effortless sophistication.', 3),
(15, 'Something Cool Button Down', b'0', b'0', 'images/Beige_Something Cool Button Down.webp', 'A twist on our bestselling Something Borrowed Shirt, this classic sheer button up features a new collar, but the same universally flattering relaxed silhouette.', 3),
(16, 'Clubhouse Wrap Top', b'0', b'0', 'images/Black_Clubhouse Wrap Top.webp', 'Lunch at the club? We\'ve got guest passes. This chic summer style features a halter neckline to show off your Michelle Obama arms, and a classic wrap top functionality that allows you to adjust the waist for a perfect fit.', 3),
(17, 'Something Tailored Shirt', b'0', b'0', 'images/White_Something Tailored Shirt.webp', 'The classic women\'s dress shirt, reimagined with a slim fit and flattering v-neck. Crafted from our Technical Silk, this fabric is luxe, stretchy, and like everything we make... machine-washable.', 3),
(18, 'Twist + Chill Wrap Top', b'0', b'0', 'images/Blue_Twist + Chill Wrap Top.webp', 'The Twist + Chill Wrap Top has a loose boxy fit that allows for it to be wrapped, tied, and snapped five different ways. This lightweight staple is made from our Cool Weave fabric and designed to hit just around the waistline.', 3),
(19, 'Turn It Up Pants', b'1', b'0', 'images/Beige_Turn It Up Pants.webp', 'A classic cigarette pant with technical tailoring and high-performance fabric. These tapered trousers promise you polish and comfort with front pleats and an elastic waistband.', 4),
(20, 'Ice Pop Dress Pants', b'0', b'0', 'images/Brown_Ice Pop Dress Pants.webp', 'These dress pants aren\'t just wrinkle-free + machine washable, they also feature a flattering high waist to immediately elevate every look.', 4),
(21, 'Easy Days Pants', b'0', b'0', 'images/Black_Easy Days Pants.webp', 'Ah, the easy days: park strolls, family-filled weekends, beach walks and all the care-free moments we cherish while wearing our favorite pair of lightweight, cropped pants. Just tuck or tie a top over the gathered waistline and keep these easy days coming.', 4),
(22, 'Straight Up Dress Pants', b'0', b'1', 'images/Beige_Straight Up Dress Pants.webp', 'We\'re giving it to you straight. Every woman needs a pair of work pants that are comfortable, easy care, and look great, and that doesn\'t always happen... until now.', 4),
(23, 'Making Waves Pants', b'0', b'0', 'images/Black_Making Waves Pants.webp', 'Well behaved women seldom make history. So, make some waves in these silky full-length pants with a stylish side slit, comfortable elastic waist, and functional pockets.', 4),
(24, 'Hail Yes Joggers', b'0', b'0', 'images/Black_Hail Yes Joggers.webp', 'Who knew that the ultimate day-to-night capsule wardrobe strategy involves glamming up your most comfortable pair of sweatpants. Our Hail Yes Joggers are stretchy, flattering, oh-so edgy chic and ready to be dressed up or down in an instant. Can we get a Hail Yes?', 4),
(25, 'Day to Night Pants', b'0', b'0', 'images/Black_Day to Night Pants.webp', 'This luxe leisure style features pockets, a mid-rise fit, and a silky feel for comfort that\'s versatile enough for an elevated, statement look. Made from luxe, ultra-sleek Super Satin, these pants dress up any outfit effortlessly.', 4),
(26, 'Like A Dream Joggers', b'0', b'0', 'images/White_Like A Dream Joggers.webp', 'Sometimes it\'s hard to say whether we\'re dreaming or whether we\'re sporting these joggers IRL. Sustainably made with our signature recycled scuba and an easy elasticated, drawcord waistband, these soft and comforting Like a Dream Pants can be worn loose or cuffed at the ankle.', 4),
(27, 'Dial It Down Pants', b'0', b'0', 'images/Green_Dial It Down Pants.webp', 'Hello from the other side - the side where pants are comfortable, chic, and versatile. Crafted from our super soft Tailored Stretch fabric, the Dial it Down Pants are the high-rise version of our Turn It Around Pants - wear them to work, to happy hour, to run errands in between.', 4),
(28, 'Turn It Up Shorts', b'0', b'0', 'images\\Yellow_Turn It Up Shorts.webp', 'Introducing your favorite pants but, shorter. The Turn it Up Shorts are here. Comfy, stretchy, durable, and tailored, these shorts can go from brunch to bonfires, with a matte finish for professional polish + pockets, because, of course.', 5),
(29, 'Tie Shorts', b'1', b'0', 'images/Black_Tie Shorts.jpg', 'Showcase charming summer style with our beautiful Tie Shorts, featuring a figure-flattering high-rise and breezy A-line silhouette. Style yours with chic sandals to capture effortless vacation style.', 5),
(30, 'Ease In Paperbag Shorts', b'0', b'1', 'images/White_Ease In Paperbag Shorts.webp', 'Living in shorts has never been so easy, especially in these super flattering paperbag shorts. They\'re the perfect length for bike rides and BBQs. Can\'t take the heat? Just slip into these.', 5),
(31, 'Easy Days Shorts', b'0', b'0', 'images/Black_Easy Days Shorts.webp', 'Show off your feminine charm with our beautiful Easy Days Shorts, featuring a chic high-rise and breezy A-line silhouette. Pair with a collared shirt for effortless elegance.', 5),
(32, 'Basic One Day Shorts', b'0', b'0', 'images/Black_Basic One Day Shorts.jpg', 'Casual and chic, our Evie shorts are an essential piece for the modern minimalist.', 5),
(33, 'Lighter Days Shorts', b'0', b'0', 'images/Grey_Lighter Days Shorts.webp', 'Your favorite silk shorts, but technical. These lightweight shorts are made with easy-care and silky soft fabric and crafted with a skort-like silhouette. Finished with a rope belt that channels nautical vibes, perfect for incorporating into your summer rotation.', 5),
(34, 'Keep It Cool Skort', b'0', b'1', 'images/Beige_Keep It Cool Skort.webp', 'We took cooling, silky women\'s dress shorts and added a versatile wrap skirt with elegant draping for your new 2 in 1 summer travel essential. Wear it 3+ ways, for every adventure and drinks after.', 6),
(35, 'Swirl Wrap Skirt', b'0', b'0', 'images/Blue_Swirl Wrap Skirt.webp', 'Easier + more elevated than leggings, this wrap skirt hits at a midi-length that  work-approved, and cool enough to make you feel like you are on vacation.', 6),
(36, 'Destiny Midi', b'0', b'0', 'images/Black_Destiny Midi Skirt.jpeg', 'Designed with contrasting panel work, creating a subtle flattering pattern at the hips. Made from a chunky chestnut brown cord, easily wearable with your favorite knit, or smartened up with a simple shirt.', 6),
(37, 'Riviera Midi Skirt', b'0', b'0', 'images/Beige_Riviera Midi Skirt.webp', 'This timeless skirt can be styled with our new \'Murphie Crop\' and white sneakers to black tops and heels for an evening look! Don\'t forget to pair with your fave gold accessories and a matching bag! ', 6),
(38, 'Pocket Mini Skirt', b'0', b'0', 'images/Black_Pocket Mini Skirt.webp', 'Wool mix fabric. Elastic. Mini design. Straight design. High waist. Loops. Two side pockets. Patch pockets on the back. Inner lining. Zip and one-button fastening. Party and events collection.', 6),
(39, 'Janine Midi Skirt', b'0', b'0', 'images/Beige_Janine Midi Skirt.jpeg', 'Effortlessly chic with a touch of fresh elegance, our Janine Midi Skirt is cut from a beautiful hand-drawn print created exclusively in-house. Team yours with chic summer tops for elevated warm weather style.', 6),
(40, 'Wind Down Wrap', b'0', b'0', 'images/White_Wind Down Wrap Dress.webp', 'Wind Down (and all around) in our favorite wrap style dress. We paired technical fabric with a tailored fit and statement neckline to ensure polish and comfort. As effortless as it is versatile, this dress was designed to be worn different ways, so outfit repeat all week and no one will ever know.', 7),
(41, 'Anywhere Shirt Dress', b'1', b'0', 'images/Blue_Anywhere Shirt Dress.webp', 'Anywhere, anytime. This silky, short-sleeve dress is the sister style to our Something Borrowed Dress. With functional pockets and a high-low hem, this dress is ready to go whenever (and wherever) you are.', 7),
(42, 'The Date Dress', b'0', b'1', 'images/Black_The Date Dress.webp', 'Put it in your calendar. This sleeveless midi dress makes everyday an event with its innovative adjustable neckline. Zip it up for work, or keep it open for formal occasions or strolls around the park where you just want strangers to think, \'Who is she?\'', 7),
(43, 'Back To Front Shirt Dress', b'0', b'0', 'images/Blue_Back To Front Shirt Dress.webp', 'The most versatile piece you\'ll ever own. A 5-in-1 stretch woven long dress shirt that can be worn back-to-front, front-to-back, open, closed, cinched at the waist or loose, with a separate belt.', 7),
(44, 'Super Cool Wrap Dress', b'1', b'0', 'images/Blue_Super Cool Wrap Dress.webp', 'Perfect for hot weather, this wrap dress is not only adjustable at the waist to flatter a variety of figures, but it\'s also made from cooling fabric for comfort all summer long.', 7),
(45, 'Free Float Linen Dress', b'0', b'0', 'images/Brown_Free Float Linen Dress.webp', 'We\'re free, free floating—in this loose fitting, A-line silhouette dress made with our signature Stretch Linen fabric. Think ultimate breathability, softness, and stretch—plus 3 handy pockets so you can float along hands-free.', 7),
(46, 'Destination Jumpsuit', b'1', b'0', 'images/Black_Destination Jumpsuit.webp', 'Adventure awaits in the Destination Jumpsuit. With a wrap top that can become a tie-front crop top, this chic yet comfortable jumpsuit is perfect for all day wear, and easily dressed up for a stunning impromptu formal look. Wherever your destination, this jumpsuit is all you need.', 8),
(47, 'Naomi Linen Jumpsuit', b'0', b'0', 'images/Beige_Naomi Linen Jumpsuit.webp', 'In case of getting dressed. The Naomi is a sleeveless, full-length jumpsuit with a tie waist and straight legs. It has a crew neckline and fitted, high-rise waist.', 8),
(48, 'Alva Jumpsuit', b'0', b'0', 'images/Brown_Alva Jumpsuit.webp', 'If you can\'t get out of those plans. The Alva is a sleeveless, cropped jumpsuit with adjustable straps. It features a high-rise waist with a relaxed fit.', 8),
(49, 'Halter Palazzo Jumpsuit', b'0', b'0', 'images/Black_Halter Palazzo Jumpsuit.webp', 'Black Elegant Collar Sleeveless Polyester Plain Culottes Embellished Non-Stretch Spring/Summer Women Jumpsuits & Bodysuits', 8),
(50, 'Occasion Jumpsuit', b'0', b'1', 'images/White_Occasion Jumpsuit.jpg', 'Occasion Jumpsuit is a knit jumpsuit with a plunge neckline and flare leg. It features an open back and a tie closure at the back neck. It can be worn day-to-night if you ask us.', 8),
(51, 'Fantastic Jumpsuit', b'0', b'0', 'images/Black_Fantastic Jumpsuit.jpg', 'A one and done kind of thing. Fantastic Jumpsuit is an ankle-length jumpsuit with a straight neckline, adjustable spaghetti straps, and wide leg. It\'s fitted in the bodice with back smocking and a center back zipper for a little bit of stretch.', 8);

-- --------------------------------------------------------

--
-- Table structure for table `ProductDetail`
--

CREATE TABLE `ProductDetail` (
  `id_product` int(5) NOT NULL,
  `id_color` int(5) NOT NULL,
  `picture` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ProductDetail`
--

INSERT INTO `ProductDetail` (`id_product`, `id_color`, `picture`) VALUES
(1, 4, 'images/Beige_Essentialist T-Shirt.webp'),
(1, 5, 'images/Blue_Essentialist T-Shirt.webp'),
(2, 1, 'images/White_Necessi-T-Shirt.webp'),
(2, 2, 'images/Black_Necessi-T-Shirt.webp'),
(2, 3, 'images/Green_Necessi-T-Shirt.webp'),
(3, 1, 'images/White_Made It T-Shirt.webp'),
(3, 2, 'images/Black_Made It T-Shirt.webp'),
(3, 6, 'images/Yellow_Made It T-Shirt.webp'),
(4, 1, 'images/White_Everyday T-Shirt.webp'),
(4, 2, 'images/Black_Everyday T-Shirt.webp'),
(5, 1, 'images/White_All Day Long Sleeve T-Shirt.webp'),
(5, 2, 'images/Black_All Day Long Sleeve T-Shirt.webp'),
(5, 5, 'images/Blue_All Day Long Sleeve T-Shirt.webp'),
(6, 2, 'images/Black_It\'s A Classic T-Shirt.webp'),
(7, 3, 'images/Green_All Weather Cardigan.webp'),
(7, 2, 'images/Black_All Weather Cardigan.webp'),
(8, 2, 'images/Black_No Sweat Sweater.webp'),
(8, 3, 'images/Green_No Sweat Sweater.webp'),
(8, 7, 'images/Grey_No Sweat Sweater.webp'),
(9, 3, 'images/Green_Cozy Up Top.webp'),
(10, 1, 'images/White_Something Borrowed Shirt.webp'),
(10, 6, 'images/Yellow_Something Borrowed Shirt.webp'),
(10, 2, 'images/Black_Something Borrowed Shirt.webp'),
(11, 1, 'images/White_That\'s A Wrap Top.webp'),
(11, 5, 'images/Blue_That\'s A Wrap Top.webp'),
(11, 3, 'images/Green_That\'s A Wrap Top.webp'),
(12, 1, 'images/White_Snap To It Tank Top.webp'),
(12, 2, 'images/Black_Snap To It Tank Top.webp'),
(12, 6, 'images/Yellow_Snap To It Tank Top.webp'),
(13, 1, 'images/White_Tip-Top Crop Top.webp'),
(13, 3, 'images/Green_Tip-Top Crop Top.webp'),
(14, 2, 'images/Black_Up To Par Wrap Top.webp'),
(15, 4, 'images/Beige_Something Cool Button Down.webp'),
(15, 1, 'images/White_Something Cool Button Down.webp'),
(15, 5, 'images/Blue_Something Cool Button Down.webp'),
(16, 2, 'images/Black_Clubhouse Wrap Top.webp'),
(17, 2, 'images/Black_Something Tailored Shirt.webp'),
(17, 1, 'images/White_Something Tailored Shirt.webp'),
(18, 1, 'images/White_Twist + Chill Wrap Top.webp'),
(18, 5, 'images/Blue_Twist + Chill Wrap Top.webp'),
(18, 8, 'images/Brown_Twist + Chill Wrap Top.webp'),
(19, 2, 'images/Black_Turn It Up Pants.webp'),
(19, 4, 'images/Beige_Turn It Up Pants.webp'),
(20, 2, 'images/Black_Ice Pop Dress Pants.webp'),
(20, 4, 'images/Beige_Ice Pop Dress Pants.webp'),
(20, 8, 'images/Brown_Ice Pop Dress Pants.webp'),
(21, 2, 'images/Black_Easy Days Pants.webp'),
(21, 1, 'images/White_Easy Days Pants.webp'),
(22, 4, 'images/Beige_Straight Up Dress Pants.webp'),
(22, 8, 'images/Brown_Straight Up Dress Pants.webp'),
(23, 2, 'images/Black_Making Waves Pants.webp'),
(24, 2, 'images/Black_Hail Yes Joggers.webp'),
(25, 2, 'images/Black_Day to Night Pants.webp'),
(26, 1, 'images/White_Like A Dream Joggers.webp'),
(26, 8, 'images/Brown_Like A Dream Joggers.webp'),
(27, 3, 'images/Green_Dial It Down Pants.webp'),
(28, 6, 'images/Yellow_Turn It Up Shorts.webp'),
(28, 2, 'images/Black_Turn It Up Shorts.webp'),
(29, 2, 'images/Black_Tie Shorts.jpg'),
(30, 2, 'images/Black_Ease In Paperbag Shorts.webp'),
(30, 1, 'images/White_Ease In Paperbag Shorts.webp'),
(31, 2, 'images/Black_Easy Days Shorts.webp'),
(31, 7, 'images/Grey_Easy Days Shorts.webp'),
(32, 2, 'images/Black_Basic One Day Shorts.jpg'),
(33, 7, 'images/Grey_Lighter Days Shorts.webp'),
(34, 4, 'images/Beige_Keep It Cool Skort.webp'),
(34, 5, 'images/Blue_Keep It Cool Skort.webp'),
(35, 4, 'images/Beige_Swirl Wrap Skirt.webp'),
(35, 5, 'images/Blue_Swirl Wrap Skirt.webp'),
(36, 2, 'images/Black_Destiny Midi Skirt.jpeg'),
(37, 4, 'images/Beige_Riviera Midi Skirt.webp'),
(38, 2, 'images/Black_Pocket Mini Skirt.webp'),
(39, 4, 'images/Beige_Janine Midi Skirt.jpeg'),
(40, 1, 'images/White_Wind Down Wrap Dress.webp'),
(40, 2, 'images/Black_Wind Down Wrap Dress.webp'),
(41, 5, 'images/Blue_Anywhere Shirt Dress.webp'),
(42, 2, 'images/Black_The Date Dress.webp'),
(43, 2, 'images/Black_Back To Front Shirt Dress.webp'),
(43, 5, 'images/Blue_Back To Front Shirt Dress.webp'),
(44, 5, 'images/Blue_Super Cool Wrap Dress.webp'),
(45, 8, 'images/Brown_Free Float Linen Dress.webp'),
(46, 2, 'images/Black_Destination Jumpsuit.webp'),
(47, 4, 'images/Beige_Naomi Linen Jumpsuit.webp'),
(48, 2, 'images/Black_Alva Jumpsuit.webp'),
(48, 8, 'images/Brown_Alva Jumpsuit.webp'),
(49, 2, 'images/Black_Halter Palazzo Jumpsuit.webp'),
(50, 1, 'images/White_Occasion Jumpsuit.jpg'),
(51, 2, 'images/Black_Fantastic Jumpsuit.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `Size`
--

CREATE TABLE `Size` (
  `id_size` int(2) NOT NULL,
  `name_size` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Size`
--

INSERT INTO `Size` (`id_size`, `name_size`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `Color`
--
ALTER TABLE `Color`
  ADD PRIMARY KEY (`id_color`);

--
-- Indexes for table `Price`
--
ALTER TABLE `Price`
  ADD PRIMARY KEY (`id_product`,`datetime`);

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `ProductDetail`
--
ALTER TABLE `ProductDetail`
  ADD PRIMARY KEY (`id_product`,`id_color`),
  ADD KEY `id_color` (`id_color`);

--
-- Indexes for table `Size`
--
ALTER TABLE `Size`
  ADD PRIMARY KEY (`id_size`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
