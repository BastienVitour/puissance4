# puissance4

story 2 : INSERT INTO `user` (`id`, `email`, `password`, `pseudo`, `date_inscription`) VALUES (NULL, 'bvitour2004@gmail.com', 'p4s5W0rD', 'Basvit', '2022-11-03 14:44:36.000000')


story 3 : UPDATE `user` SET `password` = 'user_1passwordedit' WHERE `user`.`id`
          UPDATE `user` SET `email` = 'user_1edit@gmail.com' WHERE `user`.`id` = 1 AND `user`.`password` = 'user_1password' = 'user_1password'
          
story 4 : SELECT * FROM user WHERE password="1234" AND email='sylvian.vidal@edu.esiee-it.fr';

story 5 : INSERT INTO game VALUES(NULL, "The Power Of Memory");

story 6 : SELECT `game`.`game_name`, `user`.pseudo, `difficulty`.`level`, `score` FROM `score` INNER JOIN `user` INNER JOIN `game` INNER JOIN `difficulty` ON score.id_user=user.id AND score.id_game=game.id AND score.id_difficulty=difficulty.id ORDER BY id_game, id_difficulty DESC, score DESC

story 7 : filtre par difficulté :SELECT `game`.`game_name`, `user`.pseudo, `difficulty`.`level`, `score` FROM `score` INNER JOIN `user` INNER JOIN `game` INNER JOIN `difficulty` ON score.id_user=user.id AND score.id_game=game.id AND score.id_difficulty=difficulty.id WHERE id_difficulty=1 ORDER BY id_game, id_difficulty DESC, score DESC

filtre par jeu : SELECT `game`.`game_name`, `user`.pseudo, `difficulty`.`level`, `score` FROM `score` INNER JOIN `user` INNER JOIN `game` INNER JOIN `difficulty` ON score.id_user=user.id AND score.id_game=game.id AND score.id_difficulty=difficulty.id WHERE id_game=1 ORDER BY id_game, id_difficulty DESC, score DESC

filtre par joueur : SELECT `game`.`game_name`, `user`.pseudo, `difficulty`.`level`, `score` FROM `score` INNER JOIN `user` INNER JOIN `game` INNER JOIN `difficulty` ON score.id_user=user.id AND score.id_game=game.id AND score.id_difficulty=difficulty.id WHERE id_user=4 ORDER BY id_game, id_difficulty DESC, score DESC


story 8 : UPDATE `score` SET `score` = 33 WHERE `score` . `id_user` =1 


story 9 : INSERT INTO `message` (`id`, `id_game`, `id_user`, `message`, `date_message`) VALUES (NULL, '1', '1', 'bonjour', '2022-11-03 16:33:10.000000');


story 10 : 
SELECT message.message, user.pseudo, message.date_message FROM message INNER JOIN user ON message.id_user= user.id WHERE (NOW()+0-date_message+0)<1000000;
PAS FINI
