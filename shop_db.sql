START TRANSACTION;
CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
);
CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
);
CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
);
CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(20) NOT NULL,
  `details` varchar(500) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
);
INSERT INTO `products` (`id`, `name`, `category`, `details`, `price`, `image`) VALUES
(24, 'Fresh Oranges', 'fruits', 'Freshly picked Oranges from our well-known farmers from their immense harvest.', 3, 'orange.png'),
(26, 'Fresh Red Apples', 'fruits', 'Freshly picked Red Apples from our well-known farmers from their immense harvest.', 2, 'apple.png'),
(27, 'Fresh Bananas', 'fruits', 'Freshly picked Bananas from our well-known farmers from their immense harvest.', 2, 'banana.jpg'),
(28, 'Fresh Watermelon', 'fruits', 'Freshly picked Watery Watermelons from our well-known farmers from their immense harvest.', 2, 'watermelon.png'),
(29, 'Fresh Green Apples', 'fruits', 'Freshly picked eye-catching Green Apples from our well-known farmers from their immense harvest.', 3, 'gapple.jpg'),
(30, 'Fresh Strawberries', 'fruits', 'Freshly picked Strawberries from our well-known farmers from their immense harvest.', 1, 'strawberry.jpg'),
(31, 'Fresh Blueberries', 'fruits', 'Freshly picked Blueberries from our well-known farmers from their immense harvest.', 1, 'blueberry.jpg'),
(32, 'Fresh Figs', 'fruits', 'Freshly picked Figs from our well-known farmers from their immense harvest.', 1, 'figs.jpg'),
(33, 'Fresh Avacados', 'fruits', 'Freshly picked Avocados from our well-known farmers from their immense harvest.', 2, 'avacado.png'),
(34, 'Fresh Green Lemons', 'fruits', 'Freshly picked Green Lemons from our well-known farmers from their immense harvest.', 2, 'lemon.png'),
(35, 'Fresh Kiwis', 'fruits', 'Freshly picked Kiwis from our well-known farmers from their immense harvest.', 1, 'kiwi.jfif'),
(36, 'Fresh Cabbages', 'vegetables', 'Freshly picked Cabbages from our well-known farmers from their immense harvest.', 2, 'cabbage.png'),
(37, 'Fresh Potatoes', 'vegetables', 'Freshly picked vegetables from our well-known farmers from their immense harvest.', 2, 'potato.png'),
(38, 'Fresh Onions', 'vegetables', 'Freshly picked Onions from our well-known farmers from their immense harvest.', 1, 'onion.png'),
(39, 'Fresh Garlic', 'vegetables', 'Freshly picked garlic from our well-known farmers from their immense harvest.', 2, 'garlic.jpg'),
(40, 'Fresh Brinjals', 'vegetables', 'Freshly picked Brinjals from our well-known farmers from their immense harvest.', 2, 'brinjal.jpg'),
(41, 'Fresh Pumpkins', 'vegetables', 'Freshly picked Pumpkins from our well-known farmers from their immense harvest.', 2, 'pumpkin.jpg'),
(42, 'Fresh Cucumbers ', 'vegetables', 'Freshly picked Cucumbers from our well-known farmers from their immense harvest.', 3, 'cucumber.jpg'),
(43, 'Fresh Chilies', 'vegetables', 'Freshly picked Chilies from our well-known farmers from their immense harvest.', 1, 'chilli.jpg'),
(44, 'Fresh Carrots', 'vegetables', 'Freshly picked Carrots from our well-known farmers from their immense harvest.', 2, 'carrot.jpg'),
(45, 'Fresh Cod', 'meat', 'Freshly bought Cods from our well-known fisheries from their immense collection.', 3, 'semonfish.png'),
(46, 'Eggs', 'meat', 'Newest hacked eggs from pure and recommended farms.', 2, 'eggs.jfif'),
(47, 'Fresh Tuna', 'meat', 'Freshly bought Tuna from our well-known fisheries from their immense collection.', 2, 'salmonfish.png'),
(48, 'Fresh Shrimps', 'meat', 'Freshly bought Shrimps from our well-known fisheries from their immense collection.', 2, 'shrimps.jfif'),
(49, 'Chicken Sausages', 'meat', 'Non-Chemical Sausages with pure ingredients blended. ', 3, 'sausage.jfif'),
(50, 'Fresh CuttleFish', 'meat', 'Freshly bought Cuttle fishes from our well-known fisheries from their immense collection.', 3, 'cuttlefish.jfif'),
(51, 'Fresh Boneless Chicken', 'meat', 'Freshly bought Boneless Chicken from our well-known farms from their best quality and hygiene.', 3, 'chicken.jfif'),
(54, 'Chocolate Nutella', 'snacks', 'Best Snacks in town! Easy access just visit us and grab them and make your taste buds feel special!', 3, 'nutella.jfif'),
(55, 'Ferrero Rocher 375g', 'snacks', 'Best Snacks in town! Easy access just visit us and grab them and make your taste buds feel special!', 2, 'ferrero.jfif'),
(56, 'KitKat Chunky Chocolates', 'snacks', 'Best Snacks in town! Easy access just visit us and grab them and make your taste buds feel special!', 2, 'kitkat.jfif'),
(57, 'Pringles', 'snacks', 'Best Snacks in town! Easy access just visit us and grab them and make your taste buds feel special!', 1, 'prinkles.jfif'),
(58, 'Kinder Bueno Mini Pack', 'snacks', 'Best Snacks in town! Easy access just visit us and grab them and make your taste buds feel special!', 2, 'kinder.jfif'),
(59, 'M & Ms Chocolates', 'snacks', 'Best Snacks in town! Easy access just visit us and grab them and make your taste buds feel special!', 2, 'm&m.jfif'),
(60, 'Chocolate Toblerones', 'snacks', 'Best Snacks in town! Easy access just visit us and grab them and make your taste buds feel special!', 2, 'toblerone.jfif'),
(61, 'Kinder Bueno Cocolates', 'snacks', 'Best Snacks in town! Easy access just visit us and grab them and make your taste buds feel special!', 3, 'kinderb.jpg');
CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
);
CREATE TABLE `wishlist` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
);

ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
ALTER TABLE `wishlist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;