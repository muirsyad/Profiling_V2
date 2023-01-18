-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 18, 2023 at 04:49 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_disc`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer_records`
--

CREATE TABLE `answer_records` (
  `id` bigint UNSIGNED NOT NULL,
  `answer_records` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `department_id` bigint UNSIGNED NOT NULL,
  `D` int NOT NULL,
  `I` int NOT NULL,
  `S` int NOT NULL,
  `C` int NOT NULL,
  `plot` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `High` varchar(65) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Low` varchar(65) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint UNSIGNED NOT NULL,
  `client` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_at` date NOT NULL,
  `link_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_delete` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `client`, `address`, `email`, `status`, `created_at`, `link_code`, `is_delete`) VALUES
(1, 'LHI', '123 Main Street', 'LHI@example.com', 0, '2000-01-01', 'LoUY', 0);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint UNSIGNED NOT NULL,
  `department` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department`) VALUES
(0, 'unassign'),
(1, 'It'),
(2, 'Sales'),
(3, 'HRRR'),
(4, 'Finance'),
(5, 'Engineering'),
(6, 'Creative Services'),
(7, 'General Managment'),
(9, 'Operation'),
(14, 'pengerusi');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint UNSIGNED NOT NULL,
  `group` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6'),
(7, '7'),
(8, '8'),
(9, '9'),
(10, '10'),
(11, '11'),
(12, '12'),
(13, '13'),
(14, '14'),
(15, '15'),
(16, '16'),
(17, '17'),
(18, '18'),
(19, '19'),
(20, '20'),
(21, '21'),
(22, '22'),
(23, '23'),
(24, '24');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint UNSIGNED NOT NULL,
  `question` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `value`, `group_id`) VALUES
(1, 'Must be able to Follow Through', 'S', 1),
(2, 'Must be able to Persuade and Convince', 'I', 1),
(3, 'Must be Humble and Modest', 'C', 1),
(4, 'Must be able to Attract Others', 'I', 2),
(5, 'Must be Cooperative and Agreeable', 'C', 2),
(6, 'Must be Friendly to Others', 'S', 2),
(7, 'Must be Bold and Daring', 'D', 3),
(8, 'Must be Loyal and Devoted', 'S', 3),
(9, 'Must be Charming and Delightful', 'I', 3),
(10, 'Must be Receptive to idea of Others', 'C', 4),
(11, 'Must be Obliging and Helpful', 'S', 4),
(12, 'Must be Cheerful and Joyful', 'I', 4),
(13, 'Must be Precise and Accurate', 'C', 5),
(14, 'Must be Liked by Most People', 'I', 5),
(15, 'Must be Calm and Even Tempered', 'S', 5),
(16, 'Must be Competitive and Wanting to Win', 'D', 6),
(17, 'Must be Considerate , Caring and Thoughtful', 'S', 6),
(18, 'Must be Orderly and Organised', 'C', 6),
(19, 'Must be Obedient and Dutiful', 'S', 7),
(20, 'Must be Determined and Unconquerable', 'D', 7),
(21, 'Must be Playful and Full of Fun', 'I', 7),
(22, 'Must be Brave, Unafraid and Courages', 'D', 8),
(23, 'Must be Inspiring, Stimulating, and Motivating', 'I', 8),
(24, 'Must be Soft Spoken and Reserved', 'C', 8),
(25, 'Must be Sociable', 'I', 9),
(26, 'Must be Patient, Steady, and Tolerant', 'S', 9),
(27, 'Must be Self Reliant and Independent', 'D', 9),
(28, 'Must be Willing to Take Changes', 'D', 10),
(29, 'Must be Open to Suggestions', 'C', 10),
(30, 'Must be Moderate and Avoid Extremes', 'S', 10),
(31, 'Must be Chatty and Pleasent', 'I', 11),
(32, 'Must be Controlled and Restrained', 'S', 11),
(33, 'Must be Daring and Risk Taker', 'D', 11),
(34, 'Must be Daring and a Risk Taker', 'D', 12),
(35, 'Must be Diplomatic and tactful', 'C', 12),
(36, 'Must be Contented and Pleased', 'S', 12),
(37, 'Must be Aggressive and Action Oriented', 'D', 13),
(38, 'Must be Outgoing and Entertaining ', 'I', 13),
(39, 'Must be Process Oriented and Technical', 'S', 13),
(40, 'Must be Cautious and Careful', 'C', 14),
(41, 'Must be able to take an Unwavering Stand', 'D', 14),
(42, 'Must be able to Convince and Assure Others', 'I', 14),
(43, 'Must be Willing To Go Along with Others', 'S', 15),
(44, 'Must be Outgoing and Entertaining', 'C', 15),
(45, 'Must be Lively and Enthusiastic', 'I', 15),
(46, 'Must be Confident and Self Assured', 'I', 16),
(47, 'Must be Assertive and Aggressive', 'D', 16),
(48, 'Must be Structured and Analytical', 'C', 16),
(49, 'Must be Well Disciplined and Self-Controlled', 'C', 17),
(50, 'Must be Generous and Willing to Share', 'S', 17),
(51, 'Must be Persistent and Refuses to Quit', 'D', 17),
(52, 'Must be Optimistic and Positive', 'I', 18),
(53, 'Must be Kind and Willing to Help', 'S', 18),
(54, 'Must be Forceful and Firm', 'D', 18),
(55, 'Must be Respectful and Compliant', 'C', 19),
(56, 'Must be Pioneering and Enterprising', 'D', 19),
(57, 'Must be Willing to Help Others', 'S', 19),
(58, 'Must be Looking for New Things To Do ALways', 'D', 20),
(59, 'Must be Adaptable and Flexible ', 'C', 20),
(60, 'Must be Light-Hearted and Jovial', 'I', 20),
(61, 'Must be Trusting with Faith in Others', 'S', 21),
(62, 'Must be Peaceful and Tranquil', 'C', 21),
(63, 'Must be a Driver for Results', 'D', 21),
(64, 'Must like to Mix with People', 'I', 22),
(65, 'Must be Vigorous and Energetic', 'D', 22),
(66, 'Must be Lenient and Not Overly Strict', 'S', 22),
(67, 'Must be Easy to Be With', 'I', 23),
(68, 'Must be Correct and Accurate', 'C', 23),
(69, 'Must be Outspoken, Speaking Freely and Boldly', 'D', 23),
(70, 'Must be Resourceful with Ideas and Suggestion', 'I', 24),
(71, 'Must be Analytical and Critical', 'C', 24),
(72, 'Must be Daring To Take Action', 'D', 24);

-- --------------------------------------------------------

--
-- Table structure for table `remarks`
--

CREATE TABLE `remarks` (
  `id` int NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `rem_1` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'no_text',
  `rem_2` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'no_text',
  `rem_3` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'no_text'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'client'),
(3, 'accessor unregister'),
(4, 'accessor');

-- --------------------------------------------------------

--
-- Table structure for table `templates_reports`
--

CREATE TABLE `templates_reports` (
  `id` bigint UNSIGNED NOT NULL,
  `Strength` varchar(900) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Behaviour_type` varchar(900) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(900) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Wmotivate` varchar(900) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Wbest` varchar(900) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Wdemotive` varchar(900) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Wworst` varchar(900) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `A_improve` varchar(900) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `O_better` varchar(900) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `O_avoid` varchar(900) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Y_environment` varchar(900) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `L_temp` varchar(900) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `H_temp` varchar(900) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `templates_reports`
--

INSERT INTO `templates_reports` (`id`, `Strength`, `Behaviour_type`, `keywords`, `Wmotivate`, `Wbest`, `Wdemotive`, `Wworst`, `A_improve`, `O_better`, `O_avoid`, `Y_environment`, `L_temp`, `H_temp`) VALUES
(1, 'They are likely to be dependable, loyal, thorough and methodical, coping well wi.asdasdThey are likely to be dependable, loyal, thorough and methodical, coping w', 'S', 'Amiable,Deliberate,Good Listener,Kind, Persistent,Accommodating,Organized,Non-Demonstrative,Lenient,Passive,Predictable,Soft-Tempered,Helpful,Contented,Reserved', 'You feel motivated to cooperate wh others At your worstworst, you may suffer from analysis paralysYo.You feel motivated to cooperate with otherAt your worst, you may suffer from analysis paralysis AtYo.You feel motivated to cooperate with others At yoorst, you may suffer from analysis paralysis AtYou.You feel motivated to cooperate with others At your worst, you ay suffer from analysis paralysis AtY.You feel motivated to cooperate with others At your worst, you mffer from analysis paralysis AtYou f', 'At your best, you are able to reconcile factions, calm tensions, and stabilize unsettled situationsA.You are patient and persistent and are a dependable and hardworking team player At your wor you mayY.You can be a peacemaker, reconciler or a calming influencer At your worst, you mayffer from analysis.At your worstYou can be a peacemaker, reconciler or a calming influencet your worst, you may sufferY.you may suffer from analysis paralyYou can be a peacemaker, renciler or a calming influencer At your', 'You do not favor dealing with sudden and uted changes At your worst, you may suffer from analysis pa.You do not favor dealing with sudden and unexpected chnges At your worst, you may suffer from analys.You do not favor dealing with sudden and unexpected changAt your worst, you may suffer from analysis.You do not favor dealing with sudden and uected changesYou do not favor dealing with sudden and unex.At your worst, you may suffer from analysis paralyYdo not favor dealing with sudden and unexpected c', 'You do not favor dealing with sudden and unexpected changes  your worst, you may suffer from analysi.You may resist change passively and wait for people in authority to telldsyou what to do and then yo.You may just shake your head, shrug your shouldersYou may just shake head, shrug your shouldersYou m.You may just shake your head, shrug your shouldersYou may just shake your head,rug your shouldersYou.You may just shake your head, shrug your shouldersYou may just shake youhead, shrug your shouldersYo', 'You need to be more flexible with your routines and more willing to negotiate change you need to kno.You need to develop your assertiveness skillsYou need to develop your assertiveness skills you need.You need to know that other people may not know what you are feeling or thinkingYou need to know tha.You need to lean how to disclose yourself appropriately  need to learn how to disclose yourself apps.You need to leam how to disclose yourself appropriately You need to leam how to disclose you need to', 'When working with you, others should be friendlyWhen working with you, others should be friendlyWhen.They should start their conversation in a personable way before getting down to businessThey shouldT.They should tell you about future changes to give you time to adjustThey should tell you about futur.Others should chat with you frequentlyOthers should chat with you frequentlyOthers should chat withO.They should ask you about yourselfThey should ask you about yourselfThey should ask you about yourse', 'Do not pop changes on youDo not pop changes on youDo not pop changes on youDo not pop changes on you.Do not confront you directly or make you feel personally attackedDo not confront you directly or mak.Do not question your loyaltyDo not question your loyaltyDo not question your loyaltyDo not question.Do not expect you to cope well with hostility or disapprovalDo not expect you to cope well with host.Do not expect you to cope well with hostility or disapprovalDo not expect you to cope well with host', 'You strive in an environment that is stable with minimum disruptionYou strive in an environment that.You do not appreciate surprises and unplanned changesYou do not appreciate surprises and unplanned c.You should be given the opportunity to see things through and not rushed from one task to anotherYou.You prefer to handle one task at a time, seeing it through to completionYou prefer to handle one tas.Since you would generally be a specialist or a subject matter expert, a job that requires just that', 'You tend to a fast, restless person who strives in continuous challengesYou tend to be a fast, re.You enjoy doing multiple tasks simultaneously and get easily bored with routine mundane tasksYou enj.You like changes and varietyYou like changes and varietyYou like changes and varietyYou like changes.asas', 'You will be seen as a loyalerson, be it to another individual or to an organizationYou will be see.You are sympathetic, friendly,nd supportive You are sympathetic, friendly, and supportive You areY.You are a good listener and a team pler and your goal is to help peopleYou are a good listener and.You respect the way things have always beedone, and you tend to be slow to changeYou respect the w.You work hard, often behind the scenes, at creatina stable, harmonious environmentYou work hard, o'),
(2, 'sssassadasdasdasdasdaaaaaaaaaaaaaasdaaaaasasdasdaaaaaasdasdasdasdasdsssassadasda.sssassadasdasdasdasdaaaaaaaaaaaaaasdaaaaasasdasdaaaaaasdasdasd', 'D', 'Forceful,Assertive,Direct,Driving,Self-Motivated', 'At your worst, you may suffer from analysis paralysis At your worst, you may sufferAt your worst, yo.You enjoy being in charge and taking on new opportunities andallenges being in charge and taking on.You need to be given the authority to determine how things are doneu need to be given the authority.You need to be given the authority to determine how things are done You need tlo be given the author.You need to be given the authority to determine how things are done You need to be gioYou nYou need', 'At your best, you are able to get things done, either by yourself or as a group leader Aour best, yo.You will be bold and adventurous You will be bold and adventurous You will be bold annturous You wil.You will be bold and adventurous You will be bold and adventurous You wiold and adventurous You will.You will be bold and adventurous You will be bold and adventurous You willld and You will be bold an.You will be bold and adventurous You will be bold and adventurous You will band adventurous You will', 'You do not like being closely supervised or microaged You do not like being closely supervised or mi.You do not like being closely supervised or micromd You do not like being closely supervised or micr.You do not like beisely supervised or micromanaged You do not like being closely supervised or micro.You do not like beinsely supervised or micromanaged You do not like being closely supervised orYou d.You do not like being closely rvised or micromanaged You do not like being closely supervised or mic', 'You do not like any public promotion of yourself as you see this as exposing your strengths and weak.Like a tank, you can run over people\'s feelings Like a tank, you can run overLike a tank, you can ru.You may be hypercritical, demanding, and short-tempered You may be hypercritical, demanding, and sho.You are capable of making rash and reckless decisions You are capableh and reckless decisions YoYouY.You may explode when you do not gde when you do not get your way You may explode whenYou may explode', 'You need to take time to gather information and think thugh the consequences of your decisionsYousas.Instead of just announcing your decision, you need to explainour reasoningInstead of just announciIn.You need to consult others, respect their input, ankeep them informedYou need to consult others, rYo.You need to consult others, respect their int, and keep them informedYou need to consult others, rYo.You need to consult others, respect their input, a keep them informedYou need onsult others, respect', 'When working with you, others should be clear, specific, and to the pointWhen working with you, othe.They must be prepared and present their requirements, objectives, and support material without wasti.They must involve you in developing a solutionThey must involve you in developing a solutionThey mus.They should let you decide how to accomplish it and give you the freedom to do it by yourselfThey sh.They should clarify the limits of your authority and available resourcesThey should clarify the limi', 'Do not try to chitchat or try to develop a relationship with youDo not try to chitchat or try to dev.Do not approach you casually or waste your timeDo not approach you casually or waste your timeDo not.Do not tell you what to do and expect you to do itDo not tell you what to do and expect you to do it.Do not expect you to pick up on your feelings or unspoken agendaDo not expect you to pick up on your.Do not expect you to pick up on your feelings or unspoken agendaDo not expect you to pick up on your', 'You strive in an environment that provides you with continuous challenges that will allow you to pro.You need job autonomy the freedom to make independent decisionsYou need job autonomy the freedom to.You can be easily bored in a routine and mundane environmentYou can be easily bored in a routine and.You need to be recognized in terms of your authorityYou need to be recognized in terms of your autho.At the same time, you would have a secondary preference for a structured environment with clear inst', 'You are a person nwho enjoys solving problems, getting things done, and achieving goals and will hav.You are a person who enjoys solving problems, getting things done, and achieving goals and will have.You are a person who enjoys solving problems, getting things done, and achieving goals and will have.asdasdasd.zzz', 'jhnjhnYou a person who enjoys solving problems, getting things done, and achieving goals and wil.jhnjhnYou are a per who enjoys solving problems, getting things done, and achieving goals and wil.sdfsdf.zzz.sdf'),
(3, 'primary strengths are their enthusiasm, persuasiveness, and friendlinessprimary.sssassadasdasdasdasdaaaaaaaaaaaaaasdaaaaasasdasdaaaaaasdasdasdasdasdsssassadasda', 'I', 'Communicate,Friendly,Persuasive,Positive,Verbal', 'You feel motiva working with people in a fast-paced, varied environment You feel motivated working w.You enjoy being inpotlight, although not necessarily being in charge You enjoy being in the spotligh.You enjokling new projects and learning new things You enjoy tackling new projects and learning new.Gaining public recion motivates you well Gaining public recognition motivates you well Gaining publi.You also enjoy initiating chage and being able to be creative You also enjoy initiating change and b', 'At your best, you will be able to mmunicate a vision, mission, or goal in a way that inspires others.You will be enthusiastic and creative  go a way that inspires others to adopt it and work towards ac.You will see the best in others and you will help thelieve in their abilities You will see the bestY.At your best, you can be a visionary, a motor, a catalyst At your best, you can be a visionaryAt you.At your best, you can be a visionary, a motivator, a atalyst At your best, you can be a visionaryAtA', 'You do not favor being around negaticold, or pessimistic people You do not favor being around negati.You do not enjoy performing routine,detailed tass or being held to rigid schedules You do not enjoy.You feel uneasy working alone, being left out, or beriticized in public You feel uneasy working alon.You feel uneasy working alone, being left out being criticized inYou feel uneasy working alone, bein.public You feel uneasy working alone, bepublic Yoel uneasy working alone, bepublic You feel uneasy w', 'At your worst, you may suffer from analysis paralysis At your worst, you may suffer from analis para.You may get bogged down in details At your worst, you may suffer from analysis paralysis At ur worst.You may withhold information and become stubborn At your worst, you may er from analysis paralysis A.You may also become overly critical of others and of yourself At your worst, you maffer from analysi.You may be inclined to tell ideas instead of selling ideas At your worst, you muffer from analysis p', 'You need to develop time management skillsYou need to develop time management skillsYou need to deve.You need to listen to more, question, pause and consider others\' viewsYou need to listen to more, qu.You need to be more discriminatingYou need to be more discriminatingYou need to be more discriminati.You need to leam how to appraise people more realisticallyYou need to leam how to appraise people mo.You need to resist the urge to do something newYou need to resist the urge to do something newYou ne', 'When working with you, others should be friendlyWhen working with you, others should be friendlyWhen.They should start their conversation in a personable way before getting down to businessThey shouldT.They should help you set clear, realistic goalsThey should help you set clear, realistic goalsThey s.They should develop timetables and check back with you frequentlyThey should develop timetables andT.They should maintain an open-door policy with youThey should maintain an open-door policy with youTh', 'Do not bore you with detailsDo not bore you with detailsDo not bore you with detailsDo not bore you.Do not freeze you out, exclude you or make you feel like an outsiderDo not freeze you out, exclude y.Do not ignore your ideasDo not ignore your ideasDo not ignore your ideasDo not ignore your ideasDo n.Do not expect you to cope well with bureaucracyDo not expect you to cope well with bureaucracyDo not.Do not expect you to cope well with bureaucracyDo not expect you to cope well with bureaucracyDo not', 'You strive in an environment that is people-orientedYou strive in an environment that is people-orie.You have a natural tendency to be with peopleYou have a natural tendency to be with peopleYou have a.You need variety and you are easily bored in a mundane and routine environmentYou need variety and y.Being a people-centric person, you need to be recognized in public for your contributionBeing a peop.At the same time, you would have a secondary preference for a structured environment with clear inst', 'You may not enjoy casual conversations and as such, would not enjoy group activities, which are out.You would influence more by data and facts, and not by feelingsYou would influence more by data and.You would bcribed as reflective, factual, and calculatingYou would be described as reflective, factu.You would be seen as being skeptical, logical, and suspiciousYou would be seen as being skeptical, l.asdasdasdasd', 'You will be seen as optimistic, charming, and outgoingYou will be seen as optimistic, charming, andY.You trust peopg out the best in other peopleYou trust people and yYou trust peopg out the best in ot.You genuinely e people and you want them to like youYou genuinely like people and you want them tYou.You trust people and you enjoy bringing out the best in other peopleYou trust people and you enjoy b.dasdadsasd'),
(4, 'Compliance style’s strengths include accuracy, dependability, independence, clar.Compliance style’s strengths include accuracy, dependability, independence, clar', 'C', 'High Analytical,Discipled,Facts and Figures Oriented,Objective,Introvert', 'You feel motivated just being righYou feel motivated just being rightYou feel motivated just being r.At your worst youmay suffer from analysis paralysisAt your worst you may suffer from analysis paraly.You enjoy working in an vironment where you have adequate access to information and dataYou enjoy wo.You need to be given adequate timeto investigate the problem, formulate a plan, and carry it througY.You prefer to be dealt with in a reserved busiss-like mannerYou prefer to be dealt with in a reserve', 'At your best, you will be fair and objective, not letting feelings or personal biases get in the way.You will ask the right questions and maintain high standards in spite of pressures to compromise val.At your best, you will tend to be a clear thinker, an analyst, and a diplomat At your worstAt your b.At your best, you will tend to be a clear thinker, an analyst, and a diplomat At your worstAt your b.At your best, you will tend to be a clear thinker, an analyst, and a diplomat At your worstAt your b', 'You do not favor being asked to deal with sudden or abrupt changes At your worst, yomay suffer fromY.You do not enjoy being required to socialize, deal with emotionally charged situations, or diose per.You feel pressured to be in an environment that does not provide you with adeque time to process inf.You do not like to be criticized by people who do not understand the situation At your wors you mayY.An environment or system that lacks quality control or safety regulations is ipropriate for you At y', 'At your worst, you may suffer from analysis paralysiAt your worst, you may suffer from analysis para.You may get bogged down in details At your worst, you  suffer from analysis paralysis At your worst,.You may withhold information and become stubborn At your worstou may suffer from analysis paralysis.You may also become overly critical of others and of yourself At your worst, y may suffer from analy.You may be inclined to tell ideas instead of selling ideas At your worst, ymay suffer from analysis', 'You need to be more open to other people\'s ways of thinking and communicatingYou need to be more ope.You need to leam when it is appropriate to settle for good enoughYou need to leam when it is appropr.You should gain perspectives on the consequences of being wrong and manage it insteadYou should gain.You need to know that you do not have to know everything before voicingYou need to know that youYou.You need to know that you do not have to know everything before voicingYou need to know that youYouY', 'When working with you, others should get right down to business and present the factsWhen working wi.They should focus on the issueThey should focus on the issueThey should focus on the issueThey shoul.They should involve you in defining standards and developing proceduresThey should involve you in de.They should ask your opinions and wait for you to answerThey should ask your opinions and wait for y.Listening to your answers is important as it shows interest in what you are sayingListening to yourL', 'Others should not pop changes on youOthers should not pop changes on youOthers should not pop change.They should not ask you to make quick decisions or handle too many things in a short time They shoul.They should not spend time on your feelings or ask you about how you are really doingThey should not.They should not expect you to embrace change immediatelyThey should not expect you to embrace change.They should respect your personal limitsThey should respect your personal limitsThey should respect', 'You strive in a very structured enviroasdasdasdnment with clear instructions, policies, and procedur.You strive in a very structured enviroasdasdasdnment with clear instructions, policies, and procedur.Your tendency to be systematic in the approach warrants that you are not expected to make quick decY.You do not like any public promotion of yourself as you see this as exposing your strengths and weak.You do not appreciate surprises and unplanned ssssYou do not appreciate surprises and unplanned ssss', 'You would be a creative individual who does not like to be controlled by structures, policies, and p.You strive in an environment that promotes flexibility and creativityYou strive in an environment th.You like to challenge the rules and want independenceYou like to challenge the rules and want indepe.You would be descrd as self-willed, stubborn, opinionated, and unsystematicYou would be described', 'You will research every aspect of a situation and consider every eventuality before making a decisio.You value your reputation for being accurate and logicalYou value your reputation for being accurate.You like systems and procedures that produce predictable and consistent outcomesYou like systems and.You like systems and procedures that produce predictable and consistent outcomesYou like systems and');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` bigint UNSIGNED DEFAULT '1',
  `role_id` bigint UNSIGNED NOT NULL,
  `department_id` bigint UNSIGNED DEFAULT '0',
  `created_at` date NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `is_delete` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `client_id`, `role_id`, `department_id`, `created_at`, `status`, `is_delete`) VALUES
(1, 'admin1', 'lhi-admin@gmail.com', '$2y$10$BjfShRru5/6k95ISGfISJ.nIoxB6iLx390/kcQT3YTTOmYqwcSkUG', 1, 1, 1, '2022-09-09', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer_records`
--
ALTER TABLE `answer_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answer_records_user_id_foreign` (`user_id`),
  ADD KEY `client_id_forgeinkey` (`client_id`) USING BTREE,
  ADD KEY `dpet_id` (`department_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_group_id_foreign` (`group_id`);

--
-- Indexes for table `remarks`
--
ALTER TABLE `remarks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forgein_key__remakrs_user` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `templates_reports`
--
ALTER TABLE `templates_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_client_id_foreign` (`client_id`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_department_id_foreign` (`department_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer_records`
--
ALTER TABLE `answer_records`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `remarks`
--
ALTER TABLE `remarks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `templates_reports`
--
ALTER TABLE `templates_reports`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer_records`
--
ALTER TABLE `answer_records`
  ADD CONSTRAINT `answer_records_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `client_id_forgeinkey` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `dpet_id` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);

--
-- Constraints for table `remarks`
--
ALTER TABLE `remarks`
  ADD CONSTRAINT `forgein_key__remakrs_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `users_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
