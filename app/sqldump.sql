DROP TABLE IF EXISTS `cats`;
CREATE TABLE `cats` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO `config` (`id`, `key`, `value`)
VALUES
  (1,'SiteName','CodLax'),
  (2,'disqus','default'),
  (3,'Url','codlax.com'),
  (4,'adsense',''),
  (5,'snippetTitle','{SiteName} | {Snippet}'),
  (6,'title','Codlax'),
  (7,'homedesc','Codlax'),
  (8,'homeviewDesc','Welcome'),
  (9,'copyright','copy C'),
  (10,'inlineAds','0'),
  (11,'socialButtons','0'),
  (12,'snippetsNewestfirst','1');
DROP TABLE IF EXISTS `local`;
CREATE TABLE `local` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO `local` (`id`, `name`, `value`)
VALUES
  (1,'new_snippet','Create New Snippet'),
  (2,'search','Search'),
  (3,'welcome_back','Welcome Back '),
  (4,'save','Save'),
  (5,'title','Title'),
  (6,'description','Description'),
  (7,'public','Public'),
  (8,'private','Private'),
  (9,'select_language','Select Language'),
  (10,'type_here','Type Your Code Here'),
  (11,'keywords_here','Type Keyword(s) here'),
  (12,'comments','Comments'),
  (13,'print','Print Code'),
  (14,'view_text','View Text'),
  (15,'fork','Fork Snippet'),
  (16,'share','Share it!'),
  (17,'created_at','-created at'),
  (18,'login','Login'),
  (19,'register','Register'),
  (20,'close','Close'),
  (21,'registerSuccess','You have been successfully registered!'),
  (22,'incorrect_login','Incorrect Login or Password.'),
  (23,'email','Email'),
  (24,'password','Password'),
  (25,'re_pass','Re-Enter Password'),
  (26,'name','Name'),
  (27,'logout','Logout'),
  (28,'myaccount','My Account'),
  (29,'password_change','Please enter a new password only if you want to change your current password unless leave this blank'),
  (30,'no_email_change','You cannot change your email.'),
  (31,'my_snippets','My Snippets'),
  (32,'new_pass','New Password'),
  (33,'re_new_pass','Re-Enter New Password'),
  (34,'remember','Remember me'),
  (35,'forgetPass','Forget Password'),
  (36,'password_mail','Password will be mailed to you'),
  (37,'send','Send'),
  (38,'reminder_sent','A link to reset your password is sent to your email.'),
  (39,'invalid_user_email','Please enter a valid and registered email.'),
  (40,'pass_pass_confirm_mismatch','The password confirmation does not match.'),
  (41,'name_validation','The name may only contain letters.'),
  (42,'email_validation','The email must be a valid email address.'),
  (43,'pass_length','The password must be at least 6 characters.'),
  (44,'email_taken','The email has already been taken.'),
  (46,'name_length','The name must be at least 2 characters.'),
  (47,'snippets_by','Snippets By'),
  (48,'snippet_by','Snippet By'),
  (49,'successUpdated','Successfully Updated!!'),
  (50,'invalidToken','This password reset token is invalid. Please try again by going to forget password again.'),
  (51,'notfoundUser','We can\'t find a user with that e-mail address.'),
  (52,'pass_invalid_mis_match','Passwords must be at least six characters and match the confirmation.'),
  (53,'resetSuccess','Successfully Updated! You may login now.');
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO `migrations` (`migration`, `batch`)
VALUES
  ('2014_06_28_103711_snippets',1),
  ('2014_06_28_105044_cats',1),
  ('2014_06_28_161457_add_slug_to_snippets',1),
  ('2014_07_01_134423_add-views',1),
  ('2014_07_13_105021_userstables',1),
  ('2014_08_01_160930_lang',1),
  ('2014_08_02_081557_create_password_reminders_table',1),
  ('2014_08_06_111350_config_table',2);
DROP TABLE IF EXISTS `password_reminders`;
CREATE TABLE `password_reminders` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_reminders_email_index` (`email`),
  KEY `password_reminders_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
DROP TABLE IF EXISTS `snippets`;
CREATE TABLE `snippets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `authorId` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(20000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public` int(11) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `views` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `power` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO `users` (`id`, `email`, `name`, `password`, `remember_token`, `power`, `created_at`, `updated_at`)
VALUES
  (1,'admin@admin.com','Admin','$2y$10$WGWBNSMmXk8blO6QiVOvf.8aTgPxmlspCdbnE.hrdjw7YI0FUnSlG',NULL,1,'2014-08-10 13:44:28','2014-08-10 13:44:28');