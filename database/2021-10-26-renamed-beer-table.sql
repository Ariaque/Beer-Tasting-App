RENAME TABLE  `beer` TO  `beer_style`
ALTER TABLE tasting CHANGE beer_id beer_style_id int(11)
