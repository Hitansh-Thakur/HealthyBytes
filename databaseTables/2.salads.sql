-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2024 at 05:40 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthybytes`
--

-- --------------------------------------------------------

--
-- Table structure for table `salads`
--

CREATE TABLE `salads` (
  `id` int(255) NOT NULL,
  `salad_name` text NOT NULL,
  `salad_desc` text NOT NULL,
  `salad_price` double NOT NULL,
  `category` text NOT NULL,
  `ingredients` text NOT NULL,
  `salad_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salads`
--

INSERT INTO `salads` (`id`, `salad_name`, `salad_desc`, `salad_price`, `category`, `ingredients`, `salad_img`) VALUES
(2, 'Tex-Mex Salad ', 'Mexico in a bowl- assorted Salad with Pinto beans, guacamole, Salsa, seasoned Veggies, Corn and Sour cream. Topped with some smoked cheddar and crispy Nacho chips!', 200, 'protein-rich', 'Salsa, Beans, Veggies, Guacamole, Sour Cream, Nacho chips, Smoked Cheddar.', '2.jpg'),
(3, 'Avocado Salad', ' Made with an abundance of rich and creamy avocados, vibrant tomatoes, crisp cucumbers, bright red onions and a fresh herb dressing. A healthy side that\'s perfect for a summer lunch or dinner!', 250, 'fiber-rich', 'Avocados,Tomatoes, Onions,Cucumbers, Corns, Celery, Basils, Olive Oil, Lemon Juice', 'signup.jpg'),
(5, 'Lentil Salad', 'This healthy Lentil Salad is made with green lentils, crunchy cucumber, sweet red bell pepper, onion, herbs, and a simple lemon dressing.', 150, 'protein-rich', 'cooked lentils, chopped vegetables (e.g., carrots, celery, red onion), vinaigrette dressing\r\n', 'lentil.jpeg'),
(6, 'Grilled Chicken Salad', 'This classic salad features tender grilled chicken breast on a bed of mixed greens with cherry tomatoes, cucumber slices, and a creamy Caesar dressing. Croutons can be added for an extra textural crunch (optional).\r\n', 300, 'Protein-rich', 'Combine grilled chicken strips, mixed greens, tomatoes, cucumbers, and a light vinaigrette dressing', '28-2.jpg'),
(8, 'Quinoa Salad', 'This vegetarian salad is packed with protein and fiber from quinoa. It\'s typically combined with black beans, corn, and a variety of chopped vegetables like bell peppers and red onion for added flavor and texture. A light vinaigrette dressing completes the dish.', 400, 'Protein-rich', 'Combine cooked quinoa, black beans, corn, chopped vegetables, and a light vinaigrette dressing.', 'quinoa-salad.jpg'),
(10, 'Mediterranean Chopped Salad', 'This vibrant salad combines crisp romaine lettuce with a mix of chopped vegetables like cucumber, tomatoes, and red onion. Savory olives and crumbled feta cheese add salty notes, while a light olive oil and vinegar dressing ties it all together', 450, 'low-carb', 'romaine lettuce, chopped cucumber, tomatoes, red onion, olives, crumbled feta cheese, olive oil and vinegar dressing.\r\n', 'Blog-Size-Chopped-Mediterranean-Salad.jpg'),
(11, 'Avocado & Shrimp Salad', 'This refreshing salad features romaine lettuce with slices of creamy avocado and succulent cooked shrimp. Cherry tomatoes and chopped red onion add pops of color and flavor, while fresh cilantro and a zesty lime juice dressing bring a touch of brightness.', 350, 'low-carb', 'romaine lettuce, avocado slices, cooked shrimp, cherry tomatoes, chopped red onion, cilantro, lime juice dressing.', 'Shrimp-Avocaod-Salad.jpg'),
(12, 'Arugula & Spinach Salad with Berries', 'This salad features peppery arugula and spinach greens topped with sweet and juicy berries like strawberries and blueberries. Crunchy pecans provide a textural contrast, while creamy goat cheese adds a touch of richness. A balsamic vinaigrette dressing completes this delightful mix of flavors.', 400, 'low-carb', 'arugula, spinach, strawberries, blueberries, pecans, goat cheese, balsamic vinaigrette dressing.', 'Arugula-Berry-Salad.jpg'),
(13, 'Grilled Chicken Cobb Salad', 'This hearty salad features romaine lettuce with slices of grilled chicken breast, providing a good source of protein. Chopped avocado adds creaminess, while a hard-boiled egg and crumbled blue cheese offer contrasting textures and flavors. Cherry tomatoes and a balsamic vinaigrette dressing complete this classic combination.', 400, 'low-carb', 'romaine lettuce, grilled chicken breast slices, chopped avocado, hard-boiled egg, crumbled blue cheese, cherry tomatoes, balsamic vinaigrette dressing.', 'Grilled-chicken-Cobb-salad.jpg'),
(14, 'Cauliflower Steak Salad', 'This unique salad features a thick slice of cauliflower, roasted or grilled with spices, for a tender yet firm base. Mixed greens provide a bed of fresh leaves, while chopped bell peppers add vibrant color. Crumbled feta cheese offers a touch of saltiness, and a tahini dressing brings a nutty flavor and creamy texture.', 350, 'low-carb', 'sliced cauliflower steak, roasted or grilled with spices, mixed greens, chopped bell peppers, crumbled feta cheese, tahini dressing.\r\n', 'cauliflower steak salad.jpg'),
(15, 'Greek Salad', 'This classic salad combines the vibrant colors and flavors of chopped tomatoes, cucumbers, red onion, and kalamata olives, with a sprinkle of crumbled feta cheese. A simple olive oil and lemon juice dressing with oregano ties it all together.', 350, 'Mediterranean', 'Chopped tomatoes, cucumbers, red onion, kalamata olives, crumbled feta cheese.', 'greek salad.jpg'),
(16, 'Cucumber, Tomato, and Feta Salad', 'This refreshing salad features crisp cucumber slices, juicy chopped tomatoes, and crumbled feta cheese. Dressed with a light combination of olive oil, lemon juice, and mint, it\'s a simple yet flavorful option.', 300, 'Mediterranean', 'Sliced cucumbers, chopped tomatoes, crumbled feta cheese.', 'Cucumber-Tomato-Feta.jpg'),
(17, 'Mediterranean Chickpea Salad', 'This salad offers a delightful mix of textures and flavors with cooked quinoa, chopped cucumber, tomatoes, red onion, bell peppers, kalamata olives, and crumbled feta cheese. A simple olive oil, lemon juice, and oregano dressing completes this flavorful dish.', 400, 'Mediterranean', 'Garbanzo beans, chopped cucumber, chopped tomatoes, chopped red onion, chopped fresh parsley, crumbled feta cheese.', 'Healthy-Mediterranean-Chickpea.jpg'),
(18, 'Arugula Salad with Roasted Vegetables', 'This salad features peppery arugula greens topped with roasted red peppers and zucchini for a warm and contrasting flavor combination. Crumbled feta cheese adds a salty touch, while a dressing of olive oil, lemon juice, and balsamic vinegar ties it all together.', 350, 'Mediterranean', 'Arugula roasted red peppers, roasted zucchini, crumbled feta cheese.', 'Arugula-Salad.jpg'),
(19, 'Rainbow Power Salad', 'This salad is packed with colorful vegetables like carrots, bell peppers, cucumbers, and cherry tomatoes. It\'s a great way to get a variety of nutrients in every bite.', 400, 'Vegan', 'chopped romaine lettuce, shredded carrots, sliced bell peppers (different colors), sliced cucumbers, cherry tomatoes, crumbled vegan cheese (optional).', 'rainbow.jpg'),
(20, 'Berry Bliss Salad', 'This salad combines the sweetness of berries with the crunch of walnuts for a satisfying and refreshing combination.', 400, 'Vegan', 'mixed greens, sliced strawberries, blueberries, chopped walnuts, crumbled vegan cheese (optional).', 'berry-bliss-delight-healthy.jpg'),
(21, 'Tropical Twist Salad', 'This salad features tropical fruits like mango and pineapple, along with creamy avocado and toasted coconut flakes for a taste of the tropics.', 400, 'Vegan', 'mixed greens, chopped mango, pineapple chunks, sliced avocado, toasted coconut flakes, chopped cashews.', 'tropical twist.jpg'),
(22, 'Spicy Fiesta Salad', 'This salad combines black beans, corn, and a zesty cilantro lime dressing for a flavorful and satisfying option.', 350, 'Vegan', 'mixed greens, black beans, corn, chopped red onion, sliced jalapeno pepper (optional), chopped fresh cilantro, lime wedges.', 'spicy Fiesta.jpg'),
(23, 'Citrus Splash', 'This salad is a zesty blend of citrus fruits like grapefruit, orange, kiwi, and grapes. The combination of flavors is both refreshing and tangy.\r\n', 300, 'fruit-salad', 'Combine grapefruit segments, orange slices, kiwi chunks, and grapes for a burst of tangy sweetness.', 'citrus fruit salad.jpg'),
(24, 'Melon Medley', 'This salad is a cool and hydrating mix of cubed seedless watermelon, cantaloupe, and honeydew melon. The addition of a mint leaf garnish provides a touch of visual appeal and a subtle minty aroma.', 350, 'fruit-salad', 'Cube seedless watermelon, cantaloupe, and honeydew melon for a cool and hydrating salad. Add a mint leaf garnish for extra flavor.\r\n', 'melon-salad.jpg'),
(25, 'Fall Harvest', 'This salad is a celebration of autumn flavors, featuring diced apples, pears, grapes, and pomegranate seeds. The drizzle of maple syrup adds a touch of sweetness, while the chopped walnuts or pecans provide a satisfying crunch.', 400, 'fruit-salad', 'Dice apples, pears, grapes, and pomegranate seeds. Drizzle with maple syrup and sprinkle with chopped walnuts or pecans.', 'fall-fruit.jpg'),
(26, 'Tropical Paradise', 'This salad is a vibrant combination of diced tropical fruits like mango, pineapple, papaya, and banana. The lime juice adds a refreshing tang, and the toasted coconut flakes offer a delightful textural contrast.\r\n', 300, 'fruit-salad', 'Combine diced mango, pineapple, papaya, and banana with a squeeze of lime juice and a sprinkle of toasted coconut flakes.', 'tropical twist.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `salads`
--
ALTER TABLE `salads`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `salads`
--
ALTER TABLE `salads`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
