-- kategorie
INSERT INTO `category` (`id`, `name`) VALUES (1, 'Český jazyk');
INSERT INTO `category` (`id`, `name`) VALUES (2, 'Matematika');
INSERT INTO `category` (`id`, `name`) VALUES (3, 'Přírodověda');
INSERT INTO `category` (`id`, `name`) VALUES (4, 'Hudebka');

-- české jevy
INSERT INTO `event` (`id`, `name`, `code`, `category_id`) VALUES (1, 'Vyjmenovaná slova', 'listedWords', 1);
INSERT INTO `event` (`id`, `name`, `code`, `category_id`) VALUES (2, 'Shoda přísudku s podmětem', 'compliance', 1);
INSERT INTO `event` (`id`, `name`, `code`, `category_id`) VALUES (3, 'ě, je', 'prefixes', 1);

-- matematické jevy
INSERT INTO `event` (`id`, `name`, `code`, `category_id`) VALUES (4, 'Násobení a dělení', 'multiplicationAndDivision', 2);
INSERT INTO `event` (`id`, `name`, `code`, `category_id`) VALUES (5, 'Zlomky', 'fractions', 2);
INSERT INTO `event` (`id`, `name`, `code`, `category_id`) VALUES (6, 'Počítání do milionu', 'calculationsToMillion', 2);

-- Vyjmenovaná slova
INSERT INTO `word` (`id`, `text`) VALUES (1, 'Dobytek');
INSERT INTO `word_event` (`word_id`, `event_id`, `event_start`, `event_end`) VALUES (1, 1, 3, 3);
INSERT INTO `word` (`id`, `text`, `is_sentence`) VALUES (2, 'Přistáli jsme na Ruzyni', true);
INSERT INTO `word_event` (`word_id`, `event_id`, `event_start`, `event_end`) VALUES (2, 1, 3, 3);

-- ě, je
INSERT INTO `word` (`id`, `text`) VALUES (3, 'Objev');
INSERT INTO `word_event` (`word_id`, `event_id`, `event_start`, `event_end`) VALUES (3, 3, 2, 3);
