CREATE TABLE IF NOT EXISTS `category` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `name` varchar(255) NOT NULL,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `word` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `text` varchar(255) NOT NULL,
   `is_sentence` BOOLEAN NOT NULL DEFAULT false,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `event` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `name` varchar(255) NOT NULL,
   `code` varchar(255) NOT NULL,
   `category_id` int(11) NOT NULL,
   PRIMARY KEY (`id`),
   FOREIGN KEY (`category_id`)
      REFERENCES `category`(`id`)
      ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `word_event` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `word_id` int(11) NOT NULL,
   `event_id` int(11) NOT NULL,
   `event_start` int(11),
   `event_end` int(11),
   PRIMARY KEY (`id`),
   FOREIGN KEY (`word_id`)
      REFERENCES `word`(`id`)
      ON DELETE CASCADE ON UPDATE CASCADE,
   FOREIGN KEY (`event_id`)
      REFERENCES `event`(`id`)
      ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
