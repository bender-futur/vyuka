INSERT INTO `category` (`id`, `name`) VALUES (1, 'Český jazyk');
INSERT INTO `category` (`id`, `name`) VALUES (2, 'Matematika');
INSERT INTO `category` (`id`, `name`) VALUES (3, 'Přírodověda');
INSERT INTO `category` (`id`, `name`) VALUES (4, 'Hudebka');

INSERT INTO `event` (`id`, `name`, `category_id`) VALUES (1, 'Vyjmenovaná slova', 1);
INSERT INTO `event` (`id`, `name`, `category_id`) VALUES (2, 'Shoda přísudku s podmětem', 1);
INSERT INTO `event` (`id`, `name`, `category_id`) VALUES (3, 'ě, je', 1);
INSERT INTO `event` (`id`, `name`, `category_id`) VALUES (4, 'Násobení a dělení', 2);
INSERT INTO `event` (`id`, `name`, `category_id`) VALUES (5, 'Zlomky', 2);
INSERT INTO `event` (`id`, `name`, `category_id`) VALUES (6, 'Počítání do milionu', 2);

INSERT INTO `word` (`id`, `text`) VALUES (1, 'Dobytek');
INSERT INTO `word_event` (`word_id`, `event_id`, `event_start`, `event_end`) VALUES (1, 1, 3, 3);

INSERT INTO `sentence` (`id`, `text`) VALUES (1, 'Přistáli jsme na Ruzyni');
INSERT INTO `sentence_event` (`sentence_id`, `event_id`, `event_start`, `event_end`) VALUES (1, 1, 20, 20);

INSERT INTO `word` (`id`, `text`) VALUES (2, 'Objev');
INSERT INTO `word_event` (`word_id`, `event_id`, `event_start`, `event_end`) VALUES (2, 3, 2, 3);
