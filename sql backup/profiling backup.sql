-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2022 at 04:58 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `profiling`
--
CREATE DATABASE IF NOT EXISTS `profiling` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `profiling`;

-- --------------------------------------------------------

--
-- Table structure for table `answer_records`
--

CREATE TABLE `answer_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `answer_records` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `D` int(11) NOT NULL,
  `I` int(11) NOT NULL,
  `S` int(11) NOT NULL,
  `C` int(11) NOT NULL,
  `plot` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `High` varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Low` varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answer_records`
--

INSERT INTO `answer_records` (`id`, `answer_records`, `created_at`, `user_id`, `client_id`, `department_id`, `D`, `I`, `S`, `C`, `plot`, `High`, `Low`) VALUES
(8, 'I, S, S, C, S, S, I, D, D, C, D, D, I, I, C, C, S, D, D, I, D, D, D, C', '2021-10-27', 20, 6, 1, 9, 5, 5, 5, '27,28,22,26', 'I', 'NO'),
(9, 'I, I, I, S, S, S, I, I, D, D, D, C, S, D, S, C, S, D, D, D, D, D, D, I', '2022-10-16', 21, 6, 3, 10, 6, 6, 2, '32,31,25,11', 'D', 'C'),
(10, 'I, I, I, S, S, D, D, D, D, C, I, S, I, I, C, I, D, S, C, I, C, S, C, I', '2022-11-05', 22, 6, 2, 5, 9, 5, 5, '17,43,22,26', 'I', 'D'),
(11, 'I, I, I, S, C, C, D, C, S, D, D, C, D, D, I, D, C, S, C, D, D, I, C, D', '2022-11-08', 17, 6, 1, 9, 5, 3, 7, '27,28,14,37', 'C', 'S'),
(12, 'I, S, S, C, S, S, S, C, S, D, D, C, D, I, C, C, S, I, D, I, C, S, C, I', '2022-11-08', 18, 6, 1, 4, 5, 8, 7, '14,28,31,37', 'C', 'D'),
(13, 'S, S, S, I, I, D, I, I, S, D, D, C, D, I, C, I, D, S, C, I, C, I, D, C', '2022-11-08', 19, 6, 3, 6, 8, 5, 5, '19,40,22,26', 'I', 'D'),
(14, 'S, S, S, C, S, S, S, C, S, D, D, C, D, I, C, C, S, I, S, C, S, S, C, I', '2022-11-08', 23, 6, 2, 3, 3, 11, 7, '12,16,42,37', 'S', 'D'),
(15, 'I, I, I, S, C, C, D, D, D, C, I, S, I, C, I, D, C, D, D, D, D, D, I, D', '2022-11-10', 24, 6, 9, 10, 7, 2, 5, '32,37,10,26', 'I', 'S');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `link_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `client`, `address`, `email`, `created_at`, `link_code`) VALUES
(1, 'LHI', '123 Main Street', 'LHI@example.com', '2000-01-01', 'LoUY'),
(2, 'Dihatsu', '123 Main Street', 'Daihatsu@example.com', '2000-01-01', 'zFGe'),
(3, 'd', 'as', 'd@gamil.com', '2022-10-07', 'Qm9Q'),
(4, 'TTMN', '12/99 Plaza Azalea, Jalan Cempaka Section 10 Selangor', 'T@gmail.com', '2022-10-07', 'Jn9o'),
(5, 'JPA', 'nnaj jalan 12 212', 'jjpa@gmail.com', '2022-11-01', 'fOoGPpJ6'),
(6, 'Etiqa Sdn Bhd', 'Level 19, Tower C, Dataran Maybank, No. 1, Jalan Maarof, 59000 Kuala Lumpur', 'etiqa.sales@gmail.com', '2022-11-14', 'yQ2kTiUf'),
(7, 'Pasak Perak', '129, Jalan Raja Musa Mahadi, Desa Perwira, 31350 Ipoh, Perak', 'pasak-hr@gmail.com', '2022-11-15', 'eeXoXY1G'),
(8, 'Amazing Sdn Bhd', '31, Jln Bukit Aman 4/4M', 'amazing-info@gmail.com', '2022-11-21', 'hotQVMox');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department`) VALUES
(1, 'It'),
(2, 'Sales'),
(3, 'HR'),
(4, 'Finance'),
(5, 'Engineering'),
(6, 'Creative Services'),
(7, 'General Managment'),
(8, 'Legal'),
(9, 'Operation');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_10_04_024954_create_role_table', 1),
(3, '2022_10_04_025204_create_departments_table', 1),
(4, '2022_10_04_025224_create_groups_table', 1),
(5, '2022_10_04_025249_create__clients_table', 1),
(6, '2022_10_04_025302_create__users_table', 1),
(7, '2022_10_04_025343_create__questions_table', 1),
(8, '2022_10_04_025419_create__answer_records_table', 1),
(9, '2022_10_04_025450_create__users_summary_table', 1),
(10, '2022_10_04_025532_create__templates_report_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL
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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'client');

-- --------------------------------------------------------

--
-- Table structure for table `templates_reports`
--

CREATE TABLE `templates_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Behaviour_type` varchar(900) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(900) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Wmotivate` varchar(900) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Wbest` varchar(900) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Wdemotive` varchar(900) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Wworst` varchar(900) COLLATE utf8mb4_unicode_ci NOT NULL,
  `A_improve` varchar(900) COLLATE utf8mb4_unicode_ci NOT NULL,
  `O_better` varchar(900) COLLATE utf8mb4_unicode_ci NOT NULL,
  `O_avoid` varchar(900) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Y_environment` varchar(900) COLLATE utf8mb4_unicode_ci NOT NULL,
  `L_temp` varchar(900) COLLATE utf8mb4_unicode_ci NOT NULL,
  `H_temp` varchar(900) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `templates_reports`
--

INSERT INTO `templates_reports` (`id`, `Behaviour_type`, `keywords`, `Wmotivate`, `Wbest`, `Wdemotive`, `Wworst`, `A_improve`, `O_better`, `O_avoid`, `Y_environment`, `L_temp`, `H_temp`) VALUES
(1, 'S', 'Amiable,Deliberate,Good Listener,Kind, Persistent,Accommodating,Organized,Non-Demonstrative,Lenient,Passive,Predictable,Soft-Tempered,Helpful,Contented,Reserved', 'You feel motivated to cooperate with others.You enjoy working in a stable, harmonious environment where you can complete one task at a time.You like to be recognized for your loyalty and service.You are energized by having clearly defined and unchanging rules and expectations.You work best with a small group of people where you can develop relationships', 'At your best, you are able to reconcile factions, calm tensions, and stabilize unsettled situations.You are patient and persistent and are a dependable and hardworking team player.You can be a peacemaker, reconciler or a calming influencer', 'You do not favor dealing with sudden and unexpected changes.You would not be comfortable being around competitive, aggressive, and confrontational people.You lose energy being in an environment that lacks the support of supervisors or peers, or where you are pressured to make decisions or implement change.You may be dejected seeing other people get the credit for your hard work or when you feel that you are being judged unfairly', 'At your worst, you may take criticism of your work as a personal affront and you may take it too hard on yourself.You may resist change passively and wait for people in authority to tell you what to do and then you may lead them to believe, falsely, that you will comply.You may just shake your head, shrug your shoulders, and say, \"What\'s the use?\"', 'You need to be more flexible with your routines and more willing to negotiate change.You need to develop your assertiveness skills.You need to know that other people may not know what you are feeling or thinking.You need to leam how to disclose yourself appropriately', 'When working with you, others should be friendly.They should start their conversation in a personable way before getting down to business.They should tell you about future changes to give you time to adjust.Others should chat with you frequently.They should ask you about yourself.They should assign you fewer but larger projects.Others should encourage you to speak up at meetings', 'Do not pop changes on you.Do not confront you directly or make you feel personally attacked.Do not question your loyalty.Do not expect you to cope well with hostility or disapproval', 'You strive in an environment that is stable with minimum disruption.You do not appreciate surprises and unplanned changes.You should be given the opportunity to see things through and not rushed from one task to another.You prefer to handle one task at a time, seeing it through to completion.Since you would generally be a specialist or a subject matter expert, a job that requires just that would be appropriate.You would also strive in a very structured environment with clear instructions, policies, and procedures.You do not like any public promotion of yourself as you see this as exposing your strengths and weaknesses to others, hence making you vulnerable.Your tendency to be systematic in the approach warrants that you are not expected to make quick decisions', 'You tend to be a fast, restless person who strives in continuous challenges.You enjoy doing multiple tasks simultaneously and get easily bored with routine mundane tasks.You like changes and variety.You would be described as restless, demonstrative, impatient, eager, or even impulsive', 'You will be seen as a loyal person, be it to another individual or to an organization.You are sympathetic, friendly, and supportive.You are a good listener and a team player and your goal is to help people.You respect the way things have always been done, and you tend to be slow to change. You work hard, often behind the scenes, at creating a stable, harmonious environment.You dislike conflicts and sudden changes. You are patient and you stick with a project from beginning to completion.You believe that the environment is always friendly and favorable, but you may lack the ability to act proactively to affect it'),
(2, 'D', 'Forceful,Assertive,Direct,Driving,Self-Motivated,Results-Oriented,Impatient,Easily Bored,Energetic,Aggressive,Daring,Decisive,Demanding,Egocentric', 'You feel motivated working in a fast-paced, results-oriented environment.You enjoy being in charge and taking on new opportunities and challenges.You need to be given the authority to determine how things are done.You want to be able to advance in your career', 'At your best, you are able to get things done, either by yourself or as a group leader.You will be bold and adventurous.You are capable of mobilizing people to solve a problem, confront an enemy, or achieve a goal.At your best, you can be a pioneer, a crusader, a leader', 'You do not like being closely supervised or micromanaged.You do not like being questioned or overruled and being in a position where you cannot affect the outcome.You will be pressured to have limited access to resources and to perform routine, predictable tasks', 'At your worst, you can be blunt to the point of being rude.Like a tank, you can run over people\'s feelings.You may be hypercritical, demanding, and short-tempered.You are capable of making rash and reckless decisions.You may explode when you do not get your way', 'You need to take time to gather information and think through the consequences of your decisions.Instead of just announcing your decision, you need to explain your reasoning.You need to consult others, respect their input, and keep them informed', 'When working with you, others should be clear, specific, and to the point.They must be prepared and present their requirements, objectives, and support material without wasting their time.They must involve you in developing a solution.They should let you decide how to accomplish it and give you the freedom to do it by yourself.They should clarify the limits of your authority and available resources.They should not back down when you attack.They should take issue with the facts without confronting you directly', 'Do not try to chitchat or try to develop a relationship with you.Do not approach you casually or waste your time.Do not tell you what to do and expect you to do it.Do not expect you to pick up on your feelings or unspoken agenda', 'You strive in an environment that provides you with continuous challenges that will allow you to prove your ability.You need job autonomy the freedom to make independent decisions.You can be easily bored in a routine and mundane environment.You need to be recognized in terms of your authority.At the same time, you would have a secondary preference for a structured environment with clear instructions, policies, and procedures.This may create a tendency to be systematic in your approach, and warrants that you are not expected to make quick decisions.You do not like any public promotion of yourself as you see this as exposing your strengths and weaknesses to others, hence making you vulnerable', 'You may tend to be nice and non-aggressive.You will be seen as conservative and low-key.You tend to be cooperative and undemanding but at the same time calculating and cautious.You are generally mild, agreeable, and peaceful', 'You are a person who enjoys solving problems, getting things done, and achieving goals.You want to be in charge. You do not like to be told what to do.You set high standards for performance, whether it is your own performance or the performance of others.You trust your ability to produce results.You enjoy challenges and competition.You are willing to take risks, challenge the status quo, and break the rules.You make decisions quickly and are impatient with people who \"waste time\" by talking or planning, who you think are incompetent, or who resist change.You do not mind telling people that they are wrong. You value telling it like it is.You can be blunt and get bored easily.You tend to get angry quickly but you get over it quickly'),
(3, 'I', 'Communicate,Friendly,Persuasive,Positive,Verbal,Charming,Confident,Self-Promoting,Generous,Trusting,Sympathetic,Motivator,Gergarious,Effusive', 'You feel motivated working with people in a fast-paced, varied environment.You enjoy being in the spotlight, although not necessarily being in charge.You enjoy tackling new projects and learning new things.Gaining public recognition motivates you well.You also enjoy initiating change and being able to be creative', 'At your best, you will be able to communicate a vision, mission, or goal in a way that inspires others to adopt it and work towards achieving it.You will be enthusiastic and creative.You will see the best in others and you will help them believe in their abilities.At your best, you can be a visionary, a motivator, a catalyst', 'You do not favor being around negative, cold, or pessimistic people.You do not enjoy performing routine,detailed tasks or being held to rigid schedules.You feel uneasy working alone, being left out, or being criticized in public.You will be pressured to have limited access to resources and to perform routine,predictable tasks', 'At your worst, you may suffer from analysis paralysis.You may get bogged down in details.You may withhold information and become stubborn.You may also become overly critical of others and of yourself.You may be inclined to tell ideas instead of selling ideas', 'You need to develop time management skills.You need to listen to more, question, pause and consider others\' views.You need to be more discriminating.You need to leam how to appraise people more realistically.You need to resist the urge to do something new.You should rein in the individual\'s impulsiveness', 'When working with you, others should be friendly.They should start their conversation in a personable way before getting down to business.They should help you set clear, realistic goals.They should develop timetables and check back with you frequently.They should maintain an open-door policy with you.Others should make you feel included. They should set clear objectives and time frames for any major task.They should look for ways to make the best use of your verbal skills', 'Do not bore you with details.Do not freeze you out, exclude you or make you feel like an outsider.Do not ignore your ideas.Do not expect you to cope well with bureaucracy', 'You strive in an environment that is people-oriented.You have a natural tendency to be with people.You need variety and you are easily bored in a mundane and routine environment.Being a people-centric person, you need to be recognized in public for your contribution.At the same time, you would have a secondary preference for a structured environment with clear instructions, policies, and procedures.This may create a tendency to be systematic in your approach, and warrants that you are not expected to make quick decisions', 'You may not enjoy casual conversations and as such, would not enjoy group activities, which are out of your field of interest.You would influence more by data and facts, and not by feelings.You would be described as reflective, factual, and calculating.\r\nYou would be seen as being skeptical, logical, and suspicious.You tend to be matter of fact, pessimistic and critical', 'You will be seen as optimistic, charming, and outgoing.You are a \"people person.\" You genuinely like people and you want them to like you. You trust people and you enjoy bringing out the best in other people.You tend to be a consummate communicator. You enjoy telling stories and you tend to exaggerate.You enjoy meeting new people, working with others, and networking.You tend to ignore the rules since you do not think that they really apply to you.You are energized by working with people and you energize any group you work with.You see the big picture and you can be inspirational. You have a natural tendency to dislike details and you can be scattered in both your work and your thoughts'),
(4, 'C', 'High Analytical,Discipled,Facts and Figures Oriented,Objective,Introvert,Systematic,Precise,Self-Effacing,Perfectionist,Logical,Humble,Sensitive,Easily Worried', 'You feel motivated just being right.You enjoy working in an environment where you have adequate access to information and data.You need to be given adequate time to investigate the problem, formulate a plan, and carry it through to completion.You prefer to be dealt with in a reserved, business-like manner.You are best x and rewarded for specific accomplishments', 'At your best, you will be fair and objective, not letting feelings or personal biases get in the way of doing the right thing.You will ask the right questions and maintain high standards in spite of pressures to compromise values or the quality of work.At your best, you will tend to be a clear thinker, an analyst, and a diplomat', 'You do not favor being asked to deal with sudden or abrupt changes.You do not enjoy being required to socialize, deal with emotionally charged situations, or disclose personal information.You feel pressured to be in an environment that does not provide you with adequate time to process information or to evaluate consequences.You do not like to be criticized by people who do not understand the situation.An environment or system that lacks quality control or safety regulations is inappropriate for you', 'At your worst, you may suffer from analysis paralysis.You may get bogged down in details.You may withhold information and become stubborn.You may also become overly critical of others and of yourself.You may be inclined to tell ideas instead of selling ideas', 'You need to be more open to other people\'s ways of thinking and communicating.You need to leam when it is appropriate to settle for good enough - practicing the Pareto principle of 80-20.You should gain perspective on the consequences of being wrong and manage it instead.You need to know that you do not have to know everything before voicing an opinion or making a decision', 'When working with you, others should get right down to business and present the facts.They should focus on the issue.They should involve you in defining standards and developing procedures.They should ask your opinions and wait for you to answer.Listening to your answers is important as it shows interest in what you are saying.Others should involve you in long term planning', 'Others should not pop changes on you. They should not ask you to make quick decisions or handle too many things in a short time.They should not spend time on your feelings or ask you about how you are really doing.They should not expect you to embrace change immediately.They should respect your personal limits', 'You strive in a very structured environment with clear instructions, policies, and procedures.You tend to prefer a stable environment with minimal disruptions.Your tendency to be systematic in the approach warrants that you are not expected to make quick decisions.You do not like any public promotion of yourself as you see this as exposing your strengths and weaknesses to others, hence making you vulnerable.You do not appreciate surprises and unplanned changes.You should be allowed to see things through and not rush from one task to another.You prefer to handle one task at a time, seeing it through to completion.Since you would generally be a specialist or a subject matter expert, a job that requires just that would be appropriate', 'You would be a creative individual who does not like to be controlled by structures, policies, and procedures.You strive in an environment that promotes flexibility and creativity.You like to challenge the rules and want independence.You would be described as self-willed, stubborn, opinionated, and unsystematic.You would be seen as arbitrary and unconcerned with details', 'You tend to want to be right. You will research every aspect of a situation and consider every eventuality before making a decision.You value your reputation for being accurate and logical.You like systems and procedures that produce predictable and consistent outcomes. You would tend to look for what could go wrong.You read the fine print and are a stickler for detail.You prefer to work alone and have very high standards, especially for yourself.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `client_id`, `role_id`, `department_id`, `created_at`, `status`) VALUES
(1, 'akmal', 'akmal@gmail.com', '$2y$10$0XzWnzCTAhNGTCGsAilELerXEDJHt5TRq3ME9dMaNQD8veZx3QUKq', 1, 1, 1, '2022-09-09', 1),
(2, 'kamal', 'kamal@gmail.com', '$2y$10$UbjvohBscbEiaeBlbNXo4OD8ePCvLf4Ws7BSjb4s/Culs1sck9RY6', 1, 1, 1, '2022-09-13', 1),
(3, 'kAMA', 'kam@gmail.com', '$2y$10$vwuSfuxmi8AXrAPt9gc9zuv3SYnP4WC5rpI6JJVPrPEbNIM.iyZoS', 1, 1, 1, '2022-10-11', 1),
(4, 'irsyad', 'irsyad@gmail.com', '$2y$10$sVWjmMuNTYJX2eCoEpyliekK8n5kNeStoG69WWf/sX9vhePE8d3CK', 1, 1, 1, '2022-10-11', 1),
(5, 'kkkam', 'mikam@gmail.com', '$2y$10$e9aT6Eodrcziy2pqmdzYBe3ovsAO9x3FBecOm/iGvdBH4761Xz7xa', 1, 1, 1, '2022-10-11', 1),
(6, 'zaki', 'zaki@gmail.com', '$2y$10$1yMSaAvFC3mfu9HMi4qm9uogUJug.L/mG9B1O7SrbLjw/FYirO9se', 1, 1, 1, '2022-10-11', 1),
(7, 'test', 'sa@gmail.com', '$2y$10$/HUnA8480HF4UMiGBU8k1u0pjA6wVhjTzURk1u/GdixSYEse2xw4a', 2, 2, 2, '2022-10-11', 1),
(8, 'salim', 'sal@gmail.com', '$2y$10$Fvv.MaFbSeLhQBhB9nP.UeUcHOhWgHYfpM4A2i6bQeVaWj1KOyk5O', 2, 2, 2, '2022-10-11', 1),
(9, 'syakir', 'syak@gmail.com', '$2y$10$ee/oSN5qPoy5Cq/T7gJmM.BjJm7j89WCF7PA/f6AqYByi4YcKnEM6', 2, 2, 2, '2022-10-13', 1),
(10, 'Jason', 'jason@gmail.com', '$2y$10$ymcSr.B4Sy0U.8tckpq9P.L0.QC3B3dMQEABLC7kV5uJs.Mt/JdTK', 2, 2, 2, '2022-10-13', 1),
(11, 'micheal', 'mic@gmail.com', '$2y$10$qNhbJUDkCZ5bWVXmA/Ig8OTD9nIGI97YaOm7.OEG/gGXTPVYqan8.', 2, 2, 2, '2022-10-14', 1),
(12, 'zaki', 'mirza@gmail.com', '$2y$10$Wbs72eUrwXXnERmvdbKak.DpDAzJJndW3XuUBRiTKD4lUy38l0QxK', 4, 1, 2, '2022-10-21', 1),
(13, 'mirah', 'mimrah@gmail.com', '$2y$10$YBJ60.VAwblxBI2EFCKNa.VzlnmRMkiuJYlP2VSwZP2pMIoG1hfEK', 4, 2, 2, '2022-10-21', 1),
(14, 'Samsuddin abdul rani', 'samsudiin@gmail.com', '$2y$10$lzUg1ASGqgTIMjJBJ2hgtONJeoJc/MoWzblGJOIwyjmbyxPGHmQ3K', 1, 2, 1, '2022-10-25', 1),
(15, 'Vvinjeo mirza', 'alvin@gmail.com', '$2y$10$MMUdjMNrLtalV2HKdfTmoedJW8imX6LrRUyYvHionRgo9Y3gMkIDW', 2, 2, 2, '2022-10-25', 1),
(16, 'hahafiz', 'hafiz@gmail.com', '$2y$10$7aUz3egv19N/EhIlwnlcQ.WR8ayAUuhpXLemEaBgHJHtHxCBUu.2a', 1, 2, 2, '2022-10-25', 1),
(17, 'Muhammad Mirza', 'Mirtza@gmail.com', '$2y$10$iczxr/MVlaJK0FhfPb5hg.IQYEKauvFLwAzbs33OawnvnFzzwyn0u', 6, 2, 1, '2022-10-27', 1),
(18, 'Muhammad Jijah', 'Zulqairnan@gmail.com', '$2y$10$xgoxGuiUzHxljJZO5UD73.s0ExxabzKmw8G8ErRD4sBKaQPAk4HtC', 6, 2, 1, '2022-10-27', 1),
(19, 'Muhammad alex', 'alexnndrah@gmail.com', '$2y$10$5NxSDJ6HQxJzWn58oREOZ.a9mcFSjbsiqlBdfxHom/tUCaYtp0UPa', 6, 2, 3, '2022-10-27', 1),
(20, 'mirhh', 'mm@gmail.com', '$2y$10$XDl26uHzI8ySsY/lqZ1alOe2If.8qokVrdLA6k4nXlJQjB09B7TKS', 6, 2, 2, '2022-10-27', 1),
(21, 'Muhammad Zarif Afifudin', 'Zafi@gmail.com', '$2y$10$rjkuH5wki0TQsxQF455.QOumIYWlv/HjrmeaFqHPPoNVj8c0JRXjO', 6, 2, 3, '2022-11-03', 1),
(22, 'Kamisah', 'kamisah@gmail.com', '$2y$10$Gnm.i2dfri4jquHbjO46V.gTdQN7aecpORvftw9v.TN3jxYYTt6KC', 6, 2, 2, '2022-11-05', 1),
(23, 'Kamal adli', 'kamad@gmail.com', '$2y$10$UWrVGBVNKqDDtzPpp090XOk0eX7IgDgIkkvh9TAeM9anDufYVSFEa', 6, 2, 2, '2022-11-08', 1),
(24, 'zaki', 'ziziki@gmail.com', '$2y$10$BR3TqAdXQ40jcYjUyFyvH.5pwL2VToQBqXIO4M8umrrwpPtzfkmHi', 6, 2, 9, '2022-11-10', 1),
(25, 'Muhammad Safir', 'Safir@gmail.com', '$2y$10$raZOCGNN8VF516VK411LdOvFJwoONE7HjLd2IYfK6Uk445XxgIwN.', 6, 2, 2, '2022-11-14', 1),
(26, 'ahmad jj', 'jj@gmail.com', '$2y$10$uXFkbP94bl9OPp4l59K8TurRz485nKt6l.iGBlR.wKUrg7lKRec12', 7, 2, 3, '2022-11-15', 1),
(27, 'Kevin ALex', 'ksi@gmail.com', '$2y$10$mzGWNNawburdUdNr8n5gsePLID0Ku/n5z.410aBjqVaAfR0Jpf5Ym', 7, 2, 4, '2022-11-15', 1),
(28, 'abdul karim', 'ishowspeed@gmail.com', '$2y$10$ubZX7iBLVkrKSe1yBNo/b.x8hrzH91gk.pq4rZSOAb9y0rFhsLgHy', 7, 2, 1, '2022-11-15', 1),
(29, 'Lim Quan', 'slow@gmail.com', '$2y$10$/kEmjWN6oQ3eObf8RVk2rOW2n5ljamu9KoT.yYQgDPtCov4FK.NQC', 7, 2, 7, '2022-11-15', 1),
(30, 'aizzat', 'aizzat@gmail.com', '$2y$10$1p42Z3Y5qoFW8ZLj/l7A9.rrp6li084YkRD26114ICoVOonNJIo22', 8, 2, 1, '2022-11-21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_summary`
--

CREATE TABLE `users_summary` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `high_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `2high_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `yearlytotal`
--

CREATE TABLE `yearlytotal` (
  `year` int(11) NOT NULL,
  `January` int(11) NOT NULL,
  `March` int(11) NOT NULL,
  `April` int(11) NOT NULL,
  `May` int(11) NOT NULL,
  `June` int(11) NOT NULL,
  `July` int(11) NOT NULL,
  `August` int(11) NOT NULL,
  `September` int(11) NOT NULL,
  `October` int(11) NOT NULL,
  `November` int(11) NOT NULL,
  `December` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_group_id_foreign` (`group_id`);

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
-- Indexes for table `users_summary`
--
ALTER TABLE `users_summary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_summary_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer_records`
--
ALTER TABLE `answer_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `templates_reports`
--
ALTER TABLE `templates_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users_summary`
--
ALTER TABLE `users_summary`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `users_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `users_summary`
--
ALTER TABLE `users_summary`
  ADD CONSTRAINT `users_summary_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
