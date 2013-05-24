	
USE `labtab`;

/* Alter table in target */
ALTER TABLE `1m_donor_contact_info` 
	DROP KEY `donor_contact_info_id_2`, 
	DROP KEY `id`, 
	DROP KEY `id_2`, 
	DROP KEY `ssn_2`;

/* Alter table in target */
ALTER TABLE `1m_donor_specimen` 
	DROP KEY `id`, 
	DROP KEY `id_2`;

/* Alter table in target */
ALTER TABLE `donor_contact_info` 
	ADD COLUMN `from_org` varchar(200)  COLLATE utf8_general_ci NOT NULL after `phone`, 
	CHANGE `insertion_method` `insertion_method` tinyint(4)   NOT NULL COMMENT '0:\'labtab\' -- 1:\'website\'' after `from_org`, 
	DROP COLUMN `from`, 
	DROP KEY `ssn`;

/* Alter table in target */
ALTER TABLE `labtab_user` 
	CHANGE `user_type` `user_type` tinyint(4)   NOT NULL COMMENT '0:\'internal\' -- 1:\'external\'' after `org_name`;

/* Alter table in target */
ALTER TABLE `poc_positives` 
	CHANGE `number` `number` varchar(50)  COLLATE latin1_swedish_ci NOT NULL COMMENT '-1:\'Negative\' -- 1:\'Positive\' -- 2:\'Confirmed Positive\' -- 0:\'False Positive\'' first, 
	CHANGE `amp` `amp` tinyint(1)   NOT NULL after `number`, 
	CHANGE `bar` `bar` tinyint(1)   NOT NULL after `amp`, 
	CHANGE `bup` `bup` tinyint(1)   NOT NULL after `bar`, 
	CHANGE `bzd_bzo` `bzd_bzo` tinyint(1)   NOT NULL after `bup`, 
	CHANGE `coc` `coc` tinyint(1)   NOT NULL after `bzd_bzo`, 
	CHANGE `mdma_xtc` `mdma_xtc` tinyint(1)   NOT NULL after `coc`, 
	CHANGE `met` `met` tinyint(1)   NOT NULL after `mdma_xtc`, 
	CHANGE `mtd_mad` `mtd_mad` tinyint(1)   NOT NULL after `met`, 
	CHANGE `opi_mop_mor` `opi_mop_mor` tinyint(1)   NOT NULL after `mtd_mad`, 
	CHANGE `oxy` `oxy` tinyint(1)   NOT NULL after `opi_mop_mor`, 
	CHANGE `pcp` `pcp` tinyint(1)   NOT NULL after `oxy`, 
	CHANGE `ppx` `ppx` tinyint(1)   NOT NULL after `pcp`, 
	CHANGE `tca` `tca` tinyint(1)   NOT NULL after `ppx`, 
	CHANGE `thc` `thc` tinyint(1)   NOT NULL after `tca`, 
	CHANGE `bsalts` `bsalts` tinyint(1)   NOT NULL after `thc`, 
	CHANGE `etg` `etg` tinyint(1)   NOT NULL after `bsalts`, 
	CHANGE `k2` `k2` tinyint(1)   NOT NULL after `etg`;

/* Alter table in target */
ALTER TABLE `portal_user` 
	CHANGE `user_type` `user_type` tinyint(1)   NOT NULL COMMENT '0:\'internal\' -- 1:\'external\'' after `pw`, 
	DROP KEY `email`, 
	DROP KEY `email_2`;

/* Alter table in target */
ALTER TABLE `specimen` 
	CHANGE `ins_back` `ins_back` varchar(200)  COLLATE utf8_general_ci NOT NULL after `date`, 
	CHANGE `ins_front` `ins_front` varchar(200)  COLLATE utf8_general_ci NOT NULL after `ins_back`, 
	CHANGE `ins2_back` `ins2_back` varchar(200)  COLLATE utf8_general_ci NOT NULL after `ins_front`, 
	CHANGE `ins2_front` `ins2_front` varchar(200)  COLLATE utf8_general_ci NOT NULL after `ins2_back`, 
	DROP KEY `number`;

/* Alter table in target */
ALTER TABLE `specimen_first_view` 
	CHANGE `seal_condition` `seal_condition` tinyint(1)   NULL COMMENT '1:\'Not Applicable\' -- 2:\'seal_bad\' -- 3:\'seal_good\' -- 4:\'org_contacted\'' after `date_time_seal_response`;

/* Alter table in target */
ALTER TABLE `specimen_screen` 
	CHANGE `number` `number` varchar(200)  COLLATE latin1_swedish_ci NOT NULL COMMENT '0:\'Not tested\' -- -1:\'Negative\' -- 1:\'Positive\' -- 5:\'Inconclusive\'' first, 
	CHANGE `Amphetamines` `Amphetamines` tinyint(1)   NOT NULL DEFAULT '0' after `number`, 
	CHANGE `Barbituates` `Barbituates` tinyint(1)   NOT NULL DEFAULT '0' after `Amphetamines`, 
	CHANGE `Benzodiazepines` `Benzodiazepines` tinyint(1)   NOT NULL DEFAULT '0' after `Barbituates`, 
	CHANGE `Cocaine` `Cocaine` tinyint(1)   NOT NULL DEFAULT '0' after `Benzodiazepines`, 
	CHANGE `Methadone` `Methadone` tinyint(1)   NOT NULL DEFAULT '0' after `Cocaine`, 
	CHANGE `Phencyclidine` `Phencyclidine` tinyint(1)   NOT NULL DEFAULT '0' after `Methadone`, 
	CHANGE `MDMA` `MDMA` tinyint(1)   NOT NULL DEFAULT '0' after `Phencyclidine`, 
	CHANGE `Opiates` `Opiates` tinyint(1)   NOT NULL DEFAULT '0' after `MDMA`, 
	CHANGE `Oxycodone` `Oxycodone` tinyint(1)   NOT NULL DEFAULT '0' after `Opiates`, 
	CHANGE `Cannabinoids` `Cannabinoids` tinyint(1)   NOT NULL DEFAULT '0' after `Oxycodone`, 
	CHANGE `Ethyl_Glucuronide` `Ethyl_Glucuronide` tinyint(1)   NOT NULL DEFAULT '0' after `Cannabinoids`;

/* Alter table in target */
ALTER TABLE `specimen_validation` 
	CHANGE `number` `number` varchar(200)  COLLATE latin1_swedish_ci NOT NULL COMMENT '3:\'In Range\' -- 2:\'Out Of Range\' -- 0:\'Not Tested\' -- -1:\'Negative\' -- 1:\'Positive\'' first, 
	CHANGE `ph` `ph` tinyint(1)   NOT NULL DEFAULT '0' after `number`, 
	CHANGE `creatinine` `creatinine` tinyint(1)   NOT NULL DEFAULT '0' after `ph`, 
	CHANGE `specificgravity` `specificgravity` tinyint(1)   NOT NULL DEFAULT '0' after `creatinine`, 
	CHANGE `Oxidants` `Oxidants` tinyint(1)   NOT NULL DEFAULT '0' after `specificgravity`, 
	CHANGE `Chromates` `Chromates` tinyint(1)   NOT NULL DEFAULT '0' after `Oxidants`, 
	CHANGE `Nitrates` `Nitrates` tinyint(1)   NOT NULL DEFAULT '0' after `Chromates`;